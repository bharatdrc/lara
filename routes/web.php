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

Route::middleware(['verified'])->group(function () {

	Route::get('/dashboard', 'PersonController@index')->name('dashboard');
	Route::get('/updateprofile', 'PersonController@update')->name('updateprofile');
	Route::patch('/stoteprofile', 'PersonController@storeupdate')->name('storeupdate');

	Route::get('/addcompany', 'CompanyController@create')->name('addcompany')->middleware('can:companyAccess');
	Route::post('/storecompany', 'CompanyController@store')->name('storecompany');
	Route::get('/editcompany/{company?}', 'CompanyController@edit')->name('editcompany')->middleware('can:companyAccess,\App\User');
	Route::patch('/updatecompany/{company?}', 'CompanyController@update')->name('updatecompany');

	Route::any('/managecompany', 'CompanyController@index')->name('managecompany')->middleware('can:manageCompanyAccess');

	Route::get('/listroles', 'Auth\RolesController@index')->name('listroles')->middleware('can:rolesAccess');
	Route::get('/editroles/{user}', 'Auth\RolesController@edit')->name('editroles');
	Route::patch('/updateroles/{user}', 'Auth\RolesController@update')->name('updateroles');
	Route::get('/createroles', 'Auth\RolesController@create')->name('createroles')->middleware('can:create,\App\Roles');
	Route::post('/storerole', 'Auth\RolesController@store')->name('storerole');

	Route::get('/listpackage', 'PackageController@index')->name('listpackage')->middleware('can:managePackageAccess');
	Route::get('/addpackage', 'PackageController@create')->name('addpackage')->middleware('can:managePackageAccess');;
	Route::post('/savepackage', 'PackageController@store')->name('savepackage')->middleware('can:managePackageAccess');

	Route::get('/eventlist', 'EventController@index')->name('eventlist');
	Route::get('/addevent', 'EventController@create')->name('addevent');
	Route::get('/storeevent', 'EventController@store')->name('storeevent');

});



