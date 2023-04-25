<?php
if (!empty($_POST['akuan'])) {
	$id = md5(time().input2($_POST['jenis']).$tm['unokp']."p4Kc@");
	$s = "INSERT INTO kendiri SET
		dids = '" . $id . "',
		unokp = '" . $tm['unokp'] . "',
		dpada = '" . time() . "',
		djenis = '" . input1($_POST['jenis']) . "',
		dlain = '" . input1($_POST['lain']) . "',
		eids = '" . input2($_POST['epsa']) . "',
		dtajuk = '" . input2($_POST['tajuk']) . "',
		dtmula = '" . input1($_POST['tmula']) . "',
		dtmula2 = '" . tarikh(input1($_POST['tmula'])) . "',
		dttamat = '" . input1($_POST['ttamat']) . "',
		dttamat2 = '" . tarikh(input1($_POST['ttamat'])) . "',
		dtempat = '" . input1($_POST['tempat']) . "',
		djumlah = '" . input1($_POST['jumlah']) . "'
	";
	mysql_query($s);
	
	$s = "INSERT INTO program SET
		rkategori = 3,
		rids = '" . $id . "',
		unokp = '" . $tm['unokp'] . "',
		rtmula = '" . input1($_POST['tmula']) . "',
		rtmula2 = '" . tarikh(input1($_POST['tmula'])) . "'
	";
	mysql_query($s);
	
	$drp = "From: " . $tm['uemail'];
	$kpd = "syarima.istiadat@1govuc.gov.my,mohdfaizal.istiadat@1govuc.gov.my";
	$per = "e-Latihan: Menunggu Tindakan / Pengesahan";
	$msg = "Nama Pemohon: " . output1($tm['unama']) . "\n";
	$msg .= "No. Kad Pengenalan: " . output1($tm['unokp']) . "\n";
	$msg .= "No. Kad ID: " . output1($tm['unoid']) . "\n\n";
	if ($_POST['jenis'] == 1) {
	  	$sa = "SELECT * FROM epsa WHERE eids = '" . input2($_POST['epsa']) . "' ORDER BY eids ASC";
	  	$da = mysql_query($sa);
	  	$ta = mysql_fetch_array($da);
		$msg .= "Tajuk EPSA: " . input1($ta['epsa']) . "\n";
		$msg .= "Tarikh: " . input1($_POST['tmula']) . " - " . input1($_POST['ttamat']) . "\n\n";
	}
	else {
		$msg .= "Tajuk: " . input2($_POST['tajuk']) . "\n";
		$msg .= "Tarikh: " . input1($_POST['tmula']) . " - " . input1($_POST['ttamat']) . "\n";
		$msg .= "Tempat: " . input1($_POST['tempat']) . "\n\n";
	}
	$msg .= "Sila klik link berikut untuk pengesahan pendaftaran pembelajaran kendiri:\n\n";
	$msg .= $_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/admin/index.php?modul=kelulusan&menu=kendiri&id=" . $id . "\n";
	@mail($kpd, $per, $msg, $drp);
	?>
	<meta http-equiv="Refresh" content="2;url=index.php?modul=pendaftaran&menu=kendiri">
	<table width="995" cellspacing="0" cellpadding="2" border="0"><tr><td align="center" valign="top" bgcolor="#E2E2E2">
	<p>&nbsp;</p>
	<table width="450" cellspacing="0" cellpadding="10" border="1" align="center" bgcolor="#FFFFFF">
	<tr><td align="center" valign="middle"><p>&nbsp;</p><font color="red"><b>
		Rekod Pembelajaran Kendiri Anda Telah Dihantar Ke Unit Modal Insan dan Inovasi Untuk Pengesahan.<br />Sila Semak Status Anda Selepas Ini.
	</b></font><p>&nbsp;</p></td></tr></table>
	<p>&nbsp;</p>
	</td></tr></table>
<?php
}
else {
	?>
	<meta http-equiv="Refresh" content="2;url=index.php?modul=pendaftaran&menu=kendiri">
	<table width="995" cellspacing="0" cellpadding="2" border="0"><tr><td align="center" valign="top" bgcolor="#E2E2E2">
    <p>&nbsp;</p>
    <table width="450" cellspacing="0" cellpadding="10" border="1" align="center" bgcolor="#FFFFFF">
    <tr><td align="center" valign="middle"><p>&nbsp;</p><font color="red"><b>
        Sila Lengkapkan Maklumat Pembelajaran Kendiri.
    </b></font><p>&nbsp;</p></td></tr></table>
    <p>&nbsp;</p>
    </td></tr></table>
<?php
}
?>