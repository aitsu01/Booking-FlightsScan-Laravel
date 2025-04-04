<?php


use App\Http\Controllers\FlightController;
use App\Http\Controllers\AirlineController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ExtraController;
use App\Http\Controllers\PublicController;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


use Illuminate\Support\Facades\Route;
Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});



Route::get('/', [PublicController::class, 'homepage'])->name('homepage');

Route::get('/flights/search', [FlightController::class, 'search'])->name('flights.search');

