@extends('layouts.app')

@section('title', 'Bài Viết - B HOME')
@section('description', 'Cập nhật tin tức, kinh nghiệm và xu hướng thiết kế nội thất gỗ may đo từ xưởng B HOME. Khám phá bí quyết chọn vật liệu, thi công và tối ưu không gian.')
@section('canonical', route('posts.index'))
@section('og_image', asset('images/Logo B HOME.png'))

@section('content')
<section class="page-header">
    <div class="container">
        <h1>Bài Viết</h1>
        <p>Tin tức, kinh nghiệm, xu hướng nội thất gỗ may đo từ xưởng B HOME</p>
    </div>
</section>

<section class="page-content">
    <div class="container">
        <div class="posts-grid">
            @forelse($posts as $post)
            <article class="post-card">
                <a href="{{ route('posts.show', $post->slug) }}" class="post-card__image">
                    <img src="{{ $post->thumbnail ? (str_starts_with($post->thumbnail, 'http') ? $post->thumbnail : asset('storage/'.$post->thumbnail)) : 'https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?w=800&auto=format&fit=crop' }}" alt="{{ $post->title }}">
                </a>
                <div class="post-card__content">
                    <div class="post-card__meta">
                        <span class="post-card__category">{{ $post->category ?? 'Bài Viết' }}</span>
                        <span>{{ ($post->published_at ?? $post->created_at)->format('d/m/Y') }}</span>
                    </div>
                    <h2 class="post-card__title">
                        <a href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a>
                    </h2>
                    <p class="post-card__excerpt">{{ $post->excerpt ?? Str::limit(strip_tags($post->content ?? ''), 140) }}</p>
                    <a href="{{ route('posts.show', $post->slug) }}" class="post-card__link">Đọc tiếp <i class="fas fa-arrow-right"></i></a>
                </div>
            </article>
            @empty
            <p>Hiện chưa có bài viết nào được xuất bản.</p>
            @endforelse
        </div>
        @if($posts->hasPages())
        <div class="posts-pagination">
            {{ $posts->links() }}
        </div>
        @endif
    </div>
</section>
@endsection
