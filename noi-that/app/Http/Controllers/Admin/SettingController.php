<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = [
            'brand_name' => 'B HOME',
            'tagline' => 'Nội Thất May Đo Riêng – Kiến Tạo Không Gian Sống Tinh Tế & Đẳng Cấp',
            'hotline' => '0988.248.868',
            'hotline_sub' => '0900.244.800',
            'address' => '182 Phố Hát, Hát Môn, Phúc Thọ, Hà Nội',
            'email' => 'contact@bhome.vn',
            'zalo_number' => '0988248868',
            'facebook_url' => 'https://facebook.com/bhome.interior',
            'meta_title' => 'Nội Thất May Đo Riêng - Xưởng Mộc B HOME',
            'meta_description' => 'Thiết kế và sản xuất trực tiếp tại xưởng theo đúng kích thước, kiểu dáng và chi phí của gia đình bạn. Không qua trung gian, đảm bảo chuẩn tỉ lệ và chất lượng đến từng chi tiết.'
        ];

        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        return redirect()->back()->with('success', 'Đã lưu thiết lập cấu hình website thành công!');
    }
}
