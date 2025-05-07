<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;


class BookingCompleted extends Mailable
{
    public $user;
    public $bookingDetails;

    public function __construct($user, $bookingDetails)
    {
        $this->user = $user;
        $this->bookingDetails = $bookingDetails;
    }
    
    public function build()
    {
        return $this->subject('Booking Completed')
                    ->view('emails.booking_completed')
                    ->with([
                        'userName' => $this->user->name,
                        'bookingDetails' => $this->user->bookingDetails,
                    ]);
    }
}
