<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Passenger extends Model
{
    use HasFactory;

    protected $fillable = [
                         'nome',
                         'cognome',
                         'data_nascita',
                         'booking_id',
                        'flight_id',
                        'pnr'
                         ];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    protected static function booted()
{
    static::creating(function ($passenger) {
        do {
            $pnr = strtoupper(substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 6));
        } while (Passenger::where('pnr', $pnr)->exists());

        $passenger->pnr = $pnr;
    });
}



}
