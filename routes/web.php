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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => '/travelling'], function () {
    Route::get('/about/{id}', [App\Http\Controllers\Travelling\TravellingController::class, 'about'])->name('travelling.about');

    Route::get('/reservation/{id}', [App\Http\Controllers\Travelling\TravellingController::class, 'makeReservation'])->name('travelling.reservation');

    Route::post('/reservation/{id}', [App\Http\Controllers\Travelling\TravellingController::class, 'storeReservation'])->name('travelling.reservation.store');

    Route::get('/booking-success', [App\Http\Controllers\Travelling\TravellingController::class, 'success'])->name('travelling.success');

    Route::get('/deals', [App\Http\Controllers\Travelling\TravellingController::class, 'deals'])->name('travelling.deals');
});

Route::get('/user/bookings', [App\Http\Controllers\Users\UsersController::class, 'booking'])->name('user.bookings')->middleware('auth');



Route::get('/admin/login', [App\Http\Controllers\Admins\AdminsController::class, 'viewLogin'])->name('admin.login')->middleware('check.auth');
Route::post('/admin/login', [App\Http\Controllers\Admins\AdminsController::class, 'checkLogin'])->name('admin.login.check');

Route::group(['prefix' => '/admin', 'middleware' => 'auth:admin'], function () {
    Route::get('/dashboard', [App\Http\Controllers\Admins\AdminsController::class, 'index'])->name('admin.dashboard');
    Route::post('/logout', [App\Http\Controllers\Admins\AdminsController::class, 'logout'])->name('admin.logout');
});
