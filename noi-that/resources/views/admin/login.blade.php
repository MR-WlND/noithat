<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - B HOME</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('favicon.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Playfair+Display:ital,wght@0,600;0,700;1,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Login Stylesheet via Vite -->
    @vite(['resources/css/admin-login.css'])
</head>
<body>
<div class="container">
    
    <div class="main-wrapper">
        <div class="login-card">
        <!-- Left Panel -->
        <div class="left-panel">
            <div class="left-content">
                <a href="{{ route('home') }}" class="logo--luxury" title="Về trang chủ B HOME">
                    <img src="{{ asset('images/Logo B HOME.png') }}" alt="B HOME Logo" class="logo__img">
                    <div class="logo__brand">
                        <span class="logo__name">B HOME</span>
                        <span class="logo__tagline">INTERIOR · DESIGN</span>
                    </div>
                </a>
                
                <div class="glass-card">
                    <h4>
                        <i class="fas fa-home" style="color:var(--brown);"></i> B HOME <span style="font-weight:400; font-size:inherit;">Interior</span>
                    </h4>
                    
                    <p class="glass-quote">"Tỉ mỉ trong từng đường mộc, trọn vẹn từng không gian sống."</p>
                    <p class="glass-desc">Xưởng sản xuất trực tiếp theo kích thước &amp; bản vẽ yêu cầu &bull; Chuyên căn hộ, nhà phố &amp; phòng bếp.</p>
                </div>
            </div>
            
            <div class="left-content left-footer">
                <span>XƯỞNG SẢN XUẤT TRỰC TIẾP</span>
                <span>Kinh nghiệm 7+ Năm</span>
            </div>
        </div>
        
        <!-- Right Panel -->
        <div class="right-panel">
            <div class="admin-portal-badge">HỆ THỐNG NỘI BỘ</div>
            
            <div class="login-box">
                <span class="brand-tag">&bull; B HOME | BESPOKE INTERIOR</span>
                <h1>Đăng Nhập Quản Trị</h1>
                <p>Hệ thống quản lý đơn hàng, vật liệu &amp; tiến độ thi công xưởng mộc B HOME.</p>
                
                @if ($errors->any())
                    <div class="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <div class="role-banner">
                    <div class="role-info">
                        <div class="role-icon"><i class="fas fa-shield-alt"></i></div>
                        <div class="role-text">
                            <h4>Quản Trị Viên Hệ Thống</h4>
                            <p>Toàn quyền quản lý dự án &amp; tiếp nhận yêu cầu báo giá</p>
                        </div>
                    </div>
                    <div class="role-badge">Root Admin</div>
                </div>
                
                <form action="{{ route('admin.login.submit') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <div class="form-header">
                            <label class="form-label">EMAIL / TÊN ĐĂNG NHẬP</label>
                        </div>
                        <div class="input-wrapper">
                            <i class="far fa-user icon-left"></i>
                            <input type="text" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="long16730z@gmail.com hoặc admin">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="form-header">
                            <label class="form-label">MẬT KHẨU TRUY CẬP</label>
                            <a href="#" class="forgot-link">Quên mật khẩu?</a>
                        </div>
                        <div class="input-wrapper">
                            <i class="fas fa-lock icon-left"></i>
                            <input type="password" class="form-control" name="password" id="password" required placeholder="••••••••">
                            <i class="far fa-eye icon-right" onclick="togglePassword()"></i>
                        </div>
                    </div>
                    
                    <div class="form-options">
                        <label class="checkbox-label">
                            <input type="checkbox" name="remember" checked>
                            Ghi nhớ đăng nhập 30 ngày
                        </label>
                        <div class="secure-badge">
                            <i class="fas fa-lock" style="color:var(--brown);"></i> Bảo mật hệ thống 256-bit
                        </div>
                    </div>
                    
                    <button type="submit" class="btn-submit">
                        ĐĂNG NHẬP QUẢN TRỊ <i class="fas fa-arrow-right"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
    <script>
        function togglePassword() {
            var input = document.getElementById('password');
            var icon = document.querySelector('.icon-right');
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
    </script>
</body>
</html>