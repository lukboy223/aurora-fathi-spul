<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/bezoeker/dashboard', function () {
        return view('bezoeker.dashboard');
    })->name('bezoeker.dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Bezoeker-only access to reviews
Route::middleware(['auth'])->group(function () {
    Route::get('/reviews', [\App\Http\Controllers\ReviewController::class, 'index'])->name('reviews.index');
    Route::post('/reviews', [\App\Http\Controllers\ReviewController::class, 'store'])->name('reviews.store');
});

Route::middleware('auth')->group(function () {
    Route::get(
        '/admin/dashboard',
        [\App\Http\Controllers\Admin\AdminDashboardController::class, 'index']
    )->name('admin.dashboard');

    Route::get(
        '/medewerker/dashboard',
        [\App\Http\Controllers\Medewerker\MedewerkerDashboardController::class, 'index']
    )->name('medewerker.dashboard');

    Route::resource('medewerker/accounten', \App\Http\Controllers\Medewerker\AccountenController::class)
        ->names('medewerker.accounten')
        ->parameters(['accounten' => 'account']);

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('accounts', \App\Http\Controllers\Admin\AccountController::class)
            ->names('accounts')
            ->parameters(['accounts' => 'account']);
        Route::resource('medewerkers', \App\Http\Controllers\Admin\MedewerkerController::class)
            ->names('medewerkers')
            ->parameters(['medewerkers' => 'medewerker']);
        Route::resource('voorstellingen', \App\Http\Controllers\Admin\PerformanceController::class)
            ->names('voorstellingen')
            ->parameters(['voorstellingen' => 'voorstelling']);
        Route::get('/tickets', [\App\Http\Controllers\Admin\TicketController::class, 'index'])->name('tickets.index');
        Route::get('/reservations', [\App\Http\Controllers\Admin\ReservationController::class, 'index'])->name('reservations.index');
        Route::get('/contacts', [\App\Http\Controllers\Admin\ContactController::class, 'index'])->name('contacts.index');
    });
});

require __DIR__ . '/auth.php';
