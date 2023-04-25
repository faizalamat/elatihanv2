<?php
if (!empty($_GET['menu'])) {
	switch($_GET['menu']) {
		case "login":
			include('inc/login.php');
			break;

		case "daftar":
			if (!empty($_POST['akuan'])) {
				include('inc/profail_daftar.php');
			}
			else {
				include('tmp/profail_daftar.php');
			}
			break;

		case "pengesahan":
			if (!empty($_GET['id'])) {
				include('inc/profail_sah.php');
			}
			else {
				echo '<meta http-equiv="Refresh" content="0;url=index.php">';
			}
			break;

		case "reset":
			if (!empty(isset($_POST['nokp1'])) && !empty($_POST['nokp2']) && !empty($_POST['nokp3']) && !empty($_POST['jawapan'])) {
				include('inc/profail_reset.php');
			}
			else {
				include('tmp/profail_reset.php');
			}
			break;

		case "kemaskini":
			if (!empty($_POST['akuan'])) {
				include('inc/profail_kemaskini.php');
			}
			else {
				include('tmp/profail_kemaskini.php');
			}
			break;

		case "katalaluan":
			if (!empty($_POST['pass1']) && !empty($_POST['pass2']) && !empty($_POST['pass3'])) {
				include('inc/profail_pass.php');
			}
			else {
				include('tmp/profail_pass.php');
			}
			break;

		case "logout":
			include('inc/logout.php');
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