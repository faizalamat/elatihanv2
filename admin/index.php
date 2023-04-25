<?php
if (!isset($_SESSION)) { session_start(); }
include('../inc/conn.php');
include('../inc/fungsi.php');
if (!empty($_SESSION['staff']) && $tm['ulevel'] == 1 || $tm['ulevel'] == 2) {
	include('../tmp/admin/header.php');
	if (!empty($_GET['modul'])) {
		switch($_GET['modul']) {
			case "profail":
				include('../inc/logout.php');
				break;

			case "pentadbir":
				if ($tm['ulevel'] == 1) {
					include('admin.php');
				}
				else {
					echo '<meta http-equiv="Refresh" content="0;url=index.php">'; 
				}
				break;

			case "kumpulan":
				include('kumpulan.php');
				break;

			case "gred":
				include('gred.php');
				break;

			case "bahagian":
				include('bahagian.php');
				break;

			case "epsa":
				include('epsa.php');
				break;

			case "staff":
				include('kakitangan.php');
				break;

			case "kursus":
				include('kursus.php');
				break;

			case "kelulusan":
				include('lulus.php');
				break;

			case "laporan":
				include('lapor.php');
				break;

			case "statistik":
				include('stats.php');
				break;

			default:
				echo '<meta http-equiv="Refresh" content="0;url=index.php">'; 
				break;
		}
	}
	else {
		include('../tmp/admin/index.php');
	}
	include('../tmp/footer.php');
}
else {
	echo '<meta http-equiv="Refresh" content="0;url=../index.php">'; 
}
?>