<?php

namespace App\Http\Controllers;
use App\Models\Friend;
use App\Models\User;
use Illuminate\Http\Request;
use Session;

class FriendController extends Controller
{


//友達追加画面の表示
public function  get_friend(int $id)
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
  $keyword = $request ->input('keyword');
  $query = User::query();
  if(!empty($keyword)){
    $query->where('id', 'LIKE', "%{$keyword}%")
    ->orWhere('name', 'LIKE', "%{$keyword}%");
}
  $users = $query -> get();
  return view('user/search_friend',
    [
        'users'=>$users
     ]);
}

//友達の追加

public function  add_friend(int $friend_id)
{   

  if($friend_id === session('id')){
    Session::flash('flash_message_1', '自分のIDは追加できません');
    return redirect()->route('get_friend', [
      'id' => session('id'),
  ]);
  }else{

    $add_friend_1 = new Friend([
      'follow_user_id' => $friend_id,
      'followed_user_id' => session('id')
    ]);
  
    $add_friend_2 = new Friend([
      'follow_user_id' => session('id'),
      'followed_user_id' => $friend_id
    ]);
    $add_friend_1->save();
    $add_friend_2->save();
    return redirect()->route('get_friend', [
      'id' => session('id'),
  ]);
  }
}

}