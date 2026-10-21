@extends('layouts.app')

@section('content')
<section class="project-detail" style="padding-top: 100px;">
    <!-- Project Hero -->
    <div class="project-hero" style="background: url('{{ $project->cover_image_url }}') center/cover no-repeat; position: relative;">
        <div class="hero-overlay"></div>
        <div class="container">
            <span class="project-category">{{ $project->category->name }}</span>
            <h1 class="project-title">{{ $project->title }}</h1>
        </div>
    </div>

    <div class="container" style="padding: 60px 0;">
        <div class="project-content-wrapper">
            <!-- Left: Info -->
            <div class="project-info-sidebar">
                <h3>Thông Tin Dự Án</h3>
                
                <div class="info-item">
                    <strong><i class="fas fa-layer-group text-accent"></i> Hạng mục:</strong> {{ $project->category->name }}
                </div>
                <div class="info-item">
                    <strong><i class="fas fa-hammer text-accent"></i> Vật liệu:</strong> {{ $project->material ?? 'Đang cập nhật' }}
                </div>
                <div class="info-item">
                    <strong><i class="fas fa-paint-roller text-accent"></i> Phong cách:</strong> {{ $project->style ?? 'Đang cập nhật' }}
                </div>
                <hr style="border: 0; border-top: 1px solid #ddd; margin: 20px 0;">
                <h4>Mô tả:</h4>
                <p style="color: var(--muted); line-height: 1.8;">{{ $project->description }}</p>
                
                <a href="#lien-he" class="btn btn--primary btn--full" style="margin-top: 30px;">Nhận Báo Giá Tương Tự</a>
            </div>

            <!-- Right: Gallery -->
            <div class="project-gallery">
                <h3>Thư Viện Ảnh Thực Tế</h3>
                <div class="gallery-grid">
                    @foreach($project->images as $image)
                    <div class="gallery-item" onclick="openLightbox('{{ $image->image_url }}')">
                        <img src="{{ $image->image_url }}" alt="Ảnh thi công">
                    </div>
                    @endforeach
                </div>
                
                @if($project->images->count() == 0)
                <p>Đang cập nhật hình ảnh...</p>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Related Projects -->
@if($relatedProjects->count() > 0)
<section class="related-projects section bg-light">
    <div class="container">
        <h2 class="section-title text-center">Dự Án Tương Tự</h2>
        <div class="projects-grid">
            @foreach($relatedProjects as $related)
            <div class="project-card">
                <div class="project-img">
                    <img src="{{ $related->cover_image_url }}" alt="{{ $related->title }}">
                    <div class="project-overlay">
                        <a href="/du-an/{{ $related->slug }}" class="btn-outline-light">Xem Chi Tiết</a>
                    </div>
                </div>
                <div class="project-info">
                    <h3 class="project-title"><a href="/du-an/{{ $related->slug }}">{{ $related->title }}</a></h3>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Lightbox Modal -->
<div id="lightbox" class="lightbox" style="display: none;">
    <span class="close-lightbox" onclick="closeLightbox()">&times;</span>
    <img id="lightbox-img" src="">
</div>

<script>
    function openLightbox(src) {
        document.getElementById('lightbox').style.display = 'flex';
        document.getElementById('lightbox-img').src = src;
        document.body.style.overflow = 'hidden';
    }
    
    function closeLightbox() {
        document.getElementById('lightbox').style.display = 'none';
        document.body.style.overflow = 'auto';
    }

    // Close on Escape key or clicking outside image
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') closeLightbox();
    });
    document.getElementById('lightbox').addEventListener('click', function(e) {
        if (e.target === this) closeLightbox();
    });
</script>
@endsection
