<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PricingPageTest extends TestCase
{
    use RefreshDatabase;

    public function test_pricing_page_displays_reference_prices_and_notes_without_workflow_or_quote_form(): void
    {
        $this->get(route('page.pricing'))
            ->assertOk()
            ->assertSee('Báo Giá Gia Công Nội Thất Theo Yêu Cầu')
            ->assertSee('Gói Nội Thất Căn Hộ 2 Phòng Ngủ (Căn Mẫu 1111)')
            ->assertSee('Gỗ MDF chống ẩm phủ Melamine An Cường')
            ->assertSee('Kệ tivi treo tường')
            ->assertSee('Tủ quần áo kịch trần cánh mở/lùa')
            ->assertSee('50.396.273 VNĐ')
            ->assertSee('Đơn giá chưa bao gồm thuế VAT 10%.')
            ->assertSee('Bảo hành 24 tháng – Bảo trì trọn đời')
            ->assertDontSee('Quy Trình Thi Công Chuẩn Xưởng')
            ->assertDontSee('Nhận Báo Giá &amp;')
            ->assertDontSee('name="property_type"', false)
            ->assertDontSee('name="area"', false);
    }

    public function test_client_header_links_to_the_pricing_page_on_desktop_and_mobile(): void
    {
        $this->get(route('home'))
            ->assertOk()
            ->assertSee('Báo Giá')
            ->assertSee(route('page.pricing'), false)
            ->assertDontSee('Hạng Mục Thi Công');
    }
}
