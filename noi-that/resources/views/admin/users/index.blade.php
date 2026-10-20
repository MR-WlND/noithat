@extends('layouts.admin')

@section('content')
<div class="page-head">
    <div>
        <h2>Quản Lý Thành Viên &amp; Phân Quyền</h2>
        <p>Kiểm soát quyền truy cập hệ thống xưởng mộc, nhân viên thiết kế, sale và quản trị.</p>
    </div>
    <button class="btn-primary" onclick="alert('Mở form thêm thành viên mới: Nhập họ tên, email, mật khẩu khởi tạo và chọn vai trò phân quyền.')">
        <i class="fas fa-user-plus"></i> Thêm Thành Viên Mới
    </button>
</div>

@if(session('success'))
<div style="background:#ecfdf5; color:#065f46; border-left:4px solid #10b981; padding:12px 18px; border-radius:6px; margin-bottom:24px; font-size:0.9rem;">
    <i class="fas fa-check-circle"></i> {{ session('success') }}
</div>
@endif

<!-- Role Cards -->
<div class="role-grid">
    @foreach($roles as $role)
    <div class="role-card">
        <div class="role-card-top">
            <span class="role-dot" style="background: {{ $role['color'] }}"></span>
            <span class="role-count">{{ $role['count'] }}</span>
        </div>
        <div class="role-name">{{ $role['title'] }}</div>
        <div class="role-desc">{{ $role['desc'] }}</div>
    </div>
    @endforeach
</div>

<!-- Users List -->
<div class="table-card">
    <div class="table-header-bar">
        <div class="table-title">
            <i class="fas fa-users-cog" style="color:var(--brown);"></i> Danh Sách Tài Khoản Hệ Thống ({{ count($users) }})
        </div>
        <div class="table-filters">
            <button class="filter-btn active">Tất cả</button>
            <button class="filter-btn">Quản trị viên</button>
            <button class="filter-btn">Thiết kế</button>
            <button class="filter-btn">Xưởng mộc</button>
            <button class="filter-btn">Sale</button>
        </div>
    </div>
    <div style="overflow-x:auto;">
        <table class="custom-table">
            <thead>
                <tr>
                    <th>Thành Viên</th>
                    <th>Số Điện Thoại</th>
                    <th>Vai Trò (Role)</th>
                    <th>Phạm Vi Phân Quyền</th>
                    <th>Đăng Nhập Gần Nhất</th>
                    <th>Trạng Thái</th>
                    <th style="text-align:right;">Thao Tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>
                        <div class="user-cell">
                            <div class="u-avatar" style="background: {{ $user['badge_color'] }};">
                                {{ $user['avatar'] }}
                            </div>
                            <div class="u-meta">
                                <h5>{{ $user['name'] }}</h5>
                                <span>{{ $user['email'] }}</span>
                            </div>
                        </div>
                    </td>
                    <td style="font-family:monospace; font-size:0.85rem; color:#555;">{{ $user['phone'] }}</td>
                    <td>
                        <span class="badge-role" style="background: {{ $user['badge_color'] }};">
                            {{ $user['role'] }}
                        </span>
                    </td>
                    <td>
                        <div class="perm-tags">
                            @foreach($user['permissions'] as $perm)
                            <span class="perm-tag">{{ $perm }}</span>
                            @endforeach
                        </div>
                    </td>
                    <td style="color:#777; font-size:0.82rem;">{{ $user['last_login'] }}</td>
                    <td>
                        <span class="badge-status {{ $user['status_class'] }}">
                            <i class="fas fa-circle" style="font-size:6px;"></i> {{ $user['status'] }}
                        </span>
                    </td>
                    <td style="text-align:right;">
                        <button class="action-btn" title="Chỉnh sửa quyền" onclick="alert('Chỉnh sửa quyền cho {{ $user['name'] }}')"><i class="fas fa-user-shield"></i> Quyền</button>
                        <button class="action-btn" title="Đổi mật khẩu" onclick="alert('Đặt lại mật khẩu cho {{ $user['name'] }}')"><i class="fas fa-key"></i></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Permissions Matrix -->
<div class="matrix-card">
    <div class="matrix-title">Bảng Quyền Hạn Phân Cấp (Role-Based Access Control)</div>
    <div class="matrix-subtitle">Đảm bảo bảo mật nội bộ: Sale chỉ được xem báo giá, Thợ mộc chỉ xem bản vẽ, không can thiệp cấu hình hệ thống.</div>
    <div style="overflow-x:auto;">
        <table class="matrix-table">
            <thead>
                <tr>
                    <th>Chức năng hệ thống</th>
                    <th>Root Admin</th>
                    <th>Trưởng nhóm KTS</th>
                    <th>Quản lý xưởng</th>
                    <th>Sale / Tư vấn</th>
                    <th>Thợ mộc</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Quản lý Dự án &amp; Công trình thực tế</td>
                    <td><i class="fas fa-check-circle check-yes"></i></td>
                    <td><i class="fas fa-check-circle check-yes"></i> (Toàn quyền)</td>
                    <td><i class="fas fa-check-circle check-yes"></i> (Xem &amp; cập nhật ảnh)</td>
                    <td><i class="fas fa-check-circle check-yes"></i> (Chỉ xem)</td>
                    <td><i class="fas fa-check-circle check-yes"></i> (Chỉ xem)</td>
                </tr>
                <tr>
                    <td>Quản lý Yêu cầu tư vấn (Lead / Báo giá)</td>
                    <td><i class="fas fa-check-circle check-yes"></i></td>
                    <td><i class="fas fa-check-circle check-yes"></i></td>
                    <td><i class="fas fa-times-circle check-no"></i></td>
                    <td><i class="fas fa-check-circle check-yes"></i> (Trực tiếp xử lý)</td>
                    <td><i class="fas fa-times-circle check-no"></i></td>
                </tr>
                <tr>
                    <td>Bài viết, Tin tức &amp; SEO Content</td>
                    <td><i class="fas fa-check-circle check-yes"></i></td>
                    <td><i class="fas fa-check-circle check-yes"></i></td>
                    <td><i class="fas fa-times-circle check-no"></i></td>
                    <td><i class="fas fa-check-circle check-yes"></i> (Soạn nháp)</td>
                    <td><i class="fas fa-times-circle check-no"></i></td>
                </tr>
                <tr>
                    <td>Kho Vật liệu &amp; Tiến độ xưởng mộc</td>
                    <td><i class="fas fa-check-circle check-yes"></i></td>
                    <td><i class="fas fa-check-circle check-yes"></i> (Xem định mức)</td>
                    <td><i class="fas fa-check-circle check-yes"></i> (Toàn quyền)</td>
                    <td><i class="fas fa-check-circle check-yes"></i> (Xem tồn kho)</td>
                    <td><i class="fas fa-check-circle check-yes"></i> (Xem vật tư)</td>
                </tr>
                <tr>
                    <td>Quản lý Thành viên &amp; Phân quyền</td>
                    <td><i class="fas fa-check-circle check-yes"></i></td>
                    <td><i class="fas fa-times-circle check-no"></i></td>
                    <td><i class="fas fa-times-circle check-no"></i></td>
                    <td><i class="fas fa-times-circle check-no"></i></td>
                    <td><i class="fas fa-times-circle check-no"></i></td>
                </tr>
                <tr>
                    <td>Thiết lập Website &amp; Cấu hình chung</td>
                    <td><i class="fas fa-check-circle check-yes"></i></td>
                    <td><i class="fas fa-times-circle check-no"></i></td>
                    <td><i class="fas fa-times-circle check-no"></i></td>
                    <td><i class="fas fa-times-circle check-no"></i></td>
                    <td><i class="fas fa-times-circle check-no"></i></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection
