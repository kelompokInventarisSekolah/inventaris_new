<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\RestockController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\CetakController;
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
    return view('auth.login');
});

Route::get('main', function () {
    return view('home');
});

Auth::routes();
Route::get('/landing', [LandingController::class,'index'])->name('nampil');
Route::post('/landing', [LandingController::class,'tambah_peminjam'])->name('tambah_peminjam');
// print route
Route::get('/print', [RestockController::class,'print'])->name('print');
// QR
Route::get('qrcode/{id}', [LandingController::class, 'generate'])->name('generate');
// Route::get('qrcodep/{id}', [LandingController::class, 'generate1'])->name('generate1');
// Route::get('main/{id}', [LandingController::class, 'qrPeminjam'])->name('qrPeminjam');

Route::get('/ruangan', [InventarisController::class,'index'])->name('ruangan');
Route::get('/inventaris-barangs/print/{id}',[CetakController::class,'cetak'])->name('cetak');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();

  
});

Route::middleware(['auth'])->group(function (){

    Route::get('/home', [App\Http\Controllers\LandingController::class, 'index'])->name('main');

    Route::get('/logout', function() {
        Auth::logout();
        redirect('/');
        });
});