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

Route::get('/home', 'HomeController@index')->middleware('SuperAdmin')->name('home');
Route::get('/abc', 'HomeController@abc')->name('abc');

Route::get('/search', 'HomeController@search')->name('search');
Route::post('/searchFunctionality', 'HomeController@searchFunctionality')->name('searchFunctionality');
Route::get('/create', 'HomeController@create')->name('create');
Route::post('/store', 'HomeController@store')->name('store');
Route::get('home/edit/{id}','HomeController@edit')->name('home.edit');
Route::put('home/update/{id}','HomeController@update')->name('home.update');
Route::get('home/delete/{id}','HomeController@delete')->name('home.delete');

Route::get('/dynamic_pdf', 'DynamicPDFController@index');

Route::get('/dynamic_pdf/pdf', 'DynamicPDFController@pdf');


