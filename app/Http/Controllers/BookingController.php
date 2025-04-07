<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Flight;
use App\Models\Passenger;
use App\Models\Extra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;


class BookingController extends Controller
{
    
    public function index()
    {
        $bookings = Booking::with('flight', 'passengers')
            ->where('user_id', Auth::id())
            ->get();

        return view('bookings.index', compact('bookings'));
    }

    
    public function create(Flight $flight)
    { 

        
        $extras = Extra::all();
    
        
        return view('booking.create', compact('flight', 'extras'));
        /*return view('booking.create', compact('flight'));*/
    }

    


    public function store(Request $request)
{

    $request->validate([
        'flight_id' => 'required|exists:flights,id',
        'passengers.*.nome' => 'required|string|max:255',
        'passengers.*.cognome' => 'required|string|max:255',
        'passengers.*.data_nascita' => 'required|date',
        'passengers.*.sesso' => 'required|string|in:Uomo,Donna',
        'passengers.*.nazionalita' => 'required|string',

    ]);

    $booking = Booking::create([
        'user_id' => Auth::id(),
        'flight_id' => $request->flight_id,
        'data_prenotazione' => now(),
        'stato' => 'confermato',
    ]);


    foreach ($request->passengers as $passengerData) {
        $exists = Passenger::where('nome', $passengerData['nome'])
            ->where('cognome', $passengerData['cognome'])
            ->where('booking_id', $booking->id)
            ->exists();

        if (!$exists) {
            Passenger::create([
                'nome' => $passengerData['nome'],
                'cognome' => $passengerData['cognome'],
                'data_nascita' => $passengerData['data_nascita'],
                'sesso' => $passengerData['sesso'],
                'nazionalita' => $passengerData['nazionalita'],
                'booking_id' => $booking->id,
                'flight_id' => $booking->flight_id,
            ]);
        }
    }

    if ($request->has('extras')) {
        foreach ($request->extras as $extra_id => $data) {
            if (!empty($data['checked'])) {
                $quantita = isset($data['quantita']) ? intval($data['quantita']) : 1;
                $booking->extras()->attach($extra_id, ['quantita' => $quantita]);
            }
        }
    }
 

    return redirect()->route('bookings.index')->with('success', 'Prenotazione effettuata con successo!');
}

    
    public function show(Booking $booking)
    {
        $this->authorize('view', $booking); // Se usi policy
        $booking->load('flight', 'passengers');
        return view('bookings.show', compact('booking'));
    }

    
    public function edit(Booking $booking)
    {
        return view('bookings.edit', compact('booking'));
    }

    
    public function update(Request $request, Booking $booking)
    {
        $request->validate([
            'flight_id' => 'required|exists:flights,id',
            
        ]);

        $booking->update([
            'flight_id' => $request->flight_id,
            
        ]);

        return redirect()->route('bookings.index')
                         ->with('success', 'Prenotazione aggiornata con successo!');
    }

   
    public function destroy(Booking $booking)
    {
        $this->authorize('delete', $booking); // Se usi policy
        $booking->delete();
        return redirect()->route('bookings.index')
                         ->with('success', 'Prenotazione cancellata.');
    }


    public function editExtras(Booking $booking)
    {
    
    $booking->load('extras');
    
    $extras = \App\Models\Extra::all();
    return view('booking.extras_edit', compact('booking', 'extras'));
    }


    public function updateExtras(Request $request, Booking $booking)
    {
    // Assumi che il form invii un array 'extras'
    if ($request->has('extras')) {
        $data = [];
        foreach ($request->extras as $extra_id => $extraData) {
            if (isset($extraData['checked']) && $extraData['checked']) {
                $quantita = isset($extraData['quantita']) ? intval($extraData['quantita']) : 1;
                $data[$extra_id] = ['quantita' => $quantita];
            }
        }
        // Aggiorna gli extra associati alla prenotazione senza rimuovere quelli già esistenti, o usa sync se vuoi sostituirli
        $booking->extras()->syncWithoutDetaching($data);
    }
    return redirect()->route('bookings.show', $booking)->with('success', 'Extra aggiornati con successo!');
    }


    public function downloadPdf(Booking $booking)
    {
    $booking->load('flight', 'passengers', 'extras');
    $pdf = Pdf::loadView('bookings.pdf', compact('booking'));
    return $pdf->download('prenotazione_'.$booking->id.'.pdf');
    }

}
