<?php
if (!empty($_GET['menu'])) {
	switch($_GET['menu']) {
		case "senarai":
			include('../tmp/admin/staff_senarai.php');
			break;

		case "kemaskini":
			if ($tm['ulevel'] == 1) {
				if (!empty($_POST['id']) && strlen($_POST['id']) == 32) {
					if ($_POST['Submit'] == "Hapus") {
						include('../tmp/admin/staff_xkemaskini.php');
					}
					elseif ($_POST['Submit'] == "Tidak") {
						echo '<meta http-equiv="Refresh" content="0;url=index.php?modul=staff&menu=senarai">';
					}
					else {
						include('../inc/staff_kemaskini.php');
					}
				}
				elseif (!empty($_GET['id']) && strlen($_GET['id']) == 32) {
					include('../tmp/admin/staff_kemaskini.php');
				}
				else {
					echo '<meta http-equiv="Refresh" content="0;url=index.php?modul=staff&menu=senarai">';
				}
			}
			else {
				echo '<meta http-equiv="Refresh" content="0;url=index.php?modul=staff&menu=senarai">';
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