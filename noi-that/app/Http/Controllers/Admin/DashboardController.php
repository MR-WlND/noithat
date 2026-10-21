<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Post;
use App\Models\Project;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $projectCount = Project::count();
        $contactCount = Contact::count();
        $newContactCount = Contact::whereIn('status', ['new', 'Chưa gọi', 'ChÆ°a gá»i'])->count();
        $publishedPostCount = Post::published()->count();
        $recentProjects = Project::with('category')->latest()->limit(5)->get();
        $recentContacts = Contact::latest()->limit(5)->get();

        return view('admin.dashboard', compact(
            'projectCount',
            'contactCount',
            'newContactCount',
            'publishedPostCount',
            'recentProjects',
            'recentContacts'
        ));
    }
}
