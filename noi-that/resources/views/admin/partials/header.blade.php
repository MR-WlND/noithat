<header class="top-header">
    <div class="header-title">
        <div class="header-breadcrumb"><span>XƯỞNG MỘC B HOME</span> &bull; Quản trị vận hành nội bộ</div>
        <h4>@yield('page_title', 'Bảng Điều Khiển Quản Trị')</h4>
    </div>
    <div class="header-actions">
        <div class="search-box">
            <i class="fas fa-search"></i>
            <input type="text" placeholder="Tìm dự án, khách hàng...">
        </div>
        <a href="{{ route('admin.projects.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i> Thêm Dự Án
        </a>
    </div>
</header>
