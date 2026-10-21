<?php

namespace Tests\Feature;

use App\Mail\NewContactInquiry;
use App\Models\Contact;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ContactNotificationTest extends TestCase
{
    use RefreshDatabase;

    public function test_new_contact_request_is_saved_and_notified_to_the_configured_admin_email(): void
    {
        Mail::fake();

        $this->post(route('contact.store'), [
            'name' => 'Nguyễn Văn A',
            'phone' => '0912345678',
            'category' => 'Tủ bếp',
            'budget' => '50 - 100 tr',
            'message' => 'Cần tư vấn thiết kế tủ bếp.',
        ])
            ->assertRedirect()
            ->assertSessionHas('success');

        $contact = Contact::query()->firstOrFail();

        $this->assertSame('Nguyễn Văn A', $contact->name);
        $this->assertSame('0912345678', $contact->phone);
        $this->assertStringContainsString('Tủ bếp', $contact->message);
        $this->assertStringContainsString('Cần tư vấn thiết kế tủ bếp.', $contact->message);

        Mail::assertSent(NewContactInquiry::class, function (NewContactInquiry $mail) use ($contact): bool {
            $this->assertSame($contact->id, $mail->contact->id);
            $this->assertStringContainsString($contact->name, $mail->render());

            return $mail->hasTo(config('mail.from.address'));
        });
    }

    public function test_pricing_lead_saves_property_type_and_area_in_contact_message(): void
    {
        Mail::fake();

        $this->post(route('contact.store'), [
            'name' => 'Trần Thị B',
            'phone' => '0962282204',
            'property_type' => 'Chung cư',
            'area' => '80 m², 2 phòng ngủ',
        ])
            ->assertRedirect()
            ->assertSessionHas('success');

        $contact = Contact::query()->firstOrFail();

        $this->assertStringContainsString('Loại hình nhà: Chung cư', $contact->message);
        $this->assertStringContainsString('Diện tích / số phòng ngủ: 80 m², 2 phòng ngủ', $contact->message);

        Mail::assertSent(NewContactInquiry::class);
    }
}
