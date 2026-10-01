@extends('layouts.app')

@section('content')

{{-- ═══════════════════════════════
     HERO  (text left | image right)
════════════════════════════════ --}}
<section class="hero">
    <div class="hero__wrap">

        {{-- LEFT --}}
        <div class="hero__left">
            <p class="hero__eyebrow">— Nghệ Thuật Nội Thất Nhật Bản Hiện Đại · MR.WIND</p>
            <h1 class="hero__h1">
                Kiến Tạo Không Gian Sống
                <span class="hero__h1-italic">Đẳng Cấp &amp; Tinh Tế</span>
            </h1>
            <p class="hero__desc">Xưởng sản xuất nội thất trực tiếp không qua trung gian. Chuyên thiết kế và thi công Tủ Bếp, Tủ Áo &amp; Nội Thất Căn Hộ với độ tinh xảo và thẩm mỹ chuẩn mực. Giao hàng và lắp đặt tận nơi.</p>
            <div class="hero__btns">
                <a href="/du-an" class="btn btn--primary">Xem Toàn Bộ Dự Án</a>
                <a href="#lien-he" class="btn btn--ghost">Tư Vấn Miễn Phí</a>
            </div>
        </div>

        {{-- RIGHT --}}
        <div class="hero__right">
            <img src="https://images.unsplash.com/photo-1631679706909-1844bbd07221?w=1000&auto=format&fit=crop&q=80" alt="Không gian nội thất Japandi">
            <div class="hero__badge">
                <span class="hero__badge-star">✦</span>
                <p class="hero__badge-text">Xưởng Sản Xuất<br>Trực Tiếp</p>
            </div>
        </div>

    </div>

    {{-- STATS STRIP --}}
    <div class="hero__stats">
        <div class="hero__stat">
            <strong>500+</strong>
            <span>Dự án hoàn thiện</span>
        </div>
        <div class="hero__stat">
            <strong>100%</strong>
            <span>Khách hàng hài lòng</span>
        </div>
        <div class="hero__stat">
            <strong>05 Năm</strong>
            <span>Kinh nghiệm đỉnh cao</span>
        </div>
        <div class="hero__stat">
            <strong>1.500m²</strong>
            <span>Diện tích xưởng mộc</span>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════
     VÌ SAO  (3 cards)
════════════════════════════════ --}}
<section class="whyus" id="ve-chung-toi">
    <div class="container">
        <div class="whyus__top">
            <div>
                <p class="tag">Thế Mạnh Của Chúng Tôi · MR.WIND</p>
                <h2>Vì Sao Khách Hàng Chọn MR.WIND?</h2>
            </div>
            <p>Với thế mạnh là xưởng sản xuất trực tiếp, chúng tôi mang đến giá trị đích thực và chất lượng chuẩn mực với công nghệ hiện đại CNC chính xác 100%.</p>
        </div>
        <div class="whyus__grid">
            <div class="whyus__card">
                <div class="whyus__icon"><i class="fas fa-industry"></i></div>
                <p class="whyus__num">01. TỐI ƯU CHI PHÍ</p>
                <h3>Tưởng Trực Tiếp Từ Xưởng</h3>
                <p>Tiết kiệm lên đến 30% chi phí nội thất so với thị trường. Chế độ bảo hành tuyệt đối từng chi tiết.</p>
                <a href="#lien-he">Báo giá tận xưởng <i class="fas fa-arrow-right"></i></a>
            </div>
            <div class="whyus__card">
                <div class="whyus__icon"><i class="fas fa-drafting-compass"></i></div>
                <p class="whyus__num">02. KHẢO SÁT TẬN NHÀ</p>
                <h3>Đo &amp; Thiết Kế 3D Miễn Phí</h3>
                <p>Kỹ thuật viên đến tận nơi khảo sát, vẽ 3D miễn phí giúp không gian khớp hoàn toàn với thực tế.</p>
                <a href="#lien-he">Đăng ký khảo sát <i class="fas fa-arrow-right"></i></a>
            </div>
            <div class="whyus__card">
                <div class="whyus__icon"><i class="fas fa-shield-alt"></i></div>
                <p class="whyus__num">03. CHẤT LƯỢNG CAO CẤP</p>
                <h3>100% Gỗ Chính Hãng An Cường</h3>
                <p>Cốt ván xanh chống ẩm An Cường, phụ kiện Blum &amp; Hafele nhập khẩu bền đẹp và mượt mà.</p>
                <a href="#lien-he">Xem chính sách bảo hành <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════
     KHÔNG GIAN  (masonry)
════════════════════════════════ --}}
<section class="spaces" id="hang-muc">
    <div class="container">
        <div class="spaces__top">
            <p class="tag">DI / Danh Mục Thiết Kế &amp; Thi Công</p>
            <h2>Không Gian Trọng Điểm Tại Xưởng</h2>
        </div>
        <div class="spaces__grid">

            {{-- BIG LEFT --}}
            <div class="space-card space-card--big">
                <div class="space-card__img">
                    <img src="https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?w=700&auto=format&fit=crop" alt="Tủ Bếp">
                    <span class="space-card__chip">Chuyên Sâu Bếp</span>
                </div>
                <div class="space-card__body">
                    <div class="space-card__row">
                        <h3>Hệ Tủ Bếp Gỗ Sồi Nam Lam Chống Ẩm</h3>
                        <span class="space-card__price-badge">Bếp Đảo &amp; Khởi Rời</span>
                    </div>
                    <p>Tối ưu hóa công năng tùng giác bếp (bồn rửa – bếp nấu – tủ lạnh), bề mặt xử lý kháng nước bề mặt Melamine / Veneer sồi tự nhiên kết hợp đa bàn bếp thạch anh vân máy.</p>
                    <div class="space-card__foot">
                        <div class="space-card__tags">
                            <span>MDF Lõi Xanh</span>
                            <span>Ray âm giảm chấn</span>
                        </div>
                        <a href="#lien-he" class="space-card__link">Tư vấn kiểu bếp <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>

            {{-- RIGHT COLUMN --}}
            <div class="spaces__right">
                <div class="space-card space-card--sm">
                    <div class="space-card__img">
                        <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=500&auto=format&fit=crop" alt="Tủ Áo">
                        <span class="space-card__chip">Tủ Quần Áo</span>
                    </div>
                    <div class="space-card__body">
                        <h3>Tủ Áo Cánh Kính &amp; Walk-in Closet</h3>
                        <p>Cánh kính khung nhôm Anodize siêu mỏng, ray trượt êm ái tích hợp hệ đèn LED cảm biến vây lay bao cao.</p>
                        <p class="space-card__meta">Module may do kích thước phòng</p>
                        <a href="#lien-he" class="space-card__link">Tư vấn thiết kế <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="space-card space-card--sm">
                    <div class="space-card__img">
                        <img src="https://images.unsplash.com/photo-1616137148650-4aa14051b78d?w=500&auto=format&fit=crop" alt="Nội thất căn hộ">
                        <span class="space-card__chip">Trọn Gói Căn Hộ</span>
                    </div>
                    <div class="space-card__body">
                        <h3>Thi Công Căn Hộ &amp; Biệt Thự</h3>
                        <p>Gói dịch vụ hoàn thiện từ bản vẽ concept, thi công trần – tường – sàn đến toàn bộ đồ gỗ nội thất chìa khóa trao tay.</p>
                        <p class="space-card__meta">Bàn giao chính xác 30 ngày</p>
                        <a href="#lien-he" class="space-card__link">Tư vấn thiết kế <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- ═══════════════════════════════
     DỰ ÁN TIÊU BIỂU
════════════════════════════════ --}}
<section class="projects" id="du-an">
    <div class="container">
        <div class="projects__head">
            <div>
                <p class="tag">Dự Án Bàn Giao Thực Tế</p>
                <h2>Dự Án Bàn Giao Tiêu Biểu</h2>
            </div>
            <div class="tabs">
                <span class="tab active">Tất Cả</span>
                <span class="tab">Tủ Bếp</span>
                <span class="tab">Tủ Áo</span>
            </div>
        </div>
        <div class="projects__grid">
            @forelse($featuredProjects as $project)
            <a href="/du-an/{{ $project->slug }}" class="proj-card">
                <div class="proj-card__img">
                    <img src="{{ $project->cover_image }}" alt="{{ $project->title }}">
                    <span class="proj-card__cat">{{ $project->category->name ?? 'Dự Án' }}</span>
                </div>
                <div class="proj-card__body">
                    <p class="proj-card__loc"><i class="fas fa-map-marker-alt"></i> Hà Nội · {{ $project->created_at->format('Y') }}</p>
                    <h3>{{ $project->title }}</h3>
                    <p>{{ Str::limit($project->description ?? 'Không gian sống được thiết kế tỉ mỉ, tối ưu hóa công năng và thẩm mỹ theo phong cách Japandi hiện đại.', 80) }}</p>
                    <span class="proj-card__cta">Xem ảnh thực tế <i class="fas fa-arrow-right"></i></span>
                </div>
            </a>
            @empty
            <p style="color:#888">Đang cập nhật dự án...</p>
            @endforelse
        </div>
        <div class="projects__more">
            <a href="/du-an" class="btn btn--outline">Xem Tất Cả Dự Án <i class="fas fa-arrow-right"></i></a>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════
     QUY TRÌNH  (dark bg)
════════════════════════════════ --}}
<section class="workflow" id="quy-trinh">
    <div class="container">
        <div class="workflow__head">
            <p class="tag tag--light">Quy Trình Làm Việc · Chuẩn Nhật Bản</p>
            <h2>Quy Trình Thi Công Chuẩn Nhật Bản</h2>
            <p>Minh bạch – Gọn gàng – Đúng tiến độ. Cam kết không phát sinh chi phí sau khi ký hợp đồng.</p>
        </div>
        <div class="workflow__grid">
            <div class="wf-step">
                <div class="wf-num">01</div>
                <span>Bước 1</span>
                <h4>Tư Vấn &amp; Lên Lịch</h4>
                <p>Tiếp nhận yêu cầu, tư vấn phong cách và ngân sách, lên lịch khảo sát miễn phí.</p>
            </div>
            <div class="wf-step">
                <div class="wf-num">02</div>
                <span>Bước 2</span>
                <h4>Khảo Sát Hiện Trạng</h4>
                <p>Kỹ thuật viên đo đạc chính xác tại công trình, chụp ảnh và lên bản vẽ sơ bộ.</p>
            </div>
            <div class="wf-step">
                <div class="wf-num">03</div>
                <span>Bước 3</span>
                <h4>Thiết Kế 3D &amp; Báo Giá</h4>
                <p>Dựng phối cảnh 3D chân thực, bóc tách vật tư, báo giá chi tiết đến từng chi tiết.</p>
            </div>
            <div class="wf-step">
                <div class="wf-num">04</div>
                <span>Bước 4</span>
                <h4>Gia Công &amp; Bàn Giao</h4>
                <p>Sản xuất tại xưởng CNC, lắp ráp tận nơi nhanh gọn, vệ sinh sạch sẽ và bàn giao.</p>
            </div>
        </div>
        <div class="workflow__cta">
            <a href="#lien-he" class="btn btn--primary">Đăng Ký Tư Vấn Ngay <i class="fas fa-arrow-right"></i></a>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════
     LIÊN HỆ / FORM
════════════════════════════════ --}}
<section class="contact" id="lien-he">
    <div class="container">
        <div class="contact__inner">
            {{-- LEFT INFO --}}
            <div class="contact__left">
                <p class="tag">Khởi Đầu Không Gian Sống Của Bạn</p>
                <h2>Nhận Tư Vấn &amp;<br>Bản Vẽ 3D Miễn Phí</h2>
                <p>Để lại thông tin, chuyên viên sẽ liên hệ lại trong 30 phút với giải pháp phù hợp nhất với không gian và ngân sách của bạn.</p>
                <ul class="contact__perks">
                    <li><i class="fas fa-check-circle"></i> Phản hồi trong 30 phút – <strong>Không bỏ lỡ cuộc gọi</strong></li>
                    <li><i class="fas fa-check-circle"></i> Khảo sát &amp; tư vấn tận nhà – <strong>Hoàn toàn miễn phí</strong></li>
                    <li><i class="fas fa-check-circle"></i> Bản vẽ 3D miễn phí – <strong>cho dự án từ 50 triệu</strong></li>
                    <li><i class="fas fa-check-circle"></i> Hỗ trợ trả góp 0% lãi suất</li>
                </ul>
                <div class="contact__hotline">
                    <i class="fas fa-phone-alt"></i>
                    <div>
                        <span>HOTLINE TƯ VẤN NGAY</span>
                        <strong>0988.248.868</strong>
                    </div>
                </div>
            </div>

            {{-- RIGHT FORM --}}
            <div class="form-box">
                @if(session('success'))
                <div class="alert"><i class="fas fa-check-circle"></i> {{ session('success') }}</div>
                @endif
                <form action="/lien-he" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="f-group">
                            <label>Họ và tên *</label>
                            <input type="text" name="name" required placeholder="Nguyễn Văn A">
                        </div>
                        <div class="f-group">
                            <label>Số điện thoại *</label>
                            <input type="tel" name="phone" required placeholder="0912 345 678">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="f-group">
                            <label>Hạng mục quan tâm</label>
                            <select name="category">
                                <option>Tủ Bếp Cao Cấp</option>
                                <option>Tủ Áo / Walk-in Closet</option>
                                <option>Nội Thất Căn Hộ Trọn Gói</option>
                            </select>
                        </div>
                        <div class="f-group">
                            <label>Mức đầu tư dự kiến</label>
                            <select name="budget">
                                <option>Dưới 100 triệu</option>
                                <option>100 – 300 triệu</option>
                                <option>Trên 300 triệu</option>
                            </select>
                        </div>
                    </div>
                    <div class="f-group">
                        <label>Nội dung cần tư vấn</label>
                        <textarea name="message" placeholder="Ví dụ: Tủ bếp chữ L cho căn hộ 80m2, phong cách Japandi..."></textarea>
                    </div>
                    <button type="submit" class="btn btn--primary btn--full">
                        Gửi Yêu Cầu Tư Vấn <i class="fas fa-paper-plane"></i>
                    </button>
                    <p class="form-note"><i class="fas fa-lock"></i> Thông tin của bạn được bảo mật tuyệt đối.</p>
                </form>
            </div>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════
     BẢN ĐỒ
════════════════════════════════ --}}
<section class="mapblock">
    <div class="mapblock__inner">
        <div class="mapblock__info">
            <p class="tag">Kính Mời Ghé Thăm · MR.WIND</p>
            <h2>Kính Mời Ghé Thăm Xưởng Mộc</h2>
            <p>Chúng tôi luôn hoan nghênh khách hàng tới tham quan xưởng sản xuất trực tiếp để cảm nhận chất lượng vật liệu.</p>
            <div class="mapblock__locs">
                <div class="mapblock__loc">
                    <i class="fas fa-store"></i>
                    <div>
                        <h4>Showroom / Văn Phòng</h4>
                        <p>Tầng 3, Toà HH2 Bắc Hà, Tố Hữu, Hà Đông, Hà Nội</p>
                    </div>
                </div>
                <div class="mapblock__loc">
                    <i class="fas fa-industry"></i>
                    <div>
                        <h4>Xưởng Sản Xuất</h4>
                        <p>Khu Công Nghiệp Quốc Oai, Thạch Thất, Hà Nội</p>
                    </div>
                </div>
            </div>
            <a href="tel:0988248868" class="btn btn--primary">
                <i class="fas fa-phone-alt"></i> Gọi Ngay: 0988.248.868
            </a>
        </div>
        <div class="mapblock__map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.4!2d105.754!3d21.022!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjHCsDAxJzE5LjIiTiAxMDXCsDQ1JzE0LjgiRQ!5e0!3m2!1svi!2s!4v1620000000000!5m2!1svi!2s"
                width="100%" height="100%" style="border:0" allowfullscreen loading="lazy"></iframe>
        </div>
    </div>
</section>

@endsection
