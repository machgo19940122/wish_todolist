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
    return view('user/login');
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
Route::get('/top',function(){return view('/top');})->name('top')->middleware('login');

//todolistの画面表示
Route::get('/todo/{category}/folders/{id}/tasks',[App\Http\Controllers\TaskController::class,'get_todo_folder'])->name('todo_tasks.index')->middleware('login');
// Route::get('/todo/folders/{id}/tasks',function(){return view('todolist/todolist');})->name('todolist');

//wishlistの画面表示
Route::get('/wish/{category}/folders/{id}/tasks',[App\Http\Controllers\TaskController::class,'get_wish_folder'])->name('wish_tasks.index')->middleware('login');

//フォルダー追加の画面表示
// Route::get('/add_folder/{id}',function(){return view('/folder');})->name('add_folder');
Route::get('/add_folder/{category}', [App\Http\Controllers\FolderController::class, 'get_add_folder'])->middleware('login');

//フォルダー作成処理
Route::post('/add_folder',[App\Http\Controllers\FolderController::class,'add_folder'])->name('add_folder')->middleware('login');

//フォルダー修正・消去画面表示
Route::get('/edit_folder/{folder_id}', [App\Http\Controllers\FolderController::class, 'get_edit_folder'])->name('get_edit_folder')->middleware('login');

//フォルダー報編集の処理
Route::post('/edit_folder/{folder_id}', [App\Http\Controllers\FolderController::class,'edit_folder'])->name('edit_folder')->middleware('login');

//フォルダー消去の処理
Route::delete('/delete_folder/{folder_id}', [App\Http\Controllers\FolderController::class,'delete_folder'])->name('delete_folder')->middleware('login');

//todolistタスク作成画面表示
Route::get('/td_task/{folder_id}', [App\Http\Controllers\TaskController::class, 'get_add_tdtask'])->name('get_add_tdtask')->middleware('login');

//tdタスク登録
Route::post('/td_task/{folder_id}', [App\Http\Controllers\TaskController::class, 'add_td_task'])->name('add_td_task')->middleware('login');

//wishlistタスク作成画面表示
Route::get('/wish_task/{folder_id}', [App\Http\Controllers\TaskController::class, 'get_add_wishtask'])->name('get_add_wishtask')->middleware('login');

//wishタスクの詳細画面
Route::get('/more_detail_wish/{task_id}', [App\Http\Controllers\TaskController::class,'more_detail_wish'])->name('more_detail_wish')->middleware('login');

//wishタスクの詳細画面
Route::get('/more_detail_todo/{task_id}', [App\Http\Controllers\TaskController::class,'more_detail_todo'])->name('more_detail_todo')->middleware('login');

//tdタスク登録
Route::post('/wish_task/{folder_id}', [App\Http\Controllers\TaskController::class, 'add_wish_task'])->name('add_wish_task')->middleware('login');

//todolistタスク編集画面表示
Route::get('/todolist_edit_task/{task_id}', [App\Http\Controllers\TaskController::class, 'get_edit_todo_task'])->name('get_td_edit')->middleware('login');

//tdtask消去の処理
Route::delete('/todolist_edit_task/{task_id}', [App\Http\Controllers\TaskController::class,'delete_td_task'])->name('delete_td_task')->middleware('login');


//todolistタスク処理
Route::post('/todolist_edit_task/{task_id}', [App\Http\Controllers\TaskController::class, 'edit_todo_task'])->name('td_edit')->middleware('login');

//wishlistタスク編集画面表示
Route::get('/wishlist_edit_task/{task_id}', [App\Http\Controllers\TaskController::class, 'get_edit_wish_task'])->name('get_widh_edit')->middleware('login');

//wishtask消去の処理
Route::delete('/wishlist_edit_task/{task_id}', [App\Http\Controllers\TaskController::class,'delete_wish_task'])->name('delete_wish_task')->middleware('login');


//todolistタスク処理
Route::post('/wishlist_edit_task/{task_id}', [App\Http\Controllers\TaskController::class, 'edit_wish_task'])->name('wish_edit')->middleware('login');

//会員情報編集画面の表示
Route::get('/edit_member/{id}', [App\Http\Controllers\UserController::class,'get_edit_member'])->middleware('login');

//会員情報編集の処理
Route::post('/edit_member/{id}', [App\Http\Controllers\UserController::class,'edit_member'])->name('edit_member')->middleware('login');


//お友達追加画面表示
Route::get('/add_friend/{id}', [App\Http\Controllers\FriendController::class,'get_friend'])->name('get_friend')->middleware('login');

//お友達解除
Route::post('/add_friend/{id}', [App\Http\Controllers\FriendController::class,'delete_friend'])->name('delete_friend')->middleware('login');

//お友達追加画面表示
Route::get('/search_friend', [App\Http\Controllers\FriendController::class,'search_friend'])->name('search_friend')->middleware('login');

//お友達追加画面表示
Route::post('/search_friend/{friend_id}', [App\Http\Controllers\FriendController::class,'add_friend'])->name('add_friend')->middleware('login');


//お友達追加画面表示
Route::get('/calendar', [App\Http\Controllers\CalendarController::class,'get_calendar'])->name('get_calendar')->middleware('login');

//カレンダーからの日別一覧
Route::get('/list_ofthedate/{date}', [App\Http\Controllers\CalendarController::class,'get_list_oftheday'])->name('listoftheday')->middleware('login');

