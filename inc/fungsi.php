<?php

// include 'inc/conn.php';

require_once('conn.php');

global $con;

function semakSlash($input) {

	global $con;

	if(!get_magic_quotes_gpc()) {
		$input = mysqli_real_escape_string($con,$input);
	}
	return $input;
}

function input1($str) {
	$str = htmlentities(strtoupper(trim(semakSlash($str))));
	return $str;
}

function input2($str) {
	$str = htmlentities(trim(semakSlash($str)));
	return $str;
}

function output1($str) {
	if(!get_magic_quotes_gpc()) {
		$str = stripslashes($str);
	}
	return $str;
}

function output2($str) {
	if(!get_magic_quotes_gpc()) {
		$str = html_entity_decode(stripslashes($str));
	}
	return html_entity_decode($str);
}

if (!empty($_SESSION['staff'])) {
	$sm = "SELECT * FROM user
		WHERE unokp = '" . input1($_SESSION['staff']) . "'
		ORDER BY unokp ASC
	";
	$dm = mysqli_query($con,$sm);
	$tm = mysqli_fetch_array($dm);
    //echo $tm['unama'];
}

function nombor($int) {
	if (ereg("[[:digit:]]", $int)) {
		return true;
	}
	else {
		return false;
	}
}

function email($email) {
	if (!ereg("^[^@]{1,64}@[^@]{1,255}$", $email)) {
		return false;
	}
	$email_array = explode("@", $email);
	$local_array = explode(".", $email_array[0]);
	for ($i = 0; $i < sizeof($local_array); $i++) {
		if (!ereg("^(([A-Za-z0-9!#$%&'*+/=?^_`{|}~-][A-Za-z0-9!#$%&'*+/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$", $local_array[$i])) {
			return false;
		}
	}  
	if (!ereg("^\[?[0-9\.]+\]?$", $email_array[1])) {
		$domain_array = explode(".", $email_array[1]);
		if (sizeof($domain_array) < 2) {
			return false;
		}
		for ($i = 0; $i < sizeof($domain_array); $i++) {
			if (!ereg("^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$", $domain_array[$i])) {
				return false;
			}
		}
	}
	return true;
}

function tarikh($tarikh) {
	$tarikh = explode("/", $tarikh);
	$tarikh = $tarikh[1] . "/" . $tarikh[0] . "/" . $tarikh[2];
	$tarikh = strtotime($tarikh);
	return $tarikh;
}

function hari($cuti,$t1,$t2) {
	if ($cuti == 1) {
		$t1 = explode("/",$t1);
		$t1 = mktime(0,0,0,$t1[1],$t1[0],$t1[2]);
		$t2 = explode("/",$t2);
		$t2 = mktime(0,0,0,$t2[1],$t2[0],$t2[2]);
		if ($t2 >= $t1) {
			$beza = floor(($t2 - $t1) / (60 * 60 * 24))+1;
		}
		else {
			$beza = floor(($t1 - $t2) / (60 * 60 * 24))+1;
		}
	}
	else {
		$t1 = explode("/",$t1);
		$t1 = mktime(0,0,0,$t1[1],$t1[0],$t1[2]);
		$t2 = explode("/",$t2);
		$t2 = mktime(0,0,0,$t2[1],$t2[0],$t2[2]);
		if ($t2 >= $t1) {
			$beza = floor(($t2 - $t1) / (60 * 60 * 24))+1;
		}
		else {
			$beza = floor(($t1 - $t2) / (60 * 60 * 24))+1;
		}
		while ($t1 <= $t2) {
			if (date("D",$t1) == "Sat" || date("D",$t1) == "Sun") {
				$beza = $beza - 1;
			}
			$t1 = $t1 + (60 * 60 * 24);
		}
	}
	return $beza;
}

function tempat($t1,$t2) {
	$t1 = explode("/",$t1);
	$t1 = mktime(0,0,0,$t1[1],$t1[0],$t1[2]);
	$t2 = explode("/",$t2);
	$t2 = mktime(0,0,0,$t2[1],$t2[0],$t2[2]);
	if ($t2 >= $t1) {
		$beza = ceil(($t2 - $t1) / (60 * 60 * 24)) + 1;
	}
	else {
		$beza = ceil(($t1 - $t2) / (60 * 60 * 24)) + 1;
	}
	return $beza;
}

function kosong($no, $n) {
  return str_pad((int) $no, $n, "0", STR_PAD_LEFT);
}

function bulan($i) {
	$ar1 = array("01","02","03","04","05","06","07","08","09","10","11","12");
	$ar2 = array("JANUARI","FEBRUARI","MAC","APRIL","MEI","JUN","JULAI","OGOS","SEPTEMBER","OKTOBER","NOVEMBER","DISEMBER");
	return str_replace($ar1,$ar2,$i);
}

function jam($i) {
	$ar1 = array("17","16","15","14","13","12","11","10","9","8");
	$ar2 = array("05:00PM","04:00PM","03:00PM","02:00PM","01:00PM","12:00PM","11:00AM","10:00AM","09:00AM","08:00AM");
	$jam = str_replace($ar1,$ar2,$i);
	$ar1 = array(":00AM.5",":30AM.5",":00PM.5",":30PM.5");
	$ar2 = array(":30AM",":30AM",":30PM",":30PM");
	return str_replace($ar1,$ar2,$jam);
}
?>