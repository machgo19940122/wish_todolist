<?php
namespace App\Calendar;

/**
* 余白を出力するためのクラス
*/
class CalendarWeekBlankDay extends CalendarWeekDay {
	
//クラスはday-blank=グレーアウト
    function getClassName(){
		return "day-blank";
	}

	/**
	 * @return 
	 */
	//日付の表示なし
	function render(){
		return '';
	}

}

