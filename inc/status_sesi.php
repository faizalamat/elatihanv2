<?php
if (!empty($_POST['id']) && strlen($_POST['id']) == 32) {
	$s = "SELECT s.*, u.*
		FROM sesi AS s, user AS u
		WHERE s.unokp = u.unokp
		AND s.sids = '" . input2($_POST['id']) . "'
		AND s.unokp = '" . input1($tm['unokp']) . "'
		AND s.sstatus = 1
		ORDER BY s.sids ASC
	";
	$d = mysql_query($s);
	if (mysql_num_rows($d) == 1) {
		if ($_POST['Submit'] == "Kemaskini") {
			if ($_POST['jenis'] == 2 || $_POST['jenis'] == 5) { $jumlah = 1; }
			elseif ($_POST['jenis'] == 3) { $jumlah = 0.5; }
			else { $jumlah = output1($_POST['wtamat']) - output1($_POST['wmula']); }
			if ($_POST['jenis'] == 7) { $lain = $_POST['lain']; }
			else { $lain = ""; }
			$sa = "UPDATE sesi SET
				spada = '" . time() . "',
				sjenis = '" . input1($_POST['jenis']) . "',
				slain = '" . input1($lain) . "',
				stajuk = '" . input2($_POST['tajuk']) . "',
				sanjuran = '" . input2($_POST['anjuran']) . "',
				starikh = '" . input1($_POST['tmula']) . "',
				starikh2 = '" . tarikh(input1($_POST['tmula'])) . "',
				stempat = '" . input1($_POST['tempat']) . "',
				swmula = '" . input1($_POST['wmula']) . "',
				swtamat = '" . input1($_POST['wtamat']) . "',
				sjumlah = '" . input1($jumlah) . "'
				WHERE sids = '" . input2($_POST['id']) . "'
			";
			mysql_query($sa);
			
			$sa = "UPDATE program SET
				rtmula = '" . input1($_POST['tmula']) . "',
				rtmula2 = '" . tarikh(input1($_POST['tmula'])) . "'
				WHERE rids = '" . input2($_POST['id']) . "'
				AND unokp = '" . $tm['unokp'] . "'
			";
			mysql_query($sa);
			?>
			<meta http-equiv="Refresh" content="2;url=index.php?modul=status&menu=sesi" />
			<table width="995" cellspacing="0" cellpadding="2" border="0"><tr><td align="center" valign="top" bgcolor="#E2E2E2">
			<p>&nbsp;</p>
			<table width="450" cellspacing="0" cellpadding="10" border="1" align="center" bgcolor="#FFFFFF">
			<tr><td align="center" valign="middle"><p>&nbsp;</p><font color="red"><b>
				Rekod Sesi Pembelajaran Berjaya Dikemaskini.
			</b></font><p>&nbsp;</p></td></tr></table>
			<p>&nbsp;</p>
			</td></tr></table>
		<?php
		}
		elseif ($_POST['Submit'] == "   Ya   ") {
			$sa = "DELETE FROM sesi 
				WHERE sids = '" . input2($_POST['id']) . "'
				AND unokp = '" . $tm['unokp'] . "'
			";
			mysql_query($sa);
			
			$sa = "DELETE FROM program
				WHERE rids = '" . input2($_POST['id']) . "'
				AND unokp = '" . $tm['unokp'] . "'
			";
			mysql_query($sa);
			?>
			<meta http-equiv="Refresh" content="2;url=index.php?modul=status&menu=sesi" />
			<table width="995" cellspacing="0" cellpadding="2" border="0"><tr><td align="center" valign="top" bgcolor="#E2E2E2">
			<p>&nbsp;</p>
			<table width="450" cellspacing="0" cellpadding="10" border="1" align="center" bgcolor="#FFFFFF">
			<tr><td align="center" valign="middle"><p>&nbsp;</p><font color="red"><b>
				Rekod Sesi Pembelajaran Berjaya Dihapuskan.
			</b></font><p>&nbsp;</p></td></tr></table>
			<p>&nbsp;</p>
			</td></tr></table>
		<?php
		}
		else {
			?>
			<meta http-equiv="Refresh" content="0;url=index.php?modul=status&menu=sesi">
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
		<meta http-equiv="Refresh" content="0;url=index.php?modul=status&menu=sesi">
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
	<meta http-equiv="Refresh" content="0;url=index.php?modul=status&menu=sesi">
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