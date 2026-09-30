@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Chỉnh sửa Dự án</h2>
    <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left me-1"></i> Quay lại</a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label for="title" class="form-label">Tiêu đề dự án <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $project->title) }}" required>
            </div>

            <div class="mb-3">
                <label for="category_id" class="form-label">Danh mục <span class="text-danger">*</span></label>
                <select class="form-select" id="category_id" name="category_id" required>
                    <option value="">-- Chọn danh mục --</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $project->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="material" class="form-label">Chất liệu</label>
                <input type="text" class="form-control" id="material" name="material" value="{{ old('material', $project->material) }}" placeholder="VD: Gỗ công nghiệp, Gỗ tự nhiên...">
            </div>

            <div class="mb-3">
                <label for="cover_image" class="form-label">Ảnh đại diện</label>
                @if($project->cover_image)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $project->cover_image) }}" alt="{{ $project->title }}" class="img-thumbnail" style="height: 150px; object-fit: cover;">
                    </div>
                @endif
                <input class="form-control" type="file" id="cover_image" name="cover_image" accept="image/*">
                <div class="form-text">Để trống nếu không muốn thay đổi ảnh đại diện.</div>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Mô tả dự án</label>
                <textarea class="form-control" id="description" name="description" rows="5">{{ old('description', $project->description) }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary"><i class="fas fa-save me-1"></i> Cập nhật dự án</button>
        </form>
    </div>
</div>
@endsection
