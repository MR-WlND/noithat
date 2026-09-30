@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Quản lý Yêu cầu tư vấn</h2>
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
                        <th class="px-4 py-3">Tên khách hàng</th>
                        <th class="px-4 py-3">Số điện thoại</th>
                        <th class="px-4 py-3">Nội dung</th>
                        <th class="px-4 py-3">Thời gian gửi</th>
                        <th class="px-4 py-3">Trạng thái</th>
                        <th class="px-4 py-3">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($inquiries as $inquiry)
                    <tr>
                        <td class="px-4 py-3 fw-bold">{{ $inquiry->name }}</td>
                        <td class="px-4 py-3">{{ $inquiry->phone }}</td>
                        <td class="px-4 py-3">
                            <div style="max-width: 300px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;" title="{{ $inquiry->message }}">
                                {{ $inquiry->message }}
                            </div>
                        </td>
                        <td class="px-4 py-3 text-muted">{{ $inquiry->created_at->format('d/m/Y H:i') }}</td>
                        <td class="px-4 py-3">
                            <form action="{{ route('admin.inquiries.update', $inquiry->id) }}" method="POST" class="d-flex align-items-center">
                                @csrf
                                @method('PUT')
                                <select name="status" class="form-select form-select-sm {{ $inquiry->status == 'Chưa gọi' ? 'border-warning' : 'border-success' }}" onchange="this.form.submit()">
                                    <option value="Chưa gọi" {{ $inquiry->status == 'Chưa gọi' ? 'selected' : '' }}>Chưa gọi</option>
                                    <option value="Đã liên hệ tư vấn" {{ $inquiry->status == 'Đã liên hệ tư vấn' ? 'selected' : '' }}>Đã liên hệ tư vấn</option>
                                </select>
                            </form>
                        </td>
                        <td class="px-4 py-3">
                            <form action="{{ route('admin.inquiries.destroy', $inquiry->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa yêu cầu này?');">
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
                        <td colspan="6" class="text-center py-4 text-muted">Chưa có yêu cầu tư vấn nào.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($inquiries->hasPages())
    <div class="card-footer bg-white pt-3 border-top-0">
        {{ $inquiries->links() }}
    </div>
    @endif
</div>
@endsection
