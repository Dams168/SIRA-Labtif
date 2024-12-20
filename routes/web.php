<?php

use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\Course\CourseController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Information\InformationController;
use App\Http\Controllers\Koordinator\dashboardController as KoordinatorDashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Program\FileController;
use App\Http\Controllers\Program\ProgramController;
use App\Http\Controllers\Schedule\ScheduleController;
use App\Http\Controllers\Score\ScoreController;
use App\Http\Controllers\User\ResultController;
use App\Http\Controllers\User\UserProfileController;
use Illuminate\Support\Facades\Route;



Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/program', [ProgramController::class, 'index'])->name('program');
Route::get('/file/{registration}/download', [FileController::class, 'downloadZip'])->name('file.download');

Route::middleware(['auth', 'role:koordinator'])->group(function () {
    //Route dashboard koordinator
    Route::get('/koor/dashboard', [KoordinatorDashboardController::class, 'index'])->name('koordinator.dashboard');
    Route::get('/koor/dashboard/detail/{id}', [KoordinatorDashboardController::class, 'showDetail'])->name('koordinator.detail');
    Route::get('/koor/dashboard/print', [KoordinatorDashboardController::class, 'printPdf'])->name('koordinator.print');
});


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
    Route::get('/jadwal/print', [ScheduleController::class, 'printSchedule'])->name('jadwal.print');

    //Route Kelola Nilai
    Route::get('/nilai', [ScoreController::class, 'index'])->name('kelola.nilai');
    Route::get('/nilai/create/{registrationId}', [ScoreController::class, 'create'])->name('score.create');
    Route::post('/nilai/storeOrUpdateAll', [ScoreController::class, 'storeOrUpdateAll'])->name('score.storeOrUpdateAll');

    //route send Email
    Route::post('email/send/{id}', [ScoreController::class, 'sendEmail'])->name('email.send');


    //Route Kelola Informasi
    Route::get('/informasi', [InformationController::class, 'index'])->name('kelola.informasi');
    Route::get('/informasi/create', [InformationController::class, 'create'])->name('informasi.create');
    Route::post('/informasi/store', [InformationController::class, 'storeOrUpdate'])->name('informasi.storeOrUpdate');

    //Route Kelola Course
    Route::get('/course', [CourseController::class, 'index'])->name('kelola.course');
    Route::get('/course/create', [CourseController::class, 'create'])->name('course.create');
    Route::post('/course/store', [CourseController::class, 'store'])->name('course.store');
    Route::get('/course/edit/{course}', [CourseController::class, 'edit'])->name('course.edit');
    Route::match((['put', 'patch']), '/course/update/{course}', [CourseController::class, 'update'])->name('course.update');
    Route::delete('/course/delete/{course}', [CourseController::class, 'destroy'])->name('course.destroy');
});


Route::middleware(['auth', 'role:user'])->group(function () {
    // Program Route
    Route::get('/program/registration/{course}', [ProgramController::class, 'create'])->name('registration.create');
    Route::post('/program/registration/{course}/store', [ProgramController::class, 'store'])->name('registration.store');
    Route::get('/program/registration/file/{registration}', [FileController::class, 'create'])->name('file.create');
    Route::post('/program/registration/file/{registration}/store', [FileController::class, 'store'])->name('file.store');

    // Kegiatanku Route
    Route::get('/kegiatanku/{registration}', [FileController::class, 'show'])->name('kegiatanku');
    Route::match(['put', 'patch'], '/kegiatanku/{registration}', [FileController::class, 'update'])->name('kegiatanku.update');

    //Route Profile
    Route::get('/userprofile/{id}', [UserProfileController::class, 'index'])->name('userprofile');
    Route::get('/userprofile/{id}/edit', [UserProfileController::class, 'edit'])->name('userprofile.edit');
    Route::match(['put', 'patch'], '/userprofile/update/{id}', [UserProfileController::class, 'update'])->name('userprofile.update');

    //Route Result
    Route::get('/result/accepted', [ResultController::class, 'accepted'])->name('result.accepted');
    Route::get('/result/rejected', [ResultController::class, 'rejected'])->name('result.rejected');

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
