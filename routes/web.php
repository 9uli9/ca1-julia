<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\RaceController;






Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'cars'], function () {
    Route::get('/', [CarController::class, 'index'])->name('cars.index');
    Route::post('/', [CarController::class, 'store'])->name('cars.store');
    Route::get('/create', [CarController::class, 'create'])->name('cars.create');
    Route::get('/{car}', [CarController::class, 'show'])->name('cars.show');
    Route::get('/{car}/edit', [CarController::class, 'edit'])->name('cars.edit');
    Route::put('/{car}', [CarController::class, 'update'])->name('cars.update');
    Route::delete('/{car}', [CarController::class, 'destroy'])->name('cars.destroy');
});

Route::group(['prefix' => 'drivers'], function () {
    Route::get('/', [DriverController::class, 'index'])->name('drivers.index');
    Route::post('/', [DriverController::class, 'store'])->name('drivers.store');
    Route::get('/create', [DriverController::class, 'create'])->name('drivers.create');
    Route::get('/{driver}', [DriverController::class, 'show'])->name('drivers.show');
    Route::get('/{driver}/edit', [DriverController::class, 'edit'])->name('drivers.edit');
    Route::put('/{driver}', [DriverController::class, 'update'])->name('drivers.update');
    Route::delete('/{driver}', [DriverController::class, 'destroy'])->name('drivers.destroy');
});

Route::delete('/{driver}', [DriverController::class, 'destroy'])->name('drivers.destroy');

Route::group(['prefix' => 'races'], function () {
    Route::get('/', [RaceController::class, 'index'])->name('races.index');
    Route::post('/', [RaceController::class, 'store'])->name('races.store');
    Route::get('/create', [RaceController::class, 'create'])->name('races.create');
    Route::get('/{race}', [RaceController::class, 'show'])->name('races.show');
    Route::get('/{race}/edit', [RaceController::class, 'edit'])->name('races.edit');
    Route::put('/{race}', [RaceController::class, 'update'])->name('races.update');
    Route::delete('/{race}', [RaceController::class, 'destroy'])->name('races.destroy');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/home', [HomeController::class, 'index'])->name('home.index');

require __DIR__.'/auth.php';
