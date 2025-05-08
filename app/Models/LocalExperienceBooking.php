<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocalExperienceBooking extends Model
{
    use HasFactory;

    protected $table = 'local_experience_bookings';  

    protected $fillable = ['user_id','local_experience_id', 'name', 'email', 'mobile_number', 'booking_date'];


    public function localExperience()
    {
        return $this->belongsTo(LocalExperience::class);
    }
}
