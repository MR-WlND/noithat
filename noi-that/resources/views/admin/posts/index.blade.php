@extends('layouts.admin')

@section('content')
<div class="page-head">
    <div>
        <h2>Quản Lý Bài Viết &amp; SEO Content</h2>
        <p>Quản lý bài viết, nội dung và trạng thái xuất bản trên website.</p>
    </div>
    <a href="{{ route('admin.posts.create') }}" class="btn-primary">
        <i class="fas fa-feather-alt"></i> Viết Bài Viết Mới
    </a>
</div>

<div class="post-stats">
    <div class="p-stat-box">
        <h6>Tổng Bài Viết</h6>
        <div class="p-stat-val">{{ number_format($totalPosts) }} <span style="font-size:0.8rem; color:#888;">bài</span></div>
    </div>
    <div class="p-stat-box">
        <h6>Đã Xuất Bản</h6>
        <div class="p-stat-val" style="color:#059669;">{{ number_format($publishedPosts) }}</div>
    </div>
    <div class="p-stat-box">
        <h6>Bản Nháp</h6>
        <div class="p-stat-val" style="color:#888;">{{ number_format($draftPosts) }}</div>
    </div>
</div>

<div class="table-card">
    <div class="table-header-bar">
        <div class="table-title">
            <i class="fas fa-newspaper" style="color:var(--brown);"></i> Danh Sách Bài Viết Blog &amp; Tin Tức
        </div>
        <form action="{{ route('admin.posts.index') }}" method="GET">
            <input type="search" name="search" value="{{ $search }}" placeholder="Tìm bài viết..." aria-label="Tìm bài viết"
                   style="padding:7px 12px; border:1px solid #ded6cc; border-radius:6px; font-size:0.85rem; background:#faf8f5;">
        </form>
    </div>
    <div style="overflow-x:auto;">
        <table class="custom-table">
            <thead>
                <tr>
                    <th>Tiêu Đề &amp; Slug SEO</th>
                    <th>Chuyên Mục</th>
                    <th>Trạng Thái</th>
                    <th>Ngày Đăng</th>
                    <th style="text-align:right;">Thao Tác</th>
                </tr>
            </thead>
            <tbody>
                @forelse($posts as $post)
                @php
                    $thumbnail = $post->thumbnail
                        ? (str_starts_with($post->thumbnail, 'http')
                            ? $post->thumbnail
                            : asset('storage/' . $post->thumbnail))
                        : 'https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?w=400&auto=format&fit=crop';
                @endphp
                <tr>
                    <td>
                        <div class="post-cell">
                            <img src="{{ $thumbnail }}" alt="{{ $post->title }}" class="post-thumb">
                            <div class="post-meta">
                                <h5>{{ $post->title }}</h5>
                                <span>/bai-viet/{{ $post->slug }}</span>
                            </div>
                        </div>
                    </td>
                    <td><span class="badge-cat">{{ $post->category ?: 'Chưa phân loại' }}</span></td>
                    <td>
                        <span class="badge-status {{ $post->is_published ? 'success' : 'secondary' }}">
                            <i class="fas fa-circle" style="font-size:6px;"></i>
                            {{ $post->is_published ? 'Đã xuất bản' : 'Bản nháp' }}
                        </span>
                    </td>
                    <td style="font-size:0.85rem; color:#666;">
                        {{ $post->published_at?->format('d/m/Y') ?? 'Chưa xuất bản' }}
                    </td>
                    <td style="text-align:right; white-space:nowrap;">
                        <a href="{{ route('admin.posts.edit', $post) }}" class="action-btn" title="Chỉnh sửa" aria-label="Chỉnh sửa bài viết">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" style="display:inline;"
                              onsubmit="return confirm('Bạn có chắc muốn xóa bài viết này?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="action-btn" title="Xóa" aria-label="Xóa bài viết">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" style="text-align:center; padding:40px; color:#999;">
                        {{ $search !== '' ? 'Không tìm thấy bài viết phù hợp.' : 'Chưa có bài viết nào.' }}
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($posts->hasPages())
    <div style="padding:16px 24px; border-top:1px solid #f0eae1;">
        {{ $posts->links() }}
    </div>
    @endif
</div>
@endsection
