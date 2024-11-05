<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Afiliado\ListComercios;
use App\Http\Livewire\Afiliado\listEmployesComercio;
use App\Http\Livewire\Afiliado\ListMetodosPagosC;

Route::get('/listComercios/{userId}', ListComercios::class)->name('listComercios')->middleware('auth');

Route::get('/listEmployesComercio/{comercio_id}', listEmployesComercio::class)->name('listEmployesComercio')->middleware('auth');

Route::get('/listMetodosPagosC/{comercio_id}', ListMetodosPagosC::class)->name('listMetodosPagosC')->middleware('auth');



