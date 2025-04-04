<?php


use App\Http\Controllers\FlightController;
use App\Http\Controllers\AirlineController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ExtraController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

Route::middleware(['auth'])->group(function () {

    // Prenotazioni
    Route::resource('bookings', BookingController::class);

    // Aggiunta/rimozione extra alla prenotazione
    Route::post('/bookings/{booking}/extras', [BookingExtraController::class, 'store'])->name('bookings.extras.store');
    Route::delete('/bookings/{booking}/extras/{extra}', [BookingExtraController::class, 'destroy'])->name('bookings.extras.destroy');

    // (Opzionale) Gestione passeggeri separatamente
    Route::resource('passengers', PassengerController::class)->only(['edit', 'update', 'destroy']);
});




Route::get('/', [PublicController::class, 'homepage'])->name('homepage');

Route::get('/flights/search', [FlightController::class, 'search'])->name('flights.search');

