<aside class="sidebar">
    <a href="{{ route('home') }}" target="_blank" class="sidebar-brand" title="Mở trang chủ website B HOME">
        <img src="{{ asset('images/Logo B HOME.png') }}" alt="B HOME Logo" class="brand-logo-img">
        <div class="brand-text">
            <h2>B HOME</h2>
            <p>Xưởng Mộc May Đo</p>
        </div>
    </a>

    <ul class="nav-menu">
        {{-- TỔNG QUAN --}}
        <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fas fa-chart-pie"></i> Tổng quan
            </a>
        </li>

        {{-- 1. NỘI DUNG WEBSITE --}}
        <li class="nav-heading">NỘI DUNG WEBSITE</li>
        <li class="nav-item">
            <a href="{{ route('admin.projects.index') }}" class="nav-link {{ request()->routeIs('admin.projects.*') ? 'active' : '' }}">
                <i class="fas fa-layer-group"></i> Quản lý Dự án
                @if($projectCount > 0)
                    <span class="nav-badge nav-badge--primary">{{ $projectCount }}</span>
                @endif
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.posts.index') }}" class="nav-link {{ request()->routeIs('admin.posts.*') ? 'active' : '' }}">
                <i class="fas fa-feather-alt"></i> Bài viết &amp; SEO
                @if($postCount > 0)
                    <span class="nav-badge nav-badge--success">{{ $postCount }}</span>
                @endif
            </a>
        </li>

        {{-- 2. KINH DOANH & VẬN HÀNH --}}
        <li class="nav-heading">KINH DOANH &amp; VẬN HÀNH</li>
        <li class="nav-item">
            <a href="{{ route('admin.inquiries.index') }}" class="nav-link {{ request()->routeIs('admin.inquiries.*') ? 'active' : '' }}">
                <i class="fas fa-envelope-open-text"></i> Quản lý Yêu cầu
                @if(isset($unreadInquiries) && $unreadInquiries > 0)
                    <span class="nav-badge nav-badge--primary">{{ $unreadInquiries }}</span>
                @endif
            </a>
        </li>
        {{-- 3. HỆ THỐNG --}}
        <li class="nav-heading">HỆ THỐNG</li>
        <li class="nav-item">
            <a href="{{ route('admin.settings.index') }}" class="nav-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                <i class="fas fa-sliders-h"></i> Thiết lập Website
            </a>
        </li>
    </ul>

    <div class="sidebar-footer">
        <a href="{{ route('admin.profile') }}" class="user-profile {{ request()->routeIs('admin.profile*') ? 'active-profile' : '' }}" title="Xem &amp; cập nhật Hồ sơ cá nhân, đổi mật khẩu">
            <div class="user-avatar">{{ mb_strtoupper(mb_substr(Auth::user()->name ?? 'AD', 0, 2)) }}</div>
            <div class="user-info">
                <h6>{{ Auth::user()->name ?? 'Administrator' }}</h6>
                <p>{{ Auth::user()->title ?? 'Quản Trị Viên' }}</p>
            </div>
            <i class="fas fa-cog profile-cog"></i>
        </a>
        <form action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn-logout"><i class="fas fa-sign-out-alt"></i> Đăng xuất hệ thống</button>
        </form>
    </div>
</aside>
