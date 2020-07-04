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

Route::get('/', function () {
    return view('welcome');
});

Route::get('pertanyaan', 'PertanyaanController@index');
Route::get('pertanyaan/create', 'PertanyaanController@create');
Route::post('pertanyaan', 'PertanyaanController@store');

Route::get('pertanyaan/{id}', 'PertanyaanController@pertanyaanDetail');
Route::get('pertanyaan/{id}/edit', 'PertanyaanController@pertanyaanEdit');

Route::put('pertanyaan/{id}', 'PertanyaanController@pertanyaanUpdate');
Route::delete('pertanyaan/{id}', 'PertanyaanController@pertanyaanDelete');



Route::get('jawaban/{pertanyaan_id}', 'JawabanController@index');
Route::get('jawaban/create/{pertanyaan_id}', 'JawabanController@create');
Route::post('jawaban', 'JawabanController@store');
