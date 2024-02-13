<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/travelling/about/{id}', [App\Http\Controllers\Travelling\TravellingController::class, 'about'])->name('travelling.about');


Route::get('/travelling/reservation/{id}', [App\Http\Controllers\Travelling\TravellingController::class, 'makeReservation'])->name('travelling.reservation');

Route::post('/travelling/reservation/{id}', [App\Http\Controllers\Travelling\TravellingController::class, 'storeReservation'])->name('travelling.reservation.store');


Route::get('/travelling/reservation/success', [App\Http\Controllers\Travelling\TravellingController::class, 'success'])->name('travelling.reservation.success');


Route::get('/travelling/deals', [App\Http\Controllers\Travelling\TravellingController::class, 'deals'])->name('travelling.deals');
