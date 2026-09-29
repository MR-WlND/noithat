<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'message' => 'nullable|string',
        ]);

        Contact::create($validated);

        return redirect()->back()->with('success', 'Cảm ơn bạn! Yêu cầu tư vấn của bạn đã được gửi thành công. Chúng tôi sẽ liên hệ lại sớm nhất.');
    }
}
