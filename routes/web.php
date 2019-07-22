<?php

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

Auth::routes();

Route::get('/login', 'HomeController@index')->name('login');
Route::get('/dashboard', 'PersonController@index')->name('dashboard');
Route::get('/updateprofile', 'PersonController@update')->name('updateprofile');
Route::patch('/stoteprofile', 'PersonController@storeupdate')->name('storeupdate');
Route::get('/addcompany', 'CompanyController@create')->name('addcompany');
Route::post('/storecompany', 'CompanyController@store')->name('storecompany');
Route::get('/editcompany', 'CompanyController@edit')->name('editcompany');
Route::patch('/updatecompany', 'CompanyController@update')->name('updatecompany');
