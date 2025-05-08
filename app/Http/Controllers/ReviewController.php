<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Hotel;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::with(['user', 'hotel'])->latest()->get();

        $hotels = Hotel::all();  // Fetch all 
        //dd($reviews->pluck('hotel'));

        return view('user.reviews', compact('reviews', 'hotels'));
    }

    public function store(Request $request)
{
    //dd($request->all());

    if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'You must be logged in to submit a review.');
    }

    $request->validate([
        'hotel_id' => 'required|exists:hotels,hotel_id',
        'title' => 'required|max:255',
        'description' => 'required',
        'rating' => 'required|integer|between:1,5',
    ]);

    try {
        Review::create([
            'hotel_id' => $request->hotel_id,
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'rating' => $request->rating,
        ]);

        return redirect()->back()->with('success', 'Your review has been submitted.');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Failed to submit review: ' . $e->getMessage());
    }
}

}
