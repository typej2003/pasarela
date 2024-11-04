<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\ProcesadoController;
use App\Http\Livewire\Operacion\MakePayment;
use App\Http\Livewire\Operacion\Pasarela;
use App\Http\Livewire\Recursos\ApiController;

Route::get('/MakePayment/{comercioId}', MakePayment::class)->name('MakePayment')->middleware('auth');

Route::get('/showPasarela/{comercio_id}', Pasarela::class)->name('showPasarela')->middleware('auth');

Route::get('/enviarDataPasarela', [Pasarela::class, 'enviarDataPasarela'])->name('enviardataPasarela');

Route::get('/pagosatisfactorio/{ID}', [ProcesadoController::class, 'pagosatisfactorio'])->name('pagosatisfactorio');

Route::post('/createClient', [Pasarela::class, 'createClient'])->name('createClient');
