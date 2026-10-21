<h1>Khách hàng mới gửi yêu cầu tư vấn</h1>

<p><strong>Họ và tên:</strong> {{ $contact->name }}</p>
<p><strong>Số điện thoại:</strong> <a href="tel:{{ $contact->phone }}">{{ $contact->phone }}</a></p>
<p><strong>Nội dung yêu cầu:</strong></p>
<p>{{ $contact->message }}</p>
<p><strong>Thời gian:</strong> {{ $contact->created_at->format('d/m/Y H:i') }}</p>
