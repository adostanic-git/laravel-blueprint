<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proizvod;

class ProdavnicaController extends Controller
{
 
    public function index()
    {
        $products = Proizvod::all();
        return view('prodavnica.index', compact('products'));
    }

    // Prikaz jednog proizvoda
    public function show($id)
    {
        return view('prodavnica.show', compact('id'));
    }
}
