<?php
if (!empty($_POST['id']) && strlen($_POST['id']) == 32) {
	if ($_POST['Submit'] == "Kemaskini" && !empty($_POST['epsa']) && !empty($_POST['kod']) && !empty($_POST['jam'])) {
		$s = "UPDATE epsa SET
			tids = '" . input2($_POST['kategori']) . "',
			ekod = '" . input1($_POST['kod']) . "',
			epsa = '" . input1($_POST['epsa']) . "',
			ejam = '" . input1($_POST['jam']) . "'
			WHERE eids = '" . input2($_POST['id']) . "'
		";
		mysql_query($s);
		?>
		<meta http-equiv="Refresh" content="2;url=index.php?modul=epsa&menu=senarai">
		<table width="995" cellspacing="0" cellpadding="2" border="0"><tr><td align="center" valign="top" bgcolor="#E2E2E2">
		<p>&nbsp;</p>
		<table width="450" cellspacing="0" cellpadding="10" border="1" align="center" bgcolor="#FFFFFF">
		<tr><td align="center" valign="middle"><p>&nbsp;</p><font color="red"><b>
			Maklumat EPSA Berjaya Dikemaskini.
		</b></font><p>&nbsp;</p></td></tr></table>
		<p>&nbsp;</p>
		</td></tr></table>
	<?php
	}
	elseif ($_POST['Submit'] == "   Ya   ") {
		$s = "DELETE FROM epsa 
			WHERE eids = '" . input2($_POST['id']) . "'
		";
		mysql_query($s);
		?>
		<meta http-equiv="Refresh" content="2;url=index.php?modul=epsa&menu=senarai">
		<table width="995" cellspacing="0" cellpadding="2" border="0"><tr><td align="center" valign="top" bgcolor="#E2E2E2">
		<p>&nbsp;</p>
		<table width="450" cellspacing="0" cellpadding="10" border="1" align="center" bgcolor="#FFFFFF">
		<tr><td align="center" valign="middle"><p>&nbsp;</p><font color="red"><b>
			Maklumat EPSA Berjaya Dihapuskan.
		</b></font><p>&nbsp;</p></td></tr></table>
		<p>&nbsp;</p>
		</td></tr></table>
	<?php
	}
	else {
		echo '<meta http-equiv="Refresh" content="0;url=index.php?modul=epsa&menu=senarai">';
	}
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