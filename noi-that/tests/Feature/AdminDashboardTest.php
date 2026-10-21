<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Contact;
use App\Models\Post;
use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class AdminDashboardTest extends TestCase
{
    use RefreshDatabase;

    public function test_dashboard_shows_live_counts_and_recent_records(): void
    {
        $category = Category::create([
            'name' => 'Căn hộ',
            'slug' => 'can-ho',
        ]);

        Project::create([
            'title' => 'Dự án căn hộ mới',
            'slug' => 'du-an-can-ho-moi',
            'category_id' => $category->id,
        ]);

        Contact::create([
            'name' => 'Nguyễn An',
            'phone' => '0900000000',
            'message' => 'Tôi cần tư vấn thiết kế phòng khách.',
        ]);
        $contact = Contact::create([
            'name' => 'Trần Bình',
            'phone' => '0911111111',
            'message' => 'Tôi muốn hỏi về dự án mới.',
        ]);
        DB::table('contacts')->where('id', $contact->id)->update(['status' => 'Đã liên hệ tư vấn']);

        Post::create([
            'title' => 'Bài viết đã xuất bản',
            'slug' => 'bai-viet-da-xuat-ban',
            'is_published' => true,
        ]);
        Post::create([
            'title' => 'Bản nháp',
            'slug' => 'ban-nhap',
            'is_published' => false,
        ]);

        $response = $this->actingAs(User::factory()->create())
            ->get(route('admin.dashboard'))
            ->assertOk()
            ->assertSee('Tổng quan')
            ->assertSee('Dự án căn hộ mới')
            ->assertSee('Nguyễn An')
            ->assertSee('0900000000')
            ->assertSee('Bài viết đã xuất bản')
            ->assertSee('1 đang chờ liên hệ')
            ->assertSee(route('admin.projects.index'))
            ->assertSee(route('admin.inquiries.index'));

        $response->assertDontSee('Vinhomes Smart City');
    }

    public function test_dashboard_shows_empty_states_when_there_are_no_records(): void
    {
        $this->actingAs(User::factory()->create())
            ->get(route('admin.dashboard'))
            ->assertOk()
            ->assertSee('0')
            ->assertSee('Chưa có dự án nào')
            ->assertSee('Chưa có liên hệ mới')
            ->assertSee('Hiện không có yêu cầu tư vấn nào đang chờ xử lý.');
    }
}
