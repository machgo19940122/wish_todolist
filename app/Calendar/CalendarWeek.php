<?php
namespace App\Calendar;

use Carbon\Carbon;
use App\Calendar\Calendartask;

class CalendarWeek {

	protected $carbon;
	protected $index = 0;

	function __construct($date, $index = 0){
		$this->carbon = new Carbon($date);
		$this->index = $index;
	}

	// function getClassName(){
	// 	return "week-" . $this->index;
	// }

	/**
	 * @return CalendarWeekDay[]
	 */
	function getDays(){

		$days = [];

		//開始日〜終了日
		$startDay = $this->carbon->copy()->startOfWeek();
		$lastDay = $this->carbon->copy()->endOfWeek();

		//作業用->なぜ
		$tmpDay = $startDay->copy();

		//月曜日〜日曜日までループ
		while($tmpDay->lte($lastDay)){

			//前の月、もしくは後ろの月の場合は空白を表示
			if($tmpDay->month != $this->carbon->month){
				$day = new CalendarWeekBlankDay($tmpDay->copy());
				$days[] = $day;
				$tmpDay->addDay(1);
				continue;	
			}
				
			//今月だったら日にち表示
			$day = new CalendarWeekDay($tmpDay->copy());	
			$days[] = $day;
			//翌日に移動
			$tmpDay->addDay(1);
		}
		
		return $days;
	}


	/**
	 * @return Calendartask []
	 */
	function CountTodoTasks(){

		$count_todo_tasks = [];

		//開始日〜終了日
		$startDay = $this->carbon->copy()->startOfWeek();
		$lastDay = $this->carbon->copy()->endOfWeek();

		//作業用
		$tmpDay = $startDay->copy();

		//月曜日〜日曜日までループ
		while($tmpDay->lte($lastDay)){

			//前の月、もしくは後ろの月の場合は空白を表示
			if($tmpDay->month != $this->carbon->month){
				$count_todo_tasks[]="";
				$tmpDay->addDay(1);
				continue;	
			}

			//その日のタスク件数を配列に格納
			$count_todo= new Calendartask($tmpDay->copy());
			$count_todo_tasks[]=$count_todo->gettodotasks();

			//翌日に移動
			$tmpDay->addDay(1);
		}
		// dd($count_todo_tasks);
		return $count_todo_tasks;
	}



	
}

