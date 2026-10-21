<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Post;
use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AdminMediaUploadTest extends TestCase
{
    use RefreshDatabase;

    public function test_administrator_can_create_project_with_multiple_gallery_images(): void
    {
        Storage::fake('public');
        $category = Category::create([
            'name' => 'Phòng khách',
            'slug' => 'phong-khach',
        ]);

        $this->actingAs(User::factory()->create())
            ->post(route('admin.projects.store'), [
                'title' => 'Dự án phòng khách',
                'category_id' => $category->id,
                'cover_image' => UploadedFile::fake()->image('cover.jpg'),
                'gallery_images' => [
                    UploadedFile::fake()->image('living-room.jpg'),
                    UploadedFile::fake()->image('details.jpg'),
                ],
            ])
            ->assertRedirect(route('admin.projects.index'))
            ->assertSessionHas('success');

        $project = Project::where('title', 'Dự án phòng khách')->firstOrFail();
        $this->assertDatabaseCount('project_images', 2);

        foreach ($project->images as $image) {
            Storage::disk('public')->assertExists($image->image_path);
        }

        $this->get(route('projects.show', $project->slug))
            ->assertOk()
            ->assertSee(asset('storage/'.$project->images->first()->image_path), false);
    }

    public function test_administrator_can_add_gallery_images_without_removing_existing_images(): void
    {
        Storage::fake('public');
        $category = Category::create([
            'name' => 'Phòng khách',
            'slug' => 'phong-khach',
        ]);
        $project = Project::create([
            'title' => 'Dự án hiện tại',
            'slug' => 'du-an-hien-tai',
            'category_id' => $category->id,
        ]);
        Storage::disk('public')->put('projects/gallery/existing.jpg', 'existing image');
        $project->images()->create([
            'image_path' => 'projects/gallery/existing.jpg',
        ]);

        $this->actingAs(User::factory()->create())
            ->put(route('admin.projects.update', $project), [
                'title' => $project->title,
                'category_id' => $category->id,
                'gallery_images' => [
                    UploadedFile::fake()->image('new-detail.jpg'),
                ],
            ])
            ->assertRedirect(route('admin.projects.index'))
            ->assertSessionHas('success');

        $this->assertDatabaseCount('project_images', 2);
        Storage::disk('public')->assertExists('projects/gallery/existing.jpg');
        Storage::disk('public')->assertExists($project->fresh()->images->last()->image_path);
    }

    public function test_administrator_can_upload_a_thumbnail_for_a_post(): void
    {
        Storage::fake('public');

        $this->actingAs(User::factory()->create())
            ->post(route('admin.posts.store'), [
                'title' => 'Bài viết có ảnh',
                'thumbnail_file' => UploadedFile::fake()->image('article.jpg'),
                'is_published' => '1',
            ])
            ->assertRedirect(route('admin.posts.index'))
            ->assertSessionHas('success');

        $post = Post::where('title', 'Bài viết có ảnh')->firstOrFail();
        $this->assertStringStartsWith('posts/', $post->thumbnail);
        $this->assertSame(asset('storage/'.$post->thumbnail), $post->thumbnail_url);
        Storage::disk('public')->assertExists($post->thumbnail);
    }
}
