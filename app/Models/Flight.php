<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Flight extends Model
{
    use HasFactory;

    // Aggiungi i campi che possono essere assegnati in massa
    protected $fillable = [
        'airline_id',
        'aeroporto_partenza',
        'aeroporto_arrivo',
        'data_partenza',
        'ora_partenza',
        'ora_arrivo',
        'prezzo_base'
    ];

   

    public function airline(){
        return $this->belongsTo(Airline::class);
    }
    
    public function bookings(){
        return $this->hasMany(Booking::class);
    }
}