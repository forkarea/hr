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
// Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/', function () {
//     return view('front/index');
// });

Route::get('/', 'FrontController@index');

Route::post('contact', 'FormsController@send');

Route::resource('admin/worker', 'WorkersController');
Route::resource('admin/application', 'ApplicationsController');

Route::get('applicationfile/{name}', [
    'as' => 'applications.showApplication',
    'uses' => 'ApplicationsController@showApplication',
    'middleware' => 'auth',
]);

Route::get('admin/recommendation/create/{id_worker?}', 'RecommendationsController@create');
Route::resource('admin/recommendation', 'RecommendationsController');

Route::resource('admin', 'AdminsController');

Auth::routes();

