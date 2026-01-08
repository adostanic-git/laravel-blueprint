<?php

namespace App\Http\Controllers;

use App\Models\Narudzbina;
use Illuminate\Http\Request;

class NarudzbinaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Učitavamo sve narudžbine sa povezanim kupcem
        $narudzbine = Narudzbina::with('kupac')->orderBy('created_at', 'desc')->get();

        return view('narudzbine.index', compact('narudzbine'));
    }

    public function edit($id)
    {
        $narudzbina = Narudzbina::findOrFail($id);
        return view('narudzbine.edit', compact('narudzbina'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string',
            'ukupan_iznos' => 'required|numeric|min:0',
        ]);

        $narudzbina = Narudzbina::findOrFail($id);
        $narudzbina->update($request->all());

        return redirect()->route('narudzbine.index')
                         ->with('success', 'Narudžbina je uspešno izmenjena.');
    }

}
       

