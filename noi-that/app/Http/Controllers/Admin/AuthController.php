<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\AdminLoginCode;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class AuthController extends Controller
{
    private const PENDING_2FA_KEY = 'admin_2fa_pending';

    private const CODE_LIFETIME_MINUTES = 10;

    private const MAX_CODE_ATTEMPTS = 5;

    public function showLoginForm(): View
    {
        return view('admin.login');
    }

    public function login(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'string'],
            'password' => ['required'],
        ], [
            'email.required' => 'Vui lòng nhập email hoặc tên đăng nhập.',
            'password.required' => 'Vui lòng nhập mật khẩu.',
        ]);

        $loginInput = trim($request->input('email'));
        $password = (string) $request->input('password');
        $remember = $request->boolean('remember');

        $user = User::where('email', $loginInput)
            ->orWhere('name', $loginInput)
            ->first();

        if (! $user) {
            $lower = strtolower($loginInput);
            if (in_array($lower, ['admin', 'administrator', 'quanly'])) {
                $user = User::where('email', 'noithatbhomehatmon@gmail.com')
                    ->orWhere('name', 'Administrator')
                    ->orWhere('name', 'admin')
                    ->first();
            }
        }

        if (! $user || ! Hash::check($password, $user->password)) {
            return back()->withErrors([
                'email' => 'Tài khoản hoặc mật khẩu không chính xác. Vui lòng kiểm tra lại.',
            ])->onlyInput('email');
        }

        if ($user->two_factor_enabled) {
            return $this->sendTwoFactorCode($request, $user, $remember);
        }

        Auth::login($user, $remember);
        $request->session()->regenerate();

        return redirect()->intended(route('admin.dashboard'));
    }

    public function showTwoFactorForm(Request $request): View|RedirectResponse
    {
        $challenge = $request->session()->get(self::PENDING_2FA_KEY);
        $user = is_array($challenge) ? User::find($challenge['user_id'] ?? null) : null;

        if (! $user || ! $user->two_factor_enabled) {
            $request->session()->forget(self::PENDING_2FA_KEY);

            return redirect()->route('admin.login');
        }

        return view('admin.verify-2fa', [
            'maskedEmail' => $this->maskEmail($user->email),
        ]);
    }

    public function verifyTwoFactorCode(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'code' => ['required', 'string', 'regex:/^\d{6}$/'],
        ], [
            'code.required' => 'Vui lòng nhập mã xác minh.',
            'code.regex' => 'Mã xác minh phải gồm 6 chữ số.',
        ]);

        $challenge = $request->session()->get(self::PENDING_2FA_KEY);

        if (! is_array($challenge) || ! isset($challenge['user_id'], $challenge['code_hash'], $challenge['expires_at'])) {
            return redirect()->route('admin.login')->withErrors([
                'email' => 'Phiên xác minh không hợp lệ. Vui lòng đăng nhập lại.',
            ]);
        }

        $user = User::find($challenge['user_id']);

        if (! $user || ! $user->two_factor_enabled) {
            $request->session()->forget(self::PENDING_2FA_KEY);

            return redirect()->route('admin.login');
        }

        if (now()->timestamp >= (int) $challenge['expires_at']) {
            return back()->withErrors([
                'code' => 'Mã đã hết hạn. Hãy yêu cầu gửi mã mới.',
            ]);
        }

        $attempts = (int) ($challenge['attempts'] ?? 0);

        if ($attempts >= self::MAX_CODE_ATTEMPTS) {
            return back()->withErrors([
                'code' => 'Bạn đã nhập sai quá số lần cho phép. Hãy yêu cầu gửi mã mới.',
            ]);
        }

        if (! Hash::check($validated['code'], $challenge['code_hash'])) {
            $challenge['attempts'] = $attempts + 1;
            $request->session()->put(self::PENDING_2FA_KEY, $challenge);

            return back()->withErrors([
                'code' => $challenge['attempts'] >= self::MAX_CODE_ATTEMPTS
                    ? 'Bạn đã nhập sai quá số lần cho phép. Hãy yêu cầu gửi mã mới.'
                    : 'Mã xác minh không chính xác.',
            ]);
        }

        $remember = (bool) ($challenge['remember'] ?? false);
        $request->session()->forget(self::PENDING_2FA_KEY);
        Auth::login($user, $remember);
        $request->session()->regenerate();

        return redirect()->intended(route('admin.dashboard'));
    }

    public function resendTwoFactorCode(Request $request): RedirectResponse
    {
        $challenge = $request->session()->get(self::PENDING_2FA_KEY);
        $user = is_array($challenge) ? User::find($challenge['user_id'] ?? null) : null;

        if (! $user || ! $user->two_factor_enabled) {
            $request->session()->forget(self::PENDING_2FA_KEY);

            return redirect()->route('admin.login')->withErrors([
                'email' => 'Phiên xác minh không hợp lệ. Vui lòng đăng nhập lại.',
            ]);
        }

        return $this->sendTwoFactorCode($request, $user, (bool) ($challenge['remember'] ?? false));
    }

    public function cancelTwoFactor(Request $request): RedirectResponse
    {
        $request->session()->forget(self::PENDING_2FA_KEY);

        return redirect()->route('admin.login');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('admin/login');
    }

    private function sendTwoFactorCode(Request $request, User $user, bool $remember): RedirectResponse
    {
        $mailer = config('mail.default');
        $transport = config("mail.mailers.{$mailer}.transport");
        $fallbackMailers = config("mail.mailers.{$mailer}.mailers", []);
        $mayLogOtp = in_array($transport, ['log', 'array'], true)
            || ($transport === 'failover' && in_array('log', $fallbackMailers, true));

        if (! app()->runningUnitTests() && $mayLogOtp) {
            return redirect()->route('admin.login')->withErrors([
                'email' => 'Email chưa được cấu hình gửi thư thật. Vui lòng liên hệ quản trị viên để cấu hình SMTP.',
            ]);
        }

        $code = (string) random_int(100000, 999999);

        $request->session()->put(self::PENDING_2FA_KEY, [
            'user_id' => $user->id,
            'code_hash' => Hash::make($code),
            'expires_at' => now()->addMinutes(self::CODE_LIFETIME_MINUTES)->timestamp,
            'attempts' => 0,
            'remember' => $remember,
        ]);

        Mail::to($user->email)->send(new AdminLoginCode($code));

        return redirect()->route('admin.2fa.form');
    }

    private function maskEmail(string $email): string
    {
        [$localPart, $domain] = explode('@', $email, 2);

        return substr($localPart, 0, 1).str_repeat('*', max(3, strlen($localPart) - 1)).'@'.$domain;
    }
}
