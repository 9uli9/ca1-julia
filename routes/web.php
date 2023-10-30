<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DriverController;





Route::get('/', function () {
    return view('welcome');
});

// Remove the following line, as it's redundant with your grouped routes
// Route::resource('drivers', DriverController::class);

Route::group(['prefix' => 'drivers'], function () {
    Route::get('/', [DriverController::class, 'index'])->name('drivers.index');
    Route::post('/', [DriverController::class, 'store'])->name('drivers.store');
    Route::get('/create', [DriverController::class, 'create'])->name('drivers.create');
    Route::get('/{driver}', [DriverController::class, 'show'])->name('drivers.show');
    Route::get('/{driver}/edit', [DriverController::class, 'edit'])->name('drivers.edit');
    Route::put('/{driver}', [DriverController::class, 'update'])->name('drivers.update');
    Route::delete('/{driver}', [DriverController::class, 'destroy'])->name('drivers.destroy');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
