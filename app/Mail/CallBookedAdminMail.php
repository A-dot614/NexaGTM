<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CallBookedAdminMail extends Mailable
{
    use Queueable, SerializesModels;

    public array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function build()
    {
        $type = ucfirst($this->data['call_type'] ?? 'Call');
        return $this->subject("📅 New Strategy {$type} Booked: " . ($this->data['name'] ?? 'Lead'))
                    ->view('emails.bookings.admin')
                    ->with(['data' => $this->data]);
    }
}
