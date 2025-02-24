<?php

use App\Http\Controllers\BoardingHouseController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CityController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/check-booking', [BookingController::class, 'check'])->name('check-booking');

Route::get('/category/{slug}', [CategoryController::class, 'show'])->name('category-show');
Route::get('/city/{slug}', [CityController::class, 'show'])->name('city-show');


Route::get('/find-kos', [BoardingHouseController::class, 'find'])->name('find-kos');
Route::get('/kos/{slug}', [BoardingHouseController::class, 'show'])->name('kos-show');
Route::get('/kos/{slug}/rooms', [BoardingHouseController::class, 'rooms'])->name('kos-rooms');

Route::get('/kos/booking/{slug}', [BookingController::class, 'booking'])->name('booking');
Route::get('/kos/booking/{slug}/information', [BookingController::class, 'information'])->name('booking-information');
Route::post('/kos/booking/{slug}/information/save', [BookingController::class, 'save'])->name('booking-save');
Route::post('/kos/booking/{slug}/payment', [BookingController::class, 'payment'])->name('booking-payment');
Route::get('/kos/booking/{slug}/checkout', [BookingController::class, 'checkout'])->name('checkout');

Route::get('/find-result', [BoardingHouseController::class, 'findResult'])->name('find-kos.result');

