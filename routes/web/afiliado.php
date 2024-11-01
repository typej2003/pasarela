<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Afiliado\ListComercios;
use App\Http\Livewire\Afiliado\ListMetodosPagosC;

Route::get('/listComercios/{userId}', ListComercios::class)->name('listComercios')->middleware('auth');

Route::get('/listMetodosPagosC/{comercioId}', ListMetodosPagosC::class)->name('listMetodosPagosC')->middleware('auth');

