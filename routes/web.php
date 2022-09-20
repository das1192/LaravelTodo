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

Route::get('/','ToDoController@index')->name('home');

Route::post('/add-category','ToDoController@addCategory')->name('add.category');
Route::post('/add-todo','ToDoController@addTodo')->name('add.todo');
Route::get('/delete-category/{id}','ToDoController@deleteCategory')->name('delete.category');
Route::get('/delete-todo/{id}','ToDoController@deleteTodo')->name('delete.todo');
Route::get('/todos','ToDoController@todos')->name('todos');
Route::get('/updatetodo','ToDoController@updateTodo')->name('update.todo');

