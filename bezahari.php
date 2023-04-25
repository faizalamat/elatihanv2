<?php

$date1 = "2016-03-13";
$date2 = "2016-03-17";

$diff = abs(strtotime($date2) - strtotime($date1));

$years = floor($diff / (365*60*60*24));
$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24)) + 1;

printf("%d years, %d months, %d days\n", $years, $months, $days);



function hari($date1,$date2)
{
	if($cuti == 1){
		$date1 = explode("/", $date1);
		$date1 = mktime(0,0,0,$date1[1],$date1[0],$date1[2]);
		$date2 = explode("/", $date2);
		$date2 = mktime(0,0,0,$date2[1],$date2[0],$date2[2]);
	}
	else{


	}
}