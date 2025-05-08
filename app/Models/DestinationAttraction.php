<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DestinationAttraction extends Model
{
    use HasFactory;

    protected $table = 'destinations_attractions';  
    protected $fillable = ['destination', 'attraction', 'description', 'image'];
}
