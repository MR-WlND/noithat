<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AdminLoginCode extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public string $code) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Mã xác minh đăng nhập quản trị B HOME',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.admin-login-code',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
