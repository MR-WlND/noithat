<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Bảng Điều Khiển') - B HOME Quản Trị Hệ Thống</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('favicon.png') }}">
    
    <!-- Typography & Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Playfair+Display:ital,wght@0,600;0,700;1,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Admin Core Stylesheet via Vite -->
    @vite(['resources/css/admin.css'])
    
    @stack('styles')
</head>
<body class="admin-body">
    <button class="admin-sidebar-toggle" id="adminSidebarToggle" aria-label="Mở menu quản trị">
        <i class="fas fa-bars"></i>
    </button>
    <div class="admin-sidebar-overlay" id="adminSidebarOverlay"></div>

    {{-- 1. Sidebar Navigation Component --}}
    @include('admin.partials.sidebar')

    {{-- 2. Main Content Wrapper --}}
    <main class="main-wrapper">
        {{-- Top Header Component --}}
        @include('admin.partials.header')

        {{-- Content Area --}}
        <div class="content-area">
            {{-- Global Alerts Component --}}
            @include('admin.partials.alerts')

            {{-- Page Specific Content --}}
            @yield('content')
        </div>

        {{-- Footer Component --}}
        @include('admin.partials.footer')
    </main>

    <script>
        (function() {
            var toggle = document.getElementById('adminSidebarToggle');
            var sidebar = document.querySelector('.sidebar');
            var overlay = document.getElementById('adminSidebarOverlay');

            function closeSidebar() {
                if (sidebar) sidebar.classList.remove('open');
                if (overlay) overlay.classList.remove('open');
                document.body.classList.remove('sidebar-open');
            }

            function openSidebar() {
                if (sidebar) sidebar.classList.add('open');
                if (overlay) overlay.classList.add('open');
                document.body.classList.add('sidebar-open');
            }

            if (toggle) {
                toggle.addEventListener('click', function() {
                    if (sidebar && sidebar.classList.contains('open')) {
                        closeSidebar();
                    } else {
                        openSidebar();
                    }
                });
            }

            if (overlay) {
                overlay.addEventListener('click', closeSidebar);
            }

            if (sidebar) {
                sidebar.querySelectorAll('.nav-link').forEach(function(link) {
                    link.addEventListener('click', function() {
                        if (window.innerWidth <= 992) {
                            closeSidebar();
                        }
                    });
                });
            }
        })();
    </script>

    @stack('scripts')
</body>
</html>