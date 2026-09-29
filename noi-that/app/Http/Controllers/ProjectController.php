<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Category;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        $query = Project::with('category');
        
        // Filter by category slug
        if ($request->has('category') && $request->category != '') {
            $query->whereHas('category', function($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }
        
        $projects = $query->orderBy('created_at', 'desc')->paginate(9);
        
        return view('projects.index', compact('projects', 'categories'));
    }

    public function show($slug)
    {
        $project = Project::with(['category', 'images'])->where('slug', $slug)->firstOrFail();
        $relatedProjects = Project::where('category_id', $project->category_id)
                                  ->where('id', '!=', $project->id)
                                  ->take(3)
                                  ->get();
                                  
        return view('projects.show', compact('project', 'relatedProjects'));
    }
}
