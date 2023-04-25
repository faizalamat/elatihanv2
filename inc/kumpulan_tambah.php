<?php
if (!empty($_POST['kumpulan'])) {
	$s = "SELECT * FROM kumpulan WHERE kumpulan = '" . input1($_POST['kumpulan']) . "' ORDER BY kumpulan ASC";
	$d = mysql_query($s);
	if (mysql_num_rows($d) == 1) {
		$s = "UPDATE kumpulan SET
			pdelete = 1
			WHERE kumpulan = '" . input1($_POST['kumpulan']) . "'
		";
		mysql_query($s);
	}
	else {
		$s = "INSERT INTO kumpulan SET
			pids = '" . md5(time().input2($_POST['kumpulan'])."p4Kc@") . "',
			kumpulan = '" . input1($_POST['kumpulan']) . "'
		";
		mysql_query($s);
	}
	?>
	<meta http-equiv="Refresh" content="2;url=index.php?modul=kumpulan&menu=senarai">
	<table width="995" cellspacing="0" cellpadding="2" border="0"><tr><td align="center" valign="top" bgcolor="#E2E2E2">
	<p>&nbsp;</p>
	<table width="450" cellspacing="0" cellpadding="10" border="1" align="center" bgcolor="#FFFFFF">
	<tr><td align="center" valign="middle"><p>&nbsp;</p><font color="red"><b>
		Maklumat Kumpulan Berjaya Ditambah.
	</b></font><p>&nbsp;</p></td></tr></table>
	<p>&nbsp;</p>
	</td></tr></table>
<?php
}
else {
	?>
	<meta http-equiv="Refresh" content="2;url=index.php?modul=kumpulan&menu=senarai">
	<table width="995" cellspacing="0" cellpadding="2" border="0"><tr><td align="center" valign="top" bgcolor="#E2E2E2">
    <p>&nbsp;</p>
    <table width="450" cellspacing="0" cellpadding="10" border="1" align="center" bgcolor="#FFFFFF">
    <tr><td align="center" valign="middle"><p>&nbsp;</p><font color="red"><b>
        Sila Lengkapkan Maklumat Kumpulan.
    </b></font><p>&nbsp;</p></td></tr></table>
    <p>&nbsp;</p>
    </td></tr></table>
<?php
}
?>