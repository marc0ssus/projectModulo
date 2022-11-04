<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MusicasController;
use App\Http\Controllers\CategoriaController;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);


Route::resource('musicas',MusicasController::class);

Route::resource('categoria',CategoriaController::class);