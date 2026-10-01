<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - MR.WIND</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Playfair+Display:ital,wght@0,600;0,700;1,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --brown: #8C5E34;
            --brown-dark: #704b2a;
            --brown-light: #f5f1ed;
            --text-dark: #2d2d2d;
            --text-muted: #757575;
            --bg-light: #faf9f7;
            --border-color: #e5e5e5;
            --font-sans: "Inter", sans-serif;
            --font-serif: "Playfair Display", serif;
        }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: var(--font-sans); background-color: var(--bg-light); color: var(--text-dark); min-height: 100vh; display: flex; }
        
        /* Layout */
        .split-layout { display: flex; width: 100%; min-height: 100vh; }
        
        /* Left Panel */
        .left-panel {
            width: 42%;
            background: url("https://images.unsplash.com/photo-1600585154340-be6161a56a0c?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80") center/cover no-repeat;
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 40px;
            color: white;
        }
        .left-panel::before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(to bottom, rgba(0,0,0,0.3) 0%, rgba(0,0,0,0.7) 100%);
            z-index: 1;
        }
        .left-content { position: relative; z-index: 2; }
        
        .left-header { display: flex; align-items: center; gap: 15px; margin-bottom: 50px; }
        .logo-box { width: 44px; height: 44px; background: white; border-radius: 4px; display: flex; align-items: center; justify-content: center; }
        .logo-box div { width: 16px; height: 16px; background: var(--brown); border-radius: 50%; }
        .left-header-text h3 { font-size: 1rem; font-weight: 600; letter-spacing: 1px; color: #f0c9a0; margin-bottom: 2px; }
        .left-header-text p { font-size: 0.95rem; font-weight: 500; }
        
        .glass-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            padding: 40px 30px;
            margin-top: 40px;
            text-align: center;
        }
        .glass-card h4 { font-family: var(--font-serif); font-size: 1.8rem; margin-bottom: 25px; }
        .glass-quote { font-size: 1.15rem; font-family: var(--font-serif); font-style: italic; line-height: 1.6; margin-bottom: 15px; text-align: left; }
        .glass-desc { font-size: 0.9rem; line-height: 1.6; opacity: 0.9; text-align: left; }
        
        .left-footer { display: flex; justify-content: space-between; font-size: 0.75rem; font-weight: 600; letter-spacing: 1px; color: rgba(255,255,255,0.7); text-transform: uppercase; }
        
        /* Right Panel */
        .right-panel {
            width: 58%;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            padding: 40px;
            background: white;
        }
        
        .login-box {
            width: 100%;
            max-width: 520px;
        }
        
        .admin-portal-badge {
            position: absolute;
            top: 40px;
            right: 40px;
            background: #f0f0f0;
            color: #666;
            font-size: 0.7rem;
            font-weight: 700;
            padding: 6px 12px;
            border-radius: 4px;
            letter-spacing: 1px;
        }
        
        .brand-tag { font-size: 0.8rem; font-weight: 700; color: var(--brown); letter-spacing: 1px; margin-bottom: 16px; display: block; text-transform: uppercase; }
        .login-box h1 { font-family: var(--font-serif); font-size: 2.4rem; color: var(--text-dark); margin-bottom: 12px; font-weight: 700; }
        .login-box > p { color: var(--text-muted); font-size: 0.95rem; line-height: 1.6; margin-bottom: 30px; }
        
        /* Role Banner */
        .role-banner {
            background: var(--brown-light);
            border-radius: 8px;
            padding: 16px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 35px;
        }
        .role-info { display: flex; align-items: center; gap: 15px; }
        .role-icon { width: 36px; height: 36px; background: rgba(140, 94, 52, 0.15); color: var(--brown); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.1rem; }
        .role-text h4 { font-size: 0.95rem; color: var(--text-dark); font-weight: 600; margin-bottom: 3px; }
        .role-text p { font-size: 0.8rem; color: var(--text-muted); }
        .role-badge { background: #e6dace; color: var(--brown-dark); font-size: 0.75rem; font-weight: 600; padding: 4px 10px; border-radius: 4px; }
        
        /* Form */
        .form-group { margin-bottom: 24px; position: relative; }
        .form-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px; }
        .form-label { font-size: 0.75rem; font-weight: 700; color: var(--text-muted); letter-spacing: 0.5px; text-transform: uppercase; }
        .forgot-link { font-size: 0.8rem; color: var(--brown); text-decoration: none; font-weight: 500; }
        .forgot-link:hover { text-decoration: underline; }
        
        .input-wrapper { position: relative; }
        .input-wrapper i.icon-left { position: absolute; left: 16px; top: 50%; transform: translateY(-50%); color: #aaa; font-size: 1.1rem; }
        .input-wrapper i.icon-right { position: absolute; right: 16px; top: 50%; transform: translateY(-50%); color: #aaa; font-size: 1.1rem; cursor: pointer; }
        .form-control {
            width: 100%;
            padding: 14px 16px 14px 46px;
            background: #f8f8f8;
            border: 1px solid transparent;
            border-radius: 6px;
            font-size: 0.95rem;
            color: var(--text-dark);
            font-family: inherit;
            transition: all 0.2s;
        }
        .form-control:focus { outline: none; background: white; border-color: var(--brown); box-shadow: 0 0 0 4px rgba(140, 94, 52, 0.1); }
        
        .form-options { display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; font-size: 0.85rem; }
        .checkbox-label { display: flex; align-items: center; gap: 8px; cursor: pointer; color: var(--text-dark); font-weight: 500; }
        .checkbox-label input { width: 16px; height: 16px; accent-color: var(--brown); cursor: pointer; }
        .secure-badge { color: var(--text-muted); display: flex; align-items: center; gap: 6px; }
        
        .btn-submit {
            width: 100%;
            background: var(--brown);
            color: white;
            border: none;
            padding: 16px;
            border-radius: 6px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            transition: background 0.2s;
        }
        .btn-submit:hover { background: var(--brown-dark); }
        
        .system-status {
            display: flex; justify-content: space-between; align-items: center;
            background: var(--bg-light); border-radius: 6px; padding: 12px 16px;
            margin-top: 40px; font-size: 0.8rem; font-weight: 500; color: var(--text-muted);
        }
        .status-dot { display: inline-block; width: 8px; height: 8px; background: var(--brown); border-radius: 50%; margin-right: 8px; }
        
        .support-info { display: flex; justify-content: space-between; margin-top: 30px; font-size: 0.8rem; color: var(--text-muted); }
        .support-info a { color: var(--brown); font-weight: 600; text-decoration: none; }
        
        /* Alert */
        .alert { background: #fee2e2; color: #b91c1c; padding: 12px 16px; border-radius: 6px; margin-bottom: 24px; font-size: 0.9rem; }
        .alert ul { margin: 0; padding-left: 20px; }

        @media (max-width: 992px) {
            .left-panel { display: none; }
            .right-panel { width: 100%; }
            .admin-portal-badge { display: none; }
        }
        @media (max-width: 576px) {
            .right-panel { padding: 20px; align-items: flex-start; padding-top: 40px; }
            .login-box h1 { font-size: 1.8rem; }
            .role-banner { flex-direction: column; align-items: flex-start; gap: 12px; }
            .form-options { flex-direction: column; align-items: flex-start; gap: 15px; }
            .system-status { flex-direction: column; align-items: flex-start; gap: 10px; }
        }
    </style>
</head>
<body>
    <div class="split-layout">
        <!-- Left Panel -->
        <div class="left-panel">
            <div class="left-content">
                <div class="left-header">
                    <div class="logo-box"><div></div></div>
                    <div class="left-header-text">
                        <h3>MR.WIND STUDIO</h3>
                        <p>Komorebi &amp; Wood</p>
                    </div>
                </div>
                
                <div class="glass-card">
                    <h4 style="display:flex; align-items:center; justify-content:center; gap:10px; font-family:var(--font-sans); font-size:1.4rem; font-weight:700;">
                        <i class="fas fa-wind" style="color:var(--brown);"></i> MR.WIND <span style="font-weight:400; font-size:1.2rem;">Interior</span>
                    </h4>
                    
                    <p class="glass-quote">"Nét tinh gọn của người Nhật, chuẩn mực chế tác thủ công Việt Nam."</p>
                    <p class="glass-desc">Xưởng mộc kiến trúc Chàng Sơn • Điều phối dự án dân dụng &amp; biệt thự cao cấp.</p>
                </div>
            </div>
            
            <div class="left-content left-footer">
                <span>Xưởng sản xuất trực tiếp</span>
                <span>EST . 2018</span>
            </div>
        </div>
        
        <!-- Right Panel -->
        <div class="right-panel">
            <div class="admin-portal-badge">ADMIN PORTAL</div>
            
            <div class="login-box">
                <span class="brand-tag">&bull; MR.WIND | BESPOKE INTERIOR</span>
                <h1>Đăng Nhập Quản Trị</h1>
                <p>Hệ thống điều hành trung tâm xưởng kiến trúc &amp; thi công nội thất MR.WIND.</p>
                
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
                            <p>Toàn quyền vận hành xưởng &amp; vật tư</p>
                        </div>
                    </div>
                    <div class="role-badge">Root Admin</div>
                </div>
                
                <form action="{{ route('admin.login.submit') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <div class="form-header">
                            <label class="form-label">Tài Khoản Quản Trị Viên</label>
                        </div>
                        <div class="input-wrapper">
                            <i class="far fa-user icon-left"></i>
                            <input type="email" class="form-control" name="email" value="{{ old('email', 'admin@mrwind.interior.vn') }}" required autofocus placeholder="admin@mrwind.interior.vn">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="form-header">
                            <label class="form-label">Mật Khẩu Truy Cập</label>
                            <a href="#" class="forgot-link">Quên mật khẩu?</a>
                        </div>
                        <div class="input-wrapper">
                            <i class="fas fa-lock icon-left"></i>
                            <input type="password" class="form-control" name="password" id="password" required placeholder="&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;">
                            <i class="far fa-eye icon-right" onclick="togglePassword()"></i>
                        </div>
                    </div>
                    
                    <div class="form-options">
                        <label class="checkbox-label">
                            <input type="checkbox" name="remember" checked>
                            Ghi nhớ phiên làm việc 30 ngày
                        </label>
                        <div class="secure-badge">
                            <i class="fas fa-lock" style="color:var(--brown);"></i> Mã hóa TLS 256-bit
                        </div>
                    </div>
                    
                    <button type="submit" class="btn-submit">
                        Đăng Nhập Quản Trị <i class="fas fa-arrow-right"></i>
                    </button>
                </form>
                
                <div class="system-status">
                    <div><span class="status-dot"></span> Trạng thái xưởng Chàng Sơn:</div>
                    <div><i class="fas fa-tools" style="color:var(--brown);"></i> Đang sản xuất (8 chuyền CNC)</div>
                </div>
                
                <div class="support-info">
                    <span>Hỗ trợ kỹ thuật nội bộ:</span>
                    <a href="tel:0988248868"><i class="fas fa-phone-alt"></i> 0988.248.868</a>
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