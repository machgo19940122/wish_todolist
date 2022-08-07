<?php
namespace App\Http\Controllers;
use App\Models\Folder;
use Illuminate\Http\Request;
use App\Http\Requests\CreateFolder;

class FolderController extends Controller
{

    //フォルダー画面表示・カテゴリーparamを取得
    public function get_add_folder($category){
        $category = $category;
        return view('folder', [
            'category'=>$category
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
        $folder->save();
        return redirect()->route('top');

    }



}
