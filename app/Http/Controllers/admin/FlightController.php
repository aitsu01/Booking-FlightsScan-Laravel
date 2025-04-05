<?php

namespace App\Http\Controllers\Admin;
use App\Models\Airline;
use App\Models\Flight;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    /**
     * Visualizza l'elenco di tutti i voli.
     */
    public function index()
    {
        $flights = Flight::all();
        return view('admin.flights.index', compact('flights'));
    }

    /**
     * Mostra il form per creare un nuovo volo.
     */
    public function create()
    {
        $airlines = Airline::all();
        return view('admin.flights.create', compact('airlines'));
        
    }

    /**
     * Salva un nuovo volo nel database.
     */
    public function store(Request $request)
    {
        // Validazione dei dati
        $request->validate([
            'airline_id'         => 'required|exists:airlines,id',
            'aeroporto_partenza' => 'required|string|max:255',
            'aeroporto_arrivo'   => 'required|string|max:255',
            'data_partenza'      => 'required|date',
            'ora_partenza'       => 'required',
            'ora_arrivo'         => 'required',
            'prezzo_base'        => 'required|numeric|min:0'
        ]);

        // Creazione del volo con assegnazione massiva (assicurati di avere impostato $fillable nel modello)
        Flight::create($request->all());
        $airlines = \App\Models\Airline::all();

        return redirect()->route('admin.flights.index')
                         ->with('success', 'Volo creato con successo!');
    }

    /**
     * Visualizza i dettagli di un volo specifico.
     */
    public function show(Flight $flight)
    {
        return view('admin.flights.show', compact('flight'));
    }

    /**
     * Mostra il form per modificare un volo esistente.
     */
    public function edit(Flight $flight)
    {
        $airlines = \App\Models\Airline::all(); // Assicurati di importare il modello Airline
        return view('admin.flights.edit', compact('flight', 'airlines'));
    }

    /**
     * Aggiorna un volo esistente.
     */
    public function update(Request $request, Flight $flight)
    {
        // Validazione dei dati
        $request->validate([
            'airline_id'         => 'required|exists:airlines,id',
            'aeroporto_partenza' => 'required|string|max:255',
            'aeroporto_arrivo'   => 'required|string|max:255',
            'data_partenza'      => 'required|date',
            'ora_partenza'       => 'required',
            'ora_arrivo'         => 'required',
            'prezzo_base'        => 'required|numeric|min:0'
        ]);

        $flight->update($request->all());

        return redirect()->route('admin.flights.index')
                         ->with('success', 'Volo aggiornato con successo!');
    }

    /**
     * Elimina un volo dal database.
     */
    public function destroy(Flight $flight)
    {
        $flight->delete();
        return redirect()->route('admin.flights.index')
                         ->with('success', 'Volo eliminato con successo!');
    }
}
