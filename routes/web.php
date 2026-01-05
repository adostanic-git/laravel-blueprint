<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/prodavnica', [ProizvodController::class, 'prodavnica']);
Route::post('/naruci', [NarudzbinaController::class, 'kreirajNarudzbinu']);
Route::get('/moje-narudzbine', [NarudzbinaController::class, 'mojeNarudzbine']);

