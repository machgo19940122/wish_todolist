<?php
namespace App\Calendar;
use Carbon\Carbon;


class CalendarView {

	private $carbon;

	function __construct($date){
		$this->carbon = new Carbon($date);
	}
	/**
	 * タイトル
	 */
	public function getTitle(){
		return $this->carbon->format('Y年n月');
	}

	/**
	 * カレンダーを出力する
	 */
	function render(){
		$html = [];
		$html[] = '<div class="calendar">';
		$html[] = '<table class="table">';
		$html[] = '<thead>';
		$html[] = '<tr>';
		$html[] = '<th>mon</th>';
		$html[] = '<th>tue</th>';
		$html[] = '<th>wed</th>';
		$html[] = '<th>thu</th>';
		$html[] = '<th>fri</th>';
		$html[] = '<th>sat</th>';
    $html[] = '<th>sun</th>';
		$html[] = '</tr>';
		$html[] = '</thead>';
		$html[] = '<tbody>';	
		//
				$weeks = $this->getWeeks();
				foreach($weeks as $week){
					$html[] = '<tr class="">';
					$days = $week->getDays();
					$count_tasks=$week->CountTodoTasks();
					// dd($count_tasks);
					foreach($days as $key=>$day){
						// dd($days);
						$html[] = '<td class="'.$day->getClassName().'">';
						$html[] = $day->render();

						if($count_tasks[$key]!='0件'){
							$html[]='<a href="/list_ofthedate/'.$day->render_test().'">';
							$html[]=$count_tasks[$key];
							$html[]='</a>';
						}
						  $html[] = '</td>';
					}
					$html[] = '</tr>';
				}
			$html[] = '</tbody>';
			$html[] = '</table>';
			$html[] = '</div>';
		return implode("", $html);
	}

	protected function getWeeks(){
		$weeks = [];
		//初日
		$firstDay = $this->carbon->copy()->firstOfMonth();
		//月末まで
		$lastDay = $this->carbon->copy()->lastOfMonth();
		//1週目
		$week = new CalendarWeek($firstDay->copy());
		$weeks[] = $week;
		//作業用の日
		$tmpDay = $firstDay->copy()->addDay(7)->startOfWeek();
		//月末までループさせる
		while($tmpDay->lte($lastDay)){
			//週カレンダーViewを作成する
			$week = new CalendarWeek($tmpDay, count($weeks));
			$weeks[] = $week;
			
      //次の週=+7日する
			$tmpDay->addDay(7);
		}
		return $weeks;
	}

/**
	 * 次の月
	 */
	public function getNextMonth(){
		return $this->carbon->copy()->addMonthsNoOverflow()->format('Y-m');
	}
	/**
	 * 前の月
	 */
	public function getPreviousMonth(){
		return $this->carbon->copy()->subMonthsNoOverflow()->format('Y-m');
	}

	
	


	
}

