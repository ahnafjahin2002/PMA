<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $table = 'hotels';
    protected $primaryKey = 'hotel_id';  
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = ['hotel_name', 'address', 'price', 'description', 'image'];

    public function reviews()
    {
        return $this->hasMany(Review::class, 'hotel_id', 'hotel_id');
    }
    public function bookings()
    {
        return $this->hasMany(HotelBooking::class, 'hotel_id', 'hotel_id');
    }
}
