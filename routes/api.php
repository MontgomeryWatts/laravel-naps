 <?php

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

Route::prefix('spots')->group(function () {

    Route::get('/','SpotController@get');
    Route::get('/{spot_id}','SpotController@get');
    Route::get('/categories','CategoryController@get');

    Route::post('/create','SpotController@store')->middleware('permission:add spot');
    Route::post('/approve/{spot_id}','SpotController@update')->middleware('permission:approve spots');

});

Route::prefix('admin')->middleware(['permission:administer'])->group(function () {

    Route::prefix('users')->group(function () {

        Route::get('/','UserController@index');
        Route::post('/promote/{user}/reviewer','UserController@promoteReviewer');
        Route::post('/promote/{user}/admin','UserController@promoteAdmin');

    });

});
