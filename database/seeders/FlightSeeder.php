<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class FlightSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $flights = [];

        // Genera 10 voli dinamici
        for ($i = 0; $i < 10; $i++) {
            
            // Genera una data di partenza casuale
            $dataPartenza = $faker->dateTimeBetween('now', '+1 month');
            
            // Genera l'orario di partenza: partiamo dalla data di partenza e aggiungiamo almeno 1 ora
            $oraPartenza = (clone $dataPartenza)->modify('+' . $faker->numberBetween(1, 2) . ' hours');
            
            // Genera l'orario di arrivo: a partire dall'orario di partenza, aggiungi 1-3 ore
            $oraArrivo = (clone $oraPartenza)->modify('+' . $faker->numberBetween(1, 4) . ' hours');

            $flights[] = [
                'aeroporto_partenza' => $faker->city,
                'aeroporto_arrivo'   => $faker->city,
                'data_partenza'      => $dataPartenza,
                'airline_id'         => $faker->numberBetween(6, 6), // devono essere dello stesso valore nella tabella airlines
                'ora_partenza'       => $oraPartenza,
                'ora_arrivo'         => $oraArrivo,
                'prezzo_base'        => $faker->randomFloat(2, 50, 500),
            ];
        }

        DB::table('flights')->insert($flights);
    }
}
