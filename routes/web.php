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

Route::prefix('admin')->group(function () {
    Route::get('', 'UsersController@dashboard');
    Route::get('demo', 'HomeController@demo'); //ornek sayfa
    Route::resource('users', 'UsersController');
    Route::resource('jobs', 'JobsController');
    Route::resource('comments', 'CommentsController');
    Route::get('applications', 'ApplyController@index');
});

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', function () {
    return redirect('jobs');
});

Route::get('/jobs/{id}', 'JobsController@show');
Route::post('/jobs/{id}/new', 'CommentsController@store');

Route::get('/jobs', 'JobsController@usershow');

Route::resource('/jobs/{id}/', 'ApplyController');
//Route::get('/jobs/{id}/apply/', 'ApplyController@create');
Route::get('/jobs/{id}', 'JobsController@show');

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
