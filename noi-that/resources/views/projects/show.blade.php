@extends('layouts.app')

@section('content')
<section class="project-detail" style="padding-top: 100px;">
    <!-- Project Hero -->
    <div class="project-hero" style="background: url('{{ $project->cover_image }}') center/cover no-repeat; height: 50vh; position: relative;">
        <div class="hero-overlay" style="position: absolute; top:0; left:0; width:100%; height:100%; background: rgba(0,0,0,0.6);"></div>
        <div class="container" style="position: relative; z-index: 1; height: 100%; display: flex; flex-direction: column; justify-content: center; align-items: center; text-align: center; color: #fff;">
            <span class="project-category" style="color: var(--primary); font-weight: bold; text-transform: uppercase; letter-spacing: 2px; margin-bottom: 10px;">{{ $project->category->name }}</span>
            <h1 class="project-title" style="font-size: 3rem; max-width: 800px;">{{ $project->title }}</h1>
        </div>
    </div>

    <div class="container" style="padding: 60px 0;">
        <div class="project-content-wrapper" style="display: flex; gap: 40px; flex-wrap: wrap;">
            <!-- Left: Info -->
            <div class="project-info-sidebar" style="flex: 1; min-width: 300px; background: var(--bg-light); padding: 40px; border-radius: 8px;">
                <h3 style="margin-bottom: 20px; font-size: 1.5rem; border-bottom: 2px solid var(--primary); padding-bottom: 10px; display: inline-block;">Thông Tin Dự Án</h3>
                
                <div class="info-item" style="margin-bottom: 15px;">
                    <strong><i class="fas fa-layer-group text-accent"></i> Hạng mục:</strong> {{ $project->category->name }}
                </div>
                <div class="info-item" style="margin-bottom: 15px;">
                    <strong><i class="fas fa-hammer text-accent"></i> Vật liệu:</strong> {{ $project->material ?? 'Đang cập nhật' }}
                </div>
                <div class="info-item" style="margin-bottom: 15px;">
                    <strong><i class="fas fa-paint-roller text-accent"></i> Phong cách:</strong> {{ $project->style ?? 'Đang cập nhật' }}
                </div>
                <hr style="border: 0; border-top: 1px solid #ddd; margin: 20px 0;">
                <h4 style="margin-bottom: 10px;">Mô tả:</h4>
                <p style="color: var(--text-muted); line-height: 1.8;">{{ $project->description }}</p>
                
                <a href="#lien-he" class="btn btn-primary btn-block" style="margin-top: 30px;">Nhận Báo Giá Tương Tự</a>
            </div>

            <!-- Right: Gallery -->
            <div class="project-gallery" style="flex: 2; min-width: 500px;">
                <h3 style="margin-bottom: 20px; font-size: 1.5rem;">Thư Viện Ảnh Thực Tế</h3>
                <div class="gallery-grid" style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px;">
                    @foreach($project->images as $image)
                    <div class="gallery-item" style="border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.1); cursor: pointer;" onclick="openLightbox('{{ $image->image_path }}')">
                        <img src="{{ $image->image_path }}" alt="Ảnh thi công" style="width: 100%; height: 300px; object-fit: cover; transition: transform 0.5s ease;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
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
        <h2 class="section-title text-center" style="margin-bottom: 40px;">Dự Án Tương Tự</h2>
        <div class="projects-grid" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 30px;">
            @foreach($relatedProjects as $related)
            <div class="project-card" style="background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 5px 20px rgba(0,0,0,0.05);">
                <div class="project-img" style="position: relative; height: 250px; overflow: hidden;">
                    <img src="{{ $related->cover_image }}" alt="{{ $related->title }}" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <div class="project-info" style="padding: 20px;">
                    <h3 class="project-title" style="font-size: 1.2rem;"><a href="/du-an/{{ $related->slug }}">{{ $related->title }}</a></h3>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Lightbox Modal -->
<div id="lightbox" class="lightbox" style="display: none; position: fixed; z-index: 2000; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.9); justify-content: center; align-items: center;">
    <span class="close-lightbox" style="position: absolute; top: 20px; right: 40px; color: #fff; font-size: 40px; cursor: pointer; transition: 0.3s;" onclick="closeLightbox()">&times;</span>
    <img id="lightbox-img" src="" style="max-width: 90%; max-height: 90%; border-radius: 4px; box-shadow: 0 0 20px rgba(0,0,0,0.5);">
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
</script>
@endsection
