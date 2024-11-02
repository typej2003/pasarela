<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controller\Admin\ProcesadoController;
use App\Http\Livewire\Operacion\MakePayment;
use App\Http\Livewire\Operacion\Pasarela;
use App\Http\Livewire\Recursos\ApiController;

Route::get('/MakePayment/{comercioId}', MakePayment::class)->name('MakePayment')->middleware('auth');

Route::get('/pasarela', Pasarela::class)->name('pasarela')->middleware('auth');

Route::get('/enviardataPasarela', [Pasarela::class, 'enviarData'])->name('enviardataPasarela');

Route::get('/pagosatisfactorio/{ID}', [ProcesadoController::class, 'procesado'])->name('pagosatisfactorio');