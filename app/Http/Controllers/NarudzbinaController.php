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
}
