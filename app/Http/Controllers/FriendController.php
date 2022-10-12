<?php

namespace App\Http\Controllers;
use App\Models\Friend;
use App\Models\User;
use Illuminate\Http\Request;
use Session;

class FriendController extends Controller
{


//友達追加画面の表示
public function  get_friend(int $id,request $request)
{
$no_friend_parameter=null;
$friends = Friend::where('follow_user_id', '=', $id)->where('status','=','active')->first();

if(!empty($friends)){
$followed_user_id=$friends->followed_user_id;
$friend_name=User::find($followed_user_id)->name;
return view('user/add_friend', [
    'friends'=>$friends,
    'friend_name'=>$friend_name
  ]);
}else{
  $no_friend_parameter='1';
  return view('user/add_friend', [
    'no_friend_parameter'=>$no_friend_parameter
  ]);
}
}

//友達の解除
public function  delete_friend(int $id)
{   
        $friend_1=Friend::where('follow_user_id','=',$id)->get()->each->delete(); 
        $friend_2=Friend::where('followed_user_id','=',$id)->get()->each->delete(); 

        return redirect()->route('get_friend', [
          'id' => session('id'),
      ]);
}

//友達の検索
public function  search_friend(request $request)
{   

     // バリデーション
     $this->validate($request,[
      'keyword' => 'required',
  ]);

  $keyword = $request ->input('keyword');
  $query = User::query();
  if(!empty($keyword)){
    $query->where('id', 'LIKE', "%{$keyword}%")
    ->orWhere('name', 'LIKE', "%{$keyword}%");
}
  $users = $query -> get();
  Session::put("search_keyword",$keyword);

  return view('user/search_friend',
    [
        'users'=>$users
     ]);
}

//友達の追加
public function  add_friend(int $friend_id)
{  
  //追加する友達に既に友達登録がないかを確認
  $check_friend=null;
  $check_friend=Friend::where('follow_user_id','=',$friend_id)->first();
  
  if($friend_id === session('id')){
    //自分のIDを追加した場合
    Session::flash('flash_message_1', '自分のIDは追加できません');
    return redirect()->route('search_friend', [
      'keyword' => session('search_keyword'),
  ]);
  }elseif(!empty($check_friend)){
    //既に友達のいるIDを追加しようとした場合
    Session::flash('flash_message_2', 'このユーザーは既に他の人と共有しています。');
    return redirect()->route('search_friend', [
      'keyword' => session('search_keyword'),
     ]);
  }else{
    //友達追加処理
    $add_friend_1 = new Friend();
    $add_friend_1 -> follow_user_id = $friend_id;
    $add_friend_1 -> followed_user_id = session('id');
    $add_friend_1 -> save();

    $add_friend_2 = new Friend();
    $add_friend_2->follow_user_id = session('id');
    $add_friend_2->followed_user_id= $friend_id;
    $add_friend_2 -> save();
      
    return redirect()->route('get_friend', [
      'id' => session('id'),
  ]);
  }
}

}