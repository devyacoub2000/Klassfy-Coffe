<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ChefController;
use App\Http\Controllers\Admin\TimeController;
use App\Http\Controllers\Admin\FoodController;
 
Route::prefix(LaravelLocalization::setLocale())->middleware('auth', 'is_admin')->group(function() {

Route::prefix('admin')->name('admin.')->group(function() { 
     
     Route::get('/', [AdminController::class, 'index'])->name('index');
     Route::resource('chef', ChefController::class);
     Route::resource('time', TimeController::class);
     Route::resource('food', FoodController::class);
     Route::get('reservations', [AdminController::class, 'all_reservations'])->name('all_reservations');

     Route::put('update_reservation/{id}', [AdminController::class, 'update_reservation'])->name('update_reservation');

     Route::get('profile', [AdminController::class, 'profile'])->name('profile');

     Route::put('update_profile', [AdminController::class, 'update_profile'])->name('update_profile');

     Route::post('check-password', [AdminController::class, 'check_password'])->name('check_password');


});

});



