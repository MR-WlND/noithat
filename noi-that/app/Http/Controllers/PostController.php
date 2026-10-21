<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\View\View;

class PostController extends Controller
{
    public function index(): View
    {
        $posts = Post::published()
            ->select([
                'id',
                'title',
                'slug',
                'excerpt',
                'thumbnail',
                'category',
                'published_at',
                'created_at',
            ])
            ->selectRaw('CASE WHEN excerpt IS NULL THEN content ELSE NULL END AS content')
            ->latest('published_at')
            ->paginate(9);

        return view('posts.index', compact('posts'));
    }

    public function show(string $slug): View
    {
        $post = Post::published()
            ->where('slug', $slug)
            ->firstOrFail();

        $recommendedPosts = Post::published()
            ->where('category', $post->category)
            ->where('id', '!=', $post->id)
            ->latest('published_at')
            ->limit(3)
            ->get();

        if ($recommendedPosts->count() < 3) {
            $additionalPosts = Post::published()
                ->where('id', '!=', $post->id)
                ->whereNotIn('id', $recommendedPosts->modelKeys())
                ->latest('published_at')
                ->limit(3 - $recommendedPosts->count())
                ->get();

            $recommendedPosts = $recommendedPosts->concat($additionalPosts);
        }

        return view('posts.show', compact('post', 'recommendedPosts'));
    }
}
