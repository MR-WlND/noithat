<?php

namespace Tests\Feature;

use App\Mail\AdminLoginCode;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class AdminLoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_administrator_can_log_in_with_the_contact_email_and_password(): void
    {
        Mail::fake();

        $user = User::factory()->create([
            'email' => 'noithatbhomehatmon@gmail.com',
            'password' => '12345678',
            'two_factor_enabled' => true,
        ]);

        $this->post(route('admin.login.submit'), [
            'email' => 'noithatbhomehatmon@gmail.com',
            'password' => '12345678',
        ])->assertRedirect(route('admin.2fa.form'));

        $this->assertGuest();
        $code = null;
        Mail::assertSent(AdminLoginCode::class, function (AdminLoginCode $mail) use (&$code): bool {
            $code = $mail->code;
            $mail->render();

            return $mail->hasTo('noithatbhomehatmon@gmail.com');
        });

        $this->get(route('admin.2fa.form'))
            ->assertOk()
            ->assertSee('gmail.com');

        $this->post(route('admin.2fa.verify'), ['code' => $code])
            ->assertRedirect(route('admin.dashboard'));
        $this->assertAuthenticatedAs($user);
    }

    public function test_expired_email_code_can_be_resent_and_verified(): void
    {
        Mail::fake();

        User::factory()->create([
            'email' => 'noithatbhomehatmon@gmail.com',
            'password' => '12345678',
            'two_factor_enabled' => true,
        ]);

        $this->post(route('admin.login.submit'), [
            'email' => 'noithatbhomehatmon@gmail.com',
            'password' => '12345678',
        ]);

        $this->travel(11)->minutes();
        $this->from(route('admin.2fa.form'))
            ->post(route('admin.2fa.verify'), ['code' => '123456'])
            ->assertRedirect(route('admin.2fa.form'))
            ->assertSessionHasErrors('code');

        $this->post(route('admin.2fa.resend'))
            ->assertRedirect(route('admin.2fa.form'));

        $codes = [];
        Mail::assertSent(AdminLoginCode::class, function (AdminLoginCode $mail) use (&$codes): bool {
            $codes[] = $mail->code;

            return true;
        });

        $this->assertCount(2, $codes);
        $this->assertNotSame($codes[0], $codes[1]);

        $this->post(route('admin.2fa.verify'), ['code' => $codes[1]])
            ->assertRedirect(route('admin.dashboard'));
        $this->assertAuthenticated();
    }

    public function test_invalid_email_code_does_not_authenticate_the_administrator(): void
    {
        Mail::fake();

        User::factory()->create([
            'email' => 'noithatbhomehatmon@gmail.com',
            'password' => '12345678',
            'two_factor_enabled' => true,
        ]);

        $this->post(route('admin.login.submit'), [
            'email' => 'noithatbhomehatmon@gmail.com',
            'password' => '12345678',
        ]);

        $this->from(route('admin.2fa.form'))
            ->post(route('admin.2fa.verify'), ['code' => '000000'])
            ->assertRedirect(route('admin.2fa.form'))
            ->assertSessionHasErrors('code');

        $this->assertGuest();
    }

    public function test_administrator_without_two_factor_enabled_can_log_in_directly(): void
    {
        Mail::fake();

        $user = User::factory()->create([
            'email' => 'admin@example.com',
            'password' => '12345678',
            'two_factor_enabled' => false,
        ]);

        $this->post(route('admin.login.submit'), [
            'email' => 'admin@example.com',
            'password' => '12345678',
        ])->assertRedirect(route('admin.dashboard'));

        Mail::assertNothingSent();
        $this->assertAuthenticatedAs($user);
    }
}
