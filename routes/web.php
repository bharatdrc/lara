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
})->name('home');

Auth::routes(['verify' => true]);

Route::get('/login', 'HomeController@index')->name('login');
Route::prefix('{_locale?}')->group(function () {
	Route::get('lang/{locale}', 'LocalizationController@index')->name('localisation');
});


Route::middleware(['verified'])->group(function () {

	Route::prefix('{_locale?}')->group(function () {
		Route::get('/dashboard', 'PersonController@index')->name('dashboard');
		Route::any('/listprofile', 'PersonController@list')->name('listprofile');
		Route::get('/updateprofile', 'PersonController@update')->name('updateprofile');
		Route::patch('/stoteprofile', 'PersonController@storeupdate')->name('storeupdate');

		Route::prefix('company')->group(function () {
			Route::get('/addcompany', 'CompanyController@create')->name('addcompany')->middleware('can:companyAccess');
			Route::post('/storecompany', 'CompanyController@store')->name('storecompany');
			Route::get('/editcompany/{company?}', 'CompanyController@edit')->name('editcompany')->middleware('can:companyAccess,\App\User');
			Route::patch('/updatecompany/{company?}', 'CompanyController@update')->name('updatecompany');

			Route::any('/managecompany', 'CompanyController@index')->name('managecompany')->middleware('can:manageCompanyAccess');
		});

		Route::prefix('role')->group(function () {
			Route::get('/listroles', 'Auth\RolesController@index')->name('listroles')->middleware('can:rolesAccess');
			Route::get('/editroles/{user}', 'Auth\RolesController@edit')->name('editroles');
			Route::patch('/updateroles/{user}', 'Auth\RolesController@update')->name('updateroles');
			Route::get('/createroles', 'Auth\RolesController@create')->name('createroles')->middleware('can:create,\App\Roles');
			Route::post('/storerole', 'Auth\RolesController@store')->name('storerole');
		});

		Route::prefix('package')->group(function () {
			Route::get('/listpackage', 'PackageController@index')->name('listpackage')->middleware('can:managePackageAccess');
			Route::get('/addpackage', 'PackageController@create')->name('addpackage')->middleware('can:managePackageAccess');;
			Route::post('/savepackage', 'PackageController@store')->name('savepackage')->middleware('can:managePackageAccess');
		});

		Route::prefix('event')->group(function () {
			Route::get('/eventlist', 'EventController@index')->name('eventlist');
			Route::get('/addevent', 'EventController@create')->name('addevent');
			Route::post('/storeevent', 'EventController@store')->name('storeevent');
			Route::get('/editevent/{event}', 'EventController@edit')->name('editevent');
			Route::patch('/updateevent/{event}', 'EventController@update')->name('updateevent');
			Route::get('/showevent/{event}', 'EventController@show')->name('showevent');
			Route::get('/showpdf/{event}', 'EventController@showpdf')->name('showpdf');

		});

		Route::prefix('timeslot')->group(function () {
			Route::get('/addtimeslot/{event}', 'TimeslotController@create')->name('addtimeslot');
			Route::post('/storetimeslot/{event}', 'TimeslotController@store')->name('storetimeslot');
		});

		Route::prefix('location')->group(function () {
			Route::get('/addlocation/{event}', 'LocationController@create')->name('addlocation');
			Route::post('/storelocation/{event}', 'LocationController@store')->name('storelocation');
			Route::get('/editlocation/{location}', 'LocationController@edit')->name('editlocation');
			Route::patch('/updatelocation/{location}', 'LocationController@update')->name('updatelocation');
		});

		Route::prefix('eventparticipation')->group(function () {
			Route::get('/addparticipant/{event}', 'EventParticipationController@create')->name('addparticipant');
			Route::post('/storeparticipant/{event}', 'EventParticipationController@store')->name('storeparticipant');
			Route::post('/sendwelcomenotification/{eventparticipation}', 'EventParticipationController@sendWelcomeNotification')->name('sendWelcomeNotification');
			Route::get('/sendactivationreminder/{eventparticipation}', 'EventParticipationController@sendActivationReminder')->name('sendActivationReminder');
		});

		Route::prefix('customfield')->group(function () {
			Route::post('/storecustomfield/{event}', 'CustomfieldController@store')->name('storecustomfield');
			/*Route::post('/sendwelcomenotification/{eventparticipation}', 'EventParticipationController@sendWelcomeNotification')->name('sendWelcomeNotification');
			Route::get('/sendactivationreminder/{eventparticipation}', 'EventParticipationController@sendActivationReminder')->name('sendActivationReminder');*/
		});

		Route::get('/addmultiple', 'MultipleController@create')->name('addmultiple');
		Route::post('/storemultiple', 'MultipleController@store')->name('storemultiple');
		Route::get('/editmultiple', 'MultipleController@edit')->name('editmultiple');
		Route::patch('/updatemultiple', 'MultipleController@update')->name('updatemultiple');
		Route::delete('/deletemultiple', 'MultipleController@destroy')->name('deletemultiple');


		Route::get('/vueform', 'VueController@create')->name('vueform');
		Route::post('/storevueform', 'VueController@store')->name('storevueform');

		Route::prefix('store')->group(function () {
			Route::get('/liststore/', 'StoreController@index')->name('storelist');
			Route::get('/addstore/', 'StoreController@create')->name('addstore');
			Route::post('/savestore/', 'StoreController@store')->name('savestore');
			Route::get('/editstore/{store}', 'StoreController@edit')->name('editstore');
			Route::post('/updatestore/', 'StoreController@update')->name('updatestore');

			Route::any('/listrevenue/{store}', 'RevenueController@index')->name('listrevenue');
			Route::get('/addrevenue/{store}', 'RevenueController@create')->name('addrevenue');
			Route::post('/saverevenue/', 'RevenueController@store')->name('saverevenue');

			/*Route::post('/sendwelcomenotification/{eventparticipation}', 'EventParticipationController@sendWelcomeNotification')->name('sendWelcomeNotification');
			Route::get('/sendactivationreminder/{eventparticipation}', 'EventParticipationController@sendActivationReminder')->name('sendActivationReminder');*/
		});

	});
});

Route::get('/activateuser/{user}', 'EventParticipationController@activateuser')->name('activateuser');
Route::get('/activateuserpartcipation/{participation}', 'EventParticipationController@activateUserPartcipation')->name('activateuserpartcipation');
Route::get('/sendqueuemail', 'EmailController@sendEmail')->name('sendqueuemail');

