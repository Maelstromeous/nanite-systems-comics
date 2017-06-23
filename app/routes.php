<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Uncomment below for production
URL::forceSchema('https');

$maint = 0;

if ($maint == 1)
{
	Route::any('/', 'HomeController@maint');
	Route::any('comic/{comicID}', 'HomeController@maint');
}
else
{
	Route::any('/', 'HomeController@index');
	Route::any('archive', 'HomeController@archive');
	Route::any('contact', 'HomeController@contact');
	Route::any('submit/contact', 'HomeController@contactSubmit');
	Route::any('submit/idea', 'HomeController@contactSubmit');
	Route::any('mail', 'HomeController@contactSubmit');
	Route::any('extras', 'HomeController@extras');

	Route::any('comic/{comicID}', 'HomeController@comic');

	/* Admin Routes */

	// PROTECTED
	Route::group(array('before' => 'auth'), function()
	{
		/* Admin */
		Route::any('admin', 'AdminController@index');
		Route::any('admin/flush', 'AdminController@flush');

		/* Admin Functions */

		Route::any('admin/comic/{type}', 'AdminController@comic');
		Route::any('admin/comic/{type}/{id}', 'AdminController@comic');

		Route::any('admin/logout', 'AdminController@logout');
		Route::any('admin/hash', 'AdminController@hash');

		Route::any('admin/phpinfo', 'AdminController@phpinfo');
	});

	// AUTH FILTER
	Route::filter('auth', function()
	{
		if (Auth::guest()) return Redirect::to('admin/login');
	});

	Route::get('admin/login', 'AdminController@login');
	Route::post('admin/login', 'AdminController@doLogin');
}
