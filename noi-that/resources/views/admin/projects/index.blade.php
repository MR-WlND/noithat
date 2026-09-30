@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Quản lý Dự án</h2>
    <a href="{{ route('admin.projects.create') }}" class="btn btn-primary"><i class="fas fa-plus me-1"></i> Thêm dự án mới</a>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="card shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="px-4 py-3">Ảnh đại diện</th>
                        <th class="px-4 py-3">Tiêu đề</th>
                        <th class="px-4 py-3">Chất liệu</th>
                        <th class="px-4 py-3">Ngày đăng</th>
                        <th class="px-4 py-3 text-end">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($projects as $project)
                    <tr>
                        <td class="px-4 py-3">
                            @if($project->cover_image)
                                <img src="{{ asset('storage/' . $project->cover_image) }}" alt="{{ $project->title }}" class="img-thumbnail" style="width: 80px; height: 60px; object-fit: cover;">
                            @else
                                <div class="bg-secondary text-white d-flex align-items-center justify-content-center img-thumbnail" style="width: 80px; height: 60px;">No Image</div>
                            @endif
                        </td>
                        <td class="px-4 py-3 fw-bold align-middle">{{ $project->title }}</td>
                        <td class="px-4 py-3 align-middle">{{ $project->material }}</td>
                        <td class="px-4 py-3 text-muted align-middle">{{ $project->created_at->format('d/m/Y') }}</td>
                        <td class="px-4 py-3 text-end align-middle">
                            <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-sm btn-outline-primary me-1" title="Sửa">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Bạn có chắc chắn muốn xóa dự án này?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Xóa">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-muted">Chưa có dự án nào.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($projects->hasPages())
    <div class="card-footer bg-white pt-3 border-top-0">
        {{ $projects->links() }}
    </div>
    @endif
</div>
@endsection
