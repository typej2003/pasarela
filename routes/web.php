<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SearchController;

use App\Http\Controllers\Admin\SearchAfiliado;

use App\Http\Livewire\Admin\Settings\ListMetodosPagos;

use App\Http\Livewire\Recursos\ApiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

Route::get('/listMetodosPagos', ListMetodosPagos::class)->name('listMetodosPagos')->middleware('auth');

Route::get('/neg/{comercio}', SearchAfiliado::class)->name('searchafiliado');

Route::get('/api/apicontroller', ApiController::class)->name('api.apicontroller')->middleware('auth');

Route::get('/ProcessPaymentDemo/0', [ApiController::class, 'recibirDatos'])->name('ProcessPaymentDemo');

Route::get('/CheckPaymentAjax/0', [ApiController::class, 'ChequePago'])->name('CheckPaymentAjax')->middleware('auth');

Route::controller(SearchController::class)->group(function(){
    Route::get('autocomplete-cliente', 'autocompleteCliente')->name('autocomplete-cliente');
});

Route::get('/enviarData', [SearchAfiliado::class, 'enviarData'])->name('enviardata');