<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KupacController;
use App\Http\Controllers\DobavljacController;
use App\Http\Controllers\ProizvodController;
use App\Http\Controllers\ProdavnicaController;
use App\Http\Controllers\KorpaController;
use App\Http\Controllers\NarudzbinaController;


// Početna stranica
Route::get('/', function () {
    return view('welcome');
});

// Prodavnica – pregled proizvoda od kruške
Route::get('/prodavnica', [ProdavnicaController::class, 'index'])
    ->name('prodavnica.index');

Route::get('/prodavnica/{id}', [ProdavnicaController::class, 'show'])
    ->name('prodavnica.show');

// Korpa – upravljanje korpom
Route::get('/korpa', [KorpaController::class, 'index'])
    ->name('korpa.index');

Route::post('/korpa/poruci', [KorpaController::class, 'poruci'])->name('korpa.poruci');

Route::post('/korpa/dodaj/{id}', [KorpaController::class, 'dodaj'])
    ->name('korpa.add');

Route::post('/korpa/ukloni/{id}', [KorpaController::class, 'ukloni'])
    ->name('korpa.remove');



require __DIR__.'/auth.php';


Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard
    Route::get('/dashboard', function () { return view('dashboard'); })->middleware(['auth', 'verified'])->name('dashboard');

    // Profil korisnika
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    Route::get('/izvestaji', function () {
        return view('izvestaji.index');
    })->name('izvestaji')->middleware('auth');

    // CRUD rute
    Route::resource('/kupci', KupacController::class);
    Route::resource('/dobavljaci', DobavljacController::class);
    Route::resource('/proizvodi', ProizvodController::class);
    Route::resource('/narudzbine', NarudzbinaController::class);

    // Obrada narudžbine – admin use case
    Route::post('/narudzbine/{id}/edit',
        [NarudzbinaController::class, 'edit']
    );
});
