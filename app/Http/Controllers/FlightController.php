<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FlightController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $flights = Flight::with('airline')->get();
        return view('flights.index', compact('flights'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $airlines = Airline::all();
        return view('flights.create', compact('airlines'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'airline_id' => 'required|exists:airlines,id',
            'aeroporto_partenza' => 'required|string|max:255',
            'aeroporto_arrivo' => 'required|string|max:255',
            'data_partenza' => 'required|date',
            'ora_partenza' => 'required',
            'ora_arrivo' => 'required',
            'prezzo_base' => 'required|numeric|min:0',
        ]);

        Flight::create($request->all());

        return redirect()->route('flights.index')->with('success', 'Volo creato con successo!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Flight $flight)
    {
        $airlines = Airline::all();
        return view('flights.edit', compact('flight', 'airlines'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Flight $flight)
    {
        $request->validate([
            'airline_id' => 'required|exists:airlines,id',
            'aeroporto_partenza' => 'required|string|max:255',
            'aeroporto_arrivo' => 'required|string|max:255',
            'data_partenza' => 'required|date',
            'ora_partenza' => 'required',
            'ora_arrivo' => 'required',
            'prezzo_base' => 'required|numeric|min:0',
        ]);

        $flight->update($request->all());

        return redirect()->route('flights.index')->with('success', 'Volo aggiornato correttamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Flight $flight)
    {
        $flight->delete();
        return redirect()->route('flights.index')->with('success', 'Volo eliminato.');
    }
}
