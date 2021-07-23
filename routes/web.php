<?php

use App\Http\Controllers\QuestionController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {
    // Users resource routes.
    Route::resource('users', 'UsersController');


});

// Question resource routes.
Route::resource('questions', 'QuestionsController')->except('show');
Route::get('questions/{questionSlug}', 'QuestionsController@show')->name('questions.show');

// Answers resource routes.
Route::resource('questions.answers', 'AnswerController')->except(['index', 'create', 'show']);
