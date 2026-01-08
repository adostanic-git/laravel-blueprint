<?php

namespace App\Http\Controllers;

use App\Models\Proizvod;
use Illuminate\Http\Request;

class KorpaController extends Controller
{
    /**
     * Prikaz korpe
     */
    public function index()
    {
        $korpa = session()->get('korpa', []);
        return view('korpa.index', compact('korpa'));
    }

    /**
     * Dodavanje proizvoda u korpu
     */
    public function dodaj(Request $request, $id)
    {
        $proizvod = Proizvod::findOrFail($id);
        $korpa = session()->get('korpa', []);

        $kolicina = $request->quantity ?? 1;

        if (isset($korpa[$id])) {
            $korpa[$id]['kolicina'] += $kolicina;
        } else {
            $korpa[$id] = [
                'naziv'   => $proizvod->naziv,
                'cena'    => $proizvod->cena,
                'kolicina'=> $kolicina
            ];
        }

        session()->put('korpa', $korpa);

        return redirect()->back()->with('success', 'Proizvod dodat u korpu');
    }

    /**
     * Uklanjanje proizvoda iz korpe
     */
    public function ukloni($id)
    {
        $korpa = session()->get('korpa', []);

        if (isset($korpa[$id])) {
            unset($korpa[$id]);
            session()->put('korpa', $korpa);
        }

        return redirect()->route('korpa.index')->with('success', 'Proizvod uklonjen');
    }
}
