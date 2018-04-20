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

Route::post('workout/report/store/{workout_type}/{id}', 'WorkoutController@store');
Route::post('workout/report/store/{workout_type}', 'WorkoutController@store');
Route::post('nutrition/save', 'NutritionController@store');
Route::post('health/save', 'HealthController@store');

Route::get('dashboard', 'DashboardController@index')->name('dashboard');
Route::get('workout', 'WorkoutController@showWorkoutTab');
Route::get('nutrition', 'NutritionController@showNutritionTab');
Route::get('health', 'HealthController@showHealthTab');

Route::get('workout/form/{workout_type}', 'WorkoutController@showWorkoutFormView');
Route::get('workout/form/{workout_type}/{workout_id}', 'WorkoutController@showWorkoutFormView');
Route::get('workout/edit/{workout_type}', 'WorkoutController@showWorkoutEditView');
Route::get('nutrition/form', 'NutritionController@showNutritionFormView');
Route::get('nutrition/form/{nutrition_id}', 'NutritionController@showNutritionFormView');
Route::get('health/form', 'HealthController@showHealthFormView');

Route::get('community', 'CommunityController@index');



