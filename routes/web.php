<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\PublicController;


use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AirlineController;
use App\Http\Controllers\Admin\FlightController;
use App\Http\Controllers\Admin\ExtraController;

// Rotte per l'area admin (già protette dal middleware auth e controllo admin)
Route::middleware('auth')->group(function () {
    // Dashboard admin dinamica
    Route::get('/admin/dashboard', function () {
        if (auth()->check() && auth()->user()->is_admin) {
            return view('admin.dashboard');
        }
        abort(403, 'Accesso negato. Solo per amministratori.');
    })->name('admin.dashboard');

    // Rotte per la gestione delle compagnie aeree
    Route::resource('/admin/airlines', AirlineController::class, ['as' => 'admin']);

    // Rotte per la gestione dei voli
    Route::resource('/admin/flights', FlightController::class, ['as' => 'admin']);

    // Rotte per la gestione degli extra
    Route::resource('/admin/extras', ExtraController::class, ['as' => 'admin']);
});



/*Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', function () {
        if (auth()->check() && auth()->user()->is_admin) {
            return view('admin.dashboard');
        }
        abort(403, 'Accesso negato. Solo per amministratori.');
    })->name('admin.dashboard');
});*/



Route::get('/', [PublicController::class, 'homepage'])->name('homepage');