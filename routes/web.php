<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PoiController;
use App\Http\Controllers\LoginController;

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

Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/proses-login', [LoginController::class, 'prosesLogin'])->name('proses-login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/mobile', [PoiController::class, 'mobile'])->middleware('auth');
Route::post('/mobile', [PoiController::class, 'store'])->name('poi.store')->middleware('auth');

Route::redirect('/poi', '/poi/show')->middleware('auth');
Route::get('/poi/show', [PoiController::class, 'show'])->middleware('auth');
Route::get('/poi/tambah', [PoiController::class, 'tambah'])->middleware('auth');
Route::get('/poi/polyline', [PoiController::class, 'polyline'])->middleware('auth');
Route::get('/poi/polyline/{id}', [PoiController::class, 'polyline_detail'])->name('polyline.detail')->middleware('auth');
Route::get('/poi/upload-foto/{id}', [PoiController::class, 'form_upload_foto']);
Route::post('/poi/proses-upload-foto', [PoiController::class, 'proses_upload_foto'])->name('image.store');

Route::get('/multilayer', [PoiController::class, 'multilayer'])->middleware('auth');