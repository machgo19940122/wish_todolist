<?php

namespace App\Http\Controllers;
use App\Models\Folder;
use App\Models\TdTask;
use App\Models\WishTask;
use Illuminate\Http\Request;
use App\Http\Requests\CreateFolder;
use Session;

class TaskController extends Controller
{
    //todotask追加の表示（フォルダーId渡す）
    public function get_add_tdtask(int $folder_id){
        $folder_id = $folder_id;
        $folders=Folder::whereId($folder_id)->first();
        return view('/todolist/todolist_tasks', [
            'folder_id'=>$folder_id,
            'folders'=>$folders
          ]);
    }
    //wishtask追加の表示（フォルダーId渡す）
    public function get_add_wishtask(int $folder_id){
        $folder_id = $folder_id;
        $folders=Folder::whereId($folder_id)->first();
        return view('/wishlist/wishlist_tasks', [
            'folder_id'=>$folder_id,
            'folders'=>$folders
          ]);
    }


    //wishlistのtaskとfolderを取得
    public function get_wish_folder(int $category,int $id){
        $category = $category;
        $current_folder_id=$id;
        $user_id=session('id');
        $folders = Folder::whereCategory(0)
                            ->where('user_id', '=', $user_id)->get();
        $tasks = WishTask::where('folder_id','=',$current_folder_id)->get();
       return view('wishlist/wishlist',
       [
           'folders'=>$folders,
           'tasks'=>$tasks,
           'current_folder_id'=>$current_folder_id
        ]);
   }


   //todolistのtaskとfolderを取得
    public function get_todo_folder(int $category,int $id){
        $category = $category;
        $current_folder_id=$id;
        $current_id=$id;
        $user_id=session('id');
        $folders = Folder::whereCategory(1)
                            ->where('user_id', '=', $user_id)->get();
       $tasks = TdTask::where('folder_id','=',$current_folder_id)->get();

       return view('todolist/todolist',
       [
           'folders'=>$folders,
           'tasks'=>$tasks,
           'current_folder_id'=>$current_folder_id
        ]);
   }

//task登録

public function add_td_task(int $id,request $request){
   
            // // バリデーション
            // $this->validate($request,[
            //     'email' => 'required',
            //     'name' => 'required',
            //     'password' => 'required',
            // ]);
    
            // DBインサート
            $td_task = new TdTask([
                'title' => $request->input('title'),
                'due_date' => $request->input('due_date'),
                'status' => $request->input('status'),
                'url' => $request->input('url'),
                'who' => $request->input('who'),
                'comment' => $request->input('comment'),
                'remarks' => $request->input('remarks'),
                'folder_id' => $id,

                
            ]);
    
            // 保存
            $td_task->save();
            // リダイレクト
            return redirect()->route('top');
}

public function add_wish_task(int $id,request $request){
   
            // // バリデーション
            // $this->validate($request,[
            //     'email' => 'required',
            //     'name' => 'required',
            //     'password' => 'required',
            // ]);
    
            // DBインサート
            $wish_task = new WishTask([
                'title' => $request->input('title'),
                'due_date' => $request->input('due_date'),
                'status' => $request->input('status'),
                'url' => $request->input('url'),
                'who' => $request->input('who'),
                'budget' => $request->input('budget'),
                'comment' => $request->input('comment'),
                'remarks' => $request->input('remarks'),
                'folder_id' => $id,  
            ]);
    
            // 保存
            $wish_task->save();
            // リダイレクト
            return redirect()->route('top');
}

//td編集画面
public function get_edit_todo_task(int $task_id){
    $tasks = TdTask::find($task_id);
    return view('todolist/edit_todo_task',
    [
        'tasks'=>$tasks
     ]);
}
}
