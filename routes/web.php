<?php

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

//Route::get('/',[App\Http\Controllers\HomeController::class,'index']);
/* Route::get('/', [App\Http\Controllers\SeriesController::class,'index']); */
Route::post('/guardar_configuracion', [App\Http\Controllers\HomeController::class,'guardar_configuracion'])->name('guardar_configuracion');
Route::get('/',[App\Http\Controllers\SeriesController::class,'index'])->name('series.index');
Route::get('/series/create',[App\Http\Controllers\SeriesController::class,'create'])->name('series.create');
Route::post('/series/store',[App\Http\Controllers\SeriesController::class,'store'])->name('series.store');
Route::patch('/series/update/{series}',[App\Http\Controllers\SeriesController::class,'update'])->name('series.update');
Route::get('/series/edit/{series}',[App\Http\Controllers\SeriesController::class,'edit'])->name('series.edit');
Route::delete('/series/destroy/{series}',[App\Http\Controllers\SeriesController::class,'destroy'])->name('series.destroy');
Route::get('/series/anular/{series}',[App\Http\Controllers\SeriesController::class,'anular'])->name('series.anular');
