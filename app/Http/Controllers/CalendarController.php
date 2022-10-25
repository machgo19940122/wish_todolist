<?php

namespace App\Http\Controllers;
use App\Models\Folder;
use App\Models\Friend;
use App\Models\TdTask;
use App\Models\WishTask;
use App\calendar\CalendarView;
use App\List\Listoftheday;

use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function get_calendar(Request $request){

		//クエリーのdateを受け取る
		$date = $request->input("date");

		//dateがYYYY-MMの形式かどうか判定する
		if($date && preg_match("/^[0-9]{4}-[0-9]{2}$/", $date)){
			$date = strtotime($date . "-01");
		}else{
			$date = null;
		}
		
		//取得出来ない時は現在(=今月)を指定する
		if(!$date)$date = time();
		//カレンダーに渡す
		$calendar = new CalendarView($date);

		//wish todo を渡す
		// $user_id=session('id');
    // $td_tasks=TdTask::where('user_id','=',$user_id);

		return view('calendar', [
			"calendar" => $calendar,
			// "td_tasks"=>$td_tasks,
				]);
	}



	  // カレンダーから一覧を取得
    public function get_list_oftheday($date){
			
			$todos=TdTask::whereDate('due_date',$date)
							->where('status','!=','2')->get();
			$wishes=WishTask::whereDate('due_date',$date)
						->where('status','!=','2')->get();

			return view('list_ofthedate', [
				"todos"=>$todos,
				"wishes"=>$wishes,
				"date"=>$date
				]);
			}
  //   public function get_list_oftheday($date){
	
	// 		$friend=Friend::where('follow_user_id','=',session('id'))->where('status','=','active')->first();
	// 		//自分と友達のフォルダーを取得
	// 		if(!empty($friend)){
	// 		 $folders = Folder::where('user_id','=',session('id'))->orwhere('user_id','=',$friend->followed_user_id)->where('type','=','0')->get();

	// 				}else{
	// 						$folders = Folder::where('user_id','=',session('id'))->get();
	// 				}
	// 				// dd($folders);
	// 				foreach($folders as $folder){
	// 					$todos=TdTask::where("folder_id","=",$folder->id)->whereDate('due_date',$date)->get();
	// 					$wishes=WishTask::where("folder_id","=",$folder->id)->whereDate('due_date',$date)->get();}
						
	// 		return view('list_ofthedate', [
	// 			"todos"=>$todos,
				
	// 			"wishes"=>$wishes,
	// 			"date"=>$date
	// 			]);
				
				
	// }

}
