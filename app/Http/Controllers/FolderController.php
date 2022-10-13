<?php
namespace App\Http\Controllers;
use App\Models\Folder;
use App\Models\Friend;
use App\Models\TdTask;
use App\Models\WishTask;
use Illuminate\Http\Request;
use App\Http\Requests\CreateFolder;
use Session;

class FolderController extends Controller
{

    //フォルダー画面表示・カテゴリーparamを取得
    public function get_add_folder($category){
        $user_id=session('id');
        $check_friend=Friend::where('follow_user_id','=',$user_id)->first();

        $category = $category;
        return view('folder', [
            'category'=>$category,
            'check_friend'=>$check_friend,
          ]);
    }

    //フォルダーの新規作成
    public function add_folder(request $request){
            // バリデーション
            $this->validate($request,[
                'title' => 'required',
            ]);

        $folder = new Folder();
        $folder -> title = $request -> title;
        $folder -> category = $request -> category;
        $folder -> user_id = session('id');
        $folder->type=$request->type;

        if($request->type===Null){
            $folder->type='0';
        }
        $folder->save();

        if($request->category === "0"){
            return redirect()->route('wish_tasks.index', [
                'category' => $request->category,
                'id'=> 0,
            ]);
        }else{
            return redirect()->route('todo_tasks.index', [
                'category' => $request->category,
                'id'=> 0,
            ]);
        }

    }


    //フォルダーの新規作成
    public function get_edit_folder(int $folder_id){
        $folders = Folder::whereId($folder_id)->first();
        return view('edit_folder', [
            'folders'=>$folders
          ]);
    }


    //folderの編集処理
public function edit_folder(request $request)
{
    // 1
    $folder =Folder::find($request->folder_id);
    // 2
    $folder->title = $request->title;
    $folder->save();
    // 3
    if($folder->category == "0"){
        return redirect()->route('wish_tasks.index', [
            'category' => $folder->category,
            'id'=> 0,
        ]);
    }else{
        return redirect()->route('todo_tasks.index', [
            'category' => $folder->category,
            'id'=> 0,
        ]);
    }
}

//folder消去
public function delete_folder(int $folder_id)
{
    $folder =Folder::find($folder_id);
    TdTask::where('folder_id','=',$folder_id)->delete();
    WishTask::where('folder_id','=',$folder_id)->delete();
    Folder::where('id','=',$folder_id)->delete();
    
    if($folder->category == "0"){
        return redirect()->route('wish_tasks.index', [
            'category' => $folder->category,
            'id'=> 0,
        ]);
    }else{
        return redirect()->route('todo_tasks.index', [
            'category' => $folder->category,
            'id'=> 0,
        ]);
    }
}

    }





