<?php
if (!empty($_POST['id']) && strlen($_POST['id']) == 32) {
	if ($_POST['Submit'] == "   Ya   ") {
		$s = "UPDATE user SET
			ulevel = 3
			WHERE uids = '" . input2($_POST['id']) . "'
		";
		mysql_query($s);
		?>
		<meta http-equiv="Refresh" content="2;url=index.php?modul=pentadbir&menu=senarai">
		<table width="995" cellspacing="0" cellpadding="2" border="0"><tr><td align="center" valign="top" bgcolor="#E2E2E2">
		<p>&nbsp;</p>
		<div align="center">
		<table width="600" cellpadding="10" border="0" bgcolor="#FFFFFF" style="border-collapse: collapse">
		<tr><td align="center" valign="middle"><p>&nbsp;</p>
			<font color="red" style="font-size: 13pt"><b>
			Maklumat Pentadbir Sistem Berjaya Dihapuskan.
		</b></font><p>&nbsp;</p></td></tr></table>
		</div>
		<p>&nbsp;</p>
		</td></tr></table>
	<?php
	}
	else {
		echo '<meta http-equiv="Refresh" content="0;url=index.php?modul=pentadbir&menu=senarai">';
	}
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