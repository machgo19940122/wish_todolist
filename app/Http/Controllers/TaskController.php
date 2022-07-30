<?php

namespace App\Http\Controllers;
use App\Models\Folder;
use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Requests\CreateFolder;
use Session;

class TaskController extends Controller
{
    public function get_wish_folder(int $category){
        $category = $category;
        $user_id=session('id');
        $folders = Folder::whereCategory(0)
                            ->where('user_id', '=', $user_id)->get();
        // $folders = Folder::where('category', '=', $category)
        //         ->where('user', '=', session('id'))
        //         ->get();

    //primary-key
    //    $current_folder = Folder::find($id);
    //    $tasks =$current_folder->tasks()->get();


    //    return view('todolist/todlist',
    //    [
    //        'td_folders'=>$td_folders,
    //     //    'tasks'=>$tasks,
    //     ]);

       return view('wishlist/wishlist',
       [
           'folders'=>$folders,
        ]);
   }

    public function get_todo_folder(int $category){
        $category = $category;
        $user_id=session('id');
        $folders = Folder::whereCategory(1)
                            ->where('user_id', '=', $user_id)->get();
        // $folders = Folder::where('category', '=', $category)
        //         ->where('user', '=', session('id'))
        //         ->get();

    //primary-key
    //    $current_folder = Folder::find($id);
    //    $tasks =$current_folder->tasks()->get();


    //    return view('todolist/todlist',
    //    [
    //        'td_folders'=>$td_folders,
    //     //    'tasks'=>$tasks,
    //     ]);

       return view('todolist/todolist',
       [
           'folders'=>$folders,
        ]);
   }
}
