<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Extra extends Model
{
   

        protected $fillable = ['nome_extra', 'prezzo_extra'];

        public function bookings()
    {
        return $this->belongsToMany(Booking::class, 'booking_extra')
                    ->withPivot('quantità')
                    ->withTimestamps();
    }
        
        
    
    
}
