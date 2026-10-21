@extends('layouts.admin')

@section('page_title', 'Quản lý Yêu cầu tư vấn')

@section('content')
<div class="page-head">
    <div>
        <h2>Quản lý Yêu cầu tư vấn</h2>
        <p>Danh sách tất cả yêu cầu tư vấn từ khách hàng</p>
    </div>
</div>

<div class="table-card">
    <div class="table-header-bar">
        <div class="table-title">
            <i class="fas fa-envelope-open-text" style="color: var(--brown);"></i>
            Yêu cầu tư vấn <span class="tag" style="margin-left:8px;">{{ $inquiries->total() }} yêu cầu</span>
        </div>
    </div>

    <table class="custom-table">
        <thead>
            <tr>
                <th>Tên khách hàng</th>
                <th>Số điện thoại</th>
                <th>Nội dung</th>
                <th>Thời gian gửi</th>
                <th>Trạng thái</th>
                <th style="text-align:right;">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @forelse($inquiries as $inquiry)
            <tr>
                <td>
                    <div class="u-meta">
                        <h5>{{ $inquiry->name }}</h5>
                    </div>
                </td>
                <td>{{ $inquiry->phone }}</td>
                <td>
                    <div style="max-width: 320px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;" title="{{ $inquiry->message }}">
                        {{ $inquiry->message }}
                    </div>
                </td>
                <td style="color:#999; font-size:0.85rem;">{{ $inquiry->created_at->format('d/m/Y H:i') }}</td>
                <td>
                    <form action="{{ route('admin.inquiries.update', $inquiry->id) }}" method="POST" class="d-flex align-items-center" style="display:inline-flex;">
                        @csrf
                        @method('PUT')
                        <select name="status" class="form-select form-select-sm" style="padding:4px 8px; font-size:0.85rem; border-radius:6px; border:1px solid #ded6cc; background:#faf8f5;" onchange="this.form.submit()">
                            <option value="Chưa gọi" {{ $inquiry->status == 'Chưa gọi' || $inquiry->status == 'ChÆ°a gá»i' ? 'selected' : '' }}>Chưa gọi</option>
                            <option value="Đã liên hệ tư vấn" {{ $inquiry->status == 'Đã liên hệ tư vấn' || $inquiry->status == 'ÄĂ£ liĂªn há»‡ tÆ° váº¥n' ? 'selected' : '' }}>Đã liên hệ tư vấn</option>
                        </select>
                    </form>
                    @php
                        $isDone = in_array($inquiry->status, ['Đã liên hệ tư vấn', 'ÄĂ£ liĂªn há»‡ tÆ° váº¥n']);
                        $isPending = in_array($inquiry->status, ['Chưa gọi', 'ChÆ°a gá»i']) || empty($inquiry->status);
                    @endphp
                    <span class="badge-status {{ $isDone ? 'success' : ($isPending ? 'warning' : 'secondary') }}" style="margin-left:8px;">
                        <i class="fas fa-circle" style="font-size:0.4rem;"></i>
                        {{ $isDone ? 'Đã liên hệ tư vấn' : ($isPending ? 'Chưa gọi' : $inquiry->status) }}
                    </span>
                </td>
                <td style="text-align:right; white-space:nowrap;">
                    <form action="{{ route('admin.inquiries.destroy', $inquiry->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Bạn có chắc chắn muốn xóa yêu cầu này?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="action-btn" title="Xóa" style="color:#e53e3e;">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" style="text-align:center; padding:40px; color:#999;">
                    <i class="fas fa-inbox" style="font-size:2rem; margin-bottom:10px; display:block; color:#ddd;"></i>
                    Chưa có yêu cầu tư vấn nào.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

    @if($inquiries->hasPages())
    <div style="padding: 16px 24px; border-top: 1px solid #f0eae1;">
        {{ $inquiries->links() }}
    </div>
    @endif
</div>
@endsection
