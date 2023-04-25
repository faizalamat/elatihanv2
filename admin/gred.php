<?php
if (!empty($_GET['menu'])) {
	switch($_GET['menu']) {
		case "senarai":
			include('../tmp/admin/gred_senarai.php');
			break;

		case "tambah":
			if (!empty($_POST['gred'])) {
				include('../inc/gred_tambah.php');
			}
			else {
				echo '<meta http-equiv="Refresh" content="0;url=index.php?modul=gred&menu=senarai">';
			}
			break;

		case "kemaskini":
			if (!empty($_POST['id'])) {
				if ($_POST['Submit'] == "Hapus") {
					include('../tmp/admin/gred_xkemaskini.php');
				}
				elseif ($_POST['Submit'] == "Tidak") {
					echo '<meta http-equiv="Refresh" content="0;url=index.php?modul=gred&menu=senarai">';
				}
				else {
					include('../inc/gred_kemaskini.php');
				}
			}
			elseif (!empty($_GET['id']) && strlen($_GET['id']) == 32) {
				include('../tmp/admin/gred_kemaskini.php');
			}
			else {
				echo '<meta http-equiv="Refresh" content="0;url=index.php?modul=gred&menu=senarai">';
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