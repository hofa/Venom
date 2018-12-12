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
// Route::post('login', 'Api\PassportController@login');
// Route::post('register', 'Api\PassportController@register');
// Route::middleware('auth:api')->get('user/detail', 'Api\PassportController@getDetails');
/*
Route::middleware('auth:api')->get('/user/detail', function (Request $request) {
    return $request->user();
});
*/

// Route::group(['middleware' => 'api-auth'], function(){
//     Route::get('detail', 'Api\PassportController@getDetails');
// });

// Route::get('detail2', 'Api\PassportController@getDetails');

Route::post('signup', 'Api\AuthController@register');
Route::post('login', 'Api\AuthController@login');
Route::group(['prefix' => 'auth', 'middleware' => 'jwt.auth'], function () {
    Route::get('user', 'Api\AuthController@user');
    Route::post('logout', 'Api\AuthController@logout');
});
Route::middleware('jwt.refresh')->get('/token/refresh', 'Api\AuthController@refresh');