<?php

use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Program\FileController;
use App\Http\Controllers\Program\ProgramController;
use App\Http\Controllers\Schedule\ScheduleController;
use App\Http\Controllers\Score\ScoreController;
use Illuminate\Support\Facades\Route;



Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/program', [ProgramController::class, 'index'])->name('program');

Route::middleware(['auth', 'role:admin'])->group(function () {

    //Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //Route Kelola File
    Route::get('/file', [FileController::class, 'index'])->name('kelola.file');
    Route::get('/file/{registration}', [FileController::class, 'showVerify'])->name('show.verify');
    Route::post('/file/verify/{registration}', [FileController::class, 'verify'])->name('verify.save');

    //Route Kelola Jadwal
    Route::get('/jadwal', [ScheduleController::class, 'index'])->name('kelola.jadwal');
    Route::get('/jadwal/setting', [ScheduleController::class, 'create'])->name('jadwal.setting');
    Route::post('/jadwal/store', [ScheduleController::class, 'storeOrUpdateAll'])->name('jadwal.storeOrUpdateAll');

    //Route Kelola Nilai
    Route::get('/nilai', [ScoreController::class, 'index'])->name('kelola.nilai');
    Route::get('/nilai/create/{registrationId}', [ScoreController::class, 'create'])->name('score.create');
    Route::post('/nilai/storeOrUpdateAll', [ScoreController::class, 'storeOrUpdateAll'])->name('score.storeOrUpdateAll');
});


Route::middleware(['auth', 'role:user'])->group(function () {
    // Program Route
    Route::get('/program/registration/{course}', [ProgramController::class, 'create'])->name('registration.create');
    Route::post('/program/registration/{course}/store', [ProgramController::class, 'store'])->name('registration.store');
    Route::get('/program/registration/file/{registration}', [FileController::class, 'create'])->name('file.create');
    Route::post('/program/registration/file/{registration}/store', [FileController::class, 'store'])->name('file.store');

    Route::get('/kegiatanku/{registration}', [FileController::class, 'show'])->name('kegiatanku');
    Route::match(['put', 'patch'], '/kegiatanku/{registration}', [FileController::class, 'update'])->name('kegiatanku.update');


    // Route not registered
    Route::get('/kegiatanku', function () {
        return view('users\kegiatanku\not-register');
    })->name('not-registered');
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
