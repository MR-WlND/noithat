@extends('layouts.admin')

@section('content')
<div style="margin-bottom: 25px;">
    <h2 style="font-family:var(--font-serif); font-size:1.8rem; color:#2c2724; margin-bottom:4px;">Hồ Sơ Cá Nhân &amp; Bảo Mật</h2>
    <p style="color:#777; font-size:0.9rem;">Quản lý thông tin tài khoản, chức danh, mật khẩu truy cập và bảo mật 2 lớp cho KTS. Hoàng Minh.</p>
</div>

<div class="profile-layout">
    <!-- Left Column: User Card -->
    <div>
        <div class="card-box">
            <div class="u-card-header">
                <div class="big-avatar">
                    {{ mb_strtoupper(mb_substr($profile['name'] ?? 'AD', 0, 2)) }}
                    <div class="avatar-edit-btn" title="Đổi ảnh đại diện"><i class="fas fa-camera"></i></div>
                </div>
                <h3>{{ $profile['name'] }}</h3>
                <span>{{ $profile['title'] }}</span>
            </div>
            <ul class="u-quick-list">
                <li>
                    <span>Email hệ thống</span>
                    <span>{{ $profile['email'] }}</span>
                </li>
                <li>
                    <span>Số điện thoại</span>
                    <span>{{ $profile['phone'] }}</span>
                </li>
                <li>
                    <span>Vai trò quản trị</span>
                    <span style="color:var(--brown);">{{ $profile['role'] }}</span>
                </li>
                <li>
                    <span>Đổi mật khẩu</span>
                    <span>{{ $profile['last_password_change'] }}</span>
                </li>
                <li>
                    <span>Bảo mật 2FA</span>
                    @if($profile['two_factor_enabled'])
                        <span style="color:#16a34a;"><i class="fas fa-shield-alt"></i> Đã bật</span>
                    @else
                        <span style="color:#888;"><i class="fas fa-times-circle"></i> Đang tắt</span>
                    @endif
                </li>
            </ul>
        </div>

        <div class="card-box" style="background:#faf7f2; border-color:#eee4d7;">
            <h4 style="font-size:0.9rem; font-weight:700; color:#5c5044; margin-bottom:8px;"><i class="fas fa-info-circle"></i> Phiên Đăng Nhập An Toàn</h4>
            <p style="font-size:0.8rem; color:#786e63; line-height:1.5; margin:0;">
                Bạn đang đăng nhập từ IP: <code>{{ $profile['session_ip'] }}</code> trên trình duyệt bảo mật đã kích hoạt mã hóa SSL 256-bit.
            </p>
        </div>
    </div>

    <!-- Right Column: Settings Forms -->
    <div>
        <!-- Profile Info Form -->
        <div class="card-box">
            <h3 class="form-title"><i class="fas fa-user-edit" style="color:var(--brown);"></i> Cập Nhật Thông Tin Cá Nhân</h3>
            <p class="form-desc">Thông tin này sẽ hiển thị trên các bản vẽ thiết kế gửi khách hàng và nhật ký điều phối xưởng.</p>
            
            <form action="{{ route('admin.profile.update') }}" method="POST">
                @csrf
                <div class="f-row">
                    <div class="fg">
                        <label>Họ và Tên *</label>
                        <input type="text" name="name" value="{{ $profile['name'] }}" required>
                    </div>
                    <div class="fg">
                        <label>Chức Danh Trong Xưởng *</label>
                        <input type="text" name="title" value="{{ $profile['title'] }}" required>
                    </div>
                </div>
                <div class="f-row">
                    <div class="fg">
                        <label>Email Cá Nhân *</label>
                        <input type="email" name="email" value="{{ $profile['email'] }}" required>
                    </div>
                    <div class="fg">
                        <label>Số Điện Thoại / Zalo *</label>
                        <input type="tel" name="phone" value="{{ $profile['phone'] }}" required>
                    </div>
                </div>
                <div class="fg">
                    <label>Giới Thiệu Ngắn (Bio)</label>
                    <textarea name="bio">{{ $profile['bio'] }}</textarea>
                </div>
                <button type="submit" class="btn-primary">
                    <i class="fas fa-save"></i> Lưu Thông Tin Cá Nhân
                </button>
            </form>
        </div>

        <!-- Change Password Form -->
        <div class="card-box">
            <h3 class="form-title"><i class="fas fa-key" style="color:var(--brown);"></i> Đổi Mật Khẩu Truy Cập</h3>
            <p class="form-desc">Khuyến nghị sử dụng mật khẩu trên 8 ký tự gồm chữ hoa, chữ thường, số và ký tự đặc biệt.</p>
            
            <form action="{{ route('admin.profile.password') }}" method="POST">
                @csrf
                <div class="fg">
                    <label>Mật Khẩu Hiện Tại *</label>
                    <input type="password" name="current_password" required placeholder="Nhập mật khẩu đang dùng">
                </div>
                <div class="f-row">
                    <div class="fg">
                        <label>Mật Khẩu Mới *</label>
                        <input type="password" name="new_password" required placeholder="Tối thiểu 8 ký tự">
                    </div>
                    <div class="fg">
                        <label>Xác Nhận Mật Khẩu Mới *</label>
                        <input type="password" name="new_password_confirmation" required placeholder="Nhập lại mật khẩu mới">
                    </div>
                </div>
                <button type="submit" class="btn-primary">
                    <i class="fas fa-lock"></i> Cập Nhật Mật Khẩu Mới
                </button>
            </form>
        </div>

        <!-- Two-Factor Authentication -->
        <div class="card-box">
            <h3 class="form-title"><i class="fas fa-shield-alt" style="color:var(--brown);"></i> Xác Thực 2 Lớp (2FA Security)</h3>
            <p class="form-desc">Bảo vệ tài khoản quản trị viên khỏi nguy cơ bị lộ mật khẩu bằng mã xác thực gửi về điện thoại / ứng dụng Google Authenticator.</p>
            
            <div class="two-fa-box">
                <div class="two-fa-info">
                    <h5><i class="fas fa-mobile-alt" style="color:var(--brown);"></i> Trạng Thái Xác Thực 2 Bước</h5>
                    <p>Hiện đang được bảo vệ qua ứng dụng xác thực OTP.</p>
                </div>
                <form action="{{ route('admin.profile.2fa') }}" method="POST" id="form2FA">
                    @csrf
                    <label class="switch">
                        <input type="checkbox" name="two_factor" {{ $profile['two_factor_enabled'] ? 'checked' : '' }} onchange="document.getElementById('form2FA').submit();">
                        <span class="slider"></span>
                    </label>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
