<?php 
	function _min($t){
		$t = preg_replace("/^([\d]{1,2})\:([\d]{2})$/", "00:$1:$2", $t);
		sscanf($t, "%d:%d:%d", $hours, $minutes, $seconds);
		$time_min = $hours * 60 + $minutes;
		return $time_min;
	}
	function f1($f){
		$arf = split("-",$f);
		return $arf[2]."/".$arf[1]."/".substr($arf[0],2);
	}
	function toph($h,$t){
		if ($t==1) {
			switch ($h) {
			case "08:00:00":
				return " top1";
				break;
			
			case "08:45:00":
				return " top2";
				break;

			case "09:30:00":
				return " top3";
				break;

			case "10:15:00":
				return " top4";
				break;	

			case "11:00:00":
				return " top5";
				break;

			case "11:45:00":
				return " top6";
				break;
		}
	}elseif ($t==3) {
			switch ($h) {
			case "18:00:00":
				return " top1";
				break;
			
			case "18:45:00":
				return " top2";
				break;

			case "19:30:00":
				return " top3";
				break;

			case "20:30:00":
				return " top4";
				break;	

			case "21:15:00":
				return " top5";
				break;

		}
		}
	}


 ?>