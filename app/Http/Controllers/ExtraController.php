<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExtraController extends Controller
{
    
    public function index()
    {
        $extras = Extra::all();
        return view('extras.index', compact('extras'));
    }

    
    public function create()
    {
        return view('extras.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'nome_extra' => 'required|string|max:255',
            'prezzo' => 'required|numeric|min:0',
        ]);

        Extra::create($request->all());

        return redirect()->route('extras.index')->with('success', 'Extra creato con successo!');
    }

    
    public function show(Extra $extra )
    {
        return view('extras.show', compact('extra'));
    }

    
    public function edit(string $id)
    {
        return view('extras.edit', compact('extra'));
    }


    public function update(Request $request, string $id)
    {
        $request->validate([
            'nome_extra' => 'required|string|max:255',
            'prezzo' => 'required|numeric|min:0',
        ]);
        $extra->update($request->all());

        return redirect()->route('extras.index')->with('success', 'Extra aggiornato correttamente!');


    }

    
    public function destroy(string $id)
    {
        $extra->delete();
        return redirect()->route('extras.index')->with('success', 'Extra eliminato.');
    }
}
