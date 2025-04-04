<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AirlineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $airlines = Airline::all();
        return view('airlines.index', compact('airlines'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('airlines.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome_compagnia' => 'required|string|max:255',
        ]);

        Airline::create([
            'nome_compagnia' => $request->nome_compagnia,
        ]);

        return redirect()->route('airlines.index')->with('success', 'Compagnia creata con successo!');
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
    public function edit(Airline $airline)
    {
        return view('airlines.edit', compact('airline'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Airline $airline)
    {
        $request->validate([
            'nome_compagnia' => 'required|string|max:255',
        ]);

        $airline->update([
            'nome_compagnia' => $request->nome_compagnia,
        ]);

        return redirect()->route('airlines.index')->with('success', 'Compagnia aggiornata!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Airline $airline)
    {
        $airline->delete();
        return redirect()->route('airlines.index')->with('success', 'Compagnia eliminata!');
    }
}
