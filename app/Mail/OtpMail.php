<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

/**
 * OtpMail — sends 6-digit verification code to user after login.
 */
class OtpMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public readonly string $otp,
        public readonly string $userName
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(subject: 'Your NexaGTM Login Code');
    }

    public function content(): Content
    {
        return new Content(view: 'emails.otp');
    }
}
