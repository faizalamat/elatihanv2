<?php
require_once('conn.php');

if (!empty($_POST['pentadbir'])) {
	$s = "UPDATE user SET
		ulevel = 2
		WHERE unokp = '" . input1($_POST['pentadbir']) . "'
	";
	mysql_query($s);
	?>
	<meta http-equiv="Refresh" content="2;url=index.php?modul=pentadbir&menu=senarai">
	<table width="995" cellspacing="0" cellpadding="2" border="0"><tr><td align="center" valign="top" bgcolor="#E2E2E2">
	<p>&nbsp;</p>
	<div align="center">
	<table width="600" cellpadding="10" border="0" bgcolor="#FFFFFF" style="border-collapse: collapse">
	<tr><td align="center" valign="middle"><p>&nbsp;</p>
		<font color="#008000" style="font-size: 13pt"><b>
		Maklumat Pentadbir Sistem Berjaya Ditambah.
	</b></font><p>&nbsp;</p></td></tr></table>
	</div>
	<p>&nbsp;</p>
	</td></tr></table>
<?php
}
else {
	?>
	<meta http-equiv="Refresh" content="2;url=index.php?modul=pentadbir&menu=senarai">
	<table width="995" cellspacing="0" cellpadding="2" border="0"><tr><td align="center" valign="top" bgcolor="#E2E2E2">
    <p>&nbsp;</p>
    <div align="center">
    <table width="600" cellpadding="10" border="0" bgcolor="#FFFFFF" style="border-collapse: collapse">
    <tr><td align="center" valign="middle"><p>&nbsp;</p>
		<font color="red" style="font-size: 13pt"><b>
        Sila Lengkapkan Maklumat Pentadbir.
    </b></font><p>&nbsp;</p></td></tr></table>
    </div>
    <p>&nbsp;</p>
    </td></tr></table>
<?php
}
?>