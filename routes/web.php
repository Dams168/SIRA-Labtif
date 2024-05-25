<?php

use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Kegiatanku\KegiatankuController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Program\FileController;
use App\Http\Controllers\Program\ProgramController;
use Illuminate\Support\Facades\Route;



Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/program', [ProgramController::class, 'index'])->name('program');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/file', [FileController::class, 'index'])->name('kelola.file');
    Route::get('/file/{registration}', [FileController::class, 'showVerify'])->name('show.verify');

    Route::post('/file/{registration}/rejected', [FileController::class, 'reject'])->name('verify.reject');
    Route::post('/file/{registration}/approved', [FileController::class, 'approve'])->name('verify.approve');
});


Route::middleware(['auth', 'role:user'])->group(function () {
    // Program Route
    Route::get('/program/registration/{course}', [ProgramController::class, 'create'])->name('registration.create');
    Route::post('/program/registration/{course}/store', [ProgramController::class, 'store'])->name('registration.store');
    Route::get('/program/registration/file/{registration}', [FileController::class, 'create'])->name('file.create');
    Route::post('/program/registration/file/{registration}/store', [FileController::class, 'store'])->name('file.store');

    Route::get('/validasi/{registration}', [FileController::class, 'show'])->name('validasi');
    Route::match(['put', 'patch'], '/validasi/{registration}', [FileController::class, 'update'])->name('validasi.update');

    // Kegiatanku Route
    Route::get('/kegiatanku/{registration}', [KegiatankuController::class, 'index'])->name('kegiatanku');

    // Route not registered and no activity
    Route::get('/validasi', function () {
        return view('users\validasi\not-register');
    })->name('not-registered');
    Route::get('/activity', function () {
        return view('users.kegiatanku.no-activity');
    })->name('no-activity');
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
