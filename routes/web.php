<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DentistaController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\AtencionController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\HomeController;

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

Route::resource('dentistas', DentistaController::class);
Route::resource('pacientes', PacienteController::class);
Route::resource('servicios', ServicioController::class);
Route::resource('atenciones', AtencionController::class);
Route::resource('reportes', ReporteController::class);
Route::get('/', [HomeController::class, 'index'])->name('home');


//Route::get('/', function () {
//    //return view('welcome');
//    return view('home');
//});
