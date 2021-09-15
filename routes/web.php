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


// フォルダ一覧
Route::get('folder','FolderController@index');

// フォルダの追加
Route::get('folder/add', 'FolderController@add');
Route::post('folder/add', 'FolderController@create');

// フォルダの編集
Route::get('folder/{id}/edit', 'FolderController@edit')->name('folder.getId');
Route::post('folder/{id}/edit', 'FolderController@update')->name('folder.getId');

// フォルダの削除
Route::get('folder/{id}/del', 'FolderController@delete')->name('folder.getId');
Route::post('folder/{id}/del', 'FolderController@remove')->name('folder.getId');

// フォルダの情報検索
Route::get('folder/info', 'FolderController@find');
Route::post('folder/info', 'FolderController@search');


// ToDoの一覧
Route::get('todo/{id}', 'TodolistController@index')->name('folder.getId');

// Doneの一覧
Route::get('todo/{id}/done', 'TodolistController@done')->name('folder.getId');

// Doneの検索
Route::get('todo/{id}/done/search', 'TodolistController@find')->name('folder.getId');
Route::post('todo/{id}/done/search', 'TodolistController@search')->name('folder.getId');

// Todoの追加
Route::get('todo/{id}/add', 'TodolistController@add')->name('folder.getId');
Route::post('todo/{id}/add', 'TodolistController@create')->name('folder.getId');

// ToDoの編集
Route::get('todo/{id}/edit', 'TodolistController@edit')->name('folder.getId');
Route::post('todo/{id}/edit', 'TodolistController@update')->name('folder.getId');

// ToDoの削除
Route::get('todo/{id}/del', 'TodolistController@delete')->name('folder.getId');
Route::post('todo/{id}/del', 'TodolistController@remove')->name('folder.getId');


