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

Route::get('health', 'HealthController@showHealthTab');
Route::get('workout', 'WorkoutController@showWorkoutTab');
Route::get('nutrition', 'NutritionController@showNutritionTab');
Route::get('workout/view/{workout_id}', 'WorkoutController@showWorkoutView');
Route::get('workout/edit/{workout_type}', 'WorkoutController@showWorkoutEditView');

Route::get('gyms', 'MemberController@index');
Route::get('fitness_group/{id}', 'MemberController@showFitnessGroup');

Route::get('account', 'FormController@index');
Route::get('admin/{type}', 'FormController@admin');
Route::get('admin/dashboard', 'FormController@admin')->name('admin');

Route::get('form/{table}', 'FormController@form');
Route::get('form/{table}/{identity}', 'FormController@form');
Route::get('form/{table}/{identity}/{modifier}', 'FormController@form');

/*-------------------------------POST ROUTES-------------------------------*/

Route::post('store/{type}', 'FormController@store');
Route::post('store/{type}/{identity}', 'FormController@store');




