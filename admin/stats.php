<?php
if (!empty($_GET['menu'])) {
	switch($_GET['menu']) {
		/*case "tempoh":
			include('../tmp/admin/stat_tempoh.php');
			break;*/

		case "hari":
			include('../tmp/admin/stat_hari.php');
			break;

		case "semua":
			include('../tmp/admin/stat_semua.php');
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