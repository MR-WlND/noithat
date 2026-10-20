<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'category' => 'nullable|string|max:100',
            'budget' => 'nullable|string|max:100',
            'message' => 'nullable|string',
        ]);

        $details = [];
        if ($request->filled('category')) {
            $details[] = 'Hạng mục: ' . $request->category;
        }
        if ($request->filled('budget')) {
            $details[] = 'Ngân sách: ' . $request->budget;
        }
        if ($request->filled('message')) {
            $details[] = 'Nhu cầu: ' . $request->message;
        }

        $fullMessage = implode(" | ", $details) ?: ($request->message ?? '');

        Contact::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'message' => $fullMessage,
        ]);

        return redirect()->back()->with('success', 'Cảm ơn bạn! Yêu cầu tư vấn của bạn đã được gửi thành công. Chúng tôi sẽ liên hệ lại sớm nhất.');
    }
}
