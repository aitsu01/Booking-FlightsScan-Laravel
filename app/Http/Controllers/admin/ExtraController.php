<?php

namespace App\Http\Controllers\Admin;
use App\Models\Extra;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExtraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $extras = Extra::all();
        return view('admin.extras.index', compact('extras'));

     
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.extras.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome_extra'   => 'required|string|max:255',
            'prezzo_extra' => 'required|numeric|min:0',
        ]);
        Extra::create($request->all());

        return redirect()->route('admin.extras.index')
                         ->with('success', 'Extra creato con successo!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Extra $extra)
    {
        return view('admin.extras.show', compact('extra'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Extra $extra)
    {
        return view('admin.extras.edit', compact('extra'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Extra $extra)
    {
        $request->validate([
            'nome_extra'   => 'required|string|max:255',
            'prezzo_extra' => 'required|numeric|min:0',
        ]);

        $extra->update($request->all());

        return redirect()->route('admin.extras.index')
                         ->with('success', 'Extra aggiornato con successo!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Extra $extra)
    {
        $extra->delete();
        return redirect()->route('admin.extras.index')
                         ->with('success', 'Extra eliminato con successo!');
    }
}
