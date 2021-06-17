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
Route::middleware(['userlogincheck'])->group(function () {
    Route::get('/login', 'LoginController@index')->name('login');
    Route::post('/login', 'LoginController@login')->name('loginCheck');
});

Route::middleware(['usercheck'])->group(function () {
    Route::get('/logout', 'LoginController@logout')->name('logout');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/', 'HomeController@index')->name('home');

    Route::prefix('users')->name('users.')->group(function () {
		Route::get('', 'UserController@index')->name('index');
		Route::get('create', 'UserController@create')->name('create');
		Route::post('', 'UserController@store')->name('store');
		Route::get('/edit/{user}', 'UserController@edit')->name('edit');
		Route::put('{user}', 'UserController@update')->name('update');
		Route::delete('{user}', 'UserController@delete')->name('delete');
	});

    Route::prefix('roles')->name('roles.')->group(function () {
		Route::get('', 'RoleController@index')->name('index');
	});

	Route::prefix('blogs')->name('blogs.')->group(function () {
		Route::get('', 'BlogController@index')->name('index');
		Route::get('create', 'BlogController@create')->name('create');
		Route::post('', 'BlogController@store')->name('store');
		Route::get('/edit/{blog}', 'BlogController@edit')->name('edit');
		Route::put('{blog}', 'BlogController@update')->name('update');
		Route::delete('{blog}', 'BlogController@delete')->name('delete');
		Route::post('/pasifive/{blog}', 'BlogController@pasifive')->name('pasifive');

		Route::get('/detail/{blog}', 'BlogController@detail')->name('detail');
	});

});