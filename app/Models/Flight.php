<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    public function airline(){
        return $this->belongsTo(Airline::class);
    }
    
    public function bookings(){
        return $this->hasMany(Booking::class);
    }
    
}
