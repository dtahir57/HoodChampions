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
	 * Starting Routes For LostAndFoundController
	 */
	Route::get('/lost_and_founds', 'API\LostAndFoundController@index');
	Route::get('/lost_and_found/create', 'API\LostAndFoundController@create');
	Route::post('/lost_and_found', 'API\LostAndFoundController@store');
	/**
	 * Ending Rotues For LostAndFoundController
	 */
	/**
	 * Starting Routes For ServiceController
	 */
	Route::get('/services', 'API\ServiceController@index');
	Route::post('/service', 'API\ServiceController@store');
	Route::get('/service/{id}', 'API\ServiceController@show');
	Route::post('/service/{id}', 'API\ServiceController@update');
	/**
	 * Ending Routes For ServiceController
	 */
	/**
	 * Starting Routes For GroupController
	 */
	Route::get('/interest_groups', 'API\GroupController@index');
	Route::get('/interest_group/category/{id}', 'API\GroupController@getCategory');
	Route::get('/interest_groups/create', 'API\GroupController@create');
	Route::post('/interest_group', 'API\GroupController@store');
	Route::get('/interest_group/{id}', 'API\GroupController@show');
	Route::post('/interest_group/join', 'API\GroupController@join');
	Route::post('/interest_group/post', 'API\GroupController@post');
	/**
	 * Ending Routes For GroupController
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
	/**
	 * Starting Routes For BattleController
	 */
	Route::get('/battles', 'API\BattleController@index');
	Route::get('/battles/create', 'API\BattleController@create');
	Route::post('/battle', 'API\BattleController@store');
	Route::get('/battle/{id}', 'API\BattleController@show');
	/**
	 * Ending Routes For BattleController
	 */


	Route::post('/user/logout', 'API\RegisterController@logout');
});
