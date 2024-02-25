<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PoiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PoiController::class, 'index']);
Route::get('/mobile', [PoiController::class, 'mobile']);
Route::post('/mobile', [PoiController::class, 'store'])->name('poi.store');
Route::get('/poi/show', [PoiController::class, 'show']);
Route::get('/poi/polyline', [PoiController::class, 'polyline']);
Route::get('/poi/polyline/{id}', [PoiController::class, 'polyline_detail'])->name('polyline.detail');