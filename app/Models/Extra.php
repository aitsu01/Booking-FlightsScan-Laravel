<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Extra extends Model
{
    public function bookings(){
        /*return $this->belongsToMany(Booking::class)->withPivot('quantità');*/
        return $this->belongsToMany(Booking::class, 'booking_extra')->withPivot('quantita')->withTimestamps();
    }
    
}
