<?php

namespace App\Mail;

use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewContactInquiry extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Contact $contact) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Khách hàng mới gửi yêu cầu tư vấn - B HOME',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.new-contact-inquiry',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
