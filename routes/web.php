<?php

Route::get('/', 'LandingController@index')->name('landing');

Route::group(['middleware' => ['auth']], function () {
	Route::name('admin.')->group(function() {
		Route::group(['prefix' => 'admin'], function() {
			Route::get('/', 'Admin\BoardController@index')->name('board');
			Route::resource('users', 'Admin\UserController');
			Route::resource('roles', 'Admin\RoleController');
			Route::resource('permissions', 'Admin\PermissionController');
			Route::resource('teams', 'Admin\TeamController');
		});
	});
});


Route::get('login', 'Auth\LoginController@index')->name('auth.login');
Route::post('login', 'Auth\LoginController@authenticate');
Route::get('logout', 'Auth\LogoutController@index')->name('auth.logout');
Route::get('register', 'Auth\RegisterController@index')->name('auth.register');
Route::post('register', 'Auth\RegisterController@store');