@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Thêm Dự án mới</h2>
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

        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-3">
                <label for="title" class="form-label">Tiêu đề dự án <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
            </div>

            <div class="mb-3">
                <label for="category_id" class="form-label">Danh mục <span class="text-danger">*</span></label>
                <select class="form-select" id="category_id" name="category_id" required>
                    <option value="">-- Chọn danh mục --</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="material" class="form-label">Chất liệu</label>
                <input type="text" class="form-control" id="material" name="material" value="{{ old('material') }}" placeholder="VD: Gỗ công nghiệp, Gỗ tự nhiên...">
            </div>

            <div class="mb-3">
                <label for="cover_image" class="form-label">Ảnh đại diện <span class="text-danger">*</span></label>
                <input class="form-control" type="file" id="cover_image" name="cover_image" accept="image/*" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Mô tả dự án</label>
                <textarea class="form-control" id="description" name="description" rows="5">{{ old('description') }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary"><i class="fas fa-save me-1"></i> Lưu dự án</button>
        </form>
    </div>
</div>
@endsection
