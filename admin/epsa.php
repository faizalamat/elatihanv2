<?php
if (!empty($_GET['menu'])) {
	switch($_GET['menu']) {
		case "senarai":
			include('../tmp/admin/epsa_senarai.php');
			break;

		case "tambahk":
			if (!empty($_POST['kategori'])) {
				include('../inc/epsa_tambahk.php');
			}
			else {
				echo '<meta http-equiv="Refresh" content="0;url=index.php?modul=epsa&menu=senarai">';
			}
			break;

		case "tambah":
			if (!empty($_POST['epsa']) && !empty($_POST['kod']) && !empty($_POST['jam'])) {
				include('../inc/epsa_tambah.php');
			}
			else {
				echo '<meta http-equiv="Refresh" content="0;url=index.php?modul=epsa&menu=senarai">';
			}
			break;

		case "kemaskinik":
			if (!empty($_POST['id'])) {
				if ($_POST['Submit'] == "Hapus") {
					include('../tmp/admin/epsa_xkemaskinik.php');
				}
				elseif ($_POST['Submit'] == "Tidak") {
					echo '<meta http-equiv="Refresh" content="0;url=index.php?modul=epsa&menu=senarai">';
				}
				else {
					include('../inc/epsa_kemaskinik.php');
				}
			}
			elseif (!empty($_GET['id']) && strlen($_GET['id']) == 32) {
				include('../tmp/admin/epsa_kemaskinik.php');
			}
			else {
				echo '<meta http-equiv="Refresh" content="0;url=index.php?modul=epsa&menu=senarai">';
			}
			break;

		case "kemaskini":
			if (!empty($_POST['id'])) {
				if ($_POST['Submit'] == "Hapus") {
					include('../tmp/admin/epsa_xkemaskini.php');
				}
				elseif ($_POST['Submit'] == "Tidak") {
					echo '<meta http-equiv="Refresh" content="0;url=index.php?modul=epsa&menu=senarai">';
				}
				else {
					include('../inc/epsa_kemaskini.php');
				}
			}
			elseif (!empty($_GET['id']) && strlen($_GET['id']) == 32) {
				include('../tmp/admin/epsa_kemaskini.php');
			}
			else {
				echo '<meta http-equiv="Refresh" content="0;url=index.php?modul=epsa&menu=senarai">';
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