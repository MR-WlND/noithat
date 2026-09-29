@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="hero">
    <div class="hero-overlay"></div>
    <div class="container hero-content">
        <h1 class="hero-title">Kiến Tạo Không Gian Sống <br> <span class="text-accent">Đẳng Cấp & Tinh Tế</span></h1>
        <p class="hero-subtitle">Xưởng sản xuất nội thất trực tiếp không qua trung gian. Chuyên thiết kế và thi công Tủ Bếp, Tủ Áo, Nội Thất Căn Hộ chất lượng cao.</p>
        <div class="hero-actions">
            <a href="/du-an" class="btn btn-primary btn-lg">Xem Dự Án Thực Tế</a>
            <a href="#lien-he" class="btn btn-outline btn-lg">Liên Hệ Tư Vấn</a>
        </div>
    </div>
</section>

<!-- Why Choose Us -->
<section class="features section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Tại Sao Chọn Chúng Tôi?</h2>
            <p class="section-desc">Những ưu thế vượt trội mang đến sự an tâm tuyệt đối cho khách hàng.</p>
        </div>
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon"><i class="fas fa-industry"></i></div>
                <h3 class="feature-title">Xưởng Sản Xuất Trực Tiếp</h3>
                <p>Tối ưu chi phí, kiểm soát chất lượng 100%. Giá tận xưởng không qua trung gian.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon"><i class="fas fa-ruler-combined"></i></div>
                <h3 class="feature-title">Miễn Phí Đo Đạc Tại Nhà</h3>
                <p>Đội ngũ kỹ thuật viên đến tận nơi khảo sát, tư vấn giải pháp tối ưu nhất cho không gian.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon"><i class="fas fa-award"></i></div>
                <h3 class="feature-title">Vật Liệu Chính Hãng</h3>
                <p>Sử dụng 100% ván gỗ An Cường, phụ kiện cao cấp Blum, Hafele, Eurogold...</p>
            </div>
        </div>
    </div>
</section>

<!-- Categories -->
<section class="categories section bg-light">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Hạng Mục Thi Công</h2>
        </div>
        <div class="categories-grid">
            <a href="/du-an?category=tu-bep" class="category-card">
                <img src="https://images.unsplash.com/photo-1556910103-1c02745aae4d?w=600" alt="Tủ Bếp">
                <div class="category-content">
                    <h3>Tủ Bếp Cao Cấp</h3>
                </div>
            </a>
            <a href="/du-an?category=tu-ao" class="category-card">
                <img src="https://images.unsplash.com/photo-1595526114035-0d45ed16cfbf?w=600" alt="Tủ Áo">
                <div class="category-content">
                    <h3>Tủ Áo Hiện Đại</h3>
                </div>
            </a>
            <a href="/du-an?category=noi-that-can-ho" class="category-card">
                <img src="https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?w=600" alt="Nội Thất Căn Hộ">
                <div class="category-content">
                    <h3>Nội Thất Căn Hộ</h3>
                </div>
            </a>
        </div>
    </div>
</section>

<!-- Featured Projects -->
<section class="projects section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Dự Án Mới Nhất</h2>
            <a href="/du-an" class="view-all">Xem tất cả <i class="fas fa-arrow-right"></i></a>
        </div>
        <div class="projects-grid">
            @forelse($featuredProjects as $project)
            <div class="project-card">
                <div class="project-img">
                    <img src="{{ $project->cover_image }}" alt="{{ $project->title }}">
                    <div class="project-overlay">
                        <a href="/du-an/{{ $project->slug }}" class="btn btn-outline-light">Xem Chi Tiết</a>
                    </div>
                </div>
                <div class="project-info">
                    <span class="project-category">{{ $project->category->name ?? 'Dự án' }}</span>
                    <h3 class="project-title"><a href="/du-an/{{ $project->slug }}">{{ $project->title }}</a></h3>
                </div>
            </div>
            @empty
            <p>Đang cập nhật dự án...</p>
            @endforelse
        </div>
    </div>
</section>

<!-- Workflow -->
<section id="quy-trinh" class="workflow section bg-dark">
    <div class="container">
        <div class="section-header text-center">
            <h2 class="section-title text-white">Quy Trình Làm Việc</h2>
        </div>
        <div class="workflow-steps">
            <div class="step">
                <div class="step-number">1</div>
                <h3 class="step-title">Tư Vấn Cơ Bản</h3>
                <p>Tiếp nhận yêu cầu, tư vấn vật liệu & phong cách.</p>
            </div>
            <div class="step">
                <div class="step-number">2</div>
                <h3 class="step-title">Khảo Sát & Đo Đạc</h3>
                <p>Kỹ thuật viên đo đạc thực tế tại công trình.</p>
            </div>
            <div class="step">
                <div class="step-number">3</div>
                <h3 class="step-title">Thiết Kế 3D & Báo Giá</h3>
                <p>Chốt phương án thiết kế và dự toán chi phí.</p>
            </div>
            <div class="step">
                <div class="step-number">4</div>
                <h3 class="step-title">Sản Xuất & Lắp Đặt</h3>
                <p>Gia công tại xưởng và lắp ráp hoàn thiện tận nơi.</p>
            </div>
        </div>
    </div>
</section>

<!-- Contact Form -->
<section id="lien-he" class="contact section">
    <div class="container">
        <div class="contact-wrapper">
            <div class="contact-info-panel">
                <h2>Bắt Đầu Dự Án Của Bạn</h2>
                <p>Để lại thông tin, đội ngũ chuyên gia của chúng tôi sẽ liên hệ lại trong vòng 30 phút.</p>
                <div class="contact-illustration">
                    <!-- Placeholder cho hình ảnh đẹp -->
                </div>
            </div>
            <div class="contact-form-panel">
                <form action="/lien-he" method="POST" class="form">
                    @csrf
                    <div class="form-group">
                        <label for="name">Họ và Tên</label>
                        <input type="text" id="name" name="name" class="form-control" required placeholder="Ví dụ: Nguyễn Văn A">
                    </div>
                    <div class="form-group">
                        <label for="phone">Số điện thoại</label>
                        <input type="tel" id="phone" name="phone" class="form-control" required placeholder="09xxxxxxxxx">
                    </div>
                    <div class="form-group">
                        <label for="message">Nội dung yêu cầu</label>
                        <textarea id="message" name="message" class="form-control" rows="4" placeholder="Bạn cần tư vấn thiết kế thi công hạng mục gì?"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Gửi Yêu Cầu Tư Vấn</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
