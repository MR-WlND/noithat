<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xưởng Nội Thất Cao Cấp</title>
    <meta name="description" content="Chuyên thiết kế và thi công nội thất cao cấp: Tủ bếp, Tủ áo, Nội thất căn hộ trọn gói. Xưởng sản xuất trực tiếp, không qua trung gian.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="container header-container">
            <a href="{{ route('home') }}" class="logo">
                <span class="logo-text">MR.WIND</span> <span class="logo-accent">INTERIOR</span>
            </a>
            <nav class="nav">
                <ul class="nav-list">
                    <li><a href="{{ route('home') }}" class="nav-link active">Trang Chủ</a></li>
                    <li><a href="/du-an" class="nav-link">Dự Án</a></li>
                    <li><a href="#quy-trinh" class="nav-link">Quy Trình</a></li>
                    <li><a href="#lien-he" class="btn btn-primary">Nhận Báo Giá</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container footer-container">
            <div class="footer-col">
                <h3 class="footer-title">Xưởng Nội Thất MR.WIND</h3>
                <p>Chúng tôi cam kết mang đến những sản phẩm nội thất chất lượng nhất, thiết kế tinh tế và thi công với độ chính xác cao nhất.</p>
            </div>
            <div class="footer-col">
                <h3 class="footer-title">Thông Tin Liên Hệ</h3>
                <ul class="footer-contact">
                    <li><i class="fas fa-map-marker-alt"></i> Khu Công Nghiệp, Hà Nội</li>
                    <li><i class="fas fa-phone-alt"></i> 0988.xxx.xxx</li>
                    <li><i class="fas fa-envelope"></i> contact@mrwind.com</li>
                </ul>
            </div>
            <div class="footer-col">
                <h3 class="footer-title">Bản Đồ</h3>
                <div class="map-wrapper">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.863855881404!2d105.774577!3d21.0381328!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjHCsDAyJzE3LjMiTiAxMDXCsDQ2JzI4LjUiRQ!5e0!3m2!1svi!2s!4v1620000000000!5m2!1svi!2s" width="100%" height="150" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <p>&copy; 2026 MR.WIND INTERIOR. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Floating Buttons -->
    <div class="floating-buttons">
        <a href="https://zalo.me/0988xxxxxx" target="_blank" class="float-btn zalo-btn">
            Zalo
        </a>
        <a href="tel:0988xxxxxx" class="float-btn phone-btn">
            <i class="fas fa-phone"></i>
        </a>
    </div>
</body>
</html>
