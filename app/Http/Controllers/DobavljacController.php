<?php

namespace App\Http\Controllers;

use App\Models\Dobavljac;
use Illuminate\Http\Request;

class DobavljacController extends Controller
{
    /**
     * Prikaz liste dobavljača
     */
    public function index()
    {
        $dobavljaci = Dobavljac::all();
        return view('dobavljaci.index', compact('dobavljaci'));
    }

    /**
     * Forma za dodavanje novog dobavljača
     */
    public function create()
    {
        return view('dobavljaci.create');
    }

    /**
     * Čuvanje novog dobavljača u bazi
     */
    public function store(Request $request)
    {
        $request->validate([
            'naziv' => 'required|string|max:255',
            'kontakt_osoba' => 'required|string|max:255',
            'email' => 'required|email',
            'telefon' => 'required|string|max:50',
        ]);

        Dobavljac::create($request->all());

        return redirect()
            ->route('dobavljaci.index')
            ->with('success', 'Dobavljač je uspešno dodat.');
    }

    /**
     * Prikaz jednog dobavljača
     */
    public function show($id)
    {
        $dobavljac = Dobavljac::findOrFail($id);
        return view('dobavljaci.show', compact('dobavljac'));
    }

    /**
     * Forma za izmenu dobavljača
     */
    public function edit($id)
    {
        $dobavljac = Dobavljac::findOrFail($id);
        return view('dobavljaci.edit', compact('dobavljac'));
    }

    /**
     * Ažuriranje dobavljača
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'naziv' => 'required|string|max:255',
            'kontakt_osoba' => 'required|string|max:255',
            'email' => 'required|email',
            'telefon' => 'required|string|max:50',
        ]);

        $dobavljac = Dobavljac::findOrFail($id);
        $dobavljac->update($request->all());

        return redirect()
            ->route('dobavljaci.index')
            ->with('success', 'Dobavljač je uspešno izmenjen.');
    }

    /**
     * Brisanje dobavljača
     */
    public function destroy($id)
    {
        $dobavljac = Dobavljac::findOrFail($id);
        $dobavljac->delete();

        return redirect()
            ->route('dobavljaci.index')
            ->with('success', 'Dobavljač je uspešno obrisan.');
    }
}
