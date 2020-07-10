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

//Route::get('/home', 'HomeController@index')->name('home');

//StudentController start form here..........................................
Route::get('/home', 'StudentController@index')->name('home');
Route::get('create.student','StudentController@create')->name('create.student');
Route::post('store.student','StudentController@store')->name('store.student');
Route::get('/edit.student/{id}','StudentController@edit')->name('edit.student');
Route::post('/update.student/{id}','StudentController@update')->name('update.student');
Route::get('/destroy.student/{id}','StudentController@destroy')->name('destroy.student');



