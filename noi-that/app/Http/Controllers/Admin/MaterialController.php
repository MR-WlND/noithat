<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function index()
    {
        $materials = [
            [
                'id' => 1,
                'name' => 'MDF Lõi Xanh Chống Ẩm An Cường (17mm)',
                'category' => 'Ván Gỗ Công Nghiệp',
                'supplier' => 'An Cường Wood Working',
                'stock' => '240 tấm',
                'unit' => 'Tấm (1.22 x 2.44m)',
                'status' => 'Sẵn hàng tại xưởng',
                'status_class' => 'success'
            ],
            [
                'id' => 2,
                'name' => 'Gỗ Sồi Trắng Bắc Mỹ (White Oak FAS)',
                'category' => 'Gỗ Tự Nhiên Nhập Khẩu',
                'supplier' => 'Nhập khẩu sấy lò đạt chuẩn 10-12% độ ẩm',
                'stock' => '12 m³',
                'unit' => 'm³ (Khối)',
                'status' => 'Sẵn hàng tại xưởng',
                'status_class' => 'success'
            ],
            [
                'id' => 3,
                'name' => 'Bản lề giảm chấn Blum Clip Top 110°',
                'category' => 'Phụ Kiện Kim Khí Bếp',
                'supplier' => 'Blum Áo Chính Hãng',
                'stock' => '580 chiếc',
                'unit' => 'Bộ',
                'status' => 'Đang dồi dào',
                'status_class' => 'success'
            ],
            [
                'id' => 4,
                'name' => 'Mặt đá thạch anh nhân tạo Vicostone',
                'category' => 'Mặt Đá Bếp Cao Cấp',
                'supplier' => 'Vicostone Quartz',
                'stock' => '18 tấm',
                'unit' => 'Tấm đá',
                'status' => 'Theo dự án',
                'status_class' => 'warning'
            ]
        ];

        return view('admin.materials.index', compact('materials'));
    }
}
