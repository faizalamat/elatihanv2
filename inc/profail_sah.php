<?php
if (!empty($_GET['id']) && strlen($_GET['id']) == 32) {
	$s = "SELECT * FROM user 
		WHERE uids = '" . input2($_GET['id']) . "' 
		ORDER BY uids ASC
	";
	$d = mysql_query($s);
	if (mysql_num_rows($d) == 1) {
		$s = "UPDATE user SET
			usah = 1,
			utsah = '" . time() . "'
			WHERE uids = '" . input2($_GET['id']) . "'
		";
		mysql_query($s);
		?>
		<table width="995" cellspacing="0" cellpadding="2" border="0"><tr><td align="center" valign="top" bgcolor="#E2E2E2">
		<p>&nbsp;</p>
		<div align="center">
		<table width="500" cellpadding="10" border="0" bgcolor="#FFFFFF" style="border-collapse: collapse">
		<tr><td align="center" valign="middle"><p>&nbsp;</p>
			<font color="#008000" style="font-size: 13pt"><b>
			Pendaftaran Berjaya!!!<br>
&nbsp;</b></font><p><font color="#008000" style="font-size: 13pt"><b>
			Akaun Anda Telah Disahkan. <br>
			Anda Boleh Login ke Sistem Sekarang.
		</b></font></p>
			<p>&nbsp;</p></td></tr></table>
		</div>
		<p>&nbsp;</p>
		</td></tr></table>
	<?php
	}
	else {
		?>
        <meta http-equiv="Refresh" content="0;url=index.php">
		<table width="995" cellspacing="0" cellpadding="2" border="0"><tr><td align="center" valign="top" bgcolor="#E2E2E2">
		<p>&nbsp;</p>
		<div align="center">
		<table width="600" cellpadding="10" border="0" bgcolor="#FFFFFF" style="border-collapse: collapse">
		<tr><td align="center" valign="middle"><p>&nbsp;</p><font color="red"><b>
			&nbsp;<font size="3">Maaf</font><font size="3">! Permohonan Anda 
			GAGAL.<br>
			No. KP Anda Telah Ada Di Dalam Sistem Sebelum Ini.<br>
			<br>
			Sila hubungi Pentadbir Sistem untuk bantuan. </font>
		</b></font><p>&nbsp;</p></td></tr></table>
		</div>
		<p>&nbsp;</p>
		</td></tr></table>
	<?php
	}
}
else {
	?>
	<meta http-equiv="Refresh" content="0;url=index.php">
	<table width="995" cellspacing="0" cellpadding="2" border="0"><tr><td align="center" valign="top" bgcolor="#E2E2E2">
    <p>&nbsp;</p>
    <table width="450" cellspacing="0" cellpadding="10" border="1" align="center" bgcolor="#FFFFFF">
    <tr><td align="center" valign="middle"><p>&nbsp;</p><font color="red"><b>
        &nbsp;
    </b></font><p>&nbsp;</p></td></tr></table>
    <p>&nbsp;</p>
    </td></tr></table>
<?php
}
?>