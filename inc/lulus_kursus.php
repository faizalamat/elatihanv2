<?php
if (!empty($_POST['id']) && strlen($_POST['id']) == 32) {
	$s = "SELECT l.*, k.*, u.*
		FROM latihan AS l , kursus AS k, user AS u
		WHERE l.kids = k.kids
		AND l.unokp = u.unokp
		AND l.lids = '" . input2($_POST['id']) . "'
		ORDER BY l.lids ASC
	";
	$d = mysql_query($s);
	if (mysql_num_rows($d) == 1) {
		if ($_POST['Submit'] == "Hantar") {
			$t = mysql_fetch_array($d);
			$sa = "UPDATE latihan SET
				lstatus = '" . input1($_POST['status']) . "',
				lnota = '" . input2($_POST['nota']) . "',
				lpelulus = '" . $tm['unokp'] . "',
				ltlulus = '" . time() . "'
				WHERE lids = '" . input2($_POST['id']) . "'
			";
			mysql_query($sa);
			
			if ($_POST['status'] == 2) { $status = "DISAHKAN"; }
			elseif ($_POST['status'] == 3) { $status = "TIDAK DISAHKAN"; }
			elseif ($_POST['status'] == 4) { $status = "KIV"; }
			elseif ($_POST['status'] == 5) { $status = "DIBATALKAN"; }
			else { $status = "&nbsp;"; }
			
			$drp = "From: " . $tm['uemail'];
			$kpd = $t['uemail'];
			$per = "e-Latihan: Status Tindakan / Pengesahan dari Unit Latihan";
			$msg = "Salam sejahtera " . output1($t['unama']) . "," . "\n\n";
			$msg .= "Berikut adalah Status Pengesahan berhubung Makluman Kursus anda:" . "\n\n";
			$msg .= "Nama Penuh: " . output1($t['unama']) . "\n";
			$msg .= "No. Kad Pengenalan: " . output1($t['unokp']) . "\n";
			$msg .= "----------------------------------------" . "\n\n";
			$msg .= "Tajuk Kursus: " . nl2br(output2($t['ktajuk'])) . "\n";
			$msg .= "Tarikh: " . output1($t['ktmula']) . " - " . output1($t['kttamat']) . "\n";
			$msg .= "Jumlah Hari: " . output1($t['kjumlah']) . "\n";
			$msg .= "Lokasi: " . output1($t['klokasi']) . "\n";
			$msg .= "----------------------------------------" . "\n\n";
			$msg .= "Status: " . $status  . "\n";
			$sa = "SELECT * FROM user WHERE unokp = '" . $t['lpelulus'] . "' ORDER BY unokp ASC";
			$da = mysql_query($sa);
			$ta = mysql_fetch_array($da);
			$msg .= "Pegawai Yang Mengesahkan: " . output1($tm['unama']) . "\n";
			$msg .= "Tarikh Tindakan: " . date("d/m/Y h:iA") . "\n\n";
			$msg .= "Sila klik link berikut untuk paparan lanjut:\n\n";
			$msg .= $_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/index.php?modul=status&menu=kursus&id&id=" . input2($_POST['id']) . "\n\n";
			$msg .= "Sebarang pertanyaan lanjut sila hubungi pegawai di atas. JANGAN MEMBALAS E-MEL INI." . "\n\n\n";
			$msg .= "Sistem e-Latihan" . "\n";
			@mail($kpd, $per, $msg, $drp);
			?>
			
<head>
			<meta http-equiv="Refresh" content="2;url=index.php?modul=kelulusan&menu=kursus" />
			</head>

			<table width="995" cellspacing="0" cellpadding="2" border="0"><tr><td align="center" valign="top" bgcolor="#E2E2E2">
			<p>&nbsp;</p>
			<div align="center">
			<table width="600" cellpadding="10" border="0" bgcolor="#FFFFFF" style="border-collapse: collapse">
			<tr><td align="center" valign="middle"><p>&nbsp;</p>
				<font color="#FF0000" style="font-size: 13pt"><b>
				Rekod Kursus Pegawai Ini Telah <?php echo ucfirst(strtoupper($status)); ?> pada <?php echo date("d/m/Y h:iA"); ?>.
			</b></font><p>&nbsp;</p></td></tr></table>
			</div>
			<p>&nbsp;</p>
			</td></tr></table>
		<?php
		}
		elseif ($_POST['Submit'] == "   Ya   ") {
			$sa = "DELETE FROM latihan 
				WHERE lids = '" . input2($_POST['id']) . "'
			";
			mysql_query($sa);
			
			$sa = "DELETE FROM program
				WHERE rids = '" . input2($_POST['id']) . "'
			";
			mysql_query($sa);
			?>
			<meta http-equiv="Refresh" content="2;url=index.php?modul=kelulusan&menu=kursus" />
			<table width="995" cellspacing="0" cellpadding="2" border="0"><tr><td align="center" valign="top" bgcolor="#E2E2E2">
			<p>&nbsp;</p>
			<div align="center">
			<table width="600" cellpadding="10" border="0" bgcolor="#FFFFFF" style="border-collapse: collapse">
			<tr><td align="center" valign="middle"><p>&nbsp;</p>
				<font color="red" style="font-size: 13pt"><b>
				Rekod Kursus Pegawai Ini Telah Dihapuskan pada <?php echo date("d/m/Y h:iA"); ?>.
			</b></font><p>&nbsp;</p></td></tr></table>
			</div>
			<p>&nbsp;</p>
			</td></tr></table>
		<?php
		}
		else {
			?>
			<meta http-equiv="Refresh" content="0;url=index.php?modul=kelulusan&menu=kursus">
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
		<meta http-equiv="Refresh" content="0;url=index.php?modul=kelulusan&menu=kursus">
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
	<meta http-equiv="Refresh" content="0;url=index.php?modul=kelulusan&menu=kursus">
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