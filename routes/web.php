<?php

use Illuminate\Support\Facades\Route;

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
    return redirect('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('home/answers', 'AnswerController@index');
Route::post('home/answers/test', 'AnswerController@create');
Route::get('/dashboard', 'HomeController@handleAdmin')->name('dashboard')->middleware('admin');
Route::get('/dashboard/options/{id}', 'OptionsController@index')->middleware('admin');
Route::post('/dashboard/options/create/{id}', 'OptionsController@create')->middleware('admin');
Route::get('/dashboard/options/destroy/{id}', 'OptionsController@destroy')->middleware('admin');

Route::resource('dashboard/users', 'UserController')->middleware('admin');
Route::resource('dashboard/questions', 'QuestionController')->middleware('admin');