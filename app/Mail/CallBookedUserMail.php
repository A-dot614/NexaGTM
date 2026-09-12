<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CallBookedUserMail extends Mailable
{
    use Queueable, SerializesModels;

    public array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->subject('Your NexaGTM Strategy Call is Confirmed 🚀')
                    ->view('emails.bookings.user')
                    ->with(['data' => $this->data]);
    }
}
