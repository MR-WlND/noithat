@extends('layouts.admin')

@section('content')
<div class="page-head">
    <div>
        <h2>Chỉnh sửa Dự án</h2>
        <p>Cập nhật thông tin dự án: <strong>{{ $project->title }}</strong></p>
    </div>
    <a href="{{ route('admin.projects.index') }}" class="btn-outline">
        <i class="fas fa-arrow-left"></i> Quay lại
    </a>
</div>

<div class="card-box">
    @if ($errors->any())
        <div style="background:#fff5f5; border:1px solid #fecaca; border-radius:8px; padding:14px 18px; margin-bottom:20px; color:#dc2626; font-size:0.88rem;">
            <ul style="margin:0; padding-left:18px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="f-row">
            <div class="fg">
                <label for="title">Tiêu đề dự án <span style="color:#e53e3e;">*</span></label>
                <input type="text" id="title" name="title"
                       value="{{ old('title', $project->title) }}" required>
            </div>
            <div class="fg">
                <label for="category_id">Danh mục <span style="color:#e53e3e;">*</span></label>
                <select id="category_id" name="category_id"
                        style="padding:11px 14px; border:1px solid #ded6cc; border-radius:6px; font-size:0.9rem; background:#faf8f5; color:#333; outline:none;" required>
                    <option value="">-- Chọn danh mục --</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                                {{ old('category_id', $project->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="f-row">
            <div class="fg">
                <label for="material">Chất liệu</label>
                <input type="text" id="material" name="material"
                       value="{{ old('material', $project->material) }}"
                       placeholder="VD: Gỗ công nghiệp MDF...">
            </div>
            <div class="fg">
                <label for="style">Phong cách</label>
                <input type="text" id="style" name="style"
                       value="{{ old('style', $project->style) }}"
                       placeholder="VD: Hiện đại, Tân cổ điển...">
            </div>
        </div>

        <div class="fg">
            <label for="cover_image">Ảnh đại diện</label>
            @if($project->cover_image)
                @php
                    $currentImg = str_starts_with($project->cover_image, 'http')
                        ? $project->cover_image
                        : asset('storage/' . $project->cover_image);
                @endphp
                <div style="margin-bottom:10px;">
                    <img src="{{ $currentImg }}" alt="{{ $project->title }}"
                         style="height:120px; border-radius:8px; object-fit:cover; border:1px solid #e8dfd5;">
                    <p style="font-size:0.78rem; color:#999; margin-top:6px;">Ảnh hiện tại. Chọn file mới bên dưới để thay thế.</p>
                </div>
            @endif
            <input type="file" id="cover_image" name="cover_image" accept="image/*"
                   style="padding:11px 14px; border:1px solid #ded6cc; border-radius:6px; font-size:0.9rem; background:#faf8f5;">
        </div>

        <div class="fg">
            <label for="description">Mô tả dự án</label>
            <textarea id="description" name="description" rows="5">{{ old('description', $project->description) }}</textarea>
        </div>

        <div style="display:flex; align-items:center; gap:8px; margin-top:4px;">
            <label style="display:flex; align-items:center; gap:8px; font-size:0.9rem; color:#555; cursor:pointer;">
                <input type="checkbox" name="is_featured" value="1"
                       {{ old('is_featured', $project->is_featured) ? 'checked' : '' }}
                       style="width:16px; height:16px; accent-color:var(--brown);">
                Hiển thị nổi bật trên trang chủ
            </label>
        </div>

        <div style="margin-top:24px; padding-top:20px; border-top:1px solid #f0eae1; display:flex; gap:12px;">
            <button type="submit" class="btn-primary">
                <i class="fas fa-save"></i> Cập nhật dự án
            </button>
            <a href="{{ route('admin.projects.index') }}" class="btn-outline">Hủy</a>
        </div>
    </form>
</div>
@endsection
