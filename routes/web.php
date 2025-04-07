<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\BookingController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AirlineController;
use App\Http\Controllers\Admin\FlightController;
use App\Http\Controllers\Admin\ExtraController;

// Rotte per l'area admin (già protette dal middleware auth e controllo admin)
Route::middleware('auth')->group(function () {
    
    Route::get('/admin/dashboard', function () {
        if (auth()->check() && auth()->user()->is_admin) {
            return view('admin.dashboard');
        }
        abort(403, 'Accesso negato. Solo per amministratori.');
    })->name('admin.dashboard');


    Route::middleware(['auth', 'is_admin'])->group(function () {
        
        Route::resource('/admin/airlines', AirlineController::class, ['as' => 'admin']);
        Route::resource('/admin/flights', FlightController::class, ['as' => 'admin']);
        Route::resource('/admin/extras', ExtraController::class, ['as' => 'admin']);
        Route::resource('/admin/statistics', DashboardController::class, ['as' => 'admin']);
        


    });

    /* Da rivedere le rotte per l'admin sono solo sperimentali dovuto ad un errote nel file kernel.php*/

   /************************************************************************************************** */

    Route::middleware(['auth', 'is_admin'])->group(function () {
        Route::resource('/admin/flights', FlightController::class, ['as' => 'admin']);
    });

  
     // Solo admin può gestire queste risorse
     Route::resource('/admin/airlines', AirlineController::class, ['as' => 'admin']);
     Route::resource('/admin/flights', FlightController::class, ['as' => 'admin']);
     Route::resource('/admin/extras', ExtraController::class, ['as' => 'admin']);
     Route::get('/admin/statistics', [DashboardController::class, 'statistics'])->name('admin.statistics.index');





     
 });



 
Route::middleware('auth')->group(function () {
    Route::resource('bookings', BookingController::class);
    Route::get('/booking/create/{flight}', [BookingController::class, 'create'])->name('booking.create');
    Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');

    Route::get('bookings/{booking}/pdf', [BookingController::class, 'downloadPdf'])->name('bookings.pdf');
    


    // Gestione extra post-prenotazione
    Route::get('/booking/{booking}/extras', [BookingController::class, 'editExtras'])->name('booking.extras.edit');
    Route::post('/booking/{booking}/extras', [BookingController::class, 'updateExtras'])->name('booking.extras.update');
});



/*Rotte Pubbliche*/
Route::get('/', [PublicController::class, 'homepage'])->name('homepage');
Route::get('/flights/search', [PublicController::class, 'search'])->name('flights.search');
Route::get('/flights/{flight}', [FlightController::class, 'show'])->name('flights.show'); 
