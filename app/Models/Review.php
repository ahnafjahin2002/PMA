<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['hotel_id','user_id', 'title', 'description','rating'];


    public function hotel()
    {
        return $this->belongsTo(Hotel::class, 'hotel_id', 'hotel_id');
    }

    public function user()
    {
       return $this->belongsTo(User::class);
    }
}

