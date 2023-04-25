<?php
if (!empty($_POST['kategori'])) {
	$s = "SELECT * FROM kategori WHERE kategori = '" . input1($_POST['kategori']) . "' ORDER BY kategori ASC";
	$d = mysql_query($s);
	if (mysql_num_rows($d) >= 1) {
		$s = "UPDATE kategori SET
			kategori = '" . input1($_POST['kategori']) . "'
			WHERE kategori = '" . input1($_POST['kategori']) . "'
		";
		mysql_query($s);
	}
	else {
		$s = "INSERT INTO kategori SET
			tids = '" . md5(time().input1($_POST['kategori'])."p4Kc@") . "',
			kategori = '" . input1($_POST['kategori']) . "'
		";
		mysql_query($s);
	}
	?>
	<meta http-equiv="Refresh" content="2;url=index.php?modul=epsa&menu=senarai">
	<table width="995" cellspacing="0" cellpadding="2" border="0"><tr><td align="center" valign="top" bgcolor="#E2E2E2">
	<p>&nbsp;</p>
	<table width="450" cellspacing="0" cellpadding="10" border="1" align="center" bgcolor="#FFFFFF">
	<tr><td align="center" valign="middle"><p>&nbsp;</p><font color="red"><b>
		Maklumat Kategori EPSA Berjaya Ditambah.
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
        Sila Lengkapkan Maklumat Kategori EPSA.
    </b></font><p>&nbsp;</p></td></tr></table>
    <p>&nbsp;</p>
    </td></tr></table>
<?php
}
?>