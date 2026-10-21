<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminPostManagementTest extends TestCase
{
    use RefreshDatabase;

    public function test_administrator_can_create_a_post(): void
    {
        $this->actingAs(User::factory()->create())
            ->post(route('admin.posts.store'), [
                'title' => 'Bí quyết chọn gỗ nội thất',
                'excerpt' => 'Hướng dẫn chọn vật liệu.',
                'content' => '<p>Nội dung bài viết</p>',
                'thumbnail' => 'https://example.com/wood.jpg',
                'category' => 'Kinh nghiệm',
                'read_time' => '5 phút đọc',
                'is_published' => '1',
            ])
            ->assertRedirect(route('admin.posts.index'))
            ->assertSessionHas('success');

        $this->assertDatabaseHas('posts', [
            'title' => 'Bí quyết chọn gỗ nội thất',
            'slug' => 'bi-quyet-chon-go-noi-that',
            'is_published' => true,
            'thumbnail' => 'https://example.com/wood.jpg',
        ]);
    }

    public function test_administrator_can_update_a_post_without_changing_its_slug(): void
    {
        $post = Post::create([
            'title' => 'Bài viết cũ',
            'slug' => 'bai-viet-cu',
            'content' => 'Nội dung cũ',
            'is_published' => false,
        ]);

        $this->actingAs(User::factory()->create())
            ->put(route('admin.posts.update', $post), [
                'title' => 'Bài viết đã sửa',
                'slug' => 'bai-viet-cu',
                'content' => 'Nội dung mới',
                'is_published' => '1',
            ])
            ->assertRedirect(route('admin.posts.index'))
            ->assertSessionHas('success');

        $this->assertDatabaseHas('posts', [
            'id' => $post->id,
            'title' => 'Bài viết đã sửa',
            'slug' => 'bai-viet-cu',
            'content' => 'Nội dung mới',
            'is_published' => true,
        ]);
        $this->assertNotNull($post->fresh()->published_at);
    }

    public function test_administrator_can_delete_a_post(): void
    {
        $post = Post::create([
            'title' => 'Bài viết cần xóa',
            'slug' => 'bai-viet-can-xoa',
        ]);

        $this->actingAs(User::factory()->create())
            ->delete(route('admin.posts.destroy', $post))
            ->assertRedirect(route('admin.posts.index'))
            ->assertSessionHas('success');

        $this->assertDatabaseMissing('posts', ['id' => $post->id]);
    }

    public function test_posts_index_displays_database_posts_and_edit_action(): void
    {
        $post = Post::create([
            'title' => 'Bài viết đang quản lý',
            'slug' => 'bai-viet-dang-quan-ly',
            'is_published' => false,
        ]);

        $this->actingAs(User::factory()->create())
            ->get(route('admin.posts.index'))
            ->assertOk()
            ->assertSee('Bài viết đang quản lý')
            ->assertSee(route('admin.posts.edit', $post), false)
            ->assertSee(route('admin.posts.destroy', $post), false);
    }
}
