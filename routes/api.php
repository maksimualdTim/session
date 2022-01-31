<?php

use Illuminate\Http\Request;
use App\Http\Controllers\ThingController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
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



//public routes
Route::post('registration', [AuthController::class, 'registration']);
Route::post('/auth/signin', [AuthController::class, 'login'])->name('login');

//Private routes
Route::get('/signout', [AuthController::class, 'signout'])->middleware('auth:sanctum');

Route::group(['prefix'=>'app', 'middleware' => 'auth:sanctum'], function(){
    Route::get('things', [ThingController::class, 'index'])->name('things');
    Route::get('things/create', [ThingController::class, 'create'])->name('createThing');
    Route::post('things/store', [ThingController::class, 'store'])->name('saveNewThing');
    Route::get('things/{thing}', [ThingController::class, 'show'])->name('info');
    Route::get('things/{thing}/edit', [ThingController::class, 'edit']);
    Route::put('things/{thing}', [ThingController::class, 'update'])->name('updateThing');
    Route::delete('things/{thing}/delete', [ThingController::class, 'destroy']);

    Route::get('places', [PlaceController::class, 'index'])->name('places');
    Route::get('places/create', [PlaceController::class, 'create'])->name('createPlace');
    Route::post('places/store', [PlaceController::class, 'store'])->name('saveNewPlace');
    Route::get('places/{thing}', [PlaceController::class, 'show'])->name('info');
    Route::get('places/{thing}/edit', [PlaceController::class, 'edit']);
    Route::put('places/{thing}', [PlaceController::class, 'update'])->name('updatePlace');
    Route::delete('places/{thing}/delete', [PlaceController::class, 'destroy']);
});