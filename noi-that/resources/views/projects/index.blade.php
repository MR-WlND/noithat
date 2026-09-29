@extends('layouts.app')

@section('content')
<section class="section bg-light" style="padding-top: 120px;">
    <div class="container">
        <div class="section-header text-center">
            <h1 class="section-title">Dự Án Đã Thi Công</h1>
            <p class="section-desc">Khám phá các công trình nội thất do MR.WIND thực hiện.</p>
        </div>
        
        <!-- Filter Categories -->
        <div class="filters text-center" style="margin-bottom: 40px;">
            <a href="{{ route('projects.index') }}" class="btn {{ !request('category') ? 'btn-primary' : 'btn-outline' }}" style="margin: 0 5px; color: {{ !request('category') ? '#fff' : '#333' }}; border-color: #ddd;">Tất Cả</a>
            @foreach($categories as $category)
                <a href="{{ route('projects.index', ['category' => $category->slug]) }}" class="btn {{ request('category') == $category->slug ? 'btn-primary' : 'btn-outline' }}" style="margin: 0 5px; color: {{ request('category') == $category->slug ? '#fff' : '#333' }}; border-color: #ddd;">
                    {{ $category->name }}
                </a>
            @endforeach
        </div>

        <!-- Project Grid -->
        <div class="projects-grid">
            @forelse($projects as $project)
            <div class="project-card">
                <div class="project-img">
                    <img src="{{ $project->cover_image }}" alt="{{ $project->title }}">
                    <div class="project-overlay">
                        <a href="/du-an/{{ $project->slug }}" class="btn btn-outline-light">Xem Chi Tiết</a>
                    </div>
                </div>
                <div class="project-info">
                    <span class="project-category">{{ $project->category->name }}</span>
                    <h3 class="project-title"><a href="/du-an/{{ $project->slug }}">{{ $project->title }}</a></h3>
                </div>
            </div>
            @empty
            <div class="text-center" style="grid-column: 1 / -1; padding: 50px;">
                <p>Chưa có dự án nào trong danh mục này.</p>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="pagination-wrapper" style="margin-top: 50px; text-align: center;">
            {{ $projects->appends(request()->query())->links() }}
        </div>
    </div>
</section>
@endsection
