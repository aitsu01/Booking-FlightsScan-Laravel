<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
        
    }
    
    public function flight(){
        return $this->belongsTo(Flight::class);
    }
    
    public function passengers(){
        return $this->hasMany(Passenger::class);
    }
    
    public function extras(){
        
        return $this->belongsToMany(Extra::class, 'booking_extra')->withPivot('quantita')->withTimestamps();
    }
    
}
