<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('admin.projects.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'material' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'cover_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|exists:categories,id',
            'gallery_images' => ['nullable', 'array', 'max:20'],
            'gallery_images.*' => ['image', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048'],
        ]);

        $project = new Project;
        $project->title = $request->title;
        $project->slug = Str::slug($request->title).'-'.time();
        $project->material = $request->material;
        $project->description = $request->description;
        $project->category_id = $request->category_id;

        if ($request->hasFile('cover_image')) {
            $imagePath = $request->file('cover_image')->store('projects', 'public');
            $project->cover_image = $imagePath;
        }

        $project->save();
        $this->storeGalleryImages($project, $request->file('gallery_images', []));

        return redirect()->route('admin.projects.index')->with('success', 'Đã thêm dự án thành công.');
    }

    public function edit($id)
    {
        $project = Project::findOrFail($id);
        $categories = Category::all();

        return view('admin.projects.edit', compact('project', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'material' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|exists:categories,id',
            'gallery_images' => ['nullable', 'array', 'max:20'],
            'gallery_images.*' => ['image', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048'],
        ]);

        $project = Project::findOrFail($id);
        $project->title = $request->title;
        $project->slug = Str::slug($request->title).'-'.time();
        $project->material = $request->material;
        $project->description = $request->description;
        $project->category_id = $request->category_id;

        if ($request->hasFile('cover_image')) {
            if ($project->cover_image && str_starts_with($project->cover_image, 'projects/')) {
                Storage::disk('public')->delete($project->cover_image);
            }
            $imagePath = $request->file('cover_image')->store('projects', 'public');
            $project->cover_image = $imagePath;
        }

        $project->save();
        $this->storeGalleryImages($project, $request->file('gallery_images', []));

        return redirect()->route('admin.projects.index')->with('success', 'Cập nhật dự án thành công.');
    }

    public function destroy($id)
    {
        $project = Project::findOrFail($id);

        if ($project->cover_image && str_starts_with($project->cover_image, 'projects/')) {
            Storage::disk('public')->delete($project->cover_image);
        }

        foreach ($project->images as $image) {
            if (str_starts_with($image->image_path, 'projects/gallery/')) {
                Storage::disk('public')->delete($image->image_path);
            }
        }

        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Đã xóa dự án.');
    }

    /**
     * @param  array<int, UploadedFile>  $images
     */
    private function storeGalleryImages(Project $project, array $images): void
    {
        foreach ($images as $image) {
            $project->images()->create([
                'image_path' => $image->store('projects/gallery', 'public'),
            ]);
        }
    }
}
