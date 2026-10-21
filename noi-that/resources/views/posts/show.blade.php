@extends('layouts.app')

@php
    $publishedAt = $post->published_at ?? $post->created_at;
    $postImage = $post->thumbnail_url
        ?? 'https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?w=1200&auto=format&fit=crop';
    $descriptionSource = filled($post->excerpt) ? $post->excerpt : ($post->content ?? '');
    $seoDescription = Str::limit(
        trim(preg_replace('/\s+/', ' ', html_entity_decode(strip_tags($descriptionSource), ENT_QUOTES | ENT_HTML5, 'UTF-8'))),
        160,
        '…'
    );
    $canonicalUrl = route('posts.show', $post->slug);
    $articleSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'BlogPosting',
        'mainEntityOfPage' => [
            '@type' => 'WebPage',
            '@id' => $canonicalUrl,
        ],
        'headline' => $post->title,
        'description' => $seoDescription,
        'image' => [$postImage],
        'datePublished' => $publishedAt->toIso8601String(),
        'dateModified' => ($post->updated_at ?? $publishedAt)->toIso8601String(),
        'author' => [
            '@type' => 'Organization',
            'name' => 'B HOME',
        ],
        'publisher' => [
            '@type' => 'Organization',
            'name' => 'B HOME',
            'logo' => [
                '@type' => 'ImageObject',
                'url' => asset('images/Logo B HOME.png'),
            ],
        ],
        'articleSection' => $post->category ?? 'Bài Viết',
        'inLanguage' => 'vi-VN',
    ];
    $breadcrumbSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'BreadcrumbList',
        'itemListElement' => [
            [
                '@type' => 'ListItem',
                'position' => 1,
                'name' => 'Trang chủ',
                'item' => route('home'),
            ],
            [
                '@type' => 'ListItem',
                'position' => 2,
                'name' => 'Bài viết',
                'item' => route('posts.index'),
            ],
            [
                '@type' => 'ListItem',
                'position' => 3,
                'name' => $post->title,
                'item' => $canonicalUrl,
            ],
        ],
    ];
@endphp

@section('title', $post->title.' - B HOME')
@section('description', $seoDescription)
@section('canonical', $canonicalUrl)
@section('og_type', 'article')
@section('og_image', $postImage)
@section('og_published_time', $publishedAt->toIso8601String())
@section('og_modified_time', ($post->updated_at ?? $publishedAt)->toIso8601String())

@section('content')
<script type="application/ld+json">@json($articleSchema)</script>
<script type="application/ld+json">@json($breadcrumbSchema)</script>
<section class="post-detail page-content">
    <div class="container">
        <div class="post-layout">
            <article class="post-article">
                <header class="post-article__header">
                    <nav class="post-breadcrumbs" aria-label="Breadcrumb">
                        <ol>
                            <li><a href="{{ route('home') }}">Trang chủ</a></li>
                            <li><a href="{{ route('posts.index') }}">Bài viết</a></li>
                            <li aria-current="page">{{ $post->title }}</li>
                        </ol>
                    </nav>
                    <span class="post-header__category">{{ $post->category ?? 'Bài Viết' }}</span>
                    <h1>{{ $post->title }}</h1>
                    <div class="post-header__meta">
                        <span><i class="far fa-user"></i> B HOME</span>
                        <time datetime="{{ $publishedAt->toIso8601String() }}"><i class="far fa-calendar-alt"></i> {{ $publishedAt->format('d/m/Y') }}</time>
                    </div>
                </header>
                <div class="post-article__image">
                    <img src="{{ $postImage }}" alt="{{ $post->title }}">
                </div>
                <div class="post-article__content">
                    {!! $post->content !!}
                </div>
                <div class="post-article__share">
                    <a href="{{ route('posts.index') }}" class="btn btn--outline"><i class="fas fa-arrow-left"></i> Quay lại danh sách bài viết</a>
                </div>
            </article>

            <aside class="post-sidebar">
                <section class="post-contact-card">
                    <div class="post-contact-card__phone">
                        <i class="fas fa-phone-alt"></i>
                        <div>
                            <span>Tư vấn trực tiếp</span>
                            <a href="tel:0962282204">0962 282 204</a>
                        </div>
                    </div>
                    <h2>Đăng ký khảo sát tại nhà</h2>
                    <p>Để lại thông tin, B HOME sẽ liên hệ tư vấn và hẹn lịch khảo sát phù hợp.</p>

                    @if(session('success'))
                        <div class="post-contact-alert" role="status">{{ session('success') }}</div>
                    @endif

                    <form action="{{ route('contact.store') }}" method="POST" class="post-contact-form">
                        @csrf
                        <div class="f-group">
                            <label for="post-contact-name">Họ tên <span>*</span></label>
                            <input id="post-contact-name" type="text" name="name" value="{{ old('name') }}" placeholder="Ví dụ: Anh Quân" required>
                            @error('name')
                                <small class="post-contact-error">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="f-group">
                            <label for="post-contact-phone">Số điện thoại <span>*</span></label>
                            <input id="post-contact-phone" type="tel" name="phone" value="{{ old('phone') }}" placeholder="Ví dụ: 0962 xxx xxx" required>
                            @error('phone')
                                <small class="post-contact-error">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="f-group">
                            <label for="post-contact-category">Nhu cầu của anh/chị</label>
                            <select id="post-contact-category" name="category">
                                @php
                                    $contactCategories = ['Tủ bếp', 'Phòng khách', 'Phòng ngủ', 'Toàn bộ nhà'];
                                    $selectedCategory = old('category', $post->category);
                                @endphp
                                @if($selectedCategory && !in_array($selectedCategory, $contactCategories, true))
                                    <option value="{{ $selectedCategory }}" selected>{{ $selectedCategory }}</option>
                                @endif
                                @foreach($contactCategories as $category)
                                    <option value="{{ $category }}" @selected($selectedCategory === $category)>{{ $category }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="f-group">
                            <label for="post-contact-message">Nội dung cần tư vấn</label>
                            <textarea id="post-contact-message" name="message" rows="3" placeholder="Chia sẻ nhu cầu hoặc câu hỏi của anh/chị...">{{ old('message') }}</textarea>
                        </div>
                        <button type="submit" class="btn btn--primary btn--full">Gửi yêu cầu tư vấn</button>
                    </form>
                </section>

                <section class="post-guarantee">
                    <h2><i class="fas fa-award"></i> Cam kết từ xưởng B HOME</h2>
                    <ul>
                        <li><i class="fas fa-check"></i><span>Khảo sát và tư vấn tận nhà miễn phí.</span></li>
                        <li><i class="fas fa-check"></i><span>Báo giá minh bạch, không phát sinh chi phí ngoài thỏa thuận.</span></li>
                        <li><i class="fas fa-check"></i><span>Chính sách bảo hành lên đến 5 năm theo từng sản phẩm.</span></li>
                    </ul>
                </section>
            </aside>
        </div>

        @if($recommendedPosts->isNotEmpty())
        <section class="post-recommendations" aria-labelledby="post-recommendations-title">
            <div class="post-recommendations__header">
                <div>
                    <span class="post-recommendations__eyebrow">{{ $post->category ?? 'B HOME Blog' }}</span>
                    <h2 id="post-recommendations-title">Bài viết tiếp theo bạn nên đọc</h2>
                </div>
                <a href="{{ route('posts.index') }}">Xem tất cả bài viết <i class="fas fa-arrow-right"></i></a>
            </div>
            <div class="post-recommendations__grid">
                @foreach($recommendedPosts as $related)
                <article class="post-card">
                    <a href="{{ route('posts.show', $related->slug) }}" class="post-card__image">
                        <img src="{{ $related->thumbnail_url ?? 'https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?w=800&auto=format&fit=crop' }}" alt="{{ $related->title }}" loading="lazy">
                        <span>{{ $related->category ?? 'Bài viết' }}</span>
                    </a>
                    <div class="post-card__content">
                        <div class="post-card__meta">
                            <span><i class="far fa-clock"></i> {{ $related->read_time ?? '5 phút đọc' }}</span>
                            <time datetime="{{ ($related->published_at ?? $related->created_at)->toIso8601String() }}">{{ ($related->published_at ?? $related->created_at)->format('d/m/Y') }}</time>
                        </div>
                        <h3 class="post-card__title">
                            <a href="{{ route('posts.show', $related->slug) }}">{{ $related->title }}</a>
                        </h3>
                        <p class="post-card__excerpt">{{ $related->excerpt ?? Str::limit(strip_tags($related->content ?? ''), 120) }}</p>
                        <a href="{{ route('posts.show', $related->slug) }}" class="post-card__link">Đọc bài viết <i class="fas fa-arrow-right"></i></a>
                    </div>
                </article>
                @endforeach
            </div>
        </section>
        @endif
    </div>
</section>
@endsection
