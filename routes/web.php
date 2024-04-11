<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TripController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\ContractController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('clients', [ClientController::class,'index'])->name('clients.index');
Route::get('clients/create', [ClientController::class,'create'])->name('clients.create');
Route::post('clients/store', [ClientController::class,'store'])->name('clients.store');
Route::delete('clients/destroy/{id}', [ClientController::class,'destroy'])->name('clients.destroy');


Route::resource('trips', TripController::class);
Route::resource('contracts', ContractController::class);
