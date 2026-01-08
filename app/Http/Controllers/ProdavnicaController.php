<?php

namespace App\Http\Controllers;

use App\Models\Proizvod;
use Illuminate\Http\Request;

class ProdavnicaController extends Controller
{
    /**
     * Prikaz svih proizvoda (prodavnica)
     */
    public function index()
    {
        $proizvodi = Proizvod::all();
        return view('prodavnica.index', compact('proizvodi'));
    }

    /**
     * Prikaz jednog proizvoda
     */
    public function show($id)
    {
        $proizvod = Proizvod::findOrFail($id);
        return view('prodavnica.show', compact('proizvod'));
    }
}
