<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Guest;

class RSVPConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $guest;

    /**
     * Create a new message instance.
     */
    public function __construct(Guest $guest)
    {
        $this->guest = $guest;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('RSVP Confirmation - Fabian & Naifa Wedding')
                    ->view('emails.rsvp-confirmation');
    }
}