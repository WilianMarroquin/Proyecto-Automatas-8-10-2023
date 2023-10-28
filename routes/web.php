<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('Apartados.importar');
});

Route::view('/importar', 'Apartados.importar')->name('importar');
Route::view('/ejemplos', 'Apartados.ejemplos')->name('ejemplos');
Route::view('/caratula', 'Apartados.caratula')->name('caratula');
Route::view('/documentacion', 'Apartados.documentacion')->name('documentacion');

Route::view('/tabla', 'Apartados.Tabla')->name('tabla');

Route::view('/Automata', 'Apartados.Tabla_Automata')->name('Automata');