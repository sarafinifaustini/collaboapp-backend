<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!

*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// })\
Route::post('login','Api\AuthController@login');
Route::post('register','Api\AuthController@register');
Route::get('logout','Api\AuthController@logout');
Route::post('save_user_info','Api\AuthController@saveUserInfo')->middleware('jwtAuth');
Route::get('get_user_info','Api\AuthController@getUserInfo')->middleware('jwtAuth');

// Route::get('myTeams','Api\myTeamsController@myTeams')->middleware('jwtAuth');
// Route::post('exitTeam','Api\myTeamsController@exitTeam')->middleware('jwtAuth');
// Route::post('addTeams','Api\myTeamsController@addTeams')->middleware('jwtAuth');

Route::get('AllTask','Api\myTasksController@AllTask')->middleware('jwtAuth');
Route::post('editTask','Api\myTasksController@editTask')->middleware('jwtAuth');
Route::post('deleteTask','Api\myTasksController@deleteTask')->middleware('jwtAuth');
Route::post('createTask', 'Api\myTasksController@createTask')->middleware('jwtAuth');

