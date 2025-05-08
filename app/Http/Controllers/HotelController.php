<?php
// app/Http/Controllers/HotelController.php
namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    // Show the hotel details
    public function show($id)
    {
        $hotel = Hotel::findOrFail($id);  // Find the hotel by ID

        return view('hotel.show', compact('hotel'));  // Pass hotel data to the view
    }
}


