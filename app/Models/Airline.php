<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Airline extends Model
{

    use HasFactory;

    protected $fillable = [
        'nome_compagnia',
    ];


    public function flights(){
        return $this->hasMany(Flight::class);
    }
    
}
