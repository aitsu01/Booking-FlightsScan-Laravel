<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;


use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function statistics()
    {
        // Statistiche prenotazioni per mese
        $monthlyBookings = Booking::selectRaw('MONTH(data_prenotazione) as month, COUNT(*) as count')
            ->groupBy('month')
            ->get();

        $months = [];
        $bookingCounts = [];
        foreach ($monthlyBookings as $row) {
            $months[] = date("F", mktime(0, 0, 0, $row->month, 10));
            $bookingCounts[] = $row->count;
        }

        

        // Statistiche extra
        $extras = DB::table('booking_extra')
            ->join('extras', 'extras.id', '=', 'booking_extra.extra_id')
            ->select('extras.nome_extra', DB::raw('SUM(booking_extra.quantita) as total'))
            ->groupBy('extras.nome_extra')
            ->get();

        $extraLabels = [];
        $extraCounts = [];
        foreach ($extras as $extra) {
            $extraLabels[] = $extra->nome_extra;
            $extraCounts[] = $extra->total;
        }

        

         // STATISTICHE: Compagnie più prenotate
         $mostBookedAirlines = DB::table('bookings')
         ->join('flights', 'bookings.flight_id', '=', 'flights.id')
         ->join('airlines', 'flights.airline_id', '=', 'airlines.id')
         ->select('airlines.nome_compagnia', DB::raw('COUNT(*) as total'))
         ->groupBy('airlines.nome_compagnia')
         ->orderByDesc('total')
         ->limit(5)
         ->get();

         $mostBookedAirlineLabels = [];
         $mostBookedAirlineCounts = [];
         foreach ($mostBookedAirlines as $row) {
         $mostBookedAirlineLabels[] = $row->nome_compagnia;
         $mostBookedAirlineCounts[] = $row->total;
     }


        

       
        $mostBookedFlights = Booking::with('flight') // Eager loading per la relazione flight
        ->select('flight_id', DB::raw('COUNT(*) as total'))
        ->groupBy('flight_id')
        ->orderByDesc('total')
        ->limit(5)
        ->get();

         // Mappiamo per estrarre le informazioni degli aeroporti di partenza e arrivo, con valori di default se non presenti
         $mostBookedFlights = $mostBookedFlights->map(function ($item) {
         $item->aeroporto_partenza = $item->flight->aeroporto_partenza ?? 'Aeroporto Partenza #' . $item->flight_id;
         $item->aeroporto_arrivo   = $item->flight->aeroporto_arrivo ?? 'Aeroporto Arrivo #' . $item->flight_id;
         return $item;
         });




        

       
        return view('admin.statistics.index', compact('months', 'bookingCounts', 'extraLabels', 'extraCounts', 'mostBookedAirlineLabels', 'mostBookedAirlineCounts','mostBookedFlights'));
    }
}
