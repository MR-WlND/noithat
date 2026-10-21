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
            ->assertSee('Hướng dẫn chọn vật liệu.')
            ->assertDontSee('Bài viết bản nháp')
            ->assertSee(route('posts.index'), false);
    }

    public function test_post_excerpt_is_rendered_in_the_listing(): void
    {
        Post::create([
            'title' => 'Chọn vật liệu nội thất',
            'slug' => 'chon-vat-lieu-noi-that',
            'excerpt' => 'Tóm tắt ngắn của bài viết.',
            'content' => str_repeat('Nội dung dài của bài viết. ', 100),
            'is_published' => true,
            'published_at' => now(),
        ]);

        $this->get(route('posts.index'))
            ->assertOk()
            ->assertSee('Tóm tắt ngắn của bài viết.')
            ->assertDontSee('Nội dung dài của bài viết.');
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

    public function test_post_detail_shows_contact_form_guarantees_and_recommended_posts_below_content(): void
    {
        $post = Post::create([
            'title' => 'Bài viết đang xem',
            'slug' => 'bai-viet-dang-xem',
            'content' => '<p>Nội dung bài viết chính.</p>',
            'category' => 'Tủ bếp',
            'is_published' => true,
            'published_at' => now(),
        ]);
        $recommendedPost = Post::create([
            'title' => 'Bài viết gợi ý cùng chủ đề',
            'slug' => 'bai-viet-goi-y',
            'content' => 'Nội dung bài viết gợi ý.',
            'category' => 'Tủ bếp',
            'is_published' => true,
            'published_at' => now()->subDay(),
        ]);

        $response = $this->get(route('posts.show', $post->slug))
            ->assertOk()
            ->assertSee('Đăng ký khảo sát tại nhà')
            ->assertSee('name="name"', false)
            ->assertSee('name="phone"', false)
            ->assertSee('Cam kết từ xưởng B HOME')
            ->assertSee('Khảo sát và tư vấn tận nhà miễn phí.')
            ->assertSee('Bài viết tiếp theo bạn nên đọc')
            ->assertSee($recommendedPost->title);

        $contentPosition = strpos($response->getContent(), 'Nội dung bài viết chính.');
        $recommendationsPosition = strpos($response->getContent(), 'Bài viết tiếp theo bạn nên đọc');

        $this->assertNotFalse($contentPosition);
        $this->assertNotFalse($recommendationsPosition);
        $this->assertGreaterThan($contentPosition, $recommendationsPosition);
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
