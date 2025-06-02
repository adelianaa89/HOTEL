<?php

use App\Http\Controllers\admin\HotelController;
use App\Http\Controllers\admin\KamarController;
use App\Http\Controllers\admin\UsersController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\User\BookingController;
use App\Http\Controllers\user\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [UserController::class, 'index'])->name('home');


Route::get('/dashboard', function () {
    return redirect()->route('home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('admin')->middleware(['auth', 'auth.role:admin'])->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::resource('users', UsersController::class);
    Route::resource('kamar', KamarController::class);
    Route::resource('hotel', HotelController::class);
});


Route::middleware('auth')->group(function () {
    Route::get('/hotels/{id}/rooms', [UserController::class, 'showRooms'])->name('hotel.rooms');
    Route::post('/booking', [BookingController::class, 'store'])->name('booking.store')->middleware('auth');
});

require __DIR__ . '/auth.php';
