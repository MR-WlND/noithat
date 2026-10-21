<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\View\View;

class PostController extends Controller
{
    public function index(): View
    {
        $posts = Post::published()
            ->latest('published_at')
            ->paginate(9);

        return view('posts.index', compact('posts'));
    }

    public function show(string $slug): View
    {
        $post = Post::published()
            ->where('slug', $slug)
            ->firstOrFail();

        $relatedPosts = Post::published()
            ->where('category', $post->category)
            ->where('id', '!=', $post->id)
            ->latest('published_at')
            ->limit(3)
            ->get();

        return view('posts.show', compact('post', 'relatedPosts'));
    }
}
