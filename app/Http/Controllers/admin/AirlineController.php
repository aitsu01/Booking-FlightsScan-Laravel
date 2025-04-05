<?php

namespace App\Http\Controllers\Admin;



use App\Http\Controllers\Controller;
use App\Models\Airline;






use Illuminate\Http\Request;



class AirlineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $airlines = Airline::all();
        return view('admin.airlines.index', compact('airlines'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.airlines.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome_compagnia' => 'required|string|max:255',
        ]);

       /* Airline::create($request->all());*/
        Airline::create($request->except('_token'));
        return redirect()->route('admin.airlines.index')->with('success', 'Compagnia creata con successo!');
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
        return view('admin.airlines.edit', compact('airline'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Airline $airline)
    {
        $request->validate([
            'nome_compagnia' => 'required|string|max:255',
        ]);

      

        $airline->update($request->all());
        return redirect()->route('admin.airlines.index')->with('success', 'Compagnia aggiornata con successo!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Airline $airline)
    {
        $airline->delete();
        return redirect()->route('admin.airlines.index')->with('success', 'Compagnia eliminata con successo!');
    }
}
