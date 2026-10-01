<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bảng Điều Khiển - MR.WIND</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --sidebar-bg: #221f1d;
            --sidebar-text: #a8a096;
            --sidebar-active-bg: #b99268;
            --sidebar-active-text: #ffffff;
            --bg-color: #faf9f5;
            --brown: #b99268;
            --brown-dark: #8c5e34;
            --text-dark: #333333;
            --text-muted: #888888;
            --font-sans: 'Inter', sans-serif;
            --font-serif: 'Playfair Display', serif;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: var(--font-sans);
            background-color: var(--bg-color);
            color: var(--text-dark);
            display: flex;
            min-height: 100vh;
            overflow-x: hidden;
            background-image: radial-gradient(#e5e0d8 1px, transparent 1px);
            background-size: 20px 20px;
        }

        /* Sidebar */
        .sidebar {
            width: 260px;
            background-color: var(--sidebar-bg);
            color: var(--sidebar-text);
            display: flex;
            flex-direction: column;
            flex-shrink: 0;
            position: fixed;
            height: 100vh;
            z-index: 100;
        }

        .sidebar-brand {
            padding: 30px 20px;
            display: flex;
            align-items: center;
            gap: 15px;
            border-bottom: 1px solid rgba(255,255,255,0.05);
        }

        .brand-logo {
            width: 40px;
            height: 40px;
            background-color: var(--brown);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: var(--font-serif);
            font-size: 1.2rem;
            border-radius: 4px;
        }

        .brand-text h2 {
            font-family: var(--font-serif);
            font-size: 1.1rem;
            color: white;
            margin: 0 0 4px 0;
            letter-spacing: 1px;
        }

        .brand-text p {
            font-size: 0.7rem;
            margin: 0;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .nav-menu {
            list-style: none;
            padding: 20px 15px;
            flex-grow: 1;
        }

        .nav-item { margin-bottom: 5px; }

        .nav-link {
            display: flex;
            align-items: center;
            padding: 12px 15px;
            color: var(--sidebar-text);
            text-decoration: none;
            border-radius: 8px;
            font-size: 0.95rem;
            font-weight: 500;
            transition: all 0.2s;
        }

        .nav-link i { width: 24px; font-size: 1.1rem; margin-right: 10px; text-align: center; }
        
        .nav-link:hover { color: white; background: rgba(255,255,255,0.05); }
        
        .nav-link.active {
            background-color: var(--sidebar-active-bg);
            color: var(--sidebar-active-text);
        }
        
        .nav-badge {
            margin-left: auto;
            background: rgba(255,255,255,0.1);
            padding: 2px 8px;
            border-radius: 12px;
            font-size: 0.75rem;
        }
        
        .nav-link.active .nav-badge {
            background: rgba(255,255,255,0.2);
        }

        .sidebar-footer {
            padding: 20px;
            border-top: 1px solid rgba(255,255,255,0.05);
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 20px;
        }

        .user-avatar {
            width: 36px;
            height: 36px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
            color: white;
            font-weight: 600;
        }

        .user-info h6 { color: white; font-size: 0.9rem; margin: 0 0 3px 0; font-weight: 600; }
        .user-info p { color: var(--sidebar-text); font-size: 0.75rem; margin: 0; }

        .btn-logout {
            width: 100%;
            background: transparent;
            border: 1px solid rgba(255,255,255,0.1);
            color: var(--sidebar-text);
            padding: 10px;
            border-radius: 6px;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }
        .btn-logout:hover { background: rgba(255,255,255,0.05); color: white; }

        /* Main Content */
        .main-wrapper {
            margin-left: 260px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .top-header {
            background: white;
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #f0f0f0;
            position: sticky;
            top: 0;
            z-index: 90;
        }

        .header-title h4 {
            font-family: var(--font-serif);
            font-size: 1.8rem;
            color: var(--text-dark);
            margin: 5px 0 0 0;
        }

        .header-breadcrumb {
            font-size: 0.8rem;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 600;
        }
        .header-breadcrumb span { color: var(--brown); }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .search-box {
            position: relative;
        }
        .search-box input {
            padding: 10px 15px 10px 40px;
            border: 1px solid #e0e0e0;
            border-radius: 6px;
            width: 250px;
            font-size: 0.9rem;
            background: #fafafa;
        }
        .search-box i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
        }

        .btn-primary {
            background: #111;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            font-weight: 500;
            font-size: 0.95rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
        }
        .btn-primary:hover { background: #333; }

        .content-area {
            padding: 30px 40px;
            flex-grow: 1;
        }

        .footer {
            padding: 20px 40px;
            font-size: 0.8rem;
            color: var(--text-muted);
            display: flex;
            justify-content: space-between;
            border-top: 1px solid #f0f0f0;
        }
    </style>
</head>
<body>
    
    <aside class="sidebar">
        <div class="sidebar-brand">
            <div class="brand-logo">W</div>
            <div class="brand-text">
                <h2>MR.WIND</h2>
                <p>Interior &bull; Joinery</p>
            </div>
        </div>

        <ul class="nav-menu">
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-home"></i> Tổng quan
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.projects.index') }}" class="nav-link {{ request()->routeIs('admin.projects.*') ? 'active' : '' }}">
                    <i class="fas fa-building"></i> Quản lý Dự án <span class="nav-badge">18</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.inquiries.index') }}" class="nav-link {{ request()->routeIs('admin.inquiries.*') ? 'active' : '' }}">
                    <i class="fas fa-envelope"></i> Quản lý Yêu cầu <span class="nav-badge">24</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-tools"></i> Vật liệu & Xưởng Mộc
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-cog"></i> Thiết lập Website
                </a>
            </li>
        </ul>

        <div class="sidebar-footer">
            <div class="user-profile">
                <div class="user-avatar">KT</div>
                <div class="user-info">
                    <h6>KTS. Hoàng Minh</h6>
                    <p>Trưởng nhóm Thiết Kế</p>
                </div>
            </div>
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn-logout"><i class="fas fa-sign-out-alt"></i> Đăng xuất hệ thống</button>
            </form>
        </div>
    </aside>

    <main class="main-wrapper">
        <header class="top-header">
            <div class="header-title">
                <div class="header-breadcrumb"><span>BẢNG ĐIỀU KHIỂN XƯỞNG & THIẾT KẾ</span> &bull; Hôm nay, Thứ Năm, 1 tháng 10, 2026</div>
                <h4>Tổng quan</h4>
            </div>
            <div class="header-actions">
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Tìm dự án, khách hàng...">
                </div>
                <a href="{{ route('admin.projects.index') }}" class="btn-primary">
                    <i class="fas fa-plus"></i> Thêm Dự Án
                </a>
            </div>
        </header>

        <div class="content-area">
            @yield('content')
        </div>

        <footer class="footer">
            <div>&copy; 2026 MR.WIND Interior &mdash; Kiến tạo không gian sống Nhật Bản Đương Đại</div>
            <div>Hệ thống Quản Trị Studio v2.4 &bull; Phiên bản Woodcraft Edition</div>
        </footer>
    </main>

</body>
</html>