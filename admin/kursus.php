<?php
if (!empty($_GET['menu'])) {
	switch($_GET['menu']) {
		case "senarai":
			include('../tmp/admin/kursus_senarai.php');
			break;

		case "daftar":
			if (!empty($_POST['tajuk']) && !empty($_POST['tmula']) && !empty($_POST['ttamat'])) {
				include('../inc/kursus_daftar.php');
			}
			else {
				include('../tmp/admin/kursus_daftar.php');
			}
			break;

		case "kemaskini":
			if (!empty($_POST['id'])) {
				if ($_POST['Submit'] == "Hapus") {
					include('../tmp/admin/kursus_xkemaskini.php');
				}
				elseif ($_POST['Submit'] == "Tidak") {
					echo '<meta http-equiv="Refresh" content="0;url=index.php?modul=kursus&menu=senarai">';
				}
				else {
					include('../inc/kursus_kemaskini.php');
				}
			}
			elseif (!empty($_GET['id']) && strlen($_GET['id']) == 32) {
				include('../tmp/admin/kursus_kemaskini.php');
			}
			else {
				echo '<meta http-equiv="Refresh" content="0;url=index.php?modul=kursus&menu=senarai">';
			}
			break;

		case "hadir":
			if (!empty($_GET['id']) && strlen($_GET['id']) == 32) {
				include('../tmp/admin/kursus_hadir.php');
			}
			else {
				echo '<meta http-equiv="Refresh" content="0;url=index.php?modul=kursus&menu=senarai">';
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