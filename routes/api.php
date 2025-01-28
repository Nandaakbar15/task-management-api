<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// route login and register
Route::post('/login', 'App\Http\Controllers\AuthController@login')->name('login');

// route register
Route::post('/register', 'App\Http\Controllers\AuthController@register');

/*
    credentials login
    username : admin
    password : 123
*/ 


// route tasks
/*
    endpoint each API
    GET /api/tasks/getTask
    GET (based on tasks id) /api/detailTask/id_task
    POST /api/addTask
    PUT /api/updateTasks/id_task 
    DELETE /api/deleteTask/id_task
*/
Route::middleware('auth:api')->prefix('task')->group(function() {
    Route::get('/getTask', 'App\Http\Controllers\TaskController@index');
    Route::get('/detailTask/{tasks}', 'App\Http\Controllers\TaskController@show');
    Route::post('/addTask', 'App\Http\Controllers\TaskController@store');
    Route::put('/updateTasks/{tasks}', 'App\Http\Controllers\TaskController@update');
    Route::delete('/deleteTasks/{tasks}', 'App\Http\Controllers\TaskController@destroy');
});