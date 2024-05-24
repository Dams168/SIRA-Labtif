<?php

use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\Kegiatanku\KegiatankuController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Program\FileController;
use App\Http\Controllers\Program\ProgramController;
use App\Http\Controllers\Status\StatusController;
use App\Http\Controllers\Validasi\ValidasiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::middleware(['auth', 'role:user'])->group(function () {
    // Program Route
    Route::get('/program', [ProgramController::class, 'index'])->name('program');
    Route::get('/program/registration/{course}', [ProgramController::class, 'create'])->name('registration.create');
    Route::post('/program/registration/{course}/store', [ProgramController::class, 'store'])->name('registration.store');
    Route::get('/program/registration/file/{registration}', [FileController::class, 'create'])->name('file.create');
    Route::post('/program/registration/file/{registration}/store', [FileController::class, 'store'])->name('file.store');

    // Kegiatanku Route
    Route::get('/kegiatanku', [KegiatankuController::class, 'index'])->name('kegiatanku');

    // Route Validasi
    Route::get('/validasi', [ValidasiController::class, 'index'])->name('validasi');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/**
 * socialite auth
 */
Route::get('/auth/{provider}', [SocialiteController::class, 'redirectToProvider']);
Route::get('/auth/{provider}/callback', [SocialiteController::class, 'handleProvideCallback']);

require __DIR__ . '/auth.php';
