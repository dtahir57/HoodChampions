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
Route::get('/hoods', 'API\HoodController@hoods');
Route::get('/teams', 'API\TeamController@index');
Route::get('/activities', 'API\ActivityController@index');
Route::get('/interest_groups', 'API\GroupController@index');
Route::get('/services', 'API\ServiceController@index');
Route::get('/lost_and_founds', 'API\LostAndFoundController@index');
Route::get('/battles', 'API\BattleController@index');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
