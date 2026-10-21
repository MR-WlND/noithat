<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Project;

class DashboardController extends Controller
{
    public function index()
    {
        $projectCount = Project::count();
        $newContactCount = Contact::whereIn('status', ['new', 'Chưa gọi'])->count();

        return view('admin.dashboard', compact('projectCount', 'newContactCount'));
    }
}
