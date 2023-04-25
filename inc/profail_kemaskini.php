<?php

require_once('conn.php');
global $con;
if (!empty($_POST['akuan']) && !empty($_POST['nama']) && !empty($_POST['email'])) {
		// $email = explode("@",input1($_POST['email']));
		// $email = $email[0] . input1($_POST['domain']);

	// uemail = '" . $email . "',

	$s = "UPDATE user SET
		uemail = '" . input1($_POST['email']) . "',
		unoid = '" . input1($_POST['nokad']) . "',
		unama = '" . input1($_POST['nama']) . "',
		utpenempatan = '" . input1(isset($_POST['tmula'])) . "',
		pids = '" . input2($_POST['kumpulan']) . "',
		ugred = '" . input1($_POST['gred']) . "',
		bids = '" . input2($_POST['bahagian']) . "',
		utelefon = '" . input1($_POST['notel']) . "',
		ubimbit = '" . input1($_POST['nohp']) . "',
		uselia = '" . input1($_POST['nselia']) . "',
		ujselia = '" . input1($_POST['jselia']) . "',
		ueselia = '" . input1($_POST['eselia']) . "'
		WHERE uids = '" . input2(isset($tm['uids'])) . "'
	";
	mysqli_query($con,$s);
	?>
	<meta http-equiv="Refresh" content="2;url=index.php?modul=profail&menu=kemaskini">
	<table width="995" cellspacing="0" cellpadding="2" border="0"><tr><td align="center" valign="top" bgcolor="#E2E2E2">
	<p>&nbsp;</p>
	<div align="center">
	<table width="450" cellpadding="10" border="0" bgcolor="#FFFFFF" style="border-collapse: collapse">
	<tr><td align="center" valign="middle"><p>&nbsp;</p>
		<font color="#008000" style="font-size: 13pt"><b>
		Maklumat Pegawai Berjaya Dikemaskini.
	</b></font><p>&nbsp;</p></td></tr></table>
	</div>
	<p>&nbsp;</p>
	</td></tr></table>
<?php
}
else {
	?>
	<meta http-equiv="Refresh" content="2;url=index.php?modul=profail&menu=kemaskini">
	<table width="995" cellspacing="0" cellpadding="2" border="0"><tr><td align="center" valign="top" bgcolor="#E2E2E2">
    <p>&nbsp;</p>
    <div align="center">
    <table width="450" cellpadding="10" border="0" bgcolor="#FFFFFF" style="border-collapse: collapse">
    <tr><td align="center" valign="middle"><p>&nbsp;</p>
		<font color="red" style="font-size: 13pt"><b>
        Sila Lengkapkan Maklumat Pegawai.
    </b></font><p>&nbsp;</p></td></tr></table>
    </div>
    <p>&nbsp;</p>
    </td></tr></table>
<?php
}
?>