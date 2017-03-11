<?php

use Illuminate\Http\Request;
// use App\Http\Controllers\Auth\RegisterController;
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
// Auth::routes();

Route::middleware('auth:api')->resource('roles', 'RoleController',['only' => [
    'store','update','destroy'
]]);

Route::resource('roles', 'RoleController',['only' => [
    'index','show'
]]);

Route::resource('permissions', 'PermissionController',['only' => [
    'index','show'
]]);



Route::middleware('auth:api')->get('/user', function (Request $request) {
  return $request->user();
});


Route::post('auth/register', 'Auth\RegisterController@register');
