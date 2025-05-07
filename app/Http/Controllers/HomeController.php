<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;

class HomeController extends Controller
{
    public function index()
    {
        $hotels = Hotel::all();
        return view('welcome', compact('hotels'));
    }
    public function search(Request $request)
    {
        $query = $request->input('query');

        $hotels = Hotel::where('hotel_name', 'LIKE', "%{$query}%")
            ->orWhere('address', 'LIKE', "%{$query}%")
            ->get();

        return view('welcome', compact('hotels'));
    }
}



