@extends('layouts.admin')

@section('content')
<div class="page-head dashboard-page-head">
    <div>
        <h2>Tổng quan</h2>
        <p>Theo dõi nhanh hoạt động nội dung và khách hàng của B HOME.</p>
    </div>
    <span class="dashboard-date"><i class="far fa-calendar-alt"></i> {{ now()->format('d/m/Y') }}</span>
</div>

<section class="dashboard-welcome" aria-label="Xin chào">
    <div>
        <span class="dashboard-eyebrow">B HOME INTERIOR</span>
        <h3>Xin chào, {{ auth()->user()->name }}</h3>
        <p>
            @if($newContactCount > 0)
                Bạn có <strong>{{ number_format($newContactCount) }} yêu cầu</strong> đang chờ liên hệ.
            @else
                Hiện không có yêu cầu tư vấn nào đang chờ xử lý.
            @endif
        </p>
    </div>
    <a href="{{ route('admin.inquiries.index') }}" class="dashboard-primary-action">
        Xem yêu cầu tư vấn <i class="fas fa-arrow-right"></i>
    </a>
</section>

<section class="dashboard-stats" aria-label="Số liệu tổng quan">
    <a href="{{ route('admin.projects.index') }}" class="dashboard-stat">
        <span class="dashboard-stat-icon dashboard-stat-icon--brown"><i class="fas fa-building"></i></span>
        <span class="dashboard-stat-label">Dự án</span>
        <strong>{{ number_format($projectCount) }}</strong>
        <span class="dashboard-stat-note">Tổng số dự án <i class="fas fa-arrow-up-right-from-square"></i></span>
    </a>
    <a href="{{ route('admin.inquiries.index') }}" class="dashboard-stat">
        <span class="dashboard-stat-icon dashboard-stat-icon--green"><i class="fas fa-inbox"></i></span>
        <span class="dashboard-stat-label">Yêu cầu tư vấn</span>
        <strong>{{ number_format($contactCount) }}</strong>
        <span class="dashboard-stat-note">{{ number_format($newContactCount) }} đang chờ liên hệ</span>
    </a>
    <a href="{{ route('admin.posts.index') }}" class="dashboard-stat">
        <span class="dashboard-stat-icon dashboard-stat-icon--blue"><i class="far fa-newspaper"></i></span>
        <span class="dashboard-stat-label">Bài viết đã xuất bản</span>
        <strong>{{ number_format($publishedPostCount) }}</strong>
        <span class="dashboard-stat-note">Đang hiển thị trên website</span>
    </a>
</section>

<div class="dashboard-panels">
    <section class="dashboard-panel">
        <header class="dashboard-panel-header">
            <div>
                <h3>Dự án mới cập nhật</h3>
                <p>Những dự án được thêm gần đây</p>
            </div>
            <a href="{{ route('admin.projects.index') }}" class="dashboard-text-link">Tất cả dự án <i class="fas fa-arrow-right"></i></a>
        </header>
        @if($recentProjects->isNotEmpty())
            <div class="dashboard-project-list">
                @foreach($recentProjects as $project)
                    <a href="{{ route('admin.projects.edit', $project) }}" class="dashboard-project">
                        <span class="dashboard-project-thumb">
                            @if($project->cover_image)
                                <img src="{{ $project->cover_image_url }}" alt="" loading="lazy">
                            @else
                                <i class="far fa-image"></i>
                            @endif
                        </span>
                        <span class="dashboard-project-info">
                            <strong>{{ $project->title }}</strong>
                            <small>{{ $project->category?->name ?? 'Chưa phân loại' }}@if($project->style) &middot; {{ $project->style }}@endif</small>
                        </span>
                        <time datetime="{{ $project->created_at->toIso8601String() }}">{{ $project->created_at->diffForHumans() }}</time>
                        <i class="fas fa-chevron-right dashboard-chevron"></i>
                    </a>
                @endforeach
            </div>
        @else
            <div class="dashboard-empty">
                <i class="far fa-folder-open"></i>
                <strong>Chưa có dự án nào</strong>
                <span>Các dự án mới sẽ được hiển thị tại đây.</span>
            </div>
        @endif
    </section>

    <section class="dashboard-panel">
        <header class="dashboard-panel-header">
            <div>
                <h3>Liên hệ gần đây</h3>
                <p>Thông tin khách hàng gửi từ website</p>
            </div>
            <a href="{{ route('admin.inquiries.index') }}" class="dashboard-text-link">Tất cả yêu cầu <i class="fas fa-arrow-right"></i></a>
        </header>
        @if($recentContacts->isNotEmpty())
            <div class="dashboard-contact-list">
                @foreach($recentContacts as $contact)
                    <article class="dashboard-contact">
                        <span class="dashboard-contact-avatar">{{ mb_strtoupper(mb_substr($contact->name, 0, 1)) }}</span>
                        <div class="dashboard-contact-info">
                            <strong>{{ $contact->name }}</strong>
                            <a href="tel:{{ $contact->phone }}">{{ $contact->phone }}</a>
                            <p>{{ \Illuminate\Support\Str::limit($contact->message, 96) }}</p>
                            <time datetime="{{ $contact->created_at->toIso8601String() }}">{{ $contact->created_at->diffForHumans() }}</time>
                        </div>
                    </article>
                @endforeach
            </div>
        @else
            <div class="dashboard-empty">
                <i class="far fa-comment-dots"></i>
                <strong>Chưa có liên hệ mới</strong>
                <span>Khi khách gửi biểu mẫu, thông tin sẽ xuất hiện tại đây.</span>
            </div>
        @endif
    </section>
</div>
@endsection
