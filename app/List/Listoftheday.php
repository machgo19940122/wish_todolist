<?php
namespace App\List;
use Carbon\Carbon;
use App\Models\TdTask;
use App\Models\Folder;
use App\Models\User;


class Listoftheday{
	protected $carbon;

	// function __construct($date){
	// 	$this->carbon = new Carbon($date);
	// }

function get_tasks_oftheday(){
	//日を格納
	$date=$this->carbon->format("Y-m-d");
	$user=User::find(session('id'));
	$tasks=[];
	foreach($user->folders as $folder){
		foreach($folder->td_tasks as $td){
			if($td->due_date==$date && $td->status!=2){
				$tasks[]=$td;
			}

		}
	}

	return $tasks;

}}


