@if(session('success'))
    <div style="background:#ecfdf5; color:#065f46; border-left:4px solid #10b981; padding:12px 18px; border-radius:6px; margin-bottom:24px; font-size:0.9rem; display:flex; align-items:center; gap:10px; box-shadow:0 2px 8px rgba(16,185,129,0.08);">
        <i class="fas fa-check-circle" style="color:#10b981; font-size:1.1rem;"></i>
        <span>{{ session('success') }}</span>
    </div>
@endif

@if(session('error'))
    <div style="background:#fef2f2; color:#991b1b; border-left:4px solid #ef4444; padding:12px 18px; border-radius:6px; margin-bottom:24px; font-size:0.9rem; display:flex; align-items:center; gap:10px; box-shadow:0 2px 8px rgba(239,68,68,0.08);">
        <i class="fas fa-exclamation-circle" style="color:#ef4444; font-size:1.1rem;"></i>
        <span>{{ session('error') }}</span>
    </div>
@endif

@if($errors->any())
    <div style="background:#fef2f2; color:#991b1b; border-left:4px solid #ef4444; padding:14px 18px; border-radius:6px; margin-bottom:24px; font-size:0.9rem; box-shadow:0 2px 8px rgba(239,68,68,0.08);">
        <div style="font-weight:600; margin-bottom:6px; display:flex; align-items:center; gap:8px;">
            <i class="fas fa-exclamation-triangle"></i> Đã xảy ra lỗi, vui lòng kiểm tra lại:
        </div>
        <ul style="margin:0; padding-left:22px; line-height:1.6;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
