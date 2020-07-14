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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Liste des routes pour le controlleur StarController
// The controllers for the StarController
Route::get('/star', 'StarController@index')->name('star.index');
Route::post('/star/store', 'StarController@store')->name('star.store');
Route::post('/update', 'StarController@update')->name('star.update');
Route::post('/star/{id}', 'StarController@destroy')->name('star.destroy');
//fin de la liste
