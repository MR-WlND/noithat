<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Nội Thất</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .sidebar {
            min-height: 100vh;
            background-color: #343a40;
        }
        .sidebar a {
            color: #fff;
            text-decoration: none;
            padding: 15px;
            display: block;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
    </style>
</head>
<body>
    <div class="d-flex">
        <div class="sidebar flex-shrink-0 p-3" style="width: 250px;">
            <a href="{{ route('admin.dashboard') }}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <span class="fs-4">Quản Trị</span>
            </a>
            <hr class="text-white">
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="fas fa-tachometer-alt me-2"></i> Tổng quan
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.projects.index') }}" class="nav-link {{ request()->routeIs('admin.projects.*') ? 'active' : '' }}">
                        <i class="fas fa-project-diagram me-2"></i> Quản lý Dự án
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.inquiries.index') }}" class="nav-link {{ request()->routeIs('admin.inquiries.*') ? 'active' : '' }}">
                        <i class="fas fa-envelope me-2"></i> Quản lý Yêu cầu
                    </a>
                </li>
            </ul>
            <hr class="text-white">
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger w-100"><i class="fas fa-sign-out-alt me-2"></i> Đăng xuất</button>
            </form>
        </div>

        <div class="content flex-grow-1 p-4">
            @yield('content')
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
