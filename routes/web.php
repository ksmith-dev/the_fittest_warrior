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

Route::get('contact', function () {
    return view('forms.contact');
});

Route::get('about', function () {
    return view('about');
});

Route::get('shop', 'ShopController@index');

Auth::routes();

Route::post('workout/report/save', 'WorkoutController@store');
Route::post('nutrition/save', 'NutritionController@store');
Route::post('health/save', 'HealthController@store');

Route::get('dashboard', 'DashboardController@index')->name('dashboard');
Route::get('workout', 'DashboardController@showWorkoutTab');
Route::get('nutrition', 'DashboardController@showNutritionTab');
Route::get('health', 'DashboardController@showHealthTab');

Route::get('workout/form/{training_type}/{session_type}/{workout_type}', 'WorkoutController@showWorkoutReportForm');
Route::get('nutrition/form', 'DashboardController@showNutritionForm');
Route::get('health/form', 'DashboardController@showHealthForm');

Route::get('community', 'CommunityController@index');



