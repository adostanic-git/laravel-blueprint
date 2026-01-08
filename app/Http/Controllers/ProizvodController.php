<?php

namespace App\Http\Controllers;

use App\Models\Proizvod;
use Illuminate\Http\Request;

class ProizvodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proizvodi = Proizvod::all();
        return view('proizvodi.index', compact('proizvodi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('proizvodi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validacija podataka
        $request->validate([
            'naziv' => 'required|string|max:255',
            'cena' => 'required|numeric|min:0',
            'kolicina' => 'required|integer|min:0',
        ]);

        // Kreiranje proizvoda
        Proizvod::create([
            'naziv' => $request->naziv,
            'cena' => $request->cena,
            'kolicina' => $request->kolicina,
        ]);

        return redirect()->route('proizvodi.index')
                         ->with('success', 'Proizvod je uspešno dodat.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $proizvod = Proizvod::findOrFail($id);
        return view('proizvodi.show', compact('proizvod'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $proizvod = Proizvod::findOrFail($id);
        return view('proizvodi.edit', compact('proizvod'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validacija
        $request->validate([
            'naziv' => 'required|string|max:255',
            'cena' => 'required|numeric|min:0',
            'kolicina' => 'required|integer|min:0',
        ]);

        // Update proizvoda
        $proizvod = Proizvod::findOrFail($id);
        $proizvod->update([
            'naziv' => $request->naziv,
            'cena' => $request->cena,
            'kolicina' => $request->kolicina,
        ]);

        return redirect()->route('proizvodi.index')
                         ->with('success', 'Proizvod je uspešno izmenjen.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $proizvod = Proizvod::findOrFail($id);
        $proizvod->delete();

        return redirect()->route('proizvodi.index')
                         ->with('success', 'Proizvod je uspešno obrisan.');
    }
}
