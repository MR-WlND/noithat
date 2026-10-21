<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->string('search')->trim()->toString();

        $posts = Post::query()
            ->when($search !== '', function ($query) use ($search): void {
                $query->where(function ($query) use ($search): void {
                    $query->where('title', 'like', "%{$search}%")
                        ->orWhere('slug', 'like', "%{$search}%")
                        ->orWhere('category', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.posts.index', [
            'posts' => $posts,
            'search' => $search,
            'totalPosts' => Post::count(),
            'publishedPosts' => Post::where('is_published', true)->count(),
            'draftPosts' => Post::where('is_published', false)->count(),
        ]);
    }

    public function create(): View
    {
        return view('admin.posts.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validatePost($request);
        $thumbnailFile = $validated['thumbnail_file'] ?? null;
        unset($validated['thumbnail_file']);
        $validated['slug'] = $this->resolveSlug($validated['slug'] ?? null, $validated['title']);
        $validated['is_published'] = $request->boolean('is_published');

        if ($thumbnailFile instanceof UploadedFile) {
            $validated['thumbnail'] = $thumbnailFile->store('posts', 'public');
        }

        if ($validated['is_published']) {
            $validated['published_at'] = now();
        }

        Post::create($validated);

        return redirect()->route('admin.posts.index')->with('success', 'Đã tạo bài viết mới thành công.');
    }

    public function edit(Post $post): View
    {
        return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post): RedirectResponse
    {
        $validated = $this->validatePost($request, $post);
        $thumbnailFile = $validated['thumbnail_file'] ?? null;
        unset($validated['thumbnail_file']);
        $validated['slug'] = $this->resolveSlug($validated['slug'] ?? null, $validated['title'], $post);
        $validated['is_published'] = $request->boolean('is_published');

        if ($thumbnailFile instanceof UploadedFile) {
            $previousThumbnail = $post->thumbnail;
            $validated['thumbnail'] = $thumbnailFile->store('posts', 'public');
        }

        if ($validated['is_published'] && ! $post->published_at) {
            $validated['published_at'] = now();
        }

        $post->update($validated);

        if (isset($previousThumbnail) && $previousThumbnail !== $post->thumbnail && str_starts_with($previousThumbnail, 'posts/')) {
            Storage::disk('public')->delete($previousThumbnail);
        }

        return redirect()->route('admin.posts.index')->with('success', 'Đã cập nhật bài viết thành công.');
    }

    public function destroy(Post $post): RedirectResponse
    {
        if ($post->thumbnail && str_starts_with($post->thumbnail, 'posts/')) {
            Storage::disk('public')->delete($post->thumbnail);
        }

        $post->delete();

        return redirect()->route('admin.posts.index')->with('success', 'Đã xóa bài viết thành công.');
    }

    /**
     * @return array{title: string, slug: ?string, excerpt: ?string, content: ?string, thumbnail: ?string, thumbnail_file?: UploadedFile, category: ?string, read_time: ?string}
     */
    private function validatePost(Request $request, ?Post $post = null): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('posts', 'slug')->ignore($post),
            ],
            'excerpt' => ['nullable', 'string', 'max:1000'],
            'content' => ['nullable', 'string'],
            'thumbnail' => ['nullable', 'string', 'max:2048'],
            'thumbnail_file' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:5120'],
            'category' => ['nullable', 'string', 'max:255'],
            'read_time' => ['nullable', 'string', 'max:255'],
        ]);
    }

    private function resolveSlug(?string $slug, string $title, ?Post $post = null): string
    {
        $baseSlug = Str::slug($slug ?: $title);
        $baseSlug = $baseSlug !== '' ? $baseSlug : Str::random(8);
        $resolvedSlug = $baseSlug;
        $suffix = 2;

        while (Post::where('slug', $resolvedSlug)
            ->when($post, fn ($query) => $query->whereKeyNot($post->getKey()))
            ->exists()) {
            $resolvedSlug = "{$baseSlug}-{$suffix}";
            $suffix++;
        }

        return $resolvedSlug;
    }
}
