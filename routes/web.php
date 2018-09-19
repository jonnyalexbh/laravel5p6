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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('password_expired');
Route::resource('users', 'UserController')->only(['index']);
Route::resource('genders', 'GenderController');
Route::resource('books', 'BookController');

Route::get('categories', 'CategoryController@index')->name('categories.index');
Route::get('cat-create', 'CategoryController@create')->name('categories.create');
Route::post('cat-store', 'CategoryController@store')->name('categories.store');
Route::get('cat-show/{id}', 'CategoryController@show')->name('categories.show');
Route::get('cat-edit/{category}', 'CategoryController@edit')->name('categories.edit');
Route::put('cat-update/{id}', 'CategoryController@update')->name('categories.update');
Route::get('cat-destroy/{id}', 'CategoryController@destroy')->name('categories.destroy');

Route::get('password/expired', 'Auth\ExpiredPasswordController@expired')->name('password.expired');
Route::post('password/post_expired', 'Auth\ExpiredPasswordController@postExpired')->name('password.post_expired');

/** laravel socialite */
Route::get('auth/{provider}', 'Auth\SocialProviderController@redirectToProvider')->name('social.auth');
Route::get('auth/{provider}/callback', 'Auth\SocialProviderController@handleProviderCallback');
