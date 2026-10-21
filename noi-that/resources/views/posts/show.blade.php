@extends('layouts.app')

@section('title', $post->title.' - B HOME')

@section('content')
<section class="page-header">
    <div class="container">
        <div class="post-header">
            <span class="post-header__category">{{ $post->category ?? 'Bài Viết' }}</span>
            <h1>{{ $post->title }}</h1>
            <div class="post-header__meta">
                <span><i class="far fa-user"></i> B HOME</span>
                <span><i class="far fa-calendar-alt"></i> {{ ($post->published_at ?? $post->created_at)->format('d/m/Y') }}</span>
            </div>
        </div>
    </div>
</section>

<section class="page-content">
    <div class="container">
        <div class="post-layout">
            <article class="post-article">
                <div class="post-article__image">
                    <img src="{{ $post->thumbnail ? (str_starts_with($post->thumbnail, 'http') ? $post->thumbnail : asset('storage/'.$post->thumbnail)) : 'https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?w=1200&auto=format&fit=crop' }}" alt="{{ $post->title }}">
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
                        <span>{{ ($related->published_at ?? $related->created_at)->format('d/m/Y') }}</span>
                    </div>
                </a>
                @endforeach
            </aside>
            @endif
        </div>
    </div>
</section>
@endsection
