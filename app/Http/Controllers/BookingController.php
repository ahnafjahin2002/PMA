<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\HotelBooking;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class BookingController extends Controller
{
    // Check if the user is logged in before proceeding to the booking form
    public function checkLogin($id)
    {
        if (!Auth::check()) {
            return redirect()->route('user.login')->with('error', 'Please login first to book a hotel.');
        }

        return redirect()->route('booking.form', $id);
    }

    // Show user bookings history
    public function showUserBookings()
    {
        $user = Auth::user();
        $bookings = $user->bookings;
        $localExperienceBookings = $user->localExperienceBookings;
        return view('user.bookinghistory', compact('bookings','localExperienceBookings'));
    }

    // Show the booking form for a specific hotel
    public function showForm($id, Request $request)
    {
        // Retrieve the hotel details by ID
        $hotel = Hotel::where('hotel_id', $id)->firstOrFail();

        // Calculate the total amount in the controller, so it can be passed to the Blade view
        if ($request->has('checkin_date') && $request->has('checkout_date') && $request->has('number_of_rooms')) {
            $checkinDate = $request->input('checkin_date');
            $checkoutDate = $request->input('checkout_date');
            $numberOfRooms = $request->input('number_of_rooms');

            // Calculate the total amount (price * rooms * days stayed)
            $checkin = new \DateTime($checkinDate);
            $checkout = new \DateTime($checkoutDate);
            $daysStayed = $checkout->diff($checkin)->days;

            $totalAmount = $hotel->price * $numberOfRooms * $daysStayed;
        } else {
            $totalAmount = 0; // Default value if no input yet
        }

        // Pass the hotel and totalAmount to the Blade view
        return view('user.booking', compact('hotel', 'totalAmount'));
    }

    // Store booking data and calculate the total amount
    public function store(Request $request)
    {
        $request->validate([
            'hotel_id' => 'required|exists:hotels,hotel_id',
            'checkin_date' => 'required|date',
            'checkout_date' => 'required|date|after_or_equal:checkin_date',
            'number_of_rooms' => 'required|integer|min:1',
            'total_amount' => 'required|numeric|min:0.01',
        ]);

        // Hotel and dates retrieval
        $hotel = Hotel::findOrFail($request->hotel_id);
        $checkinDate = $request->checkin_date;
        $checkoutDate = $request->checkout_date;
        $numberOfRooms = $request->number_of_rooms;

        // Calculate the total amount (price * rooms * days stayed)
        $checkin = new \DateTime($checkinDate);
        $checkout = new \DateTime($checkoutDate);
        $daysStayed = $checkout->diff($checkin)->days;
        $totalAmount = $hotel->price * $numberOfRooms * $daysStayed;

        // Store the booking
        HotelBooking::create([
            'hotel_id' => $request->hotel_id,
            'user_id' => Auth::id(),
            'checkin_date' => $checkinDate,
            'checkout_date' => $checkoutDate,
            'number_of_rooms' => $numberOfRooms,
            'number_of_guests' => $request->input('number_of_guests', 1),
            'total_amount' => $totalAmount,
        ]);

        // Pass the total amount to the view for payment
        $request->session()->put('hotel_id', $hotel->hotel_id);
        $request->session()->put('total_amount', $totalAmount);
        return redirect()->route('checkout');
    }

    public function showCheckout()
    {
        // Retrieve the total amount from the session
        $totalAmount = session('total_amount');
        
        // Pass the total amount to the checkout view
        return view('checkout', compact('totalAmount'));
    }





    // Create Stripe Checkout session for payment
    public function createCheckoutSession(Request $request)
    {
        // Set your secret key
        Stripe::setApiKey(env('STRIPE_SECRET'));
    
        // Total amount from the session
        $totalAmount = $request->session()->get('total_amount') * 100; // Convert to cents
    
        // Create a Stripe Checkout session
        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'bdt',  // Currency
                        'product_data' => [
                            'name' => 'Hotel Booking',
                        ],
                        'unit_amount' => $totalAmount,
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'success_url' => route('checkout.success'), // Success URL
            'cancel_url' => route('checkout.cancel'),   // Cancel URL
        ]);
    
        // Redirect to Stripe Checkout
        return redirect($session->url);
    }

    // Handle successful payment (you can add booking confirmation logic here)
    public function paymentSuccess()
    {
        return view('payment.success');
    }

    // Handle canceled payment (you can add cancellation logic here)
    public function paymentCancel()
    {
        return view('payment.cancel');
    }
}
