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
    * Starting Routes For Regions
    */
    Route::group(['middleware' => ['permission:View_Region']], function() {
        Route::get('/regions', 'Admin\RegionController@index')->name('region.index');
    });
    Route::group(['middleware' => ['permission:Add_Region']], function() {
        Route::get('/region/create', 'Admin\RegionController@create')->name('region.create');
        Route::post('/region', 'Admin\RegionController@store')->name('region.store');
    });
    Route::group(['middleware' => ['permission:Edit_Region']], function() {
        Route::get('/region/{id}/edit', 'Admin\RegionController@edit')->name('region.edit');
        Route::patch('/region/{id}', 'Admin\RegionController@update')->name('region.update');
    });
    Route::group(['middleware' => ['permission:Delete_Region']], function() {
        Route::delete('/region', 'Admin\RegionController@destroy')->name('region.destroy');
    });
    /**
    * Ending Routes For Regions
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
 
   /**
   * Starting Routes For Categories
   */
   Route::group(['middleware' => ['permission:View_Categories']], function() {
       Route::get('/categories', 'Admin\CategoryController@index')->name('category.index');
   });
   Route::group(['middleware' => ['permission:Add_Categories']], function() {
       Route::get('/category/create', 'Admin\CategoryController@create')->name('category.create');
       Route::post('/category', 'Admin\CategoryController@store')->name('category.store');
   });
   Route::group(['middleware' => ['permission:Edit_Categories']], function() {
       Route::get('/category/{id}/edit', 'Admin\CategoryController@edit')->name('category.edit');
       Route::patch('/category/{id}', 'Admin\CategoryController@update')->name('category.update');
   });
   Route::group(['middleware' => ['permission:Delete_Categories']], function() {
       Route::delete('/category', 'Admin\CategoryController@destroy')->name('category.destroy');
   });
   /**
   * Ending Routes For Categories
   */
  /**
  * Starting Routes For InterestGroups
  */
  Route::group(['middleware' => ['permission:View_Interest_Groups']], function() {
      Route::get('/interest_groups', 'Admin\InterestGroupController@index')->name('interest_group.index');
  });
  Route::group(['middleware' => ['permission:Add_Interest_Groups']], function() {
      Route::get('/interest_group/create', 'Admin\InterestGroupController@create')->name('interest_group.create');
      Route::post('/interest_group', 'Admin\InterestGroupController@store')->name('interest_group.store');
  });
  Route::group(['middleware' => ['permission:Edit_Interest_Groups']], function() {
      Route::get('/interest_group/{id}/edit', 'Admin\InterestGroupController@edit')->name('interest_group.edit');
      Route::patch('/interest_group/{id}', 'Admin\InterestGroupController@update')->name('interest_group.update');
  });
  Route::group(['middleware' => ['permission:Delete_Interest_Groups']], function() {
      Route::delete('/interest_group', 'Admin\InterestGroupController@destroy')->name('interest_group.destroy');
  });
  /**
  * Ending Routes For InterestGroups
  */
 
  /**
  * Starting Routes For Activities
  */
  Route::group(['middleware' => ['permission:View_Activities']], function() {
      Route::get('/activities', 'Admin\ActivityController@index')->name('activity.index');
  });
  Route::group(['middleware' => ['permission:Add_Activities']], function() {
      Route::get('/activity/create', 'Admin\ActivityController@create')->name('activity.create');
      Route::post('/activity', 'Admin\ActivityController@store')->name('activity.store');
  });
  Route::group(['middleware' => ['permission:Edit_Activities']], function() {
      Route::get('/activity/{id}/edit', 'Admin\ActivityController@edit')->name('activity.edit');
      Route::patch('/activity/{id}', 'Admin\ActivityController@update')->name('activity.update');
  });
  Route::group(['middleware' => ['permission:Delete_Activities']], function() {
      Route::delete('/activity', 'Admin\ActivityController@destroy')->name('activity.destroy');
  });
  /**
  * Ending Routes For Activities
  */
  
  /**
  * Starting Routes For LostAndFound
  */
  Route::group(['middleware' => ['permission:View_Lost_And_Found']], function() {
      Route::get('/lost_and_founds', 'Admin\LostAndFoundController@index')->name('lost_and_found.index');
  });
  Route::group(['middleware' => ['permission:Add_Lost_And_Found']], function() {
      Route::get('/lost_and_found/create', 'Admin\LostAndFoundController@create')->name('lost_and_found.create');
      Route::post('/lost_and_found', 'Admin\LostAndFoundController@store')->name('lost_and_found.store');
  });
  Route::group(['middleware' => ['permission:Edit_Lost_And_Found']], function() {
      Route::get('/lost_and_found/{id}/edit', 'Admin\LostAndFoundController@edit')->name('lost_and_found.edit');
      Route::patch('/lost_and_found/{id}', 'Admin\LostAndFoundController@update')->name('lost_and_found.update');
  });
  Route::group(['middleware' => ['permission:Delete_Lost_And_Found']], function() {
      Route::delete('/lost_and_found', 'Admin\LostAndFoundController@destroy')->name('lost_and_found.destroy');
  });
  /**
  * Ending Routes For LostAndFound
  */
  
  /**
  * Starting Routes For Battles
  */
  Route::group(['middleware' => ['permission:View_Battles']], function() {
      Route::get('/battles', 'Admin\BattleController@index')->name('battle.index');
  });
  Route::group(['middleware' => ['permission:Add_Battles']], function() {
      Route::get('/battle/create', 'Admin\BattleController@create')->name('battle.create');
      Route::post('/battle', 'Admin\BattleController@store')->name('battle.store');
  });
  Route::group(['middleware' => ['permission:Edit_Battles']], function() {
      Route::get('/battle/{id}/edit', 'Admin\BattleController@edit')->name('battle.edit');
      Route::patch('/battle/{id}', 'Admin\BattleController@update')->name('battle.update');
  });
  Route::group(['middleware' => ['permission:Delete_Battles']], function() {
      Route::delete('/battle', 'Admin\BattleController@destroy')->name('battle.destroy');
  });
  /**
  * Ending Routes For Battles
  */
});
