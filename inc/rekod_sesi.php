<?php
if (!empty($_POST['akuan'])) {
	$id = md5(time().input2($_POST['tajuk'])."p4Kc@");
	$s = "INSERT INTO sesi SET
		sids = '" . $id . "',
		unokp = '" . $tm['unokp'] . "',
		spada = '" . time() . "',
		sjenis = '" . input1($_POST['jenis']) . "',
		slain = '" . input1($_POST['lain']) . "',
		stajuk = '" . input2($_POST['tajuk']) . "',
		sanjuran = '" . input2($_POST['anjuran']) . "',
		starikh = '" . input1($_POST['tmula']) . "',
		starikh2 = '" . tarikh(input1($_POST['tmula'])) . "',
		stempat = '" . input1($_POST['tempat']) . "',
		swmula = '" . input1($_POST['wmula']) . "',
		swtamat = '" . input1($_POST['wtamat']) . "',
		sjumlah = '" . input1($_POST['jumlah']) . "'
	";
	mysql_query($s);
	
	$s = "INSERT INTO program SET
		rkategori = 2,
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
	$msg .= "Tajuk Kursus: " . input2($_POST['tajuk']) . "\n";
	$msg .= "Tarikh: " . input1($_POST['tmula']) . "\n";
	$msg .= "Tempat: " . input1($_POST['tempat']) . "\n\n";
	$msg .= "Sila klik link berikut untuk pengesahan pendaftaran sesi pembelajaran:\n\n";
	$msg .= $_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/admin/index.php?modul=kelulusan&menu=sesi&id=" . $id . "\n";
	@mail($kpd, $per, $msg, $drp);
	?>
	<meta http-equiv="Refresh" content="2;url=index.php?modul=pendaftaran&menu=sesi">
	<table width="995" cellspacing="0" cellpadding="2" border="0"><tr><td align="center" valign="top" bgcolor="#E2E2E2">
	<p>&nbsp;</p>
	<table width="450" cellspacing="0" cellpadding="10" border="1" align="center" bgcolor="#FFFFFF">
	<tr><td align="center" valign="middle"><p>&nbsp;</p><font color="red"><b>
		Rekod Sesi Pembelajaran Anda Telah Dihantar Ke Unit Modal Insan dan Inovasi Untuk Pengesahan.<br />Sila Semak Status Anda Selepas Ini.
	</b></font><p>&nbsp;</p></td></tr></table>
	<p>&nbsp;</p>
	</td></tr></table>
<?php
}
else {
	?>
	<meta http-equiv="Refresh" content="2;url=index.php?modul=pendaftaran&menu=sesi">
	<table width="995" cellspacing="0" cellpadding="2" border="0"><tr><td align="center" valign="top" bgcolor="#E2E2E2">
    <p>&nbsp;</p>
    <table width="450" cellspacing="0" cellpadding="10" border="1" align="center" bgcolor="#FFFFFF">
    <tr><td align="center" valign="middle"><p>&nbsp;</p><font color="red"><b>
        Sila Lengkapkan Maklumat Sesi Pembelajaran.
    </b></font><p>&nbsp;</p></td></tr></table>
    <p>&nbsp;</p>
    </td></tr></table>
<?php
}
?>