<?php

namespace App\Http\Controllers;

use App\Models\Kupac;
use Illuminate\Http\Request;

class KupacController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kupci = Kupac::all();
        return view('kupci.index', compact('kupci'));
    }

    public function create()
    {
        return view('kupci.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'ime' => 'required|string|max:255',
            'prezime' => 'required|string|max:255',
            'email' => 'required|email',
            'telefon' => 'required|string|max:50',
            'adresa' => 'required|string|max:50',
        ]);

        Kupac::create($request->all());

        return redirect()
            ->route('kupci.index')
            ->with('success', 'Kupac je uspešno dodat.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $kupac = Kupac::findOrFail($id);
        return view('kupci.show', compact('kupac'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kupac = Kupac::findOrFail($id);
        return view('kupci.edit', compact('kupac'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'ime' => 'required|string|max:255',
            'prezime' => 'required|string|max:255',
            'email' => 'required|email',
            'telefon' => 'required|string|max:50',
            'adresa' => 'required|string|max:50',
        ]);

        $kupac = Kupac::findOrFail($id);
        $kupac->update([
            'ime' => $request->ime,
            'prezime' => $request->prezime,
            'email' => $request->email,
            'telefon' => $request->telefon,
            'adresa' => $request->adresa,
        ]);

        return redirect()->route('kupci.index')
                         ->with('success', 'Kupac je uspešno izmenjen.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kupac = Kupac::findOrFail($id);
        $kupac->delete();

        return redirect()
            ->route('kupci.index')
            ->with('success', 'Kupac je uspešno obrisan.');
    }
}
