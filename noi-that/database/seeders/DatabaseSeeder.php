<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Project;
use App\Models\ProjectImage;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin user
        $admin = User::whereIn('email', [
            'noithatbhomehatmon@gmail.com',
            'long16730z@gmail.com',
        ])->first() ?? new User;

        $admin->fill([
            'name' => 'Administrator',
            'email' => 'noithatbhomehatmon@gmail.com',
            'password' => Hash::make('12345678'),
            'title' => 'Trưởng nhóm Thiết Kế',
            'phone' => '0962 282 204',
            'role' => 'Quản Trị Viên',
            'two_factor_enabled' => true,
        ])->save();

        $cat1 = Category::firstOrCreate(['slug' => 'tu-bep'], ['name' => 'Tủ Bếp']);
        $cat2 = Category::firstOrCreate(['slug' => 'tu-ao'], ['name' => 'Tủ Áo']);
        $cat3 = Category::firstOrCreate(['slug' => 'noi-that-can-ho'], ['name' => 'Nội thất Căn hộ']);

        $proj1 = Project::firstOrCreate(
            ['slug' => Str::slug('Tủ bếp MDF An Cường - Chị Lan')],
            [
                'title' => 'Tủ bếp MDF An Cường - Chị Lan',
                'category_id' => $cat1->id,
                'material' => 'Gỗ công nghiệp MDF',
                'style' => 'Hiện đại',
                'cover_image' => 'https://images.unsplash.com/photo-1556910103-1c02745aae4d?q=80&w=800&auto=format&fit=crop',
                'is_featured' => true,
                'description' => 'Thiết kế tối giản, công năng hiện đại.',
            ]
        );

        $proj2 = Project::firstOrCreate(
            ['slug' => Str::slug('Căn hộ chung cư Vinhomes 3 phòng ngủ')],
            [
                'title' => 'Căn hộ chung cư Vinhomes 3 phòng ngủ',
                'category_id' => $cat3->id,
                'material' => 'MDF lõi xanh',
                'style' => 'Tân cổ điển',
                'cover_image' => 'https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?q=80&w=800&auto=format&fit=crop',
                'is_featured' => true,
                'description' => 'Không gian sống sang trọng, tối ưu diện tích.',
            ]
        );

        $proj3 = Project::firstOrCreate(
            ['slug' => Str::slug('Tủ quần áo cánh kính kịch trần')],
            [
                'title' => 'Tủ quần áo cánh kính kịch trần',
                'category_id' => $cat2->id,
                'material' => 'Cánh kính cường lực',
                'style' => 'Hiện đại, Sang trọng',
                'cover_image' => 'https://images.unsplash.com/photo-1595526114035-0d45ed16cfbf?q=80&w=800&auto=format&fit=crop',
                'is_featured' => true,
                'description' => 'Thiết kế thông minh tiết kiệm diện tích.',
            ]
        );

        ProjectImage::firstOrCreate(['project_id' => $proj1->id, 'image_path' => 'https://images.unsplash.com/photo-1556910103-1c02745aae4d?q=80&w=800&auto=format&fit=crop']);
        ProjectImage::firstOrCreate(['project_id' => $proj1->id, 'image_path' => 'https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?q=80&w=800&auto=format&fit=crop']);

        ProjectImage::firstOrCreate(['project_id' => $proj2->id, 'image_path' => 'https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?q=80&w=800&auto=format&fit=crop']);
        ProjectImage::firstOrCreate(['project_id' => $proj3->id, 'image_path' => 'https://images.unsplash.com/photo-1595526114035-0d45ed16cfbf?q=80&w=800&auto=format&fit=crop']);

        // SEO Blog Posts
        Post::firstOrCreate(
            ['slug' => 'chi-phi-lam-tu-bep-go-cong-nghiep-2026'],
            [
                'title' => 'Chi Phí Làm Tủ Bếp Gỗ Công Nghiệp 2026: Bảng Giá Chi Tiết',
                'excerpt' => 'Tủ bếp gỗ công nghiệp MDF, HDF đang là lựa chọn phổ biến vì tính thẩm mỹ cao, chống ẩm tốt và chi phí tối ưu. Xem bảng giá chi tiết từ xưởng B HOME.',
                'thumbnail' => 'https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?q=80&w=800&auto=format&fit=crop',
                'category' => 'Tủ Bếp',
                'read_time' => '5 phút đọc',
                'is_published' => true,
                'published_at' => now()->subDays(2),
            ]
        );

        Post::firstOrCreate(
            ['slug' => 'tu-ao-kich-tran-co-nen-lam-khong'],
            [
                'title' => 'Tủ Áo Kịch Trần Có Nên Làm Không? Ưu & Nhược Điểm Thực Tế',
                'excerpt' => 'Tủ áo kịch trần giúp tận dụng tối đa chiều cao phòng, tạo cảm giác rộng rãi. Nhưng có những điểm cần lưu ý khi thi công để tránh lãng phí.',
                'thumbnail' => 'https://images.unsplash.com/photo-1595526114035-0d45ed16cfbf?q=80&w=800&auto=format&fit=crop',
                'category' => 'Tủ Áo',
                'read_time' => '4 phút đọc',
                'is_published' => true,
                'published_at' => now()->subDays(5),
            ]
        );

        Post::firstOrCreate(
            ['slug' => 'noi-that-can-ho-chung-cu-tron-goi'],
            [
                'title' => 'Nội Thất Căn Hộ Chung Cư Trọn Gói: Kinh Nghiệm Từ Xưởng Mộc',
                'excerpt' => 'Làm nội thất căn hộ trọn gói tại xưởng sẽ tiết kiệm 15-20% chi phí so với mua nội thất sẵn. Chia sẻ kinh nghiệm thực tế từ hơn 500 dự án của B HOME.',
                'thumbnail' => 'https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?q=80&w=800&auto=format&fit=crop',
                'category' => 'Căn Hộ',
                'read_time' => '6 phút đọc',
                'is_published' => true,
                'published_at' => now()->subDays(10),
            ]
        );
    }
}
