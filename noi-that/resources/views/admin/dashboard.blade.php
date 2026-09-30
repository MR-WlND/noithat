@extends('layouts.admin')

@section('content')
<h2 class="mb-4">Tổng quan</h2>

<div class="row">
    <div class="col-md-6 mb-4">
        <div class="card bg-primary text-white h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title text-uppercase mb-2">Tổng số dự án</h6>
                        <h2 class="display-4 mb-0">{{ $projectCount }}</h2>
                    </div>
                    <i class="fas fa-project-diagram fa-4x opacity-50"></i>
                </div>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a href="{{ route('admin.projects.index') }}" class="small text-white stretched-link text-decoration-none">Xem chi tiết</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    
    <div class="col-md-6 mb-4">
        <div class="card bg-success text-white h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title text-uppercase mb-2">Yêu cầu tư vấn mới</h6>
                        <h2 class="display-4 mb-0">{{ $newContactCount }}</h2>
                    </div>
                    <i class="fas fa-envelope fa-4x opacity-50"></i>
                </div>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a href="{{ route('admin.inquiries.index') }}" class="small text-white stretched-link text-decoration-none">Xem chi tiết</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
</div>
@endsection
