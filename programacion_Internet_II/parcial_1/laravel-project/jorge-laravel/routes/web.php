<?php

use App\Http\Controllers\SuperheroController;
use App\Http\Controllers\SumaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/suma', [SumaController::class, 'index'])->name('suma.index');
Route::post('/suma', [SumaController::class, 'sumar'])->name('suma.sumar');

Route::get('/superheroes', [SuperheroController::class, 'index'])->name('superheroes.index');
