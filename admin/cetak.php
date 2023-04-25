<?php
if (!isset($_SESSION)) { session_start(); }
include('../inc/conn.php');
include('../inc/fungsi.php');
if ($tm['ulevel'] == 1 || $tm['ulevel'] == 2) {
	if (!empty($_GET['menu'])) {
		switch($_GET['menu']) {
			case "kakitangan":
				include('../tmp/admin/cetak_staff.php');
				break;

			case "tempoh":
				include('../tmp/admin/cetak_tempoh.php');
				break;

			case "hari":
				include('../tmp/admin/cetak_hari.php');
				break;

			case "semua":
				include('../tmp/admin/cetak_semua.php');
				break;

			default:
				echo '<meta http-equiv="Refresh" content="0;url=index.php">'; 
				break;
		}
	}
	else {
		echo '<meta http-equiv="Refresh" content="0;url=index.php">'; 
	}
}
else {
	echo '<meta http-equiv="Refresh" content="0;url=../index.php">'; 
}
?>