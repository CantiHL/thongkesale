<?php

use App\Http\Controllers\DonController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HangController;
use App\Http\Controllers\NhanSuController;
use App\Http\Controllers\TKQCController;
use App\Http\Controllers\DashboardController;

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
Route::get('/',[DashboardController::class,'index'] )->name('home');
Route::post('/',[DashboardController::class,'index'] );

Route::get('/hang',[HangController::class,'index'] )->name('hang');
Route::post('/themhang',[HangController::class,'them'] )->name('themhang');
Route::post('/suaxoahang',[HangController::class,'suaxoa'] )->name('suaxoahang');

Route::get('/nhansu',[NhanSuController::class,'index'] )->name('nhansu');
Route::post('/themns',[NhanSuController::class,'them'] )->name('themns');
Route::post('/suaxoanhansu',[NhanSuController::class,'suaxoa'] )->name('suaxoanhansu');

Route::get('/tkqc',[TKQCController::class,'index'] )->name('tkqc');
Route::post('/themtkqc',[TKQCController::class,'them'] )->name('themtkqc');
Route::post('/suaxoatkqc',[TKQCController::class,'suaxoa'] )->name('suaxoatkqc');

Route::get('/don',[DonController::class,'index'] )->name('don');
Route::get('/themdon',[DonController::class,'themform'] )->name('themdon');
Route::post('/themdon',[DonController::class,'them'] );
Route::get('/suadon/{id}',[DonController::class,'suaform'] )->name('suadon');
Route::post('/suadon/{id}',[DonController::class,'sua'] );
Route::get('/xoadon/{id}',[DonController::class,'xoa'] )->name('xoadon');