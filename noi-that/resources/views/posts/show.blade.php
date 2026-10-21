@extends('layouts.app')

@php
    $publishedAt = $post->published_at ?? $post->created_at;
    $postImage = $post->thumbnail
        ? (str_starts_with($post->thumbnail, 'http') ? $post->thumbnail : asset('storage/'.$post->thumbnail))
        : 'https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?w=1200&auto=format&fit=crop';
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
<section class="page-header">
    <div class="container">
        <div class="post-header">
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
        </div>
    </div>
</section>

<section class="page-content">
    <div class="container">
        <div class="post-layout">
            <article class="post-article">
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

            @if(!empty($relatedPosts) && $relatedPosts->count() > 0)
            <aside class="post-sidebar">
                <h3 class="post-sidebar__title">Bài viết liên quan</h3>
                @foreach($relatedPosts as $related)
                <a href="{{ route('posts.show', $related->slug) }}" class="related-post">
                    <img src="{{ $related->thumbnail ? (str_starts_with($related->thumbnail, 'http') ? $related->thumbnail : asset('storage/'.$related->thumbnail)) : 'https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?w=400&auto=format&fit=crop' }}" alt="{{ $related->title }}">
                    <div>
                        <h4>{{ Str::limit($related->title, 60) }}</h4>
                        <time datetime="{{ ($related->published_at ?? $related->created_at)->toIso8601String() }}">{{ ($related->published_at ?? $related->created_at)->format('d/m/Y') }}</time>
                    </div>
                </a>
                @endforeach
            </aside>
            @endif
        </div>
    </div>
</section>
@endsection
