@extends('layouts.app')

@section('title', 'Báo giá gia công nội thất gỗ An Cường - B HOME')
@section('description', 'Bảng báo giá tham khảo gói nội thất căn hộ 2 phòng ngủ bằng gỗ MDF chống ẩm phủ Melamine An Cường. Miễn phí thiết kế 3D và đo đạc tận nơi.')
@section('canonical', route('page.pricing'))

@section('content')
@php
    $priceGroups = [
        [
            'title' => 'Hạng mục phòng khách',
            'items' => [
                ['Kệ tivi treo tường', '1.4m x 0.25m x 0.25m', 'md', '1.400.000', '1.960.000'],
                ['Vách gỗ trang trí bàn ăn', '0.5m x 2.695m', 'm²', '500.000', '673.750'],
                ['Tủ giày lửng hiện đại', '0.88m x 0.35m x 1.25m', 'm²', '1.500.000', '1.650.000'],
                ['Bộ đợt trang trí (3 đợt)', '0.88m x 0.3m', 'Bộ', '390.000', '390.000'],
                ['Tủ giày kịch trần cao cấp', '0.835m x 0.35m x 2.695m', 'm²', '1.500.000', '3.375.488'],
            ],
        ],
        [
            'title' => 'Hạng mục phòng ngủ Master',
            'items' => [
                ['Giường ngủ thông minh (dát lật 6 ngăn)', '1.88m x 2.13m', 'Chiếc', '5.600.000', '5.600.000'],
                ['Đệm ốp bọc đầu giường', '1.88m x 0.72m', 'm²', '900.000', '1.218.240'],
                ['Bàn trang điểm treo tường', '0.935m x 0.5m x 0.15m', 'md', '1.200.000', '1.122.000'],
                ['Tủ quần áo kịch trần cánh mở/lùa', '1.93m x 0.6m x 2.695m', 'Chiếc', '2.000.000', '10.402.700'],
            ],
        ],
        [
            'title' => 'Hạng mục phòng ngủ con',
            'items' => [
                ['Tủ quần áo thiết kế kịch trần', '1.8m x 0.6m x 2.695m', 'm²', '2.000.000', '9.702.000'],
                ['Giường ngủ đầu giường sâu 300mm (dát lật)', '1.68m x 0.35m x 2.33m', 'Chiếc', '6.500.000', '6.500.000'],
                ['Bàn học / Bàn phấn', '1.135m x 0.5m x 0.15m', 'md', '1.200.000', '1.854.000'],
                ['Giá sách treo tường kịch trần', '2.815m x 0.3m x 1.295m', 'm²', '1.400.000', '5.103.595'],
                ['Vách gỗ trang trí đầu giường', '2.815m x 0.6m', 'm²', '500.000', '844.500'],
            ],
        ],
    ];

@endphp

<section class="pricing-hero">
    <div class="container pricing-hero__inner">
        <span class="pricing-eyebrow">B HOME · Sản xuất trực tiếp tại xưởng</span>
        <h1>Báo Giá Gia Công Nội Thất Theo Yêu Cầu <span>(Chất Liệu Gỗ An Cường)</span></h1>
        <p>Bạn đang muốn dự tính chi phí hoàn thiện nội thất cho căn hộ của mình? Dưới đây là bảng báo giá tham khảo chi tiết cho gói nội thất chung cư/nhà phố chuẩn, sử dụng chất liệu gỗ công nghiệp MDF chống ẩm An Cường cao cấp.</p>
        <ul class="pricing-hero__badges">
            <li><i class="fas fa-check-circle"></i> Miễn phí 100% thiết kế 3D &amp; đo đạc tận nơi</li>
            <li><i class="fas fa-check-circle"></i> Trực tiếp gia công tại xưởng – Không qua trung gian</li>
            <li><i class="fas fa-check-circle"></i> Bảo hành 24 tháng – Bảo trì trọn đời</li>
        </ul>
    </div>
</section>

<section class="page-content pricing-page">
    <div class="container">
        <section class="pricing-estimate" aria-labelledby="pricing-estimate-title">
            <div class="pricing-estimate__intro">
                <div>
                    <span class="pricing-eyebrow">Bảng giá tham khảo</span>
                    <h2 id="pricing-estimate-title">Gói Nội Thất Căn Hộ 2 Phòng Ngủ (Căn Mẫu 1111)</h2>
                    <p>Vật liệu chính: <strong>Gỗ MDF chống ẩm phủ Melamine An Cường</strong></p>
                </div>
                <span class="pricing-material"><i class="fas fa-layer-group"></i> Sản xuất theo kích thước thực tế</span>
            </div>

            @foreach($priceGroups as $group)
                <section class="pricing-table-section">
                    <h3>{{ $group['title'] }}</h3>
                    <div class="pricing-table-wrap" role="region" aria-label="{{ $group['title'] }}" tabindex="0">
                        <table class="pricing-table">
                            <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Tên sản phẩm</th>
                                    <th scope="col">Kích thước mẫu (D x R x C)</th>
                                    <th scope="col">ĐVT</th>
                                    <th scope="col">Đơn giá tham khảo (VNĐ)</th>
                                    <th scope="col">Thành tiền dự tính (VNĐ)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($group['items'] as $index => $item)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $item[0] }}</td>
                                        <td>{{ $item[1] }}</td>
                                        <td>{{ $item[2] }}</td>
                                        <td>{{ $item[3] }}</td>
                                        <td>{{ $item[4] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </section>
            @endforeach

            <div class="pricing-total">
                <span>Tổng giá trị dự tính (trọn gói)</span>
                <strong>50.396.273 VNĐ</strong>
                <p>Đã bao gồm chi phí vận chuyển và lắp đặt hoàn thiện trong nội thành Hà Nội.</p>
            </div>
        </section>

        <section class="pricing-notes" aria-labelledby="pricing-notes-title">
            <h2 id="pricing-notes-title">Điều khoản &amp; lưu ý báo giá</h2>
            <ul>
                <li><i class="fas fa-thumbtack"></i><span><strong>Tính chất dự toán:</strong> Báo giá mang tính tham khảo. Chi phí thực tế có thể thay đổi theo kích thước khảo sát và chất liệu khách hàng lựa chọn.</span></li>
                <li><i class="fas fa-thumbtack"></i><span><strong>Thuế VAT:</strong> Đơn giá chưa bao gồm thuế VAT 10%.</span></li>
                <li><i class="fas fa-thumbtack"></i><span><strong>Vận chuyển &amp; lắp đặt:</strong> Đã bao gồm vận chuyển, vật tư phụ và công lắp đặt tại công trình trong khu vực Hà Nội.</span></li>
                <li><i class="fas fa-thumbtack"></i><span><strong>Thay đổi vật liệu:</strong> Có thể lựa chọn MDF Thái Lan, nhựa Picomat chống nước hoặc gỗ tự nhiên như sồi, óc chó để phù hợp ngân sách.</span></li>
                <li><i class="fas fa-thumbtack"></i><span><strong>Thời hạn báo giá:</strong> Đơn giá áp dụng trong vòng 07–15 ngày kể từ ngày đăng tải.</span></li>
            </ul>
        </section>
    </div>

</section>
@endsection
