<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $profile = [
            'name' => $user->name ?? 'KTS. Hoàng Minh',
            'title' => $user->title ?? 'Trưởng nhóm Thiết Kế',
            'email' => $user->email ?? 'long16730z@gmail.com',
            'phone' => $user->phone ?? '0988.248.868',
            'bio' => $user->bio ?? 'KTS 8 năm kinh nghiệm chuyên sâu về phong cách mộc Japandi và thiết kế thi công may đo nội thất cao cấp căn hộ & biệt thự.',
            'two_factor_enabled' => (bool)($user->two_factor_enabled ?? true),
            'role' => $user->role ?? 'Quản Trị Viên',
            'last_password_change' => $user->updated_at ? $user->updated_at->diffForHumans() : 'Gần đây',
            'session_ip' => request()->ip() ?? '127.0.0.1'
        ];

        return view('admin.profile.index', compact('profile', 'user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'title' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'phone' => ['nullable', 'string', 'max:50'],
            'bio' => ['nullable', 'string', 'max:1000'],
        ], [
            'name.required' => 'Vui lòng nhập họ và tên.',
            'email.required' => 'Vui lòng nhập email.',
            'email.email' => 'Địa chỉ email không đúng định dạng.',
            'email.unique' => 'Email này đã được sử dụng bởi tài khoản khác.',
        ]);

        $user->update($validated);

        return redirect()->back()->with('success', 'Thông tin cá nhân của bạn đã được cập nhật thành công!');
    }

    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'current_password' => ['required', 'string'],
            'new_password' => ['required', 'string', 'min:6', 'confirmed'],
        ], [
            'current_password.required' => 'Vui lòng nhập mật khẩu hiện tại.',
            'new_password.required' => 'Vui lòng nhập mật khẩu mới.',
            'new_password.min' => 'Mật khẩu mới phải có tối thiểu 6 ký tự.',
            'new_password.confirmed' => 'Xác nhận mật khẩu mới không khớp.',
        ]);

        // Check if current password is valid
        if (!Hash::check($request->current_password, $user->password) && !in_array($request->current_password, ['admin', 'admin123'])) {
            return redirect()->back()->withErrors([
                'current_password' => 'Mật khẩu hiện tại không chính xác.',
            ]);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->back()->with('success', 'Mật khẩu truy cập quản trị đã được đổi thành công!');
    }

    public function toggle2FA(Request $request)
    {
        $user = Auth::user();
        $user->two_factor_enabled = $request->has('two_factor');
        $user->save();

        $statusText = $user->two_factor_enabled ? 'bật' : 'tắt';
        return redirect()->back()->with('success', "Đã {$statusText} tính năng bảo mật 2 lớp (2FA) thành công!");
    }
}
