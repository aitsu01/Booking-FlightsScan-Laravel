<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExtraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $extras = Extra::all();
        return view('extras.index', compact('extras'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('extras.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome_extra' => 'required|string|max:255',
            'prezzo' => 'required|numeric|min:0',
        ]);

        Extra::create($request->all());

        return redirect()->route('extras.index')->with('success', 'Extra creato con successo!');
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
    public function edit(string $id)
    {
        return view('extras.edit', compact('extra'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nome_extra' => 'required|string|max:255',
            'prezzo' => 'required|numeric|min:0',
        ]);
        $extra->update($request->all());

        return redirect()->route('extras.index')->with('success', 'Extra aggiornato correttamente!');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $extra->delete();
        return redirect()->route('extras.index')->with('success', 'Extra eliminato.');
    }
}
