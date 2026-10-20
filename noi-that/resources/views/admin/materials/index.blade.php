@extends('layouts.admin')

@section('content')
<div class="page-head">
    <div>
        <h2>Kho Vật Liệu &amp; Tiến Độ Xưởng Mộc</h2>
        <p>Quản lý nguồn gốc gỗ ván công nghiệp, gỗ tự nhiên sấy lò và phụ kiện kim khí lắp đặt tại xưởng B HOME.</p>
    </div>
    <button class="btn-primary" onclick="alert('Nhập lô vật tư mới về xưởng mộc.')">
        <i class="fas fa-dolly"></i> Nhập Kho Vật Tư
    </button>
</div>

<div class="mat-grid">
    <div class="mat-card">
        <h5>Tồn Kho Ván Gỗ</h5>
        <h3>240 Tấm</h3>
        <p>Cốt xanh chống ẩm An Cường</p>
    </div>
    <div class="mat-card">
        <h5>Gỗ Tự Nhiên Sấy Lò</h5>
        <h3>12 m³</h3>
        <p>Gỗ Sồi Bắc Mỹ FAS đạt chuẩn</p>
    </div>
    <div class="mat-card">
        <h5>Phụ Kiện Bản Lề &amp; Ray</h5>
        <h3>580 Bộ</h3>
        <p>Blum &amp; Hafele nhập khẩu</p>
    </div>
    <div class="mat-card">
        <h5>Đá Thạch Anh Mặt Bếp</h5>
        <h3>18 Tấm</h3>
        <p>Vicostone vân mây cao cấp</p>
    </div>
</div>

<div class="table-card">
    <div class="table-header-bar">
        <div style="font-weight:700; font-size:1.05rem; color:#2c2724;">
            <i class="fas fa-boxes" style="color:var(--brown);"></i> Danh Mục Vật Tư Trong Xưởng
        </div>
    </div>
    <div style="overflow-x:auto;">
        <table class="custom-table">
            <thead>
                <tr>
                    <th>Tên Vật Liệu / Phụ Kiện</th>
                    <th>Phân Loại</th>
                    <th>Nhà Cung Cấp &amp; Tiêu Chuẩn</th>
                    <th>Lượng Tồn Kho</th>
                    <th>Đơn Vị Tính</th>
                    <th>Trạng Thái</th>
                </tr>
            </thead>
            <tbody>
                @foreach($materials as $mat)
                <tr>
                    <td style="font-weight:600; color:#222;">{{ $mat['name'] }}</td>
                    <td><span style="background:#f4ede3; color:var(--brown-dark); padding:3px 8px; border-radius:4px; font-size:0.75rem; font-weight:600;">{{ $mat['category'] }}</span></td>
                    <td style="color:#555; font-size:0.85rem;">{{ $mat['supplier'] }}</td>
                    <td style="font-weight:700; color:#2c2724;">{{ $mat['stock'] }}</td>
                    <td style="color:#777; font-size:0.85rem;">{{ $mat['unit'] }}</td>
                    <td>
                        <span class="badge-status {{ $mat['status_class'] }}">
                            <i class="fas fa-circle" style="font-size:6px;"></i> {{ $mat['status'] }}
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
