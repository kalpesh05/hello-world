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
    return view('welcome');
});

//Route::resource('Admin','Admin\AdminController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');	
Route::prefix('admin')->group(function(){
	Route::get('/login', 'Auth\AdminLoginController@showLogin')->name('admin.login');
	Route::post('/login', 'Auth\AdminLoginController@Login')->name('admin.login.submit');
	Route::get('/', 'Admin\AdminController@index')->name('admin.dashboard');	
	Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');	

	//Password Reset Route
	Route::post('/password/email','Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
	Route::get('/password/reset','Auth\AdminForgotPasswordController@showLinkrequestForm')->name('admin.password.request');
	Route::post('/password/reset','Auth\AdminResetPasswordController@reset');
	Route::get('/password/reset/{token}','Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');	
});
