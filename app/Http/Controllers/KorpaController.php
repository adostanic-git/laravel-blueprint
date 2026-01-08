<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proizvod;
use App\Models\Narudzbina;
use Illuminate\Support\Facades\Auth;

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
     * Dodaj proizvod u korpu
     */
    public function dodaj($id)
    {
        $proizvod = Proizvod::findOrFail($id);

        $korpa = session()->get('korpa', []);

        if(isset($korpa[$id])) {
            $korpa[$id]['kolicina']++;
        } else {
            $korpa[$id] = [
                "naziv" => $proizvod->naziv,
                "cena" => $proizvod->cena,
                "kolicina" => 1
            ];
        }

        session()->put('korpa', $korpa);

        return redirect()->back()->with('success', 'Proizvod dodat u korpu!');
    }

    /**
     * Ukloni proizvod iz korpe
     */
    public function ukloni($id)
    {
        $korpa = session()->get('korpa', []);

        if(isset($korpa[$id])) {
            unset($korpa[$id]);
            session()->put('korpa', $korpa);
        }

        return redirect()->back()->with('success', 'Proizvod uklonjen iz korpe!');
    }

    /**
     * Poruči sve iz korpe i kreiraj narudžbinu
     */
    public function poruci(Request $request)
    {
        $korpa = session()->get('korpa', []);

        if(count($korpa) === 0){
            return redirect()->back()->with('success', 'Korpa je prazna!');
        }

        // Računanje ukupne cene
        $ukupanIznos = 0;
        foreach($korpa as $item) {
            $ukupanIznos += $item['cena'] * $item['kolicina'];
        }

        // Kreiranje narudžbine
        $narudzbina = new Narudzbina();
        $narudzbina->kupac_id = Auth::id(); // ID trenutno ulogovanog korisnika
        $narudzbina->ukupan_iznos = $ukupanIznos;
        $narudzbina->status = 'nova';
        $narudzbina->save();

        // Brisanje korpe iz session-a
        session()->forget('korpa');

        return redirect()->route('korpa.index')->with('success', 'Uspešno ste poručili proizvode!');
    }
}
