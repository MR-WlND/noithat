<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Project;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProjects = Project::with('category')
            ->where('is_featured', true)
            ->take(6)
            ->get();

        $categories = Category::all();

        $latestPosts = Post::published()
            ->orderByDesc('published_at')
            ->take(3)
            ->get();

        return view('home', compact('featuredProjects', 'categories', 'latestPosts'));
    }
}
