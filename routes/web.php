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

Route::get('admin/dashboard', 'FormController@admin')->name('admin');
Route::get('admin/{type}', 'FormController@admin');

Route::get('account', 'FormController@index');

Route::get('form/{type}', 'FormController@form');
Route::get('form/{type}/{identity}', 'FormController@form');
Route::get('form/{type}/{identity}/{modifier}', 'FormController@formModified');

/*-------------------------------POST ROUTES-------------------------------*/

Route::post('workout/report/store/{workout_type}', 'WorkoutController@store');
Route::post('nutrition/store', 'NutritionController@store');
Route::post('health/store', 'HealthController@store');
Route::post('account/store', 'FormController@store');

Route::post('store/{type}', 'FormController@store');
Route::post('store/{type}/{identity}', 'FormController@store');




