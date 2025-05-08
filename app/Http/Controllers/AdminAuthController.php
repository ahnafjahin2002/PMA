<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Booking; 
use App\Models\HotelBooking;


class AdminAuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('admin.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:6|confirmed',
        ]);

        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.login')->with('success', 'Registered successfully');
    }

    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            $users = User::all(); 

        
        return view('admin.dashboard', compact('users'));
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    public function deleteUser($id)
    {
        
        $users = User::find($id);

        if ($users) {
          
            $users->delete();
            return redirect()->route('admin.login')->with('success', 'User deleted successfully!');
        }

        return redirect()->route('admin.dashboard')->with('error', 'User not found.');
    }
    public function showDashboard()
    {
        $users = User::all(); 
        return view('admin.dashboard', compact('users')); 

        
    }
    

    public function showHotelBookings()
    {
        $bookings = \App\Models\HotelBooking::all(); 
        return view('admin.hotel_bookings', compact('bookings'));
    }
    
    public function updateBookingStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,in-progress,completed',
        ]);

    $booking = Booking::findOrFail($id);
        $booking->status = $request->status;
        $booking->save();
        session()->flash('booking_id', $booking->id);
    return redirect()->back()->with('success', 'Booking status updated.');
    }

    
}
