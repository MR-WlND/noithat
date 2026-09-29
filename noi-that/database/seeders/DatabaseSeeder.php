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
        $cat1 = Category::create(['name' => 'Tủ Bếp', 'slug' => 'tu-bep']);
        $cat2 = Category::create(['name' => 'Tủ Áo', 'slug' => 'tu-ao']);
        $cat3 = Category::create(['name' => 'Nội thất Căn hộ', 'slug' => 'noi-that-can-ho']);

        $proj1 = Project::create([
            'title' => 'Tủ bếp MDF An Cường - Chị Lan',
            'slug' => Str::slug('Tủ bếp MDF An Cường - Chị Lan'),
            'category_id' => $cat1->id,
            'material' => 'Gỗ công nghiệp MDF',
            'style' => 'Hiện đại',
            'cover_image' => 'https://images.unsplash.com/photo-1556910103-1c02745aae4d?q=80&w=800&auto=format&fit=crop',
            'is_featured' => true,
            'description' => 'Thiết kế tối giản, công năng hiện đại.',
        ]);

        $proj2 = Project::create([
            'title' => 'Căn hộ chung cư Vinhomes 3 phòng ngủ',
            'slug' => Str::slug('Căn hộ chung cư Vinhomes 3 phòng ngủ'),
            'category_id' => $cat3->id,
            'material' => 'MDF lõi xanh',
            'style' => 'Tân cổ điển',
            'cover_image' => 'https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?q=80&w=800&auto=format&fit=crop',
            'is_featured' => true,
            'description' => 'Không gian sống sang trọng, tối ưu diện tích.',
        ]);

        $proj3 = Project::create([
            'title' => 'Tủ quần áo cánh kính kịch trần',
            'slug' => Str::slug('Tủ quần áo cánh kính kịch trần'),
            'category_id' => $cat2->id,
            'material' => 'Cánh kính cường lực',
            'style' => 'Hiện đại, Sang trọng',
            'cover_image' => 'https://images.unsplash.com/photo-1595526114035-0d45ed16cfbf?q=80&w=800&auto=format&fit=crop',
            'is_featured' => true,
            'description' => 'Thiết kế thông minh tiết kiệm diện tích.',
        ]);
        
        ProjectImage::create(['project_id' => $proj1->id, 'image_path' => 'https://images.unsplash.com/photo-1556910103-1c02745aae4d?q=80&w=800&auto=format&fit=crop']);
        ProjectImage::create(['project_id' => $proj1->id, 'image_path' => 'https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?q=80&w=800&auto=format&fit=crop']);
        
        ProjectImage::create(['project_id' => $proj2->id, 'image_path' => 'https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?q=80&w=800&auto=format&fit=crop']);
        ProjectImage::create(['project_id' => $proj3->id, 'image_path' => 'https://images.unsplash.com/photo-1595526114035-0d45ed16cfbf?q=80&w=800&auto=format&fit=crop']);
    }
}
