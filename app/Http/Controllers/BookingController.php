<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Flight;
use App\Models\Passenger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    
        $bookings = Booking::with('flight', 'passengers')
            ->where('user_id', Auth::id())
            ->get();

        return view('bookings.index', compact('bookings'));
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $flights = Flight::all();
        return view('bookings.create', compact('flights'));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'flight_id' => 'required|exists:flights,id',
            'passengers.*.nome' => 'required|string|max:255',
            'passengers.*.cognome' => 'required|string|max:255',
            'passengers.*.data_nascita' => 'required|date',
        ]);

        // Crea la prenotazione
        $booking = Booking::create([
            'user_id' => Auth::id(),
            'flight_id' => $request->flight_id,
            'data_prenotazione' => now(),
            'stato' => 'confermato',
        ]);

        // Aggiunge i passeggeri
        foreach ($request->passengers as $passengerData) {
            $passengerData['booking_id'] = $booking->id;
            Passenger::create($passengerData);
        }

        // Associa gli extra selezionati (many-to-many con pivot quantità)
        if ($request->has('extras')) {
        foreach ($request->extras as $extra_id => $data) {
        if (isset($data['checked']) && $data['checked']) {
            $quantita = isset($data['quantita']) ? intval($data['quantita']) : 1;
            $booking->extras()->attach($extra_id, ['quantita' => $quantita]);
        }
    }
}

        return redirect()->route('bookings.index')->with('success', 'Prenotazione effettuata con successo!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        $this->authorize('view', $booking); // opzionale se usi policies
        $booking->load('flight', 'passengers');

        return view('bookings.show', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        $this->authorize('delete', $booking); // opzionale
        $booking->delete();

        return redirect()->route('bookings.index')->with('success', 'Prenotazione cancellata.');
    }
}
