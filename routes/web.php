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
use Illuminate\Http\Request;

Route::get('/', function () {
  return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/redirect', function () {
  $query = http_build_query([
    'client_id' => 3,
    'redirect_uri' => 'http://localhost:8000/callback',
    'response_type' => 'code',
    'scope' => '',
  ]);

  return redirect('http://localhost:8000/oauth/authorize?'.$query);
});

Route::get('/callback', function (Request $request) {
  $http = new GuzzleHttp\Client;

  $response = $http->post('http://localhost:8000/oauth/token', [
    'form_params' => [
      'grant_type' => 'authorization_code',
      'client_id' => 3,
      'client_secret' => '2007Iw8vYs6f26VkJuMU40KpCBNU3yHOqbX6UL8z',
      'redirect_uri' => 'http://localhost:8000/home',
      'code' => $request->code,
    ],
  ]);

  return json_decode((string) $response->getBody(), true);
});



Route::get('/callback1', function (Request $request) {
  $http = new GuzzleHttp\Client;

  $response = $http->post('http://localhost:8000/oauth/token', [
    'form_params' => [
      'grant_type' => 'password',
      'client_id' => 2,
      'client_secret' => 'VdqP9VOwV0vmfACUkVy20fn49jY2mdzn98xicd2e',
      'redirect_uri' => 'http:/
      /localhost',
      'code' => $request->code,
      'username' => 'ncitycode@gmail.com',
      'password' => 'wyf151999',
    ],
  ]);

  return json_decode((string) $response->getBody(), true);
});
