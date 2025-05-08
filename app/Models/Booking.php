<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Booking extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    protected $table = 'hotel_bookings';

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
    public function hotelBooking()
    {
        return $this->hasMany(HotelBooking::class);
    }
}
