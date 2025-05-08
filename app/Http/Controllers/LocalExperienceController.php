<?php

namespace App\Http\Controllers;

use App\Models\LocalExperience;
use Illuminate\Http\Request;
use App\Models\LocalExperienceBooking;
use Illuminate\Support\Facades\Auth;



class LocalExperienceController extends Controller
{
    
    public function index(Request $request)
    {

        $query = $request->get('query');

   
        if ($query) {
            $localExperiences = LocalExperience::where('destination', 'like', "%$query%")
                                               ->orWhere('attraction', 'like', "%$query%")
                                               ->get();
        } else {
            $localExperiences = LocalExperience::all();
        }

       
        return view('local_experience.index', compact('localExperiences'));
    }

    public function showBookingForm($id)
    {
        
        if (Auth::check()) {
          
            $localExperience = LocalExperience::findOrFail($id);

            return view('local_experience_booking', compact('localExperience'));
        } else {
       
            return redirect()->route('user.login')->with('error', 'You must be logged in to book a local experience.');
        }
    }

    public function storeBooking(Request $request, $id)
    {

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'mobile_number' => 'required|string|max:15',
            'booking_date' => 'required|date',
        ]);

     
        $booking = new LocalExperienceBooking();
        $booking->local_experience_id = $id;
        $booking->user_id = Auth::id(); // Get the authenticated user's ID
        $booking->name = $request->name;
        $booking->email = $request->email;
        $booking->mobile_number = $request->mobile_number;
        $booking->booking_date = $request->booking_date;
        $booking->save();

    
        return redirect()->route('local_experience.index')->with('success', 'Your booking has been confirmed!');
        }
}