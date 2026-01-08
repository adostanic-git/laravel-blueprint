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
            'email' => 'required|email',
            'telefon' => 'required|string|max:50',
        ]);

        Kupac::create($request->all());

        return redirect()
            ->route('kupci.index')
            ->with('success', 'Kupac je uspešno dodat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kupac $kupac)
    {
        return view('kupci.show', compact('kupac'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kupac $kupac)
    {
        return view('kupci.edit', compact('kupac'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kupac $kupac)
    {
        $request->validate([
            'ime' => 'required|string|max:255',
            'email' => 'required|email',
            'telefon' => 'required|string|max:50',
        ]);

        $kupac->update($request->all());

        return redirect()
            ->route('kupci.index')
            ->with('success', 'Podaci o kupcu su uspešno izmenjeni.');
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
