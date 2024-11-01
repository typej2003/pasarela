<?php

use Illuminate\Support\Facades\Route;


use App\Http\Livewire\Operacion\MakePayment;
use App\Http\Livewire\Operacion\Pasarela;

Route::get('/MakePayment/{comercioId}', MakePayment::class)->name('MakePayment')->middleware('auth');

Route::get('/pasarela', Pasarela::class)->name('pasarela')->middleware('auth');

Route::get('/enviardataPasarela', [Pasarela::class, 'enviarData'])->name('enviardataPasarela');