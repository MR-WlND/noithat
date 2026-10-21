<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = [
            [
                'id' => 1,
                'name' => 'KTS. Hoàng Minh',
                'email' => 'hoangminh.kts@bhome.vn',
                'phone' => '0962 282 204',
                'role' => 'Trưởng nhóm Thiết Kế',
                'role_key' => 'design_lead',
                'badge_color' => '#8C5E34',
                'avatar' => 'HM',
                'status' => 'Hoạt động',
                'status_class' => 'success',
                'last_login' => 'Vừa xong',
                'permissions' => ['Dự án: Toàn quyền', 'Bản vẽ 3D', 'Yêu cầu tư vấn: Xem & Phản hồi'],
            ],
            [
                'id' => 2,
                'name' => 'Nguyễn Quốc Cường',
                'email' => 'admin.cuong@bhome.vn',
                'phone' => '0962 282 204',
                'role' => 'Admin Hệ Thống',
                'role_key' => 'super_admin',
                'badge_color' => '#b91c1c',
                'avatar' => 'QC',
                'status' => 'Hoạt động',
                'status_class' => 'success',
                'last_login' => '2 giờ trước',
                'permissions' => ['Toàn quyền hệ thống', 'Quản lý tài khoản', 'Cấu hình website'],
            ],
            [
                'id' => 3,
                'name' => 'Bác Thợ Cả Nguyễn Văn Thắng',
                'email' => 'xuongmoc.thang@bhome.vn',
                'phone' => '0962 282 204',
                'role' => 'Quản Lý Xưởng Mộc',
                'role_key' => 'workshop_manager',
                'badge_color' => '#15803d',
                'avatar' => 'VT',
                'status' => 'Hoạt động',
                'status_class' => 'success',
                'last_login' => 'Hôm qua',
                'permissions' => ['Vật liệu xưởng', 'Tiến độ đóng mộc', 'Kho vật tư & phụ kiện'],
            ],
            [
                'id' => 4,
                'name' => 'Trần Thị Thu Hà',
                'email' => 'sale.ha@bhome.vn',
                'phone' => '0962 282 204',
                'role' => 'Tư Vấn & Báo Giá (Sale)',
                'role_key' => 'sales',
                'badge_color' => '#0284c7',
                'avatar' => 'TH',
                'status' => 'Hoạt động',
                'status_class' => 'success',
                'last_login' => '3 giờ trước',
                'permissions' => ['Quản lý Yêu cầu (Lead)', 'Báo giá sơ bộ', 'Chăm sóc khách hàng'],
            ],
            [
                'id' => 5,
                'name' => 'Lê Tuấn Hưng',
                'email' => 'hung.woodwork@bhome.vn',
                'phone' => '0962 282 204',
                'role' => 'Thợ Mộc Chính (Lắp đặt)',
                'role_key' => 'carpenter',
                'badge_color' => '#64748b',
                'avatar' => 'TH',
                'status' => 'Hoạt động',
                'status_class' => 'success',
                'last_login' => '3 ngày trước',
                'permissions' => ['Xem bản vẽ thi công', 'Cập nhật ảnh lắp đặt thực tế'],
            ],
        ];

        $roles = [
            [
                'key' => 'super_admin',
                'title' => 'Admin Hệ Thống (Root)',
                'count' => 1,
                'desc' => 'Toàn quyền cấu hình máy chủ, phân quyền, dữ liệu và cài đặt bảo mật.',
                'color' => '#b91c1c',
            ],
            [
                'key' => 'design_lead',
                'title' => 'KTS / Trưởng Nhóm Thiết Kế',
                'count' => 1,
                'desc' => 'Quản lý dự án mẫu, bản vẽ 3D, tiếp nhận tư vấn phong cách & bóc tách.',
                'color' => '#8C5E34',
            ],
            [
                'key' => 'workshop_manager',
                'title' => 'Quản Lý Xưởng Mộc',
                'count' => 1,
                'desc' => 'Theo dõi xuất nhập ván gỗ, phụ kiện bản lề, tiến độ đóng thô & sơn PU.',
                'color' => '#15803d',
            ],
            [
                'key' => 'sales',
                'title' => 'Tư Vấn & Báo Giá (Sale)',
                'count' => 1,
                'desc' => 'Tiếp nhận lead từ website, gọi khảo sát hiện trạng và gửi dự toán.',
                'color' => '#0284c7',
            ],
            [
                'key' => 'carpenter',
                'title' => 'Thợ Mộc / Kỹ Thuật Lắp Đặt',
                'count' => 1,
                'desc' => 'Xem chi tiết kích thước may đo và nghiệm thu tại công trình.',
                'color' => '#64748b',
            ],
        ];

        return view('admin.users.index', compact('users', 'roles'));
    }

    public function store(Request $request)
    {
        return redirect()->back()->with('success', 'Đã thêm thành viên mới và cấp quyền thành công!');
    }

    public function updateRole(Request $request, $id)
    {
        return redirect()->back()->with('success', 'Đã cập nhật phân quyền cho tài khoản thành công!');
    }
}
