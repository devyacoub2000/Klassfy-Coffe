<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\FrontController;

Route::get('/', [FrontController::class, 'index']);

Route::post('store', [FrontController::class, 'store'])->name('front.store');

Route::get('/index', [FrontController::class, 'dashboard'])
->middleware(['auth', 'verified'])
->name('front.dashboard');

// Route::get('/index', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('time/{id}', [FrontController::class, 'single_time'])->name('front.single_time');


require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
