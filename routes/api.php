<?php

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

Route::post('/register', 'API\RegisterController@register');
Route::post('/login', 'API\RegisterController@login');
Route::get('/user/{id}', 'API\RegisterController@getUser');
Route::get('/hoods', 'API\HoodController@hoods');
Route::post('/verify/otp', 'API\RegisterController@verify');
Route::get('/resend/code/{id}', 'API\ResendController@resend');

Route::group(['middleware' => 'auth:api'], function() {
	/**
	 * Starting Routes for TeamController
	 */
	Route::get('/teams', 'API\TeamController@index');
	Route::get('/team/{id}', 'API\TeamController@show');
	Route::post('/team/store', 'API\TeamController@store');
	Route::post('/team/join', 'API\TeamController@join');
	Route::post('/team/post', 'API\TeamController@post');
	/**
	 * Ending Routes For TeamController
	 */
	/**
	 * Starting Routes For UserController
	 */
	Route::post('/user/auth', 'API\UserController@index');
	Route::get('/user/details/{id}', 'API\UserController@show');
	/**
	 * Ending Routes For UserController
	 */
	Route::get('/activities', 'API\ActivityController@index');
	Route::get('/interest_groups', 'API\GroupController@index');
	Route::get('/services', 'API\ServiceController@index');
	Route::get('/lost_and_founds', 'API\LostAndFoundController@index');
	Route::get('/battles', 'API\BattleController@index');


	Route::post('/user/logout', 'API\RegisterController@logout');
});
