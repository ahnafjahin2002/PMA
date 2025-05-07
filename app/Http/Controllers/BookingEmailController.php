<?php

namespace App\Http\Controllers;

use App\Models\HotelBooking;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookingCompleted;
use Illuminate\Support\Facades\Log;

class BookingEmailController extends Controller
{
    public function sendTestEmail($bookingId)
    {
        $booking = HotelBooking::find($bookingId);

        if ($booking && strtolower($booking->status) == 'completed') {
            $user = $booking->user;

            // Log the user details for debugging
            //Log::info('User details: ', ['user' => $user]);

            if ($user) {
                Mail::to($user->email)->send(new BookingCompleted($user, $booking));
                return 'Email sent successfully to ' . $user->email . ' <a href="' . route('admin.dashboard') . '">Go to Dashboard</a>';
            } else {
                return 'No user found for this booking.';
            }
        }

        return 'Booking not found or status is not completed.';
    }
}
