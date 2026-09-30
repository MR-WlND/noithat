<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Contact;

class DashboardController extends Controller
{
    public function index()
    {
        $projectCount = Project::count();
        $newContactCount = Contact::where('status', 'new')->orWhere('status', 'Chưa gọi')->count(); // Assuming there's a status field, if not, I'll count all or just the ones not processed

        return view('admin.dashboard', compact('projectCount', 'newContactCount'));
    }
}
