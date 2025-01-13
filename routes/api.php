<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\HabitacionController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('/logout', 'App\Http\Controllers\Auth\LoginController@logout');

    // Hoteles:
    Route::get('/hoteles/{hotel}', [HotelController::class, 'show']);
    Route::post('/hoteles', [HotelController::class, 'store']);
    Route::post('/hoteles/{id}', [HotelController::class, 'update']); // Add the PUT route explicitly
    Route::delete('/hoteles/{id}', [HotelController::class, 'destroy']);

    // Habitaciones:
    Route::get('/habitaciones', [HabitacionController::class, 'index']);
    Route::get('/habitaciones/{hotel}', [HabitacionController::class, 'show']);
    Route::post('/habitaciones', [HabitacionController::class, 'store']);
    Route::post('/habitaciones/{id}', [HabitacionController::class, 'update']); // Add the PUT route explicitly
    Route::delete('/habitaciones/{id}', [HabitacionController::class, 'destroy']);
});

Route::get('/hoteles', [HotelController::class, 'index']);

Route::get('/login', 'App\Http\Controllers\Auth\LoginController@login')->name('login');
Route::post('/login', 'App\Http\Controllers\Auth\LoginController@login');
