@extends('layouts.admin')

@section('content')
<div class="page-head">
    <div>
        <h2>Thiết Lập Website &amp; Cấu Hình Chung</h2>
        <p>Cập nhật số hotline xưởng mộc, địa chỉ, tài khoản Zalo và thông tin thẻ meta SEO hiển thị Google.</p>
    </div>
</div>

@if(session('success'))
<div style="background:#ecfdf5; color:#065f46; border-left:4px solid #10b981; padding:12px 18px; border-radius:6px; margin-bottom:24px; font-size:0.9rem;">
    <i class="fas fa-check-circle"></i> {{ session('success') }}
</div>
@endif

<form action="{{ route('admin.settings.update') }}" method="POST">
    @csrf
    <!-- General Info -->
    <div class="setting-card">
        <h3><i class="fas fa-store" style="color:var(--brown);"></i> Thông Tin Xưởng Mộc &amp; Liên Hệ</h3>
        <p class="sub">Thông tin hiển thị trên Header, Footer, bản đồ và nút gọi nổi trên toàn bộ website.</p>
        
        <div class="f-row">
            <div class="fg">
                <label>Tên Thương Hiệu *</label>
                <input type="text" name="brand_name" value="{{ $settings['brand_name'] }}" required>
            </div>
            <div class="fg">
                <label>Hotline Xưởng Chính *</label>
                <input type="text" name="hotline" value="{{ $settings['hotline'] }}" required>
            </div>
        </div>

        <div class="f-row">
            <div class="fg">
                <label>Hotline Phụ / Zalo *</label>
                <input type="text" name="hotline_sub" value="{{ $settings['hotline_sub'] }}" required>
            </div>
            <div class="fg">
                <label>Email Liên Hệ *</label>
                <input type="email" name="email" value="{{ $settings['email'] }}" required>
            </div>
        </div>

        <div class="fg">
            <label>Địa Chỉ Xưởng Sản Xuất Trực Tiếp *</label>
            <input type="text" name="address" value="{{ $settings['address'] }}" required>
        </div>

        <div class="fg">
            <label>Slogan / Tagline Thương Hiệu</label>
            <input type="text" name="tagline" value="{{ $settings['tagline'] }}">
        </div>
    </div>

    <!-- SEO Meta -->
    <div class="setting-card">
        <h3><i class="fas fa-search" style="color:var(--brown);"></i> Cấu Hình SEO &amp; Chia Sẻ Mạng Xã Hội</h3>
        <p class="sub">Tối ưu thẻ tiêu đề Meta Title &amp; Description khi chia sẻ link website lên Facebook / Zalo.</p>

        <div class="fg">
            <label>Tiêu Đề Trang Chủ (Meta Title) *</label>
            <input type="text" name="meta_title" value="{{ $settings['meta_title'] }}" required>
        </div>

        <div class="fg">
            <label>Mô Tả Trang Chủ (Meta Description) *</label>
            <textarea name="meta_description" required>{{ $settings['meta_description'] }}</textarea>
        </div>

        <button type="submit" class="btn-primary">
            <i class="fas fa-save"></i> Lưu Thiết Lập Website
        </button>
    </div>
</form>
@endsection
