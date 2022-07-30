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
//会員登録処理
Route::post('/register', [App\Http\Controllers\UserController::class, 'postSignup'])->name('postsignup');
// //ログアウト
Route::get('/logout', [App\Http\Controllers\UserController::class,'logout'])->name('logout');
//ログイン画面の表示
Route::get('/login',function(){return view('user/login');})->name('login');
//ログイン処理
Route::post('/login', [App\Http\Controllers\UserController::class, 'postSignin'])->name('signin');

//top画面の表示
Route::get('/top',function(){return view('/top');})->name('top');

//todolistの画面表示
Route::get('/todo/{category}/folders/{id}/tasks',[App\Http\Controllers\TaskController::class,'get_todo_folder'])->name('todo_tasks.index');
// Route::get('/todo/folders/{id}/tasks',function(){return view('todolist/todolist');})->name('todolist');

//wishlistの画面表示
Route::get('/wish/folders/{category}/tasks',[App\Http\Controllers\TaskController::class,'get_wish_folder'])->name('wish_tasks.index');

//フォルダー追加の画面表示
// Route::get('/add_folder/{id}',function(){return view('/folder');})->name('add_folder');
Route::get('/add_folder/{category}', [App\Http\Controllers\FolderController::class, 'get_add_folder']);

//フォルダー作成処理
Route::post('/add_folder',[App\Http\Controllers\FolderController::class,'add_folder'])->name('add_folder');

//todolistタスク作成画面表示
Route::get('/todolist_tasks',function(){return view('todolist/todolist_tasks');})->name('td_tasks');

//wishlistタスク作成画面表示
Route::get('/wishlist_tasks',function(){return view('wishlist/wishlist_tasks');})->name('wish_tasks');

//todolistタスク編集画面表示
Route::get('/todolist_edit_task',function(){return view('todolist/edit_todo_task');})->name('td_edit');

//wishlistタスク編集画面表示
Route::get('/wishlist_edit_task',function(){return view('wishlist/edit_wish_task');})->name('wish_edit');

//会員情報編集画面の表示
Route::get('/edit_member/{id}', [App\Http\Controllers\UserController::class, 'get_edit_member']);
//会員情報編集の処理
Route::post('/edit_member/{id}', [App\Http\Controllers\UserController::class, 'edit_member'])->name('edit_member');
//お友達追加画面表示
Route::get('/add_friend',function(){return view('user/add_friend');})->name('add_friend');