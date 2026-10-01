@extends('layouts.admin')

@section('content')
<style>
    .welcome-banner {
        background: #fbf8f4;
        border: 1px solid #f0e9e1;
        border-radius: 12px;
        padding: 30px;
        margin-bottom: 30px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .welcome-text h5 { color: var(--brown); font-size: 0.75rem; text-transform: uppercase; font-weight: 700; letter-spacing: 1px; margin-bottom: 8px; }
    .welcome-text h2 { font-family: var(--font-serif); font-size: 2rem; color: #333; margin-bottom: 10px; }
    .welcome-text p { color: #666; font-size: 0.95rem; margin: 0; }
    
    .status-badge {
        background: white;
        border: 1px solid #eee;
        padding: 10px 20px;
        border-radius: 30px;
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 0.85rem;
        font-weight: 500;
        box-shadow: 0 4px 15px rgba(0,0,0,0.02);
    }
    .status-dot { width: 8px; height: 8px; background: #22c55e; border-radius: 50%; }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 25px;
        margin-bottom: 40px;
    }

    .stat-card {
        border-radius: 12px;
        padding: 25px;
        position: relative;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        min-height: 180px;
    }
    
    .stat-card.brown { background: var(--brown-dark); color: white; }
    .stat-card.green { background: #2a3d31; color: white; }
    .stat-card.white { background: white; border: 1px solid #eaeaea; color: #333; }

    .stat-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 20px;
    }
    
    .stat-title {
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
    }
    
    .stat-icon {
        width: 32px;
        height: 32px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.9rem;
    }
    .brown .stat-icon { background: rgba(255,255,255,0.2); }
    .green .stat-icon { background: rgba(255,255,255,0.1); }
    .white .stat-icon { background: #f5f5f5; color: var(--brown); }

    .stat-value {
        font-family: var(--font-serif);
        font-size: 3rem;
        font-weight: 700;
        line-height: 1;
        margin-bottom: 10px;
        display: flex;
        align-items: baseline;
        gap: 10px;
    }
    .stat-value span {
        font-family: var(--font-sans);
        font-size: 0.75rem;
        font-weight: 500;
        padding: 4px 8px;
        border-radius: 20px;
        vertical-align: middle;
    }
    .brown .stat-value span { background: rgba(255,255,255,0.2); }
    .green .stat-value span { background: rgba(255,255,255,0.15); }
    .white .stat-value span { background: #f0fdf4; color: #16a34a; }
    .white .stat-value span.badge-light { background: #f5f1ed; color: var(--brown-dark); }

    .stat-desc { font-size: 0.85rem; opacity: 0.8; line-height: 1.5; margin-bottom: 20px; }
    .white .stat-desc { color: #666; opacity: 1; }

    .stat-link {
        font-size: 0.85rem;
        font-weight: 600;
        text-decoration: none;
        color: inherit;
        display: flex;
        align-items: center;
        gap: 5px;
    }
    .white .stat-link { color: var(--brown-dark); }

    .stat-bg-icon {
        position: absolute;
        right: -20px;
        bottom: -20px;
        font-size: 8rem;
        opacity: 0.1;
        transform: rotate(-15deg);
    }
    .green .stat-bg-icon { opacity: 0.05; }

    /* Dashboard Layout */
    .dashboard-grid {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 30px;
    }

    .panel {
        background: white;
        border-radius: 12px;
        border: 1px solid #eaeaea;
        padding: 30px;
    }
    
    .panel-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 30px;
        padding-bottom: 15px;
        border-bottom: 1px solid #f0f0f0;
    }
    
    .panel-title h3 {
        font-family: var(--font-serif);
        font-size: 1.3rem;
        color: #333;
        margin-bottom: 5px;
        font-weight: 700;
    }
    .panel-title p { color: #888; font-size: 0.85rem; margin: 0; }
    
    .btn-outline {
        border: 1px solid #e0e0e0;
        background: transparent;
        color: var(--brown-dark);
        padding: 6px 15px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
        text-decoration: none;
        display: inline-block;
    }

    /* Table */
    .data-table {
        width: 100%;
        border-collapse: collapse;
    }
    .data-table th {
        text-align: left;
        font-size: 0.75rem;
        font-weight: 700;
        color: #999;
        text-transform: uppercase;
        letter-spacing: 1px;
        padding-bottom: 15px;
        border-bottom: 1px solid #f0f0f0;
    }
    .data-table td {
        padding: 20px 0;
        border-bottom: 1px solid #f9f9f9;
        vertical-align: top;
    }
    
    .project-info h4 { font-size: 0.95rem; font-weight: 600; color: #333; margin-bottom: 5px; }
    .project-info p { font-size: 0.8rem; color: #888; margin: 0; line-height: 1.4; }
    
    .tag {
        display: inline-block;
        padding: 4px 10px;
        background: #f5f5f5;
        border-radius: 4px;
        font-size: 0.75rem;
        font-weight: 500;
        color: #555;
    }
    
    .architect-info { font-size: 0.9rem; font-weight: 500; color: #333; }
    
    .progress-wrapper { display: flex; align-items: center; gap: 10px; margin-bottom: 5px; }
    .progress-text { font-size: 0.85rem; font-weight: 600; color: #333; }
    .progress-label { font-size: 0.75rem; color: #888; }
    .progress-bar-bg { width: 100px; height: 4px; background: #eee; border-radius: 2px; overflow: hidden; }
    .progress-bar-fill { height: 100%; background: var(--brown); }
    .progress-bar-fill.green { background: #22c55e; }
    
    .status-pill {
        display: inline-block;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
        text-align: center;
        border: 1px solid transparent;
    }
    .status-pill.orange { background: #fff8f0; color: #ea580c; border-color: #ffedd5; }
    .status-pill.blue { background: #f0f9ff; color: #0284c7; border-color: #e0f2fe; }
    .status-pill.gray { background: #f8fafc; color: #64748b; border-color: #f1f5f9; }
    .status-pill.green { background: #f0fdf4; color: #16a34a; border-color: #dcfce7; }

    /* Right Panel List */
    .inquiry-list { display: flex; flex-direction: column; gap: 15px; }
    
    .inquiry-item {
        border: 1px solid #f0f0f0;
        border-radius: 8px;
        padding: 15px;
    }
    
    .inquiry-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 10px;
    }
    
    .client-info h5 { font-size: 0.95rem; font-weight: 600; color: #333; margin-bottom: 3px; }
    .client-info p { font-size: 0.8rem; color: #e77c40; font-weight: 500; margin: 0; }
    .client-info p span { color: #999; font-weight: 400; }
    
    .time-badge { font-size: 0.7rem; color: #888; background: #f8f8f8; padding: 2px 6px; border-radius: 4px; border: 1px solid #eee; }
    
    .inquiry-quote {
        font-size: 0.85rem;
        color: #666;
        line-height: 1.5;
        margin-bottom: 15px;
        font-style: italic;
    }
    
    .inquiry-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    .inquiry-tag {
        background: #f5f5f5;
        padding: 4px 10px;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 500;
        color: #555;
    }
    
    .btn-text {
        font-size: 0.8rem;
        font-weight: 600;
        color: var(--brown-dark);
        text-decoration: none;
    }

    .btn-full {
        display: block;
        width: 100%;
        padding: 12px;
        text-align: center;
        background: #fdfdfd;
        border: 1px solid #eaeaea;
        border-radius: 8px;
        color: #333;
        font-weight: 600;
        font-size: 0.85rem;
        text-decoration: none;
        margin-top: 20px;
        transition: background 0.2s;
    }
    .btn-full:hover { background: #f5f5f5; }

</style>

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
        <div>
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
        <div>
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
        <div>
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
        <div>
            <div class="stat-value">18p <span class="badge-light">Mục tiêu <30p</span></div>
            <div class="stat-desc">98.5% khách đánh giá 5 sao</div>
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