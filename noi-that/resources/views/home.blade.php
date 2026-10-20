@extends('layouts.app')

@section('content')

{{-- ═══════════════════════════════
     HERO  (text left | image right)
════════════════════════════════ --}}
<section class="hero">
    <div class="hero__wrap">

        {{-- LEFT --}}
        <div class="hero__left">
            <p class="hero__eyebrow">— XƯỞNG MỘC GIA ĐÌNH · THI CÔNG THEO YÊU CẦU</p>
            <h1 class="hero__h1">
                Nội Thất May Đo Riêng<br>
                <span class="hero__h1-italic">Kiến Tạo Không Gian Sống Tinh Tế &amp; Đẳng Cấp</span>
            </h1>
            <p class="hero__desc">Thiết kế và sản xuất trực tiếp tại xưởng theo đúng kích thước, kiểu dáng và chi phí của gia đình bạn. Không qua trung gian, đảm bảo chuẩn tỉ lệ và chất lượng đến từng chi tiết.</p>
            <div class="hero__btns">
                <a href="/du-an" class="btn btn--primary">Xem Toàn Bộ Dự Án</a>
                <a href="#lien-he" class="btn btn--ghost">Tư Vấn Miễn Phí</a>
            </div>
        </div>

        {{-- RIGHT --}}
        <div class="hero__right">
            <img src="https://images.unsplash.com/photo-1631679706909-1844bbd07221?w=1000&auto=format&fit=crop&q=80" alt="Xưởng mộc nội thất may đo B HOME">
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
            <strong>07 Năm</strong>
            <span>Kinh nghiệm đỉnh cao</span>
        </div>
        <div class="hero__stat">
            <strong>200m²</strong>
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
                <p class="tag">Thế Mạnh Của Chúng Tôi · B HOME</p>
                <h2>Vì Sao Khách Hàng Tin Chọn B HOME?</h2>
            </div>
            <p>Chúng tôi kết hợp giữa tay nghề thợ mộc truyền thống và tư duy thiết kế hiện đại để mang lại sản phẩm vừa vặn nhất cho ngôi nhà bạn.</p>
        </div>
        <div class="whyus__grid">
            <div class="whyus__card">
                <div class="whyus__icon"><i class="fas fa-hammer"></i></div>
                <p class="whyus__num">01. MỘC TRUYỀN THỐNG &amp; HIỆN ĐẠI</p>
                <h3>Thợ Mộc Tay Nghề Cao</h3>
                <p>Đội ngũ thợ am hiểu sâu về gỗ, tỉ mỉ từng mối ghép, bo cong tinh tế theo đúng bản vẽ thiết kế.</p>
                <a href="#lien-he">Nhận tư vấn thợ giỏi <i class="fas fa-arrow-right"></i></a>
            </div>
            <div class="whyus__card">
                <div class="whyus__icon"><i class="fas fa-hand-holding-usd"></i></div>
                <p class="whyus__num">02. TỐI ƯU CHI PHÍ GỐC</p>
                <h3>Giá Tốt Tại Xưởng</h3>
                <p>Sản xuất trực tiếp tại xưởng gia đình, không qua trung gian mua bán, tiết kiệm từ 15 - 20% chi phí.</p>
                <a href="#lien-he">Báo giá tận xưởng <i class="fas fa-arrow-right"></i></a>
            </div>
            <div class="whyus__card">
                <div class="whyus__icon"><i class="fas fa-shield-alt"></i></div>
                <p class="whyus__num">03. VẬT LIỆU CHUẨN 100%</p>
                <h3>Cam Kết Chất Lượng</h3>
                <p>Sử dụng đúng chất liệu gỗ cam kết (gỗ tự nhiên, MDF chống ẩm An Cường...), bảo hành dài hạn.</p>
                <a href="#lien-he">Xem cam kết vật liệu <i class="fas fa-arrow-right"></i></a>
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
            <p class="tag">Danh Mục Thiết Kế &amp; Thi Công</p>
            <h2>Không Gian Trọng Điểm Tại Xưởng</h2>
        </div>
        <div class="spaces__grid">

            {{-- BIG LEFT: Bếp --}}
            <div class="space-card space-card--big">
                <div class="space-card__img">
                    <img src="https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?w=700&auto=format&fit=crop" alt="Thiết Kế & Thi Công Bếp Gia Đình">
                    <span class="space-card__chip">Phòng Bếp</span>
                </div>
                <div class="space-card__body">
                    <div class="space-card__row">
                        <h3>Thiết Kế &amp; Thi Công Bếp Gia Đình</h3>
                        <span class="space-card__price-badge">Từ 15.000.000 VNĐ</span>
                    </div>
                    <p>Tối ưu công năng tủ bếp theo thói quen nấu nướng, chất liệu chống ẩm, chống mối mọt vượt trội.</p>
                    <div class="space-card__foot">
                        <div class="space-card__tags">
                            <span>Chống ẩm vượt trội</span>
                            <span>May đo theo yêu cầu</span>
                        </div>
                        <a href="#lien-he" class="space-card__link">Tư vấn báo giá <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>

            {{-- RIGHT COLUMN: Phòng Khách & Phòng Ngủ --}}
            <div class="spaces__right">
                <div class="space-card space-card--sm">
                    <div class="space-card__img">
                        <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=600&auto=format&fit=crop" alt="Nội Thất Phòng Khách May Đo">
                        <span class="space-card__chip">Phòng Khách</span>
                    </div>
                    <div class="space-card__body">
                        <div class="space-card__row">
                            <h3>Nội Thất Phòng Khách May Đo</h3>
                            <span class="space-card__price-badge">Từ 8.500.000 VNĐ</span>
                        </div>
                        <p>Bàn ghế, kệ tivi, tủ trang trí thiết kế riêng vừa vặn từng cm diện tích thực tế.</p>
                        <a href="#lien-he" class="space-card__link">Tư vấn báo giá <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="space-card space-card--sm">
                    <div class="space-card__img">
                        <img src="https://images.unsplash.com/photo-1595526114035-0d45ed16cfbf?w=600&auto=format&fit=crop" alt="Nội Thất Phòng Ngủ & Tủ Quần Áo">
                        <span class="space-card__chip">Phòng Ngủ</span>
                    </div>
                    <div class="space-card__body">
                        <div class="space-card__row">
                            <h3>Nội Thất Phòng Ngủ &amp; Tủ Quần Áo</h3>
                            <span class="space-card__price-badge">Từ 10.500.000 VNĐ</span>
                        </div>
                        <p>Tủ áo kịch trần, giường ngủ thông minh tích hợp hộc kéo tối ưu diện tích.</p>
                        <a href="#lien-he" class="space-card__link">Tư vấn báo giá <i class="fas fa-arrow-right"></i></a>
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
                <span class="tab active">Tất cả</span>
                <span class="tab">Căn hộ / Chung cư</span>
                <span class="tab">Nhà phố / Biệt thự</span>
                <span class="tab">Phòng bếp</span>
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
                    <p>{{ Str::limit($project->description ?? 'Không gian sống được thiết kế tỉ mỉ, tối ưu hóa công năng và thẩm mỹ chuẩn xưởng.', 80) }}</p>
                    <span class="proj-card__cta">Xem ảnh thực tế <i class="fas fa-arrow-right"></i></span>
                </div>
            </a>
            @empty
            <p style="color:#888">Đang cập nhật dự án...</p>
            @endforelse
        </div>
        <div class="projects__more">
            <a href="/du-an" class="btn btn--outline">XEM THÊM CÁC DỰ ÁN KHÁC <i class="fas fa-arrow-right"></i></a>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════
     QUY TRÌNH  (dark bg)
════════════════════════════════ --}}
<section class="workflow" id="quy-trinh">
    <div class="container">
        <div class="workflow__head">
            <p class="tag tag--light">Quy Trình Làm Việc · Chuẩn Xưởng</p>
            <h2>Quy Trình Thi Công Chuẩn Xưởng</h2>
            <p>Minh bạch, chuẩn xác từ khâu khảo sát đến khi hoàn thiện bàn giao.</p>
        </div>
        <div class="workflow__grid">
            <div class="wf-step">
                <div class="wf-num">01</div>
                <span>Bước 1</span>
                <h4>Tư Vấn &amp; Khảo Sát Tận Nhà</h4>
                <p>Đo đạc thực tế, lắng nghe mong muốn và tư vấn chất liệu phù hợp.</p>
            </div>
            <div class="wf-step">
                <div class="wf-num">02</div>
                <span>Bước 2</span>
                <h4>Thiết Kế 3D &amp; Báo Giá Chi Tiết</h4>
                <p>Chỉnh sửa bản vẽ theo ý khách hàng, chốt vật liệu và dự toán ngân sách.</p>
            </div>
            <div class="wf-step">
                <div class="wf-num">03</div>
                <span>Bước 3</span>
                <h4>Chế Tác Tại Xưởng Mộc</h4>
                <p>Đóng thô, sơn PU/phủ melamine kĩ càng theo quy chuẩn.</p>
            </div>
            <div class="wf-step">
                <div class="wf-num">04</div>
                <span>Bước 4</span>
                <h4>Lắp Đặt &amp; Bàn Giao</h4>
                <p>Vận chuyển tận nơi, lắp đặt hoàn thiện và nghiệm thu cùng chủ nhà.</p>
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
                <p>Để lại thông tin, KTS và Đội ngũ xưởng mộc của chúng tôi sẽ liên hệ tư vấn ngay!</p>
                <ul class="contact__perks">
                    <li><i class="fas fa-check-circle"></i> <span>Khảo sát &amp; đo đạc tận nhà <strong>Miễn phí</strong></span></li>
                    <li><i class="fas fa-check-circle"></i> <span>Báo giá minh bạch – <strong>Không phát sinh chi phí</strong></span></li>
                    <li><i class="fas fa-check-circle"></i> <span>Bảo hành sản phẩm <strong>lên đến 05 năm</strong></span></li>
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
                            <label>Hạng mục cần làm</label>
                            <select name="category">
                                <option value="Tủ bếp">Tủ bếp</option>
                                <option value="Phòng khách">Phòng khách</option>
                                <option value="Phòng ngủ">Phòng ngủ</option>
                                <option value="Toàn bộ nhà">Toàn bộ nhà</option>
                            </select>
                        </div>
                        <div class="f-group">
                            <label>Ngân sách dự kiến</label>
                            <select name="budget">
                                <option value="Dưới 50 tr">Dưới 50 tr</option>
                                <option value="50 - 100 tr">50 - 100 tr</option>
                                <option value="Trên 100 tr">Trên 100 tr</option>
                            </select>
                        </div>
                    </div>
                    <div class="f-group">
                        <label>Nhu cầu chi tiết</label>
                        <textarea name="message" placeholder="Kích thước, chất liệu mong muốn..."></textarea>
                    </div>
                    <button type="submit" class="btn btn--primary btn--full">
                        GỬI YÊU CẦU BÁO GIÁ <i class="fas fa-paper-plane"></i>
                    </button>
                    <p class="form-note"><i class="fas fa-lock"></i> Thông tin của bạn được bảo mật tuyệt đối.</p>
                </form>
            </div>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════
     BẢN ĐỒ / GHÉ THĂM XƯỞNG
════════════════════════════════ --}}
<section class="mapblock">
    <div class="mapblock__inner">
        <div class="mapblock__info">
            <p class="tag">Kính Mời Ghé Thăm · B HOME</p>
            <h2>Kính Mời Quý Khách Ghé Thăm Xưởng Mộc</h2>
            <p>Hãy đến trực tiếp xưởng để kiểm tra chất lượng gỗ thô, tay nghề thợ và quy trình sản xuất thực tế trước khi đặt hàng.</p>
            <div class="mapblock__locs">
                <div class="mapblock__loc">
                    <i class="fas fa-map-marker-alt"></i>
                    <div>
                        <h4>Địa chỉ xưởng:</h4>
                        <p>182 Phố Hát, Hát Môn, Phúc Thọ, Hà Nội</p>
                    </div>
                </div>
                <div class="mapblock__loc">
                    <i class="fas fa-phone-alt"></i>
                    <div>
                        <h4>Hotline / Zalo:</h4>
                        <p><a href="tel:0988248868" style="color:inherit; font-weight:600;">0988.248.868</a> (hoặc 0900.244.800)</p>
                    </div>
                </div>
            </div>
            <a href="https://www.google.com/maps/dir/?api=1&destination=N%E1%BB%99i+th%E1%BA%A5t+B+Home,+182+Ph%E1%BB%91+H%C3%A1t,+H%C3%A1t+M%C3%B4n,+Ph%C3%BAc+Th%E1%BB%8D,+H%C3%A0+N%E1%BB%99i" target="_blank" rel="noopener" class="btn btn--primary">
                <i class="fas fa-directions"></i> CHỈ ĐƯỜNG ĐẾN XƯỞNG (GOOGLE MAPS)
            </a>
        </div>
        <div class="mapblock__map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3721.282904875323!2d105.61835697686884!3d21.13529678053424!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3134f9002548a25b%3A0xab53283d2b12e942!2zTuG7mWkgdGjhuqV0IEIgSG9tZQ!5e0!3m2!1svi!2svn!4v1792464963991!5m2!1svi!2svn"
                width="100%" height="100%" style="border:0" allowfullscreen loading="lazy"></iframe>
        </div>
    </div>
</section>

@endsection
