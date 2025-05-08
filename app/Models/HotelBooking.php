<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;  
use App\Mail\BookingCompleted;  

class HotelBooking extends Model
{
    protected $fillable = [
        'hotel_id',
        'user_id',
        'checkin_date',
        'checkout_date',
        'number_of_rooms',
        'number_of_guests',
        'total_amount',
        'status'
    ];
    
    protected $table = 'hotel_bookings';
    protected $primaryKey = 'id'; 

    protected static function boot()
    {
        parent::boot();

      
        static::creating(function ($booking) {
            $booking->status = 'pending';
        });

    
        static::updated(function ($booking) {
           
            if (strtolower(trim($booking->status)) == 'completed') {

            
                $user = $booking->user;

                if ($user) {
            
                    Mail::to($user->email)->send(new BookingCompleted($user, $booking));
                }
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);  
    }
    public function hotel()
    {
        return $this->belongsTo(Hotel::class);  
    }
    public function booking()
    {
        return $this->hasMany(Booking::class);  
    }
}
