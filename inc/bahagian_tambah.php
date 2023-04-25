<?php
if (!empty($_POST['bahagian'])) {
	$s = "SELECT * FROM bahagian WHERE bahagian = '" . input1($_POST['bahagian']) . "' ORDER BY bahagian ASC";
	$d = mysql_query($s);
	if (mysql_num_rows($d) == 1) {
		$s = "UPDATE bahagian SET
			bdelete = 1
			WHERE bahagian = '" . input1($_POST['bahagian']) . "'
		";
		mysql_query($s);
	}
	else {
		$s = "INSERT INTO bahagian SET
			bids = '" . md5(time().input2($_POST['bahagian'])."p4Kc@") . "',
			bahagian = '" . input1($_POST['bahagian']) . "'
		";
		mysql_query($s);
	}
	?>
	<meta http-equiv="Refresh" content="2;url=index.php?modul=bahagian&menu=senarai">
	<table width="995" cellspacing="0" cellpadding="2" border="0"><tr><td align="center" valign="top" bgcolor="#E2E2E2">
	<p>&nbsp;</p>
	<table width="450" cellspacing="0" cellpadding="10" border="1" align="center" bgcolor="#FFFFFF">
	<tr><td align="center" valign="middle"><p>&nbsp;</p><font color="red"><b>
		Maklumat Unit Berjaya Ditambah.
	</b></font><p>&nbsp;</p></td></tr></table>
	<p>&nbsp;</p>
	</td></tr></table>
<?php
}
else {
	?>
	<meta http-equiv="Refresh" content="2;url=index.php?modul=bahagian&menu=senarai">
	<table width="995" cellspacing="0" cellpadding="2" border="0"><tr><td align="center" valign="top" bgcolor="#E2E2E2">
    <p>&nbsp;</p>
    <table width="450" cellspacing="0" cellpadding="10" border="1" align="center" bgcolor="#FFFFFF">
    <tr><td align="center" valign="middle"><p>&nbsp;</p><font color="red"><b>
        Sila Lengkapkan Maklumat Unit.
    </b></font><p>&nbsp;</p></td></tr></table>
    <p>&nbsp;</p>
    </td></tr></table>
<?php
}
?>