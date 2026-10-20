<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin user
        \App\Models\User::firstOrCreate(
            ['email' => 'long16730z@gmail.com'],
            [
                'name' => 'Administrator',
                'password' => \Illuminate\Support\Facades\Hash::make('12345678'),
                'title' => 'Trưởng nhóm Thiết Kế',
                'phone' => '0988.248.868',
                'role' => 'Quản Trị Viên',
                'two_factor_enabled' => true,
            ]
        );

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
    }
}
