@extends('layouts.admin')

@section('content')
<div class="page-head">
    <div>
        <h2>Quản Lý Bài Viết &amp; SEO Content</h2>
        <p>Đăng tải các bài viết chia sẻ kinh nghiệm chọn gỗ, cẩm nang đóng mộc, mẫu thiết kế để kéo traffic chuẩn SEO Google.</p>
    </div>
    <button class="btn-primary" onclick="alert('Mở trình soạn thảo bài viết mới chuẩn SEO.')">
        <i class="fas fa-feather-alt"></i> Viết Bài Viết Mới
    </button>
</div>

@if(session('success'))
<div style="background:#ecfdf5; color:#065f46; border-left:4px solid #10b981; padding:12px 18px; border-radius:6px; margin-bottom:24px; font-size:0.9rem;">
    <i class="fas fa-check-circle"></i> {{ session('success') }}
</div>
@endif

<!-- Stats -->
<div class="post-stats">
    <div class="p-stat-box">
        <h6>Tổng Bài Viết</h6>
        <div class="p-stat-val">{{ count($posts) }} <span style="font-size:0.8rem; color:#888;">bài</span></div>
    </div>
    <div class="p-stat-box">
        <h6>Lượt Đọc Bài Viết</h6>
        <div class="p-stat-val" style="color:var(--brown-dark);">5,590 <span style="font-size:0.8rem; color:#888;">views</span></div>
    </div>
    <div class="p-stat-box">
        <h6>Điểm SEO Trung Bình</h6>
        <div class="p-stat-val" style="color:#059669;">89/100</div>
    </div>
    <div class="p-stat-box">
        <h6>Đã Xuất Bản</h6>
        <div class="p-stat-val" style="color:#059669;">3 <span style="font-size:0.8rem; color:#888;">public</span></div>
    </div>
</div>

<!-- Table -->
<div class="table-card">
    <div class="table-header-bar">
        <div class="table-title">
            <i class="fas fa-newspaper" style="color:var(--brown);"></i> Danh Sách Bài Viết Blog &amp; Tin Tức
        </div>
        <div>
            <input type="text" placeholder="Tìm tiêu đề, từ khóa SEO..." style="padding:7px 12px; border:1px solid #ded6cc; border-radius:6px; font-size:0.85rem; background:#faf8f5;">
        </div>
    </div>
    <div style="overflow-x:auto;">
        <table class="custom-table">
            <thead>
                <tr>
                    <th>Tiêu Đề &amp; Slug SEO</th>
                    <th>Chuyên Mục</th>
                    <th>Điểm SEO</th>
                    <th>Lượt Xem</th>
                    <th>Người Đăng</th>
                    <th>Trạng Thái</th>
                    <th style="text-align:right;">Thao Tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr>
                    <td>
                        <div class="post-cell">
                            <img src="{{ $post['image'] }}" alt="{{ $post['title'] }}" class="post-thumb">
                            <div class="post-meta">
                                <h5>{{ $post['title'] }}</h5>
                                <span>/bai-viet/{{ $post['slug'] }}</span>
                            </div>
                        </div>
                    </td>
                    <td><span class="badge-cat">{{ $post['category'] }}</span></td>
                    <td>
                        <span class="seo-score {{ $post['seo_class'] }}">
                            <i class="fas fa-chart-line"></i> {{ $post['seo_score'] }}%
                        </span>
                    </td>
                    <td style="font-weight:600; color:#444;">{{ number_format($post['views']) }}</td>
                    <td style="font-size:0.85rem; color:#666;">{{ $post['author'] }}</td>
                    <td>
                        <span class="badge-status {{ $post['status_class'] }}">
                            <i class="fas fa-circle" style="font-size:6px;"></i> {{ $post['status'] }}
                        </span>
                    </td>
                    <td style="text-align:right;">
                        <button class="action-btn" title="Chỉnh sửa"><i class="fas fa-edit"></i></button>
                        <form action="{{ route('admin.posts.destroy', $post['id']) }}" method="POST" style="display:inline;" onsubmit="return confirm('Bạn có chắc muốn xóa bài viết này?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="action-btn" title="Xóa"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
