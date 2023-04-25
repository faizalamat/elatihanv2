<?php
if (!isset($_SESSION)) { session_start(); }
include('../inc/conn.php');
include('../inc/fungsi.php');
if (!empty($_SESSION['staff']) && $tm['ulevel'] == 1 || $tm['ulevel'] == 2) {
	if (!empty($_GET['menu'])) {
		switch($_GET['menu']) {
			case "staff":
				include('../tmp/admin/export_staff.php');
				break;

			case "bahagian":
				include('../tmp/admin/export_bahagian.php');
				break;

			case "kumpulan":
				include('../tmp/admin/export_kumpulan.php');
				break;

			case "jumlah":
				include('../tmp/admin/export_jumlah.php');
				break;

			case "tamat":
				include('../tmp/admin/export_tamat.php');
				break;

			case "jenis":
				include('../tmp/admin/export_kursus.php');
				break;

			case "epsa":
				include('../tmp/admin/export_epsa.php');
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