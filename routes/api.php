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

Route::middleware('auth:api')->resource('users', 'UserController',['only' => [
    'update','destroy','index'
]]);

Route::resource('users', 'UserController',['only' => [
    'show'
]]);

Route::middleware('auth:api')->get('users/{user}/roles','UserController@roles');
Route::middleware('auth:api')->get('users/{role}/permissions','RoleController@permissions');

Route::middleware('auth:api')->resource('roles', 'RoleController',['only' => [
    'store','update','destroy'
]]);

Route::resource('roles', 'RoleController',['only' => [
    'index','show'
]]);


Route::resource('permissions', 'PermissionController',['only' => [
    'index','show'
]]);


Route::post('auth/register', 'Auth\RegisterController@register');
