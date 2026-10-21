<?php

namespace App\Http\Controllers;

use App\Mail\NewContactInquiry;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;

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
            $details[] = 'Hạng mục: '.$request->category;
        }
        if ($request->filled('budget')) {
            $details[] = 'Ngân sách: '.$request->budget;
        }
        if ($request->filled('message')) {
            $details[] = 'Nhu cầu: '.$request->message;
        }

        $fullMessage = implode(' | ', $details) ?: ($request->message ?? '');

        $contact = Contact::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'message' => $fullMessage,
        ]);

        try {
            Mail::to(config('mail.from.address'))->send(new NewContactInquiry($contact));
        } catch (TransportExceptionInterface $exception) {
            Log::error('Failed to send contact inquiry notification email.', [
                'contact_id' => $contact->id,
                'recipient' => config('mail.from.address'),
                'exception' => $exception->getMessage(),
            ]);
        }

        return redirect()->back()->with('success', 'Cảm ơn bạn! Yêu cầu tư vấn của bạn đã được gửi thành công. Chúng tôi sẽ liên hệ lại sớm nhất.');
    }
}
