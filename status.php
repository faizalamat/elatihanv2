<?php
if (!empty($_GET['menu'])) {
	switch($_GET['menu']) {
		case "kursus":
			if (!empty($_POST['id']) && strlen($_POST['id']) == 32) {
				if ($_POST['Submit'] == "Hapus") {
					include('tmp/status_xkursus.php');
				}
				elseif ($_POST['Submit'] == "Tidak") {
					echo '<meta http-equiv="Refresh" content="0;url=index.php?modul=status&menu=kursus">';
				}
				else {
					include('inc/status_kursus.php');
				}
			}
			elseif (!empty($_GET['id']) && strlen($_GET['id']) == 32) {
				include('tmp/status_kursus.php');
			}
			else {
				include('tmp/senarai_kursus.php');
			}
			break;

		case "sesi":
			if (!empty($_POST['id']) && strlen($_POST['id']) == 32) {
				if ($_POST['Submit'] == "Hapus") {
					include('tmp/status_xsesi.php');
				}
				elseif ($_POST['Submit'] == "Tidak") {
					echo '<meta http-equiv="Refresh" content="0;url=index.php?modul=status&menu=sesi">';
				}
				else {
					include('inc/status_sesi.php');
				}
			}
			elseif (!empty($_GET['id']) && strlen($_GET['id']) == 32) {
				include('tmp/status_sesi.php');
			}
			else {
				include('tmp/senarai_sesi.php');
			}
			break;

		case "kendiri":
			if (!empty($_POST['id']) && strlen($_POST['id']) == 32) {
				if ($_POST['Submit'] == "Hapus") {
					include('tmp/status_xkendiri.php');
				}
				elseif ($_POST['Submit'] == "Tidak") {
					echo '<meta http-equiv="Refresh" content="0;url=index.php?modul=status&menu=kendiri">';
				}
				else {
					include('inc/status_kendiri.php');
				}
			}
			elseif (!empty($_GET['id']) && strlen($_GET['id']) == 32) {
				include('tmp/status_kendiri.php');
			}
			else {
				include('tmp/senarai_kendiri.php');
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