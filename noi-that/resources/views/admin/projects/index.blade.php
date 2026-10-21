@extends('layouts.admin')

@section('content')
<div class="page-head">
    <div>
        <h2>Quản lý Dự án</h2>
        <p>Danh sách tất cả dự án nội thất</p>
    </div>
    <a href="{{ route('admin.projects.create') }}" class="btn-primary">
        <i class="fas fa-plus"></i> Thêm dự án mới
    </a>
</div>

@include('admin.partials.alerts')

<div class="table-card">
    <div class="table-header-bar">
        <div class="table-title">
            <i class="fas fa-layer-group" style="color: var(--brown);"></i>
            Dự án nội thất <span class="tag" style="margin-left:8px;">{{ $projects->total() }} dự án</span>
        </div>
    </div>

    <table class="custom-table">
        <thead>
            <tr>
                <th style="width:90px;">Ảnh</th>
                <th>Tiêu đề</th>
                <th>Danh mục</th>
                <th>Chất liệu</th>
                <th>Ngày đăng</th>
                <th style="text-align:right;">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @forelse($projects as $project)
            <tr>
                <td>
                    @php
                        $imgSrc = $project->cover_image
                            ? (str_starts_with($project->cover_image, 'http')
                                ? $project->cover_image
                                : asset('storage/' . $project->cover_image))
                            : null;
                    @endphp
                    @if($imgSrc)
                        <img src="{{ $imgSrc }}" alt="{{ $project->title }}"
                             style="width:72px; height:54px; object-fit:cover; border-radius:6px; border:1px solid #e8dfd5;">
                    @else
                        <div style="width:72px; height:54px; background:#f5f0eb; border-radius:6px; display:flex; align-items:center; justify-content:center; color:#bbb; font-size:0.75rem;">
                            No img
                        </div>
                    @endif
                </td>
                <td>
                    <div class="project-info">
                        <h4>{{ $project->title }}</h4>
                        @if($project->style)
                            <p>{{ $project->style }}</p>
                        @endif
                    </div>
                </td>
                <td>
                    @if($project->category)
                        <span class="tag">{{ $project->category->name }}</span>
                    @else
                        <span style="color:#bbb;">—</span>
                    @endif
                </td>
                <td style="color:#666; font-size:0.88rem;">{{ $project->material ?? '—' }}</td>
                <td style="color:#999; font-size:0.85rem;">{{ $project->created_at->format('d/m/Y') }}</td>
                <td style="text-align:right; white-space:nowrap;">
                    <a href="{{ route('admin.projects.edit', $project->id) }}" class="action-btn" title="Sửa">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST"
                          style="display:inline;"
                          onsubmit="return confirm('Bạn có chắc chắn muốn xóa dự án này?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="action-btn" title="Xóa"
                                style="color:#e53e3e; cursor:pointer; background:white; border:1px solid #ded6cc;">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" style="text-align:center; padding:40px; color:#999;">
                    <i class="fas fa-inbox" style="font-size:2rem; margin-bottom:10px; display:block; color:#ddd;"></i>
                    Chưa có dự án nào.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

    @if($projects->hasPages())
    <div style="padding: 16px 24px; border-top: 1px solid #f0eae1;">
        {{ $projects->links() }}
    </div>
    @endif
</div>
@endsection
