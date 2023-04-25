<?php
if (!empty($_POST['gred'])) {
	$s = "SELECT * FROM gred WHERE gred = '" . input1($_POST['gred']) . "' ORDER BY gred ASC";
	$d = mysql_query($s);
	if (mysql_num_rows($d) < 1) {
		$s = "INSERT INTO gred SET
			gids = '" . md5(time().input2($_POST['gred'])."p4Kc@") . "',
			gred = '" . input1($_POST['gred']) . "'
		";
		mysql_query($s);
	}
	?>
	<meta http-equiv="Refresh" content="2;url=index.php?modul=gred&menu=senarai">
	<table width="995" cellspacing="0" cellpadding="2" border="0"><tr><td align="center" valign="top" bgcolor="#E2E2E2">
	<p>&nbsp;</p>
	<table width="450" cellspacing="0" cellpadding="10" border="1" align="center" bgcolor="#FFFFFF">
	<tr><td align="center" valign="middle"><p>&nbsp;</p><font color="red"><b>
		Maklumat Gred Jawatan Berjaya Ditambah.
	</b></font><p>&nbsp;</p></td></tr></table>
	<p>&nbsp;</p>
	</td></tr></table>
<?php
}
else {
	?>
	<meta http-equiv="Refresh" content="2;url=index.php?modul=gred&menu=senarai">
	<table width="995" cellspacing="0" cellpadding="2" border="0"><tr><td align="center" valign="top" bgcolor="#E2E2E2">
    <p>&nbsp;</p>
    <table width="450" cellspacing="0" cellpadding="10" border="1" align="center" bgcolor="#FFFFFF">
    <tr><td align="center" valign="middle"><p>&nbsp;</p><font color="red"><b>
        Sila Lengkapkan Maklumat Gred Jawatan.
    </b></font><p>&nbsp;</p></td></tr></table>
    <p>&nbsp;</p>
    </td></tr></table>
<?php
}
?>