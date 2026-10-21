<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Post;
use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Tests\TestCase;

class AdminSidebarTest extends TestCase
{
    use RefreshDatabase;

    public function test_project_sidebar_badge_shows_the_actual_project_count(): void
    {
        $category = Category::create([
            'name' => 'Tủ bếp',
            'slug' => 'tu-bep',
        ]);

        Project::create([
            'title' => 'Dự án kiểm tra',
            'slug' => Str::slug('du-an-kiem-tra'),
            'category_id' => $category->id,
        ]);

        $this->actingAs(User::factory()->create())
            ->get(route('admin.posts.index'))
            ->assertOk()
            ->assertSee('Quản lý Dự án')
            ->assertSee('nav-badge--primary">1</span>', false)
            ->assertDontSee('nav-badge--primary">18</span>', false)
            ->assertDontSee('Vật liệu &amp; Xưởng Mộc')
            ->assertDontSee('admin.materials.index');

        $this->assertFalse(Route::has('admin.materials.index'));
    }

    public function test_post_sidebar_badge_shows_the_actual_post_count(): void
    {
        Post::create([
            'title' => 'Bài viết kiểm tra',
            'slug' => 'bai-viet-kiem-tra',
            'is_published' => false,
        ]);
        Post::create([
            'title' => 'Bài viết thứ hai',
            'slug' => 'bai-viet-thu-hai',
            'is_published' => true,
        ]);

        $this->actingAs(User::factory()->create())
            ->get(route('admin.posts.index'))
            ->assertOk()
            ->assertSee('Bài viết & SEO')
            ->assertSee('nav-badge--success">2</span>', false)
            ->assertDontSee('nav-badge--success">Mới</span>', false);
    }
}
