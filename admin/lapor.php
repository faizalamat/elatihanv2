<?php
if (!empty($_GET['menu'])) {
	switch($_GET['menu']) {
		case "kakitangan":
			include('../tmp/admin/lapor_staff.php');
			break;

		case "bahagian":
			include('../tmp/admin/lapor_bahagian.php');
			break;

		case "kumpulan":
			include('../tmp/admin/lapor_kumpulan.php');
			break;

		case "jumlah":
			include('../tmp/admin/lapor_jumlah.php');
			break;

		case "pasif":
			include('../tmp/admin/lapor_tamat.php');
			break;

		case "kursus":
			include('../tmp/admin/lapor_kursus.php');
			break;

		case "staff":
			include('../tmp/admin/lapor_staff.php');
			break;

		case "epsa":
			include('../tmp/admin/lapor_epsa.php');
			break;

		default:
			echo '<meta http-equiv="Refresh" content="0;url=index.php">';
			break;
	}
}
else {
	echo '<meta http-equiv="Refresh" content="0;url=index.php">';
}
?>