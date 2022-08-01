<?php

namespace App\Http\Controllers;
use App\Models\Friend;
use App\Models\User;
use Illuminate\Http\Request;

class FriendController extends Controller
{


//友達追加画面の表示
public function  get_friend(int $id)
{
$friends = Friend::where('follow_user_id', '=', $id)->first();
$followed_user_id=$friends->followed_user_id;
$friend_name=User::find($followed_user_id)->name;
return view('user/add_friend', [
    'friends'=>$friends,
    'friend_name'=>$friend_name
  ]);
}

//友達の解除
public function  delete_friend(int $user_id)
{   
        $friend_1=Friend::where('follow_user_id','=',$user_id)->first();
        $friend_1->delete();
        $friend_2=Friend::where('followed_user_id','=',$user_id)->first();
        $friend_2->delete();
        return redirect('/add_friend/$user_id');
}


//     //友達検索して表示
//     public function search_friend(Request $request)
// {

// }
}
