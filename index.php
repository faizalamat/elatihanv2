<?php
if (!isset($_SESSION)) { session_start(); }
include('inc/conn.php');
include('inc/fungsi.php');
if (isset($_SESSION['staff'])) {
	if (!empty($_GET['modul'])) {
		switch($_GET['modul']) {
			case "profail":
				include('tmp/header.php');
				include('profail.php');
				include('tmp/footer.php');
				break;

			case "pendaftaran":
				include('tmp/header.php');
				include('rekod.php');
				include('tmp/footer.php');
				break;

			case "status":
				include('tmp/header.php');
				include('status.php');
				include('tmp/footer.php');
				break;

			case "laporan":
				include('tmp/header.php');
				include('tmp/laporan_user.php');
				include('tmp/footer.php');
				break;

			case "cetak":
				include('tmp/cetak_user.php');
				break;

			default:
				include('tmp/header.php');
				include('tmp/index.php');
				include('tmp/footer.php');
				break;
		}
	}
	
	else {
		include('tmp/header.php');
		include('tmp/index.php');
		include('tmp/footer.php');
	}
}

else {
	if (!empty($_GET['modul'])) {
		switch($_GET['modul']) {
			case "profail":
				include('tmp/header.php');
				include('profail.php');
				include('tmp/footer.php');
				break;

			default:
				include('tmp/header.php');
				include('tmp/index.php');
				include('tmp/footer.php');
				break;
		}
	}
	
	else {
		include('tmp/header.php');
		include('tmp/index.php');
		include('tmp/footer.php');
	}
}
?>