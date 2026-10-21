@extends('layouts.admin')

@section('content')
<div class="page-head">
    <div>
        <h2>Thêm Dự án mới</h2>
        <p>Điền thông tin dự án nội thất</p>
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

    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="f-row">
            <div class="fg">
                <label for="title">Tiêu đề dự án <span style="color:#e53e3e;">*</span></label>
                <input type="text" id="title" name="title"
                       value="{{ old('title') }}"
                       placeholder="VD: Căn hộ Vinhomes - Anh Tuấn" required>
            </div>
            <div class="fg">
                <label for="category_id">Danh mục <span style="color:#e53e3e;">*</span></label>
                <select id="category_id" name="category_id"
                        style="padding:11px 14px; border:1px solid #ded6cc; border-radius:6px; font-size:0.9rem; background:#faf8f5; color:#333; outline:none;" required>
                    <option value="">-- Chọn danh mục --</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
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
                       value="{{ old('material') }}"
                       placeholder="VD: Gỗ công nghiệp MDF, Gỗ tự nhiên...">
            </div>
            <div class="fg">
                <label for="style">Phong cách</label>
                <input type="text" id="style" name="style"
                       value="{{ old('style') }}"
                       placeholder="VD: Hiện đại, Tân cổ điển...">
            </div>
        </div>

        <div class="fg">
            <label for="cover_image">Ảnh đại diện <span style="color:#e53e3e;">*</span></label>
            <input type="file" id="cover_image" name="cover_image" accept="image/*"
                   style="padding:11px 14px; border:1px solid #ded6cc; border-radius:6px; font-size:0.9rem; background:#faf8f5;" required>
        </div>

        <div class="fg">
            <label for="gallery_images">Ảnh thư viện dự án</label>
            <input type="file" id="gallery_images" name="gallery_images[]" accept="image/jpeg,image/png,image/gif,image/webp"
                   style="padding:11px 14px; border:1px solid #ded6cc; border-radius:6px; font-size:0.9rem; background:#faf8f5;"
                   multiple>
            <small style="display:block; margin-top:6px; color:#777;">Có thể chọn tối đa 20 ảnh, mỗi ảnh không quá 2 MB.</small>
        </div>

        <div class="fg">
            <label for="description">Mô tả dự án</label>
            <textarea id="description" name="description" rows="5"
                      placeholder="Mô tả chi tiết về dự án...">{{ old('description') }}</textarea>
        </div>

        <div style="display:flex; align-items:center; gap:12px; margin-top:8px;">
            <label style="display:flex; align-items:center; gap:8px; font-size:0.9rem; color:#555; cursor:pointer;">
                <input type="checkbox" name="is_featured" value="1"
                       {{ old('is_featured') ? 'checked' : '' }}
                       style="width:16px; height:16px; accent-color:var(--brown);">
                Hiển thị nổi bật trên trang chủ
            </label>
        </div>

        <div style="margin-top:24px; padding-top:20px; border-top:1px solid #f0eae1; display:flex; gap:12px;">
            <button type="submit" class="btn-primary">
                <i class="fas fa-save"></i> Lưu dự án
            </button>
            <a href="{{ route('admin.projects.index') }}" class="btn-outline">Hủy</a>
        </div>
    </form>
</div>
@endsection
