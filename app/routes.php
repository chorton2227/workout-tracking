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

/**
 *------------------------------------------
 * Route model binding
 *------------------------------------------
 */
Route::model('user', 'User');
Route::model('role', 'Role');

/**
 *------------------------------------------
 * Route constraint patterns
 *------------------------------------------
 */
Route::pattern('user', '[0-9]+');
Route::pattern('role', '[0-9]+');

/**
 *------------------------------------------
 * Confide routes
 *------------------------------------------
 */
Route::get('user/create', 'UserController@create');
Route::post('user', 'UserController@store');
Route::get('user/login', 'UserController@login');
Route::post('user/login', 'UserController@do_login');
Route::get('user/confirm/{code}', 'UserController@confirm');
Route::get('user/forgot_password', 'UserController@forgot_password');
Route::post('user/forgot_password', 'UserController@do_forgot_password');
Route::get('user/reset_password/{token}', 'UserController@reset_password');
Route::post('user/reset_password', 'UserController@do_reset_password');
Route::get('user/logout', 'UserController@logout');

/**
 *------------------------------------------
 * Admin routes
 *------------------------------------------
 */
Route::group(array('prefix' => 'admin', 'before' => 'auth'), function()
{
	# User Management
	Route::get('users/{user}/edit', 'AdminUsersController@getEdit');
	Route::post('users/{user}/edit', 'AdminUsersController@postEdit');
	Route::get('users/{user}/delete', 'AdminUsersController@getDelete');
	Route::post('users/{user}/delete', 'AdminUsersController@postDelete');
	Route::controller('users', 'AdminUsersController');

	# Role Management
	Route::get('roles/{role}/edit', 'AdminRolesController@getEdit');
	Route::post('roles/{role}/edit', 'AdminRolesController@postEdit');
	Route::get('roles/{role}/delete', 'AdminRolesController@getDelete');
	Route::post('roles/{role}/delete', 'AdminRolesController@postDelete');
	Route::controller('roles', 'AdminRolesController');

	# Admin Dashboard
	Route::controller('/', 'AdminDashboardController');
});

/**
 *------------------------------------------
 * Site routes
 *------------------------------------------
 */
Route::get('profile/{username}', 'UserController@profile');
Route::get('/', 'HomeController@showWelcome');
