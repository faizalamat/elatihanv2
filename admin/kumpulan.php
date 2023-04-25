<?php
if (!empty($_GET['menu'])) {
	switch($_GET['menu']) {
		case "senarai":
			include('../tmp/admin/kumpulan_senarai.php');
			break;

		case "tambah":
			if (!empty($_POST['kumpulan'])) {
				include('../inc/kumpulan_tambah.php');
			}
			else {
				echo '<meta http-equiv="Refresh" content="0;url=index.php?modul=kumpulan&menu=senarai">';
			}
			break;

		case "kemaskini":
			if (!empty($_POST['id'])) {
				if ($_POST['Submit'] == "Hapus") {
					include('../tmp/admin/kumpulan_xkemaskini.php');
				}
				elseif ($_POST['Submit'] == "Tidak") {
					echo '<meta http-equiv="Refresh" content="0;url=index.php?modul=kumpulan&menu=senarai">';
				}
				else {
					include('../inc/kumpulan_kemaskini.php');
				}
			}
			elseif (!empty($_GET['id']) && strlen($_GET['id']) == 32) {
				include('../tmp/admin/kumpulan_kemaskini.php');
			}
			else {
				echo '<meta http-equiv="Refresh" content="0;url=index.php?modul=kumpulan&menu=senarai">';
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