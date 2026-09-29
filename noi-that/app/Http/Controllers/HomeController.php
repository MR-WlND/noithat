<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProjects = Project::with('category')->where('is_featured', true)->take(6)->get();
        $categories = Category::all();
        
        return view('home', compact('featuredProjects', 'categories'));
    }
}
