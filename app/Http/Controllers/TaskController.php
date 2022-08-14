<?php

namespace App\Http\Controllers;
use App\Models\Folder;
use App\Models\Friend;
use App\Models\TdTask;
use App\Models\WishTask;
use Illuminate\Http\Request;
use App\Http\Requests\CreateFolder;
use Session;

class TaskController extends Controller
{
    //todotask追加の表示（フォルダーId渡す）
    public function get_add_tdtask(int $folder_id){
        if($folder_id === 0){
         //フラッシュメッセージ
         Session::flash('flash_message_6', 'フォルダーを選択してください。');
        // リダイレクト
        return redirect()->route('todo_tasks.index', [
            'category' =>  1,
            'id'=> $folder_id,
        ]);
        }else{
        $folders=Folder::whereId($folder_id)->first();
        return view('/todolist/todolist_tasks', [
            'folder_id'=>$folder_id,
            'folders'=>$folders
          ]);
    }}
    
    //wishtask追加の表示（フォルダーId渡す）
    public function get_add_wishtask(int $folder_id){

        if($folder_id === 0){
            //フラッシュメッセージ
            Session::flash('flash_message_7', 'フォルダーを選択してください。');
           // リダイレクト
           return redirect()->route('wish_tasks.index', [
               'category' => 0,
               'id'=> $folder_id,
           ]);
           }else{
        $folders=Folder::whereId($folder_id)->first();
            return view('/wishlist/wishlist_tasks', [
                'folder_id'=>$folder_id,
                'folders'=>$folders
              ]);}
        
    }


    //wishlistのtaskとfolderを取得
    public function get_wish_folder(int $category,int $id){
        $category = $category;
        $current_folder_id=$id;
        $user_id=session('id');
        $friend=Friend::where('follow_user_id','=',$user_id)->where('status','=','active')->first();
        //自分と友達のフォルダーを取得
        if(!empty($friend)){
            $folders = Folder::whereCategory(0)->whereIn('user_id',[$user_id,$friend->followed_user_id])->get();
            }else{
                $folders = Folder::whereCategory(0)->where('user_id','=',$user_id)->get();
            }
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
        $friend=Friend::where('follow_user_id','=',$user_id)->where('status','=','active')->first();
        //自分のフォルダーと友達フォルダー
        if(!empty($friend)){
             $folders = Folder::whereCategory(1)->whereIn('user_id',[$user_id,$friend->followed_user_id])->get();
        }else{
            $folders = Folder::whereCategory(1)->where('user_id','=',$user_id)->get();
        }
       
                           
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
            

            // バリデーション
            $this->validate($request,[
                'title' => 'required',
                'due_date' => 'required',
            ]);
    
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
            return redirect()->route('todo_tasks.index', [
                'category' => 0,
                'id'=> $id,
            ]);
}

public function add_wish_task(int $id,request $request){
   
            // バリデーション
            $this->validate($request,[
                'title' => 'required',
                'due_date' => 'required',
            ]);
    
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
           return redirect()->route('wish_tasks.index', [
                'category' => 1,
                'id'=> $id,
            ]);
}

//td編集画面
public function get_edit_todo_task(int $task_id){
    $tasks = TdTask::find($task_id);
    return view('todolist/edit_todo_task',
    [
        'tasks'=>$tasks
     ]);
}

//td編集処理
public function edit_todo_task(int $task_id, Request $request)
{
    // 1
    $task = TdTask::find($task_id);

    // 2
    $task->title = $request->title;
    $task->status = $request->status;
    $task->due_date = $request->due_date;
    $task->who = $request->who;
    $task->url = $request->url;
    $task->comment = $request->comment;
    $task->remarks= $request->remarks;
    $task->folder_id = $request->folder_id;
    $task->save();

    // 3
    return redirect()->route('todo_tasks.index', [
        'category' => 1,
        'id'=>$request->folder_id,
    ]);
}


//wish編集画面
public function get_edit_wish_task(int $task_id){
    $tasks = WishTask::find($task_id);
    return view('wishlist/edit_wish_task',
    [
        'tasks'=>$tasks
     ]);
}


//td削除
public function delete_td_task(int $task_id)
{
    // 1
    TdTask::where('id','=',$task_id)->delete();
    // 3
    return redirect()->route('top');
}

//wishのタスク編集処理
public function edit_wish_task(int $task_id, Request $request)
{
    // 1
    $task = WishTask::find($task_id);
    // 2
    $task->title = $request->title;
    $task->status = $request->status;
    $task->due_date = $request->due_date;
    $task->url = $request->url;
    $task->comment = $request->comment;
    $task->budget = $request->budget;
    $task->remarks= $request->remarks;
    $task->folder_id = $request->folder_id;
    $task->save();
    // 3
    return redirect()->route('wish_tasks.index', [
        'category' => 0,
        'id'=>$request->folder_id,
    ]);
}

//td削除
public function delete_wish_task(int $task_id)
{
    WishTask::where('id','=',$task_id)->delete();
    return redirect()->route('top');
}

}