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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/warriors', 'WarriorWorkoutController@save');
Route::get('/warriordata', 'WarriorWorkoutController@all');
Route::get('/test', 'WarriorWorkoutController@test');


Route::get('/getwarrior/{id}', function ($id){
    $user = App\User::where('warrior_id', $id)->firstOrFail();
    return $user->toJson();
});
