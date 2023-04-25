<?php
if (!empty($_POST['id']) && strlen($_POST['id']) == 32) {
	$s = "SELECT * FROM latihan 
		WHERE unokp = '" . $tm['unokp'] . "'
		AND kids = '" . input2($_POST['id']) . "'
		ORDER BY unokp ASC
	";
	$d = mysql_query($s);
	if (mysql_num_rows($d) == 1) {
		?>
		<meta http-equiv="Refresh" content="2;url=index.php?modul=status&menu=kursus">
		<table width="995" cellspacing="0" cellpadding="2" border="0"><tr><td align="center" valign="top" bgcolor="#E2E2E2">
		<p>&nbsp;</p>
		<table width="450" cellspacing="0" cellpadding="10" border="1" align="center" bgcolor="#FFFFFF">
		<tr><td align="center" valign="middle"><p>&nbsp;</p><font color="red"><b>
			Rekod Kursus/Latihan Telah wujud.<br />Sila Semak Status Anda.
		</b></font><p>&nbsp;</p></td></tr></table>
		<p>&nbsp;</p>
		</td></tr></table>
	<?php
	}
	else {
		$id = md5(time().input2($_POST['id'])."p4Kc@");
		$s = "INSERT INTO latihan SET
			lids = '" . $id . "',
			kids = '" . input2($_POST['id']) . "',
			unokp = '" . $tm['unokp'] . "',
			lpada = '" . time() . "'
		";
		mysql_query($s);
		
		$s = "SELECT * FROM kursus WHERE kids = '" . input2($_POST['id']) . "' ORDER BY kids ASC";
		$d = mysql_query($s);
		$t = mysql_fetch_array($d);

		$sa = "INSERT INTO program SET
			rkategori = 1,
			rids = '" . $id . "',
			unokp = '" . $tm['unokp'] . "',
			rtmula = '" . $t['ktmula'] . "',
			rtmula2 = '" . $t['ktmula2'] . "'
		";
		mysql_query($sa);
		
		$drp = "From: " . $tm['uemail'];
		$kpd = "syarima.istiadat@1govuc.gov.my,mohdfaizal.istiadat@1govuc.gov.my";
		$per = "e-Latihan: Menunggu Tindakan / Pengesahan";
		$msg = "Nama Pemohon: " . output1($tm['unama']) . "\n";
		$msg .= "No. Kad Pengenalan: " . output1($tm['unokp']) . "\n";
		$msg .= "No. Kad ID: " . output1($tm['unoid']) . "\n\n";
		$msg .= "Tajuk Kursus: " . nl2br(output2($t['ktajuk'])) . "\n";
		$msg .= "Tarikh: " . output1($t['ktmula']) . " - " . output1($t['kttamat']) . "\n";
		$msg .= "Lokasi: " . output1($t['klokasi']) . "\n\n";
		$msg .= "Sila klik link berikut untuk pengesahan pendaftaran kursus/latihan:\n\n";
		$msg .= $_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/admin/index.php?modul=kelulusan&menu=kursus&id=" . $id . "\n";
		@mail($kpd, $per, $msg, $drp);
		?>
        <meta http-equiv="Refresh" content="2;url=index.php?modul=pendaftaran&menu=kursus">
		<table width="995" cellspacing="0" cellpadding="2" border="0"><tr><td align="center" valign="top" bgcolor="#E2E2E2">
		<p>&nbsp;</p>
		<table width="450" cellspacing="0" cellpadding="10" border="1" align="center" bgcolor="#FFFFFF">
		<tr><td align="center" valign="middle"><p>&nbsp;</p><font color="red"><b>
			Rekod Kursus Anda Telah Dihantar Ke Unit Modal Insan dan Inovasi Untuk Pengesahan.<br />Sila Semak Status Anda Selepas Ini.
		</b></font><p>&nbsp;</p></td></tr></table>
		<p>&nbsp;</p>
		</td></tr></table>
	<?php
	}
}
else {
	?>
	<meta http-equiv="Refresh" content="2;url=index.php?modul=pendaftaran&menu=kursus">
	<table width="995" cellspacing="0" cellpadding="2" border="0"><tr><td align="center" valign="top" bgcolor="#E2E2E2">
    <p>&nbsp;</p>
    <table width="450" cellspacing="0" cellpadding="10" border="1" align="center" bgcolor="#FFFFFF">
    <tr><td align="center" valign="middle"><p>&nbsp;</p><font color="red"><b>
        Sila Pilih Tajuk Kursus.
    </b></font><p>&nbsp;</p></td></tr></table>
    <p>&nbsp;</p>
    </td></tr></table>
<?php
}
?>