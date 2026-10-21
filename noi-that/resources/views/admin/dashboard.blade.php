@extends('layouts.admin')

@section('content')
<div class="welcome-banner">
    <div class="welcome-text">
        <h5>KOMOREBI & WOODCRAFT STUDIO</h5>
        <h2>Xin chào, KTS. Hoàng Minh!</h2>
        <p>Hôm nay xưởng mộc đang hoàn thiện 3 đơn hàng bàn giao đợt 1. Có <strong>5 yêu cầu tư vấn mới</strong> cần liên hệ sớm trong sáng nay.</p>
    </div>
    <div class="status-badge">
        <div class="status-dot"></div> Xưởng Gỗ Sồi: Hoạt động bình thường
    </div>
</div>

<div class="stats-grid">
    <div class="stat-card brown">
        <div class="stat-header">
            <div class="stat-title">TỔNG SỐ DỰ ÁN</div>
            <div class="stat-icon"><i class="fas fa-building"></i></div>
        </div>
        <div class="stat-body">
            <div class="stat-value">18 <span>+3 tháng này</span></div>
            <div class="stat-desc">12 đang thi công &bull; 6 giai đoạn thiết kế</div>
            <a href="#" class="stat-link">Xem chi tiết danh sách <i class="fas fa-angle-right"></i></a>
        </div>
        <i class="fas fa-bars stat-bg-icon"></i>
    </div>
    
    <div class="stat-card green">
        <div class="stat-header">
            <div class="stat-title">YÊU CẦU TƯ VẤN MỚI</div>
            <div class="stat-icon"><i class="fas fa-envelope"></i></div>
        </div>
        <div class="stat-body">
            <div class="stat-value">24 <span>5 cần gọi gấp</span></div>
            <div class="stat-desc">Từ Website, Fanpage & Showroom</div>
            <a href="#" class="stat-link">Tiếp nhận & Xử lý <i class="fas fa-angle-right"></i></a>
        </div>
        <i class="fas fa-envelope stat-bg-icon"></i>
    </div>
    
    <div class="stat-card white">
        <div class="stat-header">
            <div class="stat-title">CÔNG TRÌNH BÀN GIAO</div>
            <div class="stat-icon"><i class="fas fa-check"></i></div>
        </div>
        <div class="stat-body">
            <div class="stat-value">06 <span>Đúng hẹn 100%</span></div>
            <div class="stat-desc">Nghiệm thu gỗ & lắp ráp nội thất</div>
            <div style="display:flex; justify-content:space-between; margin-top:20px; font-size:0.8rem;">
                <span style="color:#888;">Kỳ hạn: Tháng 10/2024</span>
                <a href="#" class="stat-link">Lịch xưởng <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
    
    <div class="stat-card white">
        <div class="stat-header">
            <div class="stat-title">TỐC ĐỘ PHẢN HỒI</div>
            <div class="stat-icon"><i class="far fa-clock"></i></div>
        </div>
        <div class="stat-body">
            <div class="stat-value">18p <span class="badge-light">Mục tiêu &lt;30p</span></div>
            <div class="stat-desc">98.5% khách hàng hài lòng</div>
            <div style="display:flex; justify-content:space-between; margin-top:20px; font-size:0.8rem;">
                <span style="color:#888;">Chăm sóc khách hàng</span>
                <a href="#" class="stat-link">Chi tiết <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
</div>

<div class="dashboard-grid">
    <div class="panel">
        <div class="panel-header">
            <div class="panel-title">
                <h3>Dự Án Đang Triển Khai</h3>
                <p>Tiến độ thiết kế & thi công xưởng mộc</p>
            </div>
            <a href="#" class="btn-outline">Xem tất cả 18 dự án</a>
        </div>
        
        <table class="data-table">
            <thead>
                <tr>
                    <th>TÊN DỰ ÁN / KHÁCH HÀNG</th>
                    <th>LOẠI HÌNH</th>
                    <th>KTS CHỦ TRÌ</th>
                    <th>TIẾN ĐỘ XƯỞNG</th>
                    <th>TRẠNG THÁI</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div class="project-info">
                            <h4>Vinhomes Smart City - Căn 3PN</h4>
                            <p>Gia đình anh Tuấn Anh &bull; Gỗ sồi tự nhiên</p>
                        </div>
                    </td>
                    <td><span class="tag">Căn hộ</span></td>
                    <td><span class="architect-info">KTS. Trần Đăng</span></td>
                    <td>
                        <div class="progress-wrapper">
                            <span class="progress-text">85%</span>
                            <span class="progress-label">Lắp ráp</span>
                        </div>
                        <div class="progress-bar-bg"><div class="progress-bar-fill" style="width: 85%;"></div></div>
                    </td>
                    <td><span class="status-pill orange">Sắp bàn giao</span></td>
                </tr>
                <tr>
                    <td>
                        <div class="project-info">
                            <h4>Villa Ecopark Marina - Song Lập</h4>
                            <p>Chị Hoàng Yến &bull; Phong cách Japandi Wabi-Sabi</p>
                        </div>
                    </td>
                    <td><span class="tag">Biệt thự</span></td>
                    <td><span class="architect-info">KTS. Hoàng Minh</span></td>
                    <td>
                        <div class="progress-wrapper">
                            <span class="progress-text">50%</span>
                            <span class="progress-label">Gia công</span>
                        </div>
                        <div class="progress-bar-bg"><div class="progress-bar-fill" style="width: 50%;"></div></div>
                    </td>
                    <td><span class="status-pill blue">Đang sản xuất</span></td>
                </tr>
                <tr>
                    <td>
                        <div class="project-info">
                            <h4>Penthouse Masteri Thảo Điền</h4>
                            <p>Anh Quốc Hưng &bull; Nội thất gỗ Óc Chó phối Mây đan</p>
                        </div>
                    </td>
                    <td><span class="tag">Penthouse</span></td>
                    <td><span class="architect-info">KTS. Lê Phương</span></td>
                    <td>
                        <div class="progress-wrapper">
                            <span class="progress-text">25%</span>
                            <span class="progress-label">Duyệt 3D</span>
                        </div>
                        <div class="progress-bar-bg"><div class="progress-bar-fill" style="width: 25%; background: #ddd;"></div></div>
                    </td>
                    <td><span class="status-pill gray">Bản vẽ kỹ thuật</span></td>
                </tr>
                <tr>
                    <td>
                        <div class="project-info">
                            <h4>Nhà phố Phố Cổ - Hoàn Kiếm</h4>
                            <p>Cô Thanh Nga &bull; Tủ bếp tự nhiên & Tủ kịch trần</p>
                        </div>
                    </td>
                    <td><span class="tag">Nhà phố</span></td>
                    <td><span class="architect-info">KTS. Hoàng Minh</span></td>
                    <td>
                        <div class="progress-wrapper">
                            <span class="progress-text">100%</span>
                            <span class="progress-label">Hoàn tất</span>
                        </div>
                        <div class="progress-bar-bg"><div class="progress-bar-fill green" style="width: 100%;"></div></div>
                    </td>
                    <td><span class="status-pill green">Đã nghiệm thu</span></td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <div class="panel">
        <div class="panel-header">
            <div class="panel-title">
                <h3>Yêu Cầu Mới Nhất</h3>
                <p>Khách hàng cần phản hồi ngay</p>
            </div>
            <div class="tag" style="background:#e0ead9; color:#4a6741;">24 Yêu Cầu</div>
        </div>
        
        <div class="inquiry-list">
            <div class="inquiry-item">
                <div class="inquiry-header">
                    <div class="client-info">
                        <h5>Nguyễn Thu Thảo</h5>
                        <p>0912.848.xxx &bull; <span>Hà Nội</span></p>
                    </div>
                    <div class="time-badge">12 phút trước</div>
                </div>
                <div class="inquiry-quote">
                    "Cần thiết kế thi công trọn gói căn 2 ngủ Starlake phong cách Nhật Bả..."
                </div>
                <div class="inquiry-actions">
                    <span class="inquiry-tag">Tư vấn trọn gói</span>
                    <a href="#" class="btn-text">Gọi tư vấn &rarr;</a>
                </div>
            </div>
            
            <div class="inquiry-item">
                <div class="inquiry-header">
                    <div class="client-info">
                        <h5>Vũ Đình Quân</h5>
                        <p>0983.312.xxx &bull; <span>Hải Phòng</span></p>
                    </div>
                    <div class="time-badge">45 phút trước</div>
                </div>
                <div class="inquiry-quote">
                    "Muốn đặt làm hệ tủ bếp gỗ tần bì tự nhiên kết hợp phụ kiện Hafele the..."
                </div>
                <div class="inquiry-actions">
                    <span class="inquiry-tag">Gia công tủ bếp</span>
                    <a href="#" class="btn-text">Xem file đính kèm &rarr;</a>
                </div>
            </div>
            
            <div class="inquiry-item">
                <div class="inquiry-header">
                    <div class="client-info">
                        <h5>Trần Bích Ngọc</h5>
                        <p>0904.119.xxx &bull; <span>TP.HCM</span></p>
                    </div>
                    <div class="time-badge">2 giờ trước</div>
                </div>
                <div class="inquiry-quote">
                    "Tư vấn nội thất phòng trà đạo và phòng ngủ phong cách Wabi-sabi..."
                </div>
                <div class="inquiry-actions">
                    <span class="inquiry-tag">Không gian trà đạo</span>
                    <a href="#" class="btn-text">Xử lý ngay &rarr;</a>
                </div>
            </div>
        </div>
        
        <a href="#" class="btn-full">Chuyển tới Hộp thư Tư vấn & Khách hàng &rarr;</a>
    </div>
</div>
@endsection