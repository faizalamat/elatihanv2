<?php
if (!empty($_GET['menu'])) {
	switch($_GET['menu']) {
		case "kursus":
			if (!empty($_POST['id']) && strlen($_POST['id']) == 32) {
				if ($_POST['akuan'] == "Hantar") {
					include('inc/rekod_kursus.php');
				}
				else {
					include('tmp/rekod_kursus.php');
				}
			}
			elseif (!empty($_POST['tajuk'])) {
				include('tmp/rekod_skursus.php');
			}
			else {
				include('tmp/rekod_kursus.php');
			}
			break;

		case "sesi":
			if (!empty($_POST['akuan'])) {
				include('inc/rekod_sesi.php');
			}
			elseif (isset($_POST['Submit']) == "Kembali") {
				include('tmp/rekod_sesi.php');
			}
			elseif (!empty($_POST['tajuk'])) {
				include('tmp/rekod_ssesi.php');
			}
			else {
				include('tmp/rekod_sesi.php');
			}
			break;

		case "kendiri":
			if (!empty($_POST['akuan'])) {
				include('inc/rekod_kendiri.php');
			}
			elseif (isset($_POST['Submit']) == "Kembali") {
				include('tmp/rekod_kendiri.php');
			}
			elseif (!empty($_POST['jenis'])) {
				include('tmp/rekod_skendiri.php');
			}
			else {
				include('tmp/rekod_kendiri.php');
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