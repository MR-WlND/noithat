@extends('layouts.admin')

@section('content')
<div class="page-head">
    <div>
        <h2>Viết Bài Viết Mới</h2>
        <p>Tạo bài viết mới cho website B HOME.</p>
    </div>
    <a href="{{ route('admin.posts.index') }}" class="btn-outline">
        <i class="fas fa-arrow-left"></i> Quay lại
    </a>
</div>

<div class="card-box">
    @include('admin.posts._form', ['post' => null])
</div>
@endsection
