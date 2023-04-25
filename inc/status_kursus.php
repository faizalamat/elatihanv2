<?php
if (!empty($_POST['id']) && strlen($_POST['id']) == 32) {
	$s = "SELECT l.*, k.*, u.*
		FROM latihan AS l , kursus AS k, user AS u
		WHERE l.kids = k.kids
		AND l.unokp = u.unokp
		AND l.lids = '" . input2($_POST['id']) . "'
		AND l.unokp = '" . input1($tm['unokp']) . "'
		AND l.lstatus = 1
		ORDER BY l.lids ASC
	";
	$d = mysql_query($s);
	if (mysql_num_rows($d) == 1) {
		if ($_POST['Submit'] == "Kemaskini") {
			$sa = "UPDATE latihan SET
				kids = '" . input2($_POST['tajuk']) . "',
				lpada = '" . time() . "'
				WHERE lids = '" . input2($_POST['id']) . "'
			";
			mysql_query($sa);
			
			$s = "SELECT * FROM kursus WHERE kids = '" . input2($_POST['tajuk']) . "' ORDER BY kids ASC";
			$d = mysql_query($s);
			$t = mysql_fetch_array($d);
	
			$sa = "UPDATE program SET
				rtmula = '" . $t['ktmula'] . "',
				rtmula2 = '" . $t['ktmula2'] . "'
				WHERE rids = '" . input2($_POST['id']) . "'
				AND unokp = '" . $tm['unokp'] . "'
			";
			mysql_query($sa);
			?>
			<meta http-equiv="Refresh" content="2;url=index.php?modul=status&menu=kursus" />
			<table width="995" cellspacing="0" cellpadding="2" border="0"><tr><td align="center" valign="top" bgcolor="#E2E2E2">
			<p>&nbsp;</p>
			<table width="450" cellspacing="0" cellpadding="10" border="1" align="center" bgcolor="#FFFFFF">
			<tr><td align="center" valign="middle"><p>&nbsp;</p><font color="red"><b>
				Rekod Kursus Berjaya Dikemaskini.
			</b></font><p>&nbsp;</p></td></tr></table>
			<p>&nbsp;</p>
			</td></tr></table>
		<?php
		}
		elseif ($_POST['Submit'] == "   Ya   ") {
			$sa = "DELETE FROM latihan 
				WHERE lids = '" . input2($_POST['id']) . "'
				AND unokp = '" . $tm['unokp'] . "'
			";
			mysql_query($sa);
			
			$sa = "DELETE FROM program
				WHERE rids = '" . input2($_POST['id']) . "'
				AND unokp = '" . $tm['unokp'] . "'
			";
			mysql_query($sa);
			?>
			<meta http-equiv="Refresh" content="2;url=index.php?modul=status&menu=kursus" />
			<table width="995" cellspacing="0" cellpadding="2" border="0"><tr><td align="center" valign="top" bgcolor="#E2E2E2">
			<p>&nbsp;</p>
			<table width="450" cellspacing="0" cellpadding="10" border="1" align="center" bgcolor="#FFFFFF">
			<tr><td align="center" valign="middle"><p>&nbsp;</p><font color="red"><b>
				Rekod Kursus Berjaya Dihapuskan.
			</b></font><p>&nbsp;</p></td></tr></table>
			<p>&nbsp;</p>
			</td></tr></table>
		<?php
		}
		else {
			?>
			<meta http-equiv="Refresh" content="0;url=index.php?modul=status&menu=kursus">
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
	}
	else {
		?>
		<meta http-equiv="Refresh" content="0;url=index.php?modul=status&menu=kursus">
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
}
else {
	?>
	<meta http-equiv="Refresh" content="0;url=index.php?modul=status&menu=kursus">
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