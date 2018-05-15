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

Route::get('/','WelcomeController@index');

Route::get('contact', function () {
    return view('forms.contact');
});

Route::get('about', function () {
    return view('about');
});

Auth::routes();

Route::get('dashboard', 'DashboardController@index')->name('dashboard');

Route::get('workout', 'WorkoutController@showWorkoutTab');
Route::get('workout/form/{workout_type}', 'WorkoutController@showWorkoutFormView');
Route::get('workout/form/{workout_type}/{workout_id}', 'WorkoutController@showWorkoutFormView');
Route::get('workout/edit/{workout_type}', 'WorkoutController@showWorkoutEditView');
Route::get('workout/view/{workout_id}', 'WorkoutController@showWorkoutView');

Route::get('nutrition', 'NutritionController@showNutritionTab');
Route::get('nutrition/form', 'NutritionController@showNutritionFormView');
Route::get('nutrition/form/{nutrition_id}', 'NutritionController@showNutritionFormView');

Route::get('health', 'HealthController@showHealthTab');
Route::get('health/form', 'HealthController@showHealthFormView');
Route::get('health/form/{health_id}', 'HealthController@showHealthFormView');

Route::get('gyms', 'MemberController@index');
Route::get('fitness_group/{id}', 'MemberController@showFitnessGroup');

Route::get('admin', 'UserController@admin')->name('admin');
Route::get('admin/{data_type}', 'UserController@admin');
Route::get('admin/{data_type}/add', 'UserController@form');
Route::get('admin/{data_type}/edit/{identity}', 'UserController@form');
Route::get('admin/{data_type}/deactivate/{identity}', 'UserController@deactivate');

Route::get('account', 'UserController@index');
Route::get('{data_type}/form', 'UserController@form');

/*-------------------------------POST ROUTES-------------------------------*/

Route::post('workout/delete/{workout_type}/{id}', 'WorkoutController@destroy');
Route::post('nutrition/delete/{id}', 'NutritionController@destroy');
Route::post('health/delete/{id}', 'HealthController@destroy');

Route::post('workout/report/store/{workout_type}', 'WorkoutController@store');
Route::post('nutrition/store', 'NutritionController@store');
Route::post('health/store', 'HealthController@store');
Route::post('account/store', 'UserController@store');

Route::post('admin/store/{data_type}/{identity}', 'UserController@store');
Route::post('admin/store/{data_type}', 'UserController@store');



