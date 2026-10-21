@extends('layouts.admin')

@section('content')
<div class="page-head">
    <div>
        <h2>Chỉnh Sửa Bài Viết</h2>
        <p>Cập nhật bài viết: <strong>{{ $post->title }}</strong></p>
    </div>
    <a href="{{ route('admin.posts.index') }}" class="btn-outline">
        <i class="fas fa-arrow-left"></i> Quay lại
    </a>
</div>

<div class="card-box">
    @include('admin.posts._form', ['post' => $post])
</div>
@endsection
