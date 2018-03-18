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

Route::post('workout/report/save', 'WorkoutController@store');
Route::post('nutrition/save', 'NutritionController@store');

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('fitness', 'DashboardController@showFitnessTab');
Route::get('nutrition', 'DashboardController@showNutritionTab');
Route::get('health', 'DashboardController@showHealthTab');

Route::get('workout/report/form', 'WorkoutController@showWorkoutReportForm');
Route::get('fitness/form', 'DashboardController@showFitnessForm');
Route::get('nutrition/form', 'DashboardController@showNutritionForm');
Route::get('health/form', 'DashboardController@showHealthForm');

