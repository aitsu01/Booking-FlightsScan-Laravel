<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function homepage() {

        $latestFlights = \App\Models\Flight::orderBy('created_at', 'desc')->take(6)->get();
        return view('welcome', compact('latestFlights'));
        /*return view('welcome');*/

    }


    public function search(Request $request)
    {
        $query = Flight::query();

        // Se vengono forniti criteri di ricerca, applicali alla query
        if ($request->filled('aeroporto_partenza')) {
            $query->where('aeroporto_partenza', 'like', '%' . $request->aeroporto_partenza . '%');
        }

        if ($request->filled('aeroporto_arrivo')) {
            $query->where('aeroporto_arrivo', 'like', '%' . $request->aeroporto_arrivo . '%');
        }

        if ($request->filled('data_partenza')) {
            $query->whereDate('data_partenza', $request->data_partenza);
        }

        $flights = $query->get();

        return view('flights.search', compact('flights'));
    }
}
