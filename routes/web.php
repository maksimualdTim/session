<?php

use App\Http\Controllers\ThingController;
use App\Http\Controllers\PlaceController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function(){
    Route::get('things', [ThingController::class, 'index'])->name('things');
    Route::get('things/create', [ThingController::class, 'create'])->name('createThing');
    Route::post('things/store', [ThingController::class, 'store'])->name('saveNewThing');
    Route::get('things/{thing}', [ThingController::class, 'show'])->name('info');
    Route::get('things/{thing}/edit', [ThingController::class, 'edit']);
    Route::put('things/{thing}', [ThingController::class, 'update'])->name('updateThing');
    Route::get('things/{thing}/delete', [ThingController::class, 'destroy']);

    Route::get('places', [PlaceController::class, 'index'])->name('places');
    Route::get('places/create', [PlaceController::class, 'create'])->name('createPlace');
    Route::post('places/store', [PlaceController::class, 'store'])->name('saveNewPlace');
    Route::get('places/{thing}', [PlaceController::class, 'show'])->name('info');
    Route::get('places/{thing}/edit', [PlaceController::class, 'edit']);
    Route::put('places/{thing}', [PlaceController::class, 'update'])->name('updatePlace');
    Route::get('places/{thing}/delete', [PlaceController::class, 'destroy']);
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
