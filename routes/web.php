<?php

use App\Http\Controllers\ToDoController;
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

// ログイン画面
Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


// ログイン後の画面(フォルダ一覧)
Route::get('folder','FolderController@index');

// フォルダの追加
Route::get('folder/add', 'FolderController@add');
Route::post('folder/add', 'FolderController@create');

// フォルダの編集
Route::get('folder/{id}/edit', 'FolderController@edit')->name('folder.getId');
Route::post('folder/{id}/edit', 'FolderController@update')->name('folder.getId');


// ToDoの一覧
Route::get('todo/{id}', 'TodolistController@index')->name('folder.getId');

// ToDoの追加
Route::get('todo/{id}/add', 'TodolistController@add')->name('folder.getId');
Route::post('todo/{id}/add', 'TodolistController@create')->name('folder.getId');

