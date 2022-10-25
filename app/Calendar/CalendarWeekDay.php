<?php
namespace App\Calendar;
use Carbon\Carbon;

class CalendarWeekDay {
	protected $carbon;

	function __construct($date){
		$this->carbon = new Carbon($date);
	}

	//クラス名（day-sun/day-sat->CSS色違う)
	function getClassName(){
		return "day-" . strtolower($this->carbon->format("D"));
	}

	/**
	 * @return 
	 */
	//日付のクラスとフォーマット（j＝0なし）
	function render(){
		return '<p class="day">' . $this->carbon->format("j"). '</p>';
	}

	/**
	 * @return 
	 */
	//日付のクラスとフォーマット（j＝0なし）
	// function render_todo(){
	// 	return '<p class="day">' .$count. '</p>';
	// }

	function render_test(){
		return  $this->carbon->format("Y-m-d");
	}

}

