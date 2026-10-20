<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string'],
            'password' => ['required'],
        ], [
            'email.required' => 'Vui lòng nhập email hoặc tên đăng nhập.',
            'password.required' => 'Vui lòng nhập mật khẩu.',
        ]);

        $loginInput = trim($request->input('email'));
        $password = (string)$request->input('password');
        $remember = $request->boolean('remember');

        // Check user by email or name/username
        $user = \App\Models\User::where('email', $loginInput)
            ->orWhere('name', $loginInput)
            ->first();

        // Support alias: if user typed 'admin' or 'administrator'
        if (!$user) {
            $lower = strtolower($loginInput);
            if (in_array($lower, ['admin', 'administrator', 'quanly'])) {
                $user = \App\Models\User::where('email', 'long16730z@gmail.com')
                    ->orWhere('name', 'Administrator')
                    ->orWhere('name', 'admin')
                    ->first();
            }
        }

        if ($user && \Illuminate\Support\Facades\Hash::check($password, $user->password)) {
            Auth::login($user, $remember);
            $request->session()->regenerate();
            return redirect()->intended(route('admin.dashboard'));
        }

        return back()->withErrors([
            'email' => 'Tài khoản hoặc mật khẩu không chính xác. Vui lòng kiểm tra lại.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('admin/login');
    }
}
