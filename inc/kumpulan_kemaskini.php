<?php
if (!empty($_POST['id']) && strlen($_POST['id']) == 32) {
	if ($_POST['Submit'] == "Kemaskini" && !empty($_POST['kumpulan'])) {
		$s = "UPDATE kumpulan SET
			kumpulan = '" . input1($_POST['kumpulan']) . "'
			WHERE pids = '" . input2($_POST['id']) . "'
		";
		mysql_query($s);
		?>
		<meta http-equiv="Refresh" content="2;url=index.php?modul=kumpulan&menu=senarai">
		<table width="995" cellspacing="0" cellpadding="2" border="0"><tr><td align="center" valign="top" bgcolor="#E2E2E2">
		<p>&nbsp;</p>
		<table width="450" cellspacing="0" cellpadding="10" border="1" align="center" bgcolor="#FFFFFF">
		<tr><td align="center" valign="middle"><p>&nbsp;</p><font color="red"><b>
			Maklumat Kumpulan Berjaya Dikemaskini.
		</b></font><p>&nbsp;</p></td></tr></table>
		<p>&nbsp;</p>
		</td></tr></table>
	<?php
	}
	elseif ($_POST['Submit'] == "   Ya   ") {
		$s = "UPDATE kumpulan SET
			pdelete = 2
			WHERE pids = '" . input2($_POST['id']) . "'
		";
		mysql_query($s);
		?>
		<meta http-equiv="Refresh" content="2;url=index.php?modul=kumpulan&menu=senarai">
		<table width="995" cellspacing="0" cellpadding="2" border="0"><tr><td align="center" valign="top" bgcolor="#E2E2E2">
		<p>&nbsp;</p>
		<table width="450" cellspacing="0" cellpadding="10" border="1" align="center" bgcolor="#FFFFFF">
		<tr><td align="center" valign="middle"><p>&nbsp;</p><font color="red"><b>
			Maklumat Kumpulan Berjaya Dihapuskan.
		</b></font><p>&nbsp;</p></td></tr></table>
		<p>&nbsp;</p>
		</td></tr></table>
	<?php
	}
	else {
		echo '<meta http-equiv="Refresh" content="0;url=index.php?modul=kumpulan&menu=senarai">';
	}
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