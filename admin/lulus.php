<?php
if (!empty($_GET['menu'])) {
	switch($_GET['menu']) {
		case "kursus":
			if (!empty($_POST['id']) && strlen($_POST['id']) == 32) {
				if ($_POST['Submit'] == "Hapus") {
					include('../tmp/admin/lulus_xkursus.php');
				}
				elseif ($_POST['Submit'] == "Tidak") {
					echo '<meta http-equiv="Refresh" content="0;url=index.php?modul=kelulusan&menu=kursus">';
				}
				else {
					include('../inc/lulus_kursus.php');
				}
			}
			elseif (!empty($_GET['id']) && strlen($_GET['id']) == 32) {
				include('../tmp/admin/lulus_kursus.php');
			}
			else {
				include('../tmp/admin/senarai_kursus.php');
			}
			break;

		case "sesi":
			if (!empty($_POST['id']) && strlen($_POST['id']) == 32) {
				if ($_POST['Submit'] == "Hapus") {
					include('../tmp/admin/lulus_xsesi.php');
				}
				elseif ($_POST['Submit'] == "Tidak") {
					echo '<meta http-equiv="Refresh" content="0;url=index.php?modul=kelulusan&menu=sesi">';
				}
				else {
					include('../inc/lulus_sesi.php');
				}
			}
			elseif (!empty($_GET['id']) && strlen($_GET['id']) == 32) {
				include('../tmp/admin/lulus_sesi.php');
			}
			else {
				include('../tmp/admin/senarai_sesi.php');
			}
			break;

		case "kendiri":
			if (!empty($_POST['id']) && strlen($_POST['id']) == 32) {
				if ($_POST['Submit'] == "Hapus") {
					include('../tmp/admin/lulus_xkendiri.php');
				}
				elseif ($_POST['Submit'] == "Tidak") {
					echo '<meta http-equiv="Refresh" content="0;url=index.php?modul=kelulusan&menu=kendiri">';
				}
				else {
					include('../inc/lulus_kendiri.php');
				}
			}
			elseif (!empty($_GET['id']) && strlen($_GET['id']) == 32) {
				include('../tmp/admin/lulus_kendiri.php');
			}
			else {
				include('../tmp/admin/senarai_kendiri.php');
			}
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