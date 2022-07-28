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

//会員登録画面の表示
Route::get('/register',function(){return view('user/member_register');})->name('register');

//ログイン画面の表示
Route::get('/login',function(){return view('user/login');})->name('login');

//top画面の表示
Route::get('/top',function(){return view('/top');})->name('top');

//todolistの画面表示

Route::get('/todolist',function(){return view('todolist/todolist');})->name('todolist');


//wishlistの画面表示
Route::get('/wishlist',function(){return view('wishlist/wishlist');})->name('wishlist');

//todolistフォルダー追加の画面表示
Route::get('/todolist_add_folder',function(){return view('todolist/todolist_folder');})->name('td_folder');

//wishlistフォルダー追加の画面表示
Route::get('/wishlist_add_folder',function(){return view('wishlist/wishlist_folder');})->name('wish_folder');

//todolistタスク作成画面表示
Route::get('/todolist_tasks',function(){return view('todolist/todolist_tasks');})->name('td_tasks');

//wishlistタスク作成画面表示
Route::get('/wishlist_tasks',function(){return view('wishlist/wishlist_tasks');})->name('wish_tasks');

//todolistタスク編集画面表示
Route::get('/todolist_edit_task',function(){return view('todolist/edit_todo_task');})->name('td_edit');

//wishlistタスク編集画面表示
Route::get('/wishlist_edit_task',function(){return view('wishlist/edit_wish_task');})->name('wish_edit');

//会員情報変更画面表示
Route::get('/edit_member',function(){return view('user/edit_member');})->name('edit_member');

//お友達追加画面表示
Route::get('/add_friend',function(){return view('user/add_friend');})->name('add_friend');