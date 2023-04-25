<?php

require_once('conn.php');

if (!empty($_POST['pass1']) && !empty($_POST['pass2']) && !empty($_POST['pass3'])) {
	if ($_POST['pass2'] != $_POST['pass3']) {
		?>
		<meta http-equiv="Refresh" content="2;url=index.php?modul=profail&menu=katalaluan">
		<table width="995" cellspacing="0" cellpadding="2" border="0"><tr><td align="center" valign="top" bgcolor="#E2E2E2">
		<p>&nbsp;</p>
		<div align="center">
		<table width="450" cellpadding="10" border="0" bgcolor="#FFFFFF" style="border-collapse: collapse">
		<tr><td align="center" valign="middle">
			<font color="red" style="font-size: 13pt"><b>
			Katalaluan Baru Anda Tidak Sama.</b></font></td></tr></table>
		</div>
		<p>&nbsp;</p>
		</td></tr></table>
	<?php
	}
	else {
		$s = "SELECT * FROM user
			WHERE upass = '" . md5(input2($_POST['pass1'])."p4Kc@") . "'
			AND uids = '" . input2($tm['uids']) . "'
		";
		$d = mysqli_query($con,$s);
		if (mysqli_num_rows($d) == 1) {
			$s = "UPDATE user SET
				upass = '" . md5(input2($_POST['pass2'])."p4Kc@") . "'
				WHERE uids = '" . input2($tm['uids']) . "'
			";
			mysqli_query($con,$s);
			?>
			<meta http-equiv="Refresh" content="2;url=index.php?modul=profail&menu=katalaluan">
			<table width="995" cellspacing="0" cellpadding="2" border="0"><tr><td align="center" valign="top" bgcolor="#E2E2E2">
			<p>&nbsp;</p>
			<div align="center">
			<table width="450" cellpadding="10" border="0" bgcolor="#FFFFFF" style="border-collapse: collapse">
			<tr><td align="center" valign="middle">
				<font color="#008000" style="font-size: 13pt"><b>
				Katalaluan Anda Berjaya Dikemaskini.
			</b></font></td></tr></table>
			</div>
			<p>&nbsp;</p>
			</td></tr></table>
		<?php
		}
		else {
			?>
			<meta http-equiv="Refresh" content="2;url=index.php?modul=profail&menu=katalaluan">
			<table width="995" cellspacing="0" cellpadding="2" border="0"><tr><td align="center" valign="top" bgcolor="#E2E2E2">
			<p>&nbsp;</p>
			<div align="center">
			<table width="450" cellpadding="10" border="0" bgcolor="#FFFFFF" style="border-collapse: collapse">
			<tr><td align="center" valign="middle">
				<font color="red" style="font-size: 13pt"><b>
				Katalaluan Asal Anda Salah.
			</b></font></td></tr></table>
			</div>
			<p>&nbsp;</p>
			</td></tr></table>
		<?php
		}
	}
}
else {
	?>
	<meta http-equiv="Refresh" content="2;url=index.php?modul=profail&menu=katalaluan">
	<table width="995" cellspacing="0" cellpadding="2" border="0"><tr><td align="center" valign="top" bgcolor="#E2E2E2">
    <p>&nbsp;</p>
    <div align="center">
    <table width="450" cellpadding="10" border="0" bgcolor="#FFFFFF" style="border-collapse: collapse">
    <tr><td align="center" valign="middle">
		<font color="red" style="font-size: 13pt"><b>
        Sila Lengkapkan Maklumat Yang Diperlukan.
    </b></font></td></tr></table>
    </div>
    <p>&nbsp;</p>
    </td></tr></table>
<?php
}
?>