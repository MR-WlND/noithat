<form action="{{ $post ? route('admin.posts.update', $post) : route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($post)
        @method('PUT')
    @endif

    <div class="f-row">
        <div class="fg">
            <label for="title">Tiêu đề bài viết <span style="color:#e53e3e;">*</span></label>
            <input type="text" id="title" name="title" value="{{ old('title', $post?->title) }}" required maxlength="255">
        </div>
        <div class="fg">
            <label for="slug">Slug SEO</label>
            <input type="text" id="slug" name="slug" value="{{ old('slug', $post?->slug) }}" maxlength="255"
                   placeholder="Tự tạo từ tiêu đề nếu để trống">
        </div>
    </div>

    <div class="f-row">
        <div class="fg">
            <label for="category">Chuyên mục</label>
            <input type="text" id="category" name="category" value="{{ old('category', $post?->category) }}" maxlength="255">
        </div>
        <div class="fg">
            <label for="read_time">Thời gian đọc</label>
            <input type="text" id="read_time" name="read_time" value="{{ old('read_time', $post?->read_time) }}"
                   placeholder="Ví dụ: 5 phút đọc" maxlength="255">
        </div>
    </div>

    <div class="fg">
        <label for="thumbnail_file">Tải file ảnh đại diện</label>
        @if($post?->thumbnail)
            @php
                $thumbnailUrl = $post->thumbnail_url;
            @endphp
            <div style="margin-bottom:10px;">
                <img src="{{ $thumbnailUrl }}" alt="{{ $post->title }}"
                     style="max-width:180px; max-height:120px; border-radius:8px; object-fit:cover; border:1px solid #e8dfd5;">
            </div>
        @endif
        <input type="file" id="thumbnail_file" name="thumbnail_file" accept="image/jpeg,image/png,image/gif,image/webp"
               style="padding:11px 14px; border:1px solid #ded6cc; border-radius:6px; font-size:0.9rem; background:#faf8f5;">
        <small style="display:block; margin-top:6px; color:#777;">Chọn ảnh JPG, PNG, GIF hoặc WebP, tối đa 5 MB. Tải ảnh mới sẽ thay ảnh hiện tại.</small>
        @error('thumbnail_file')
            <small style="display:block; margin-top:6px; color:#dc2626;">{{ $message }}</small>
        @enderror
    </div>

    <div class="fg">
        <label for="thumbnail">Hoặc dùng URL / đường dẫn ảnh hiện có</label>
        <input type="text" id="thumbnail" name="thumbnail" value="{{ old('thumbnail', $post?->thumbnail) }}"
               placeholder="https://... hoặc posts/anh-bai-viet.jpg" maxlength="2048">
    </div>

    <div class="fg">
        <label for="excerpt">Mô tả ngắn</label>
        <textarea id="excerpt" name="excerpt" rows="3" maxlength="1000">{{ old('excerpt', $post?->excerpt) }}</textarea>
    </div>

    <div class="fg">
        <label for="content">Nội dung bài viết</label>
        <textarea id="content" name="content" rows="14">{{ old('content', $post?->content) }}</textarea>
    </div>

    <div style="display:flex; align-items:center; gap:8px; margin-top:4px;">
        <label style="display:flex; align-items:center; gap:8px; font-size:0.9rem; color:#555; cursor:pointer;">
            <input type="checkbox" name="is_published" value="1"
                   {{ old('is_published', $post?->is_published ?? true) ? 'checked' : '' }}
                   style="width:16px; height:16px; accent-color:var(--brown);">
            Xuất bản bài viết
        </label>
    </div>

    <div style="margin-top:24px; padding-top:20px; border-top:1px solid #f0eae1; display:flex; gap:12px;">
        <button type="submit" class="btn-primary">
            <i class="fas fa-save"></i> {{ $post ? 'Lưu thay đổi' : 'Tạo bài viết' }}
        </button>
        <a href="{{ route('admin.posts.index') }}" class="btn-outline">Hủy</a>
    </div>
</form>
