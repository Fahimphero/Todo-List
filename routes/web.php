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
    return view('welcome');
});


Route::any('/multiply', '\App\Http\Controllers\MultiplicationController@getMultiplication');


Route::any('/feedback', '\App\Http\Controllers\FeedBackController@getFeedback');


//Route::any('/todo', '\App\Http\Controllers\TaskController@storeTasks');

//Route::any('/todo', '\App\Http\Controllers\TaskController@showTasks');

Route::any('/todo', [App\Http\Controllers\TaskController::class, 'handleTodo']);

Route::post('/todo/update/{id}', [App\Http\Controllers\TaskController::class, 'updateTask']);

Route::delete('/todo/delete/{id}', [App\Http\Controllers\TaskController::class, 'deleteTask']);

Route::post('/todo/edit/{id}', [App\Http\Controllers\TaskController::class, 'editTask']);

