<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác Minh Đăng Nhập - B HOME</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('favicon.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Playfair+Display:ital,wght@0,600;0,700;1,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @vite(['resources/css/admin-login.css'])
</head>
<body>
<div class="container">
    <div class="main-wrapper">
        <div class="login-card">
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
                            <i class="fas fa-shield-alt" style="color:var(--brown);"></i> Xác Thực Hai Lớp
                        </h4>
                        <p class="glass-quote">"An toàn là ưu tiên hàng đầu trong mọi giao dịch."</p>
                        <p class="glass-desc">Bảo vệ tài khoản quản trị với lớp xác thực bổ sung để đảm bảo hệ thống luôn an toàn.</p>
                    </div>
                </div>

                <div class="left-content left-footer">
                    <span>XƯỞNG SẢN XUẤT TRỰC TIẾP</span>
                    <span>Kinh nghiệm 7+ Năm</span>
                </div>
            </div>

            <div class="right-panel">
                <div class="admin-portal-badge">XÁC THỰC HAI LỚP</div>

                <div class="login-box">
                    <span class="brand-tag">&bull; B HOME | BẢO MẬT TÀI KHOẢN</span>
                    <h1>Kiểm Tra Email</h1>
                    <p>Nhập mã xác minh 6 chữ số đã gửi tới <strong>{{ $maskedEmail }}</strong>. Mã có hiệu lực trong 10 phút.</p>

                    @if ($errors->any())
                        <div class="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.2fa.verify') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <div class="form-header">
                                <label class="form-label" for="code">MÃ XÁC MINH 6 CHỮ SỐ</label>
                            </div>
                            <div class="input-wrapper">
                                <i class="fas fa-key icon-left"></i>
                                <input type="text" class="form-control" name="code" id="code" inputmode="numeric" autocomplete="one-time-code" pattern="[0-9]{6}" maxlength="6" required autofocus placeholder="000000">
                            </div>
                        </div>

                        <button type="submit" class="btn-submit">
                            XÁC MINH VÀ ĐĂNG NHẬP <i class="fas fa-arrow-right"></i>
                        </button>
                    </form>

                    <div style="display:flex; flex-direction:column; gap:10px; margin-top:14px;">
                        <form action="{{ route('admin.2fa.resend') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn-submit" style="background: transparent; color: var(--brown); border: 1px solid rgba(140,94,52,0.4);">
                                <i class="fas fa-redo"></i> GỬI LẠI MÃ XÁC MINH
                            </button>
                        </form>

                        <form action="{{ route('admin.2fa.cancel') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn-submit" style="background: transparent; color: var(--text-muted); border: 1px solid rgba(0,0,0,0.08);">
                                <i class="fas fa-arrow-left"></i> HỦY VÀ QUAY LẠI ĐĂNG NHẬP
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
