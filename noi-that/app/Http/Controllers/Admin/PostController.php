<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = [
            [
                'id' => 1,
                'title' => 'Kinh nghiệm chọn ván MDF lõi xanh chống ẩm An Cường chuẩn 100% cho tủ bếp',
                'category' => 'Cẩm Nang Vật Liệu',
                'slug' => 'kinh-nghiem-chon-mdf-chong-am-an-cuong-tu-bep',
                'views' => 1840,
                'seo_score' => 96,
                'seo_class' => 'good',
                'author' => 'KTS. Hoàng Minh',
                'status' => 'Đã xuất bản',
                'status_class' => 'success',
                'published_at' => '12/10/2026',
                'image' => 'https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?w=400&auto=format&fit=crop'
            ],
            [
                'id' => 2,
                'title' => 'Tổng hợp 25+ mẫu tủ bếp may đo tối ưu công năng cho nhà phố và căn hộ 2026',
                'category' => 'Xu Hướng Thiết Kế',
                'slug' => 'mau-tu-bep-may-do-nha-pho-can-ho-2026',
                'views' => 2450,
                'seo_score' => 92,
                'seo_class' => 'good',
                'author' => 'KTS. Hoàng Minh',
                'status' => 'Đã xuất bản',
                'status_class' => 'success',
                'published_at' => '08/10/2026',
                'image' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=400&auto=format&fit=crop'
            ],
            [
                'id' => 3,
                'title' => 'Tại sao nên đóng nội thất trực tiếp tại xưởng mộc gia đình thay vì mua sẵn?',
                'category' => 'Kinh Nghiệm Làm Mộc',
                'slug' => 'tai-sao-nen-dong-noi-that-truc-tiep-tai-xuong',
                'views' => 980,
                'seo_score' => 88,
                'seo_class' => 'good',
                'author' => 'Admin Hệ Thống',
                'status' => 'Đã xuất bản',
                'status_class' => 'success',
                'published_at' => '02/10/2026',
                'image' => 'https://images.unsplash.com/photo-1595526114035-0d45ed16cfbf?w=400&auto=format&fit=crop'
            ],
            [
                'id' => 4,
                'title' => 'Bảng báo giá thi công tủ áo cánh kính khung nhôm Anodize mới nhất',
                'category' => 'Báo Giá & Dự Toán',
                'slug' => 'bang-bao-gia-tu-ao-canh-kinh-anodize',
                'views' => 320,
                'seo_score' => 78,
                'seo_class' => 'medium',
                'author' => 'KTS. Hoàng Minh',
                'status' => 'Bản nháp',
                'status_class' => 'secondary',
                'published_at' => 'Đang soạn',
                'image' => 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=400&auto=format&fit=crop'
            ]
        ];

        return view('admin.posts.index', compact('posts'));
    }

    public function store(Request $request)
    {
        return redirect()->back()->with('success', 'Đã tạo bài viết mới và tối ưu SEO thành công!');
    }

    public function destroy($id)
    {
        return redirect()->back()->with('success', 'Đã xóa bài viết thành công!');
    }
}
