<?php
namespace App\Calendar;
use Carbon\Carbon;
use App\Models\TdTask;
use App\Models\Friend;
use App\Models\Folder;
use App\Models\User;
// use Session;

//カレンダーに表示させるTodo Wishのタスクを取得するクラス
// class Calendartask{
// 	protected $carbon;

// 	function __construct($date){
// 		$this->carbon = new Carbon($date);
// 	}

// 	//Todotask取得する関数
// 	function gettodotasks(){
// 		//日を格納
// 		$date=$this->carbon->format("Y-m-d");
// 		$user=User::find(session('id'));
// 		$task_num=0;

// 		//todo tasksの件数（自分のみ）
// 		foreach($user->folders as $folder){
// 			foreach($folder->td_tasks as $td){
// 				if($td->due_date==$date && $td->status!=2){
// 					$task_num++;
// 				}}
// 			}

// 		//wish tasksの件数取得（自分のみ）
// 		foreach($user->folders as $folder){
// 			foreach($folder->wish_tasks as $wish){
// 				if($wish->due_date==$date && $wish->status!=2){
// 					$task_num++;
// 				}}
// 			}
		
// 		return $task_num.'件';
// 	}



// }


class Calendartask{
	protected $carbon;

	function __construct($date){
		$this->carbon = new Carbon($date);
	}

	//Todotask取得する関数
	function gettodotasks(){
		//日を格納
		$date=$this->carbon->format("Y-m-d");
		$user=User::find(session('id'));
		$task_num=0;

		//todo tasksの件数（自分のみ）
		foreach($user->folders as $folder){
			foreach($folder->td_tasks as $td){
				if($td->due_date==$date && $td->status!=2){
					$task_num++;
				}}
			}

		//wish tasksの件数取得（自分のみ）
		foreach($user->folders as $folder){
			foreach($folder->wish_tasks as $wish){
				if($wish->due_date==$date && $wish->status!=2){
					$task_num++;
				}}
			}

		//共有している友達のtasks件数
			$friend=Friend::where('follow_user_id','=',session('id'))->where('status','=','active')->first();
			//自分と友達のフォルダーを取得(type=0は公開と設定している)
			if(!empty($friend)){
			$friend_folders = Folder::where('user_id','=',$friend->followed_user_id)->where('type','=','0')->get();

			// dd($friend_folders);

			foreach($friend_folders as $friend_folder){
				foreach($friend_folder->wish_tasks as $wish){
					if($wish->due_date==$date && $wish->status!=2){
						$task_num++;
					}
					
				}
				foreach($friend_folder->td_tasks as $td){
					if($td->due_date==$date && $td->status!=2){
							$task_num++;
						}
				}
			}}

		
		return $task_num.'件';
	}



}
