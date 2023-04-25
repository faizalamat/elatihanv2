<?php
if (!empty($_POST['epsa']) && !empty($_POST['jam'])) {
	$s = "SELECT * FROM epsa WHERE epsa = '" . input1($_POST['epsa']) . "' ORDER BY epsa ASC";
	$d = mysql_query($s);
	if (mysql_num_rows($d) == 1) {
		$s = "UPDATE epsa SET
			edelete = 1,
			tids = '" . input2($_POST['kategori']) . "',
			ekod = '" . input1($_POST['kod']) . "',
			ejam = '" . input1($_POST['jam']) . "'
			WHERE epsa = '" . input1($_POST['epsa']) . "'
		";
		mysql_query($s);
	}
	else {
		$s = "INSERT INTO epsa SET
			eids = '" . md5(time().input2($_POST['epsa'])."p4Kc@") . "',
			tids = '" . input2($_POST['kategori']) . "',
			ekod = '" . input1($_POST['kod']) . "',
			epsa = '" . input1($_POST['epsa']) . "',
			ejam = '" . input1($_POST['jam']) . "'
		";
		mysql_query($s);
	}
	?>
	<meta http-equiv="Refresh" content="2;url=index.php?modul=epsa&menu=senarai">
	<table width="995" cellspacing="0" cellpadding="2" border="0"><tr><td align="center" valign="top" bgcolor="#E2E2E2">
	<p>&nbsp;</p>
	<table width="450" cellspacing="0" cellpadding="10" border="1" align="center" bgcolor="#FFFFFF">
	<tr><td align="center" valign="middle"><p>&nbsp;</p><font color="red"><b>
		Maklumat EPSA Berjaya Ditambah.
	</b></font><p>&nbsp;</p></td></tr></table>
	<p>&nbsp;</p>
	</td></tr></table>
<?php
}
else {
	?>
	<meta http-equiv="Refresh" content="2;url=index.php?modul=epsa&menu=senarai">
	<table width="995" cellspacing="0" cellpadding="2" border="0"><tr><td align="center" valign="top" bgcolor="#E2E2E2">
    <p>&nbsp;</p>
    <table width="450" cellspacing="0" cellpadding="10" border="1" align="center" bgcolor="#FFFFFF">
    <tr><td align="center" valign="middle"><p>&nbsp;</p><font color="red"><b>
        Sila Lengkapkan Maklumat EPSA.
    </b></font><p>&nbsp;</p></td></tr></table>
    <p>&nbsp;</p>
    </td></tr></table>
<?php
}
?>