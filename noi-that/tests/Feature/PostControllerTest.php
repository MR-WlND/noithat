<?php

namespace Tests\Feature;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_published_posts_are_listed_and_linked_from_the_header(): void
    {
        Post::create([
            'title' => 'Chọn vật liệu nội thất',
            'slug' => 'chon-vat-lieu-noi-that',
            'content' => 'Hướng dẫn chọn vật liệu.',
            'category' => 'Kinh nghiệm',
            'is_published' => true,
            'published_at' => now(),
        ]);
        Post::create([
            'title' => 'Bài viết bản nháp',
            'slug' => 'bai-viet-ban-nhap',
            'is_published' => false,
        ]);

        $this->get(route('posts.index'))
            ->assertOk()
            ->assertSee('Bài Viết')
            ->assertSee('Chọn vật liệu nội thất')
            ->assertDontSee('Bài viết bản nháp')
            ->assertSee(route('posts.index'), false);
    }

    public function test_published_post_detail_is_rendered(): void
    {
        Post::create([
            'title' => 'Chọn vật liệu nội thất',
            'slug' => 'chon-vat-lieu-noi-that',
            'content' => 'Hướng dẫn chọn vật liệu.',
            'category' => 'Kinh nghiệm',
            'is_published' => true,
            'published_at' => now(),
        ]);

        $this->get(route('posts.show', 'chon-vat-lieu-noi-that'))
            ->assertOk()
            ->assertSee('Chọn vật liệu nội thất')
            ->assertSee('Hướng dẫn chọn vật liệu.')
            ->assertSee(route('posts.index'), false);
    }

    public function test_unpublished_post_detail_returns_not_found(): void
    {
        Post::create([
            'title' => 'Bài viết bản nháp',
            'slug' => 'bai-viet-ban-nhap',
            'is_published' => false,
        ]);

        $this->get(route('posts.show', 'bai-viet-ban-nhap'))
            ->assertNotFound();
    }
}
