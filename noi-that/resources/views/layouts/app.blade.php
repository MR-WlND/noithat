<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xưởng Nội Thất Cao Cấp</title>
    <meta name="description" content="Chuyên thiết kế và thi công nội thất cao cấp: Tủ bếp, Tủ áo, Nội thất căn hộ trọn gói. Xưởng sản xuất trực tiếp, không qua trung gian.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <header class="header">
        <div class="container header-container">
            <a href="{{ route('home') }}" class="logo">
                <div class="logo-icon">M</div>
                <div>
                    <span class="logo-text">MR.WIND</span>
                    <span class="logo-accent">INTERIOR</span>
                </div>
            </a>
            <nav class="nav">
                <ul class="nav-list">
                    <li><a href="{{ route('home') }}" class="nav-link active">Trang Chủ</a></li>
                    <li><a href="#ve-chung-toi" class="nav-link">Về Chúng Tôi</a></li>
                    <li><a href="#hang-muc" class="nav-link">Hạng Mục Thi Công</a></li>
                    <li><a href="/du-an" class="nav-link">Dự Án</a></li>
                    <li><a href="#quy-trinh" class="nav-link">Báo Giá</a></li>
                </ul>
            </nav>
            <div class="header-right">
                <a href="tel:0988248868" class="header-phone"><i class="fas fa-phone-alt"></i> 0988.248.868</a>
                <a href="#lien-he" class="btn btn--primary">Nhận Báo Giá <i class="fas fa-arrow-right"></i></a>
            </div>
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
                <a href="{{ route('home') }}" class="logo footer-logo">
                    <div class="logo-icon">M</div>
                    <div>
                        <span class="logo-text">MR.WIND</span>
                        <span class="logo-accent" style="color: #999;">INTERIOR</span>
                    </div>
                </a>
                <p>Xưởng sản xuất trực tiếp và kiến tạo những không gian sống "chuẩn Nhật Bản" đẳng cấp, tinh tế. Mọi chi tiết thi công mộc đều được chăm chút tỉ mỉ từ những người thợ lành nghề.</p>
                <div class="footer-socials">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
            <div class="footer-col">
                <h3 class="footer-title">Thông Tin Liên Hệ</h3>
                <ul class="footer-contact">
                    <li><i class="fas fa-map-marker-alt"></i> Showroom: Hà Đông, Hà Nội</li>
                    <li><i class="fas fa-industry"></i> Xưởng: Quốc Oai, Hà Nội</li>
                    <li><i class="fas fa-phone-alt"></i> Hotline: 0988.248.868</li>
                    <li><i class="fas fa-envelope"></i> contact@mrwind.com</li>
                </ul>
            </div>
            <div class="footer-col">
                <h3 class="footer-title">Liên Kết Nhanh</h3>
                <ul class="footer-links">
                    <li><a href="/du-an">Dự Án Đã Làm</a></li>
                    <li><a href="#quy-trinh">Quy Trình Thi Công</a></li>
                    <li><a href="#hang-muc">Hạng Mục Tủ Bếp</a></li>
                    <li><a href="#hang-muc">Hạng Mục Tủ Áo</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h3 class="footer-title">Chính Sách</h3>
                <ul class="footer-links">
                    <li><a href="#">Bảo hành & Bảo trì</a></li>
                    <li><a href="#">Chính sách đổi trả</a></li>
                    <li><a href="#">Bảo mật thông tin</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <p>&copy; 2026 MR.WIND INTERIOR. Kiến tạo không gian sống chuẩn mực.</p>
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
