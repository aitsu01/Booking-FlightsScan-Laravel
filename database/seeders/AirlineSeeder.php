<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Airline;

class AirlineSeeder extends Seeder
{
    public function run()
    {
        $compagnie = [
            'TKWing',
            'Viking Airlines',
            'Salak Havalar'
            
        ];

        foreach ($compagnie as $nome) {
            Airline::create(['nome_compagnia' => $nome]);
        }
    }
}
