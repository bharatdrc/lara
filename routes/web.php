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

Auth::routes(['verify' => true]);

Route::get('/login', 'HomeController@index')->name('login');
Route::get('/dashboard', 'PersonController@index')->name('dashboard')->middleware('verified');
Route::get('/updateprofile', 'PersonController@update')->name('updateprofile')->middleware('verified');
Route::patch('/stoteprofile', 'PersonController@storeupdate')->name('storeupdate')->middleware('verified');

Route::get('/addcompany', 'CompanyController@create')->name('addcompany')->middleware('verified');
Route::post('/storecompany', 'CompanyController@store')->name('storecompany')->middleware('verified');
Route::get('/editcompany/{company?}', 'CompanyController@edit')->name('editcompany')->middleware('verified');
Route::patch('/updatecompany/{company?}', 'CompanyController@update')->name('updatecompany')->middleware('verified');

Route::any('/managecompany', 'CompanyController@index')->name('managecompany')->middleware('verified');

Route::get('/listroles', 'Auth\RolesController@index')->name('listroles')->middleware('verified');
Route::get('/editroles/{user}', 'Auth\RolesController@edit')->name('editroles')->middleware('verified');
Route::patch('/updateroles/{user}', 'Auth\RolesController@update')->name('updateroles')->middleware('verified');

Route::get('/createroles', 'Auth\RolesController@create')->name('createroles')->middleware('verified');
Route::post('/storerole', 'Auth\RolesController@store')->name('storerole')->middleware('verified');


