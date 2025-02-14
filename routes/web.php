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
Route::get('/find-result', [BoardingHouseController::class, 'findResult'])->name('find-kos.result');
