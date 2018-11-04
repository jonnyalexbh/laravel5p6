<?php

use App\User;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('users', 'Api\UserController');
Route::resource('genders', 'Api\GenderController')->except(['create', 'edit']);
Route::resource('marital-statuses', 'Api\MaritalStatusController')->only(['index', 'store', 'show', 'update', 'destroy']);
Route::apiResources([
    'books' => 'Api\BookController',
    'categories' => 'Api\CategoryController',
]);

/**
 * auth.basic
 *
 */
Route::apiResource('genders-auth-basic', 'Api\GenderController')->middleware('auth.basic');

/**
 * scopes & dynamic scopes
 *
 */
Route::get('scope-user-active', function () {
    return \App\User::active()->get();
});

Route::get('scope-user-gender', function () {
    return \App\User::OfGender('2')->get();
});

/**
 * simple auth passport
 *
 */
Route::post('register-simple', 'Api\Auth\LoginSimpleController@register');
Route::post('login-simple', 'Api\Auth\LoginSimpleController@login');
Route::get('profile-simple', 'Api\Auth\LoginSimpleController@profile')->middleware('auth:api');
Route::get('logout-simple', 'Api\Auth\LoginSimpleController@logout')->middleware('auth:api');

/**
 * marvel consume Api
 *
 */
Route::get('comics', 'Api\MarvelController@index');

/**
 * read file
 *
 */
Route::get('file-info', 'Api\ReadFileController@index');
