<?php

use Illuminate\Http\Request;
use App\User;

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
  'categories' => 'Api\CategoryController'
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
Route::get('scope-user-active', function(){
  return \App\User::active()->get();
});

Route::get('scope-user-gender', function(){
  return \App\User::OfGender('2')->get();
});
