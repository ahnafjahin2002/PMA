<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocalExperience extends Model
{
    use HasFactory;

   
    protected $table = 'local_experiences'; 

  
    protected $fillable = ['destination', 'attraction', 'description', 'image'];
}
