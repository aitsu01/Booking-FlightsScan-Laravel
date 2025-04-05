<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Passenger extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id',
        'nome',
        'cognome',
        'data_nascita',
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }



}
