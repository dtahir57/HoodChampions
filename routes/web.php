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

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => '/admin'], function() {
    /**
     * Starting Routes For Permissions
     */
    Route::group(['middleware' => ['permission:View_Permission']], function() {
        Route::get('/permissions', 'UserManagement\PermissionController@index')->name('permission.index');
    });
    Route::group(['middleware' => ['permission:Add_Permission']], function() {
        Route::get('/permission/create', 'UserManagement\PermissionController@create')->name('permission.create');
        Route::post('/permission', 'UserManagement\PermissionController@store')->name('permission.store');
    });
    Route::group(['middleware' => ['permission:Edit_Permission']], function () {
        Route::get('/permission/{id}/edit', 'UserManagement\PermissionController@edit')->name('permission.edit');
        Route::patch('/permission/{id}', 'UserManagement\PermissionController@update')->name('permission.update');
    });
    Route::group(['middleware' => ['permission:Delete_Permission']], function () {
        Route::delete('/permission/destroy', 'UserManagement\PermissionController@destroy')->name('permission.destroy');
    });
    /**
    * Ending Routes For Permissions
    */

    /**
    * Starting Routes For Roles
    */
    Route::group(['middleware' => ['permission:View_Role']], function () {
        Route::get('/roles', 'UserManagement\RoleController@index')->name('role.index');
    });
    Route::group(['middleware' => ['permission:Add_Role']], function () {
        Route::get('/role/create', 'UserManagement\RoleController@create')->name('role.create');
        Route::post('/role', 'UserManagement\RoleController@store')->name('role.store');
    });
    Route::group(['middleware' => ['permission:Edit_Role']], function() {
        Route::get('/role/{id}/edit', 'UserManagement\RoleController@edit')->name('role.edit');
        Route::patch('/role/{id}', 'UserManagement\RoleController@update')->name('role.update');
    });
    Route::group(['middleware' => ['permission:Delete_Role']], function() {
        Route::delete('/role', 'UserManagement\RoleController@destroy')->name('role.destroy');
    });
    /**
    * Ending Routes For Roles
    */

    /**
    * Starting Routes For Users
    */
    Route::group(['middleware' => ['permission:View_User']], function () {
        Route::get('/users', 'UserManagement\UserController@index')->name('user.index');
    });
    Route::group(['middleware' => ['permission:Add_User']], function() {
        Route::get('/user/create', 'UserManagement\UserController@create')->name('user.create');
        Route::post('/user', 'UserManagement\UserController@store')->name('user.store');
    });
    Route::group(['middleware' => ['permission:Edit_User']], function() {
        Route::get('/user/{id}/edit', 'UserManagement\UserController@edit')->name('user.edit');
        Route::patch('/user/{id}', 'UserManagement\UserController@update')->name('user.update');
    });
    Route::group(['middleware' => ['permission:Delete_User']], function() {
        Route::delete('/user', 'UserManagement\UserController@destroy')->name('user.destroy');
    });
    /**
    * Starting Routes For Users
    */

    /**
    * Starting Routes For Hoods
    */
    Route::group(['middleware' => ['permission:View_Hood']], function() {
        Route::get('/hoods', 'Admin\HoodController@index')->name('hood.index');
    });
    Route::group(['middleware' => ['permission:Add_Hood']], function() {
        Route::get('/hood/create', 'Admin\HoodController@create')->name('hood.create');
        Route::post('/hood', 'Admin\HoodController@store')->name('hood.store');
    });
    Route::group(['middleware' => ['permission:Edit_Hood']], function() {
        Route::get('/hood/{id}/edit', 'Admin\HoodController@edit')->name('hood.edit');
        Route::patch('/hood/{id}', 'Admin\HoodController@update')->name('hood.update');
    });
    Route::group(['middleware' => ['permission:Delete_Hood']], function() {
        Route::delete('/hood', 'Admin\HoodController@destroy')->name('hood.destroy');
    });
    /**
    * Ending Routes For Hoods
    */
   
   /**
   * Starting Routes For Services
   */
   Route::group(['middleware' => ['permission:View_Service']], function() {
       Route::get('/services', 'Admin\ServiceController@index')->name('service.index');
   });
   Route::group(['middleware' => ['permission:Add_Service']], function() {
       Route::get('/service/create', 'Admin\ServiceController@create')->name('service.create');
       Route::post('/service', 'Admin\ServiceController@store')->name('service.store');
   });
   Route::group(['middleware' => ['permission:Edit_Service']], function() {
       Route::get('/service/{id}/edit', 'Admin\ServiceController@edit')->name('service.edit');
       Route::patch('/service/{id}', 'Admin\ServiceController@update')->name('service.update');
   });
   Route::group(['middleware' => ['permission:Delete_Service']], function() {
       Route::delete('/service', 'Admin\ServiceController@destroy')->name('service.destroy');
   });
   /**
   * Ending Routes For Services
   */
  
  /**
  * Starting Routes For Teams
  */
  Route::group(['middleware' => ['permission:View_Team']], function() {
      Route::get('/teams', 'Admin\TeamController@index')->name('team.index');
  });
  Route::group(['middleware' => ['permission:Add_Team']], function() {
      Route::get('/team/create', 'Admin\TeamController@create')->name('team.create');
      Route::post('/team', 'Admin\TeamController@store')->name('team.store');
  });
  Route::group(['middleware' => ['permission:Edit_Team']], function() {
      Route::get('/team/{id}/edit', 'Admin\TeamController@edit')->name('team.edit');
      Route::patch('/team/{id}', 'Admin\TeamController@update')->name('team.update');
  });
  Route::group(['middleware' => ['permission:Delete_Team']], function() {
      Route::delete('/team', 'Admin\TeamController@destroy')->name('team.destroy');
  });
  /**
  * Ending Routes For Teams
  */
});
