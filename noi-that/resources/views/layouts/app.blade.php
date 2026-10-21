<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Xưởng Nội Thất Cao Cấp - B HOME')</title>
    <meta name="description" content="@yield('description', 'Chuyên thiết kế và thi công nội thất cao cấp: Tủ bếp, Tủ áo, Nội thất căn hộ trọn gói. Xưởng sản xuất trực tiếp, không qua trung gian.')">
    <link rel="canonical" href="@yield('canonical', url()->current())">
    <meta property="og:locale" content="vi_VN">
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:title" content="@yield('title', 'Xưởng Nội Thất Cao Cấp - B HOME')">
    <meta property="og:description" content="@yield('description', 'Chuyên thiết kế và thi công nội thất cao cấp: Tủ bếp, Tủ áo, Nội thất căn hộ trọn gói. Xưởng sản xuất trực tiếp, không qua trung gian.')">
    <meta property="og:url" content="@yield('canonical', url()->current())">
    <meta property="og:site_name" content="B HOME">
    <meta property="og:image" content="@yield('og_image', asset('images/Logo B HOME.png'))">
    @hasSection('og_published_time')
    <meta property="article:published_time" content="@yield('og_published_time')">
    @endif
    @hasSection('og_modified_time')
    <meta property="article:modified_time" content="@yield('og_modified_time')">
    @endif
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title', 'Xưởng Nội Thất Cao Cấp - B HOME')">
    <meta name="twitter:description" content="@yield('description', 'Chuyên thiết kế và thi công nội thất cao cấp: Tủ bếp, Tủ áo, Nội thất căn hộ trọn gói. Xưởng sản xuất trực tiếp, không qua trung gian.')">
    <meta name="twitter:image" content="@yield('og_image', asset('images/Logo B HOME.png'))">
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('favicon.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body style="overflow-x:hidden;">
    <header class="header">
        <div class="container header-container">
            <a href="{{ route('home') }}" class="logo logo--luxury">
                <img src="{{ asset('images/Logo B HOME.png') }}" alt="B HOME Logo" class="logo__img">
                <div class="logo__brand">
                    <span class="logo__name">B HOME</span>
                    <span class="logo__tagline">INTERIOR · DESIGN</span>
                </div>
            </a>
            <nav class="nav">
                <ul class="nav-list">
                    <li><a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Trang Chủ</a></li>
                    <li><a href="{{ route('home') }}#ve-chung-toi" class="nav-link">Về Chúng Tôi</a></li>
                    <li><a href="{{ route('home') }}#hang-muc" class="nav-link">Hạng Mục Thi Công</a></li>
                    <li><a href="/du-an" class="nav-link">Dự Án</a></li>
                    <li><a href="{{ route('posts.index') }}" class="nav-link {{ request()->routeIs('posts.*') ? 'active' : '' }}">Bài Viết</a></li>
                </ul>
            </nav>
            <div class="header-right">
                <a href="tel:0962282204" class="header-phone"><i class="fas fa-phone-alt"></i> 0962 282 204</a>
                <a href="{{ route('home') }}#lien-he" class="btn btn--primary">Nhận Báo Giá <i class="fas fa-arrow-right"></i></a>
            </div>
            <!-- Hamburger -->
            <button class="hamburger" id="hamburgerBtn" aria-label="Menu">
                <span></span><span></span><span></span>
            </button>
        </div>
    </header>

    <!-- Mobile Nav -->
    <nav class="mobile-nav" id="mobileNav">
        <ul>
            <li><a href="{{ route('home') }}">Trang Chủ</a></li>
            <li><a href="{{ route('home') }}#ve-chung-toi">Về Chúng Tôi</a></li>
            <li><a href="{{ route('home') }}#hang-muc">Hạng Mục Thi Công</a></li>
            <li><a href="/du-an">Dự Án</a></li>
            <li><a href="{{ route('posts.index') }}">Bài Viết</a></li>
        </ul>
        <div class="mobile-nav__cta">
            <a href="{{ route('home') }}#lien-he" class="btn btn--primary btn--full"><i class="fas fa-paper-plane"></i> Nhận Báo Giá Miễn Phí</a>
            <a href="tel:0962282204" class="btn btn--primary btn--full" style="margin-top:8px; background:transparent; border:1px solid rgba(255,255,255,0.3); color:inherit;"><i class="fas fa-phone-alt"></i> Gọi Ngay: 0962 282 204</a>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container footer-container">
            <div class="footer-col">
                <a href="{{ route('home') }}" class="logo logo--luxury footer-logo">
                    <img src="{{ asset('images/Logo B HOME.png') }}" alt="B HOME Logo" class="logo__img logo__img--footer">
                    <div class="logo__brand">
                        <span class="logo__name logo__name--footer">B HOME</span>
                        <span class="logo__tagline">INTERIOR · DESIGN</span>
                    </div>
                </a>
                <p>Xưởng mộc gia đình sản xuất may đo trực tiếp theo yêu cầu. Kiến tạo không gian sống tinh tế và đẳng cấp, không qua trung gian, chuẩn tỉ lệ và chất lượng đến từng chi tiết.</p>
                <div class="footer-socials">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
            <div class="footer-col">
                <h3 class="footer-title">Thông Tin Liên Hệ</h3>
                <ul class="footer-contact">
                    <li><i class="fas fa-map-marker-alt"></i> 182 Phố Hát, Hát Môn, Phúc Thọ, Hà Nội</li>
                    <li><i class="fas fa-phone-alt"></i> Hotline: 0962 282 204</li>
                    <li><i class="fas fa-envelope"></i> noithatbhomehatmon@gmail.com</li>
                </ul>
            </div>
            <div class="footer-col">
                <h3 class="footer-title">Liên Kết Nhanh</h3>
                <ul class="footer-links">
                    <li><a href="/du-an">Dự Án Đã Làm</a></li>
                    <li><a href="{{ route('home') }}#quy-trinh">Quy Trình Thi Công</a></li>
                    <li><a href="{{ route('home') }}#hang-muc">Hạng Mục Tủ Bếp</a></li>
                    <li><a href="{{ route('home') }}#hang-muc">Hạng Mục Tủ Áo</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h3 class="footer-title">Chính Sách</h3>
                <ul class="footer-links">
                    <li><a href="{{ route('page.about') }}">Giới thiệu</a></li>
                    <li><a href="{{ route('page.warranty') }}">Chính sách bảo hành</a></li>
                    <li><a href="{{ route('page.privacy') }}">Chính sách bảo mật</a></li>
                    <li><a href="{{ route('page.terms') }}">Điều khoản sử dụng</a></li>
                    <li><a href="{{ route('page.guide') }}">Hướng dẫn liên hệ</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <p>&copy; 2026 B HOME INTERIOR. Kiến tạo không gian sống chuẩn mực.</p>
            </div>
        </div>
    </footer>

    <!-- Floating Buttons -->
    <div class="floating-buttons">
        <a href="https://zalo.me/0962282204" target="_blank" class="float-btn zalo-btn" title="Chat Zalo">
            Zalo
        </a>
        <a href="tel:0962282204" class="float-btn phone-btn" title="Gọi ngay">
            <i class="fas fa-phone"></i>
        </a>
    </div>
    <script>
    var btn = document.getElementById("hamburgerBtn");
    var nav = document.getElementById("mobileNav");
    if (btn && nav) {
        btn.addEventListener("click", function() {
            nav.classList.toggle("open");
            btn.classList.toggle("active");
        });
        nav.querySelectorAll("a").forEach(function(link) {
            link.addEventListener("click", function() {
                nav.classList.remove("open");
                btn.classList.remove("active");
            });
        });
        // Close on outside click
        document.addEventListener("click", function(e) {
            if (!btn.contains(e.target) && !nav.contains(e.target)) {
                nav.classList.remove("open");
                btn.classList.remove("active");
            }
        });
    }
    </script>
</body>
</html>
