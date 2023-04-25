<?php

require_once('conn.php');

if (!empty($_POST['akuan']) && !empty($_POST['nama']) && !empty($_POST['nokp1']) && !empty($_POST['nokp2']) && !empty($_POST['nokp3']) && !empty($_POST['email']) && !empty($_POST['pass']) && !empty($_POST['soalan']) && !empty($_POST['jawapan'])) {
	$s = "SELECT * FROM user 
		WHERE unokp = '" . input1($_POST['nokp1']) . input1($_POST['nokp2']) . input1($_POST['nokp3']) . "' && usah <> 2
		ORDER BY unokp ASC
	";
	
	$d = mysqli_query($con,$s);
	if (mysqli_num_rows($d) == 1) {
		?>
		<meta http-equiv="Refresh" content="2;url=index.php?modul=profail&menu=daftar">
		<table width="995" cellspacing="0" cellpadding="2" border="0"><tr><td align="center" valign="top" bgcolor="#E2E2E2">
		<p>&nbsp;</p>
		<div align="center">
		<table width="600" cellpadding="10" border="0" bgcolor="#FFFFFF" style="border-collapse: collapse">
		<tr><td align="center" bgcolor="#FF0000">
			<font color="#FFFFFF" style="font-size: 13pt"><b>
			Maaf!
			Maklumat No. KP Pegawai Telah Wujud.</b></font><p>
			<font color="#FFFFFF"><span style="font-size: 13pt"><b>Sila Daftar 
			Semula</b></span></font><font color="#FFFFFF" style="font-size: 13pt"><b>.
		</b></font></td></tr></table>
		</div>
		<p>&nbsp;</p>
		</td></tr></table>
	<?php
	}
	else {
		$email = explode("@",input1($_POST['email']));
		$email = $email[0] . '@MKN.GOV.MY';
		$id = md5(time().input1($_POST['nokp1'])."p4Kc@");
		$s = "INSERT INTO user SET
			uids = '" . $id . "',
			unokp = '" . input1($_POST['nokp1']) . input1($_POST['nokp2']) . input1($_POST['nokp3']) . "',
			upass = '" . md5(input2($_POST['pass'])."p4Kc@") . "',
			usoalan = '" . input2($_POST['soalan']) . "',
			ujawapan = '" . input1($_POST['jawapan']) . "',
			uemail = '" . $email . "',
			unoid = '" . input1($_POST['nokad']) . "',
			unama = '" . input1($_POST['nama']) . "',
			pids = '" . input2($_POST['kumpulan']) . "',
			ugred = '" . input1($_POST['gred']) . "',
			bids = '" . input2($_POST['bahagian']) . "',
			utelefon = '" . input1($_POST['notel']) . "',
			ubimbit = '" . input1($_POST['nohp']) . "',
			uselia = '" . input1($_POST['nselia']) . "',
			ujselia = '" . input1($_POST['jselia']) . "',
			ueselia = '" . input1($_POST['eselia']) . "',
			upada = '" . time() . "'
		";

		/*
		$s = "INSERT INTO user SET
			uids = '" . $id . "',
			unokp = '" . input1($_POST['nokp1']) . input1($_POST['nokp2']) . input1($_POST['nokp3']) . "',
			upass = '" . md5(input2($_POST['pass'])."p4Kc@") . "',
			usoalan = '" . input2($_POST['soalan']) . "',
			ujawapan = '" . input1($_POST['jawapan']) . "',
			uemail = '" . $email . "',
			unoid = '" . input1($_POST['nokad']) . "',
			unama = '" . input1($_POST['nama']) . "',
			utpenempatan = '" . input1($_POST['tmula']) . "',
			pids = '" . input2($_POST['kumpulan']) . "',
			ugred = '" . input1($_POST['gred']) . "',
			bids = '" . input2($_POST['bahagian']) . "',
			utelefon = '" . input1($_POST['notel']) . "',
			ubimbit = '" . input1($_POST['nohp']) . "',
			uselia = '" . input1($_POST['nselia']) . "',
			ujselia = '" . input1($_POST['jselia']) . "',
			ueselia = '" . input1($_POST['eselia']) . "',
			upada = '" . time() . "'
		";

		*/
		
		
		mysqli_query($con,$s);
		
		$drp = "From: pentadbiraplikasi@mkn.gov.my";
		$kpd = $email;
		$per = "Sistem e-Latihan : Permohonan Pendaftaran Pengguna Sistem";
		$msg = "Salam sejahtera " . input1($_POST['nama']) . "," . "\n\n";
		$msg .= "Pengesahan diperlukan. Maklumat pendaftaran anda: \n\n";
		$msg .= "No. Kad Pengenalan: " . input1($_POST['nokp1']) . input1($_POST['nokp2']) . input1($_POST['nokp3']) . "\n";
		$msg .= "Katalaluan: " . input2($_POST['pass']) . "\n\n";
		$msg .= "\n";
		$msg .= "Sila klik link di bawah untuk pengesahan pendaftaran:\n\n";
		$msg .= $_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/index.php?modul=profail&menu=pengesahan&id=" . $id . "\n\n";
		$msg .= "TAK PERLU BALAS E-MEL INI. HANYA PERLU KLIK LINK DI ATAS UNTUK PENGESAHAN. \n\n\n";
		$msg .= "Unit Modal Insan dan Inovasi, BIUPA. \n\n";
		$msg .= "Sistem e-LATIHAN. \n\n";
		@mail($kpd, $per, $msg, $drp);
		
		?>
		<table width="995" cellspacing="0" cellpadding="2" border="0"><tr><td align="center" valign="top" bgcolor="#E2E2E2">
		<p>&nbsp;</p>
		<div align="center">
		<table width="700" cellpadding="10" border="0" bgcolor="#FFFFFF" style="border-collapse: collapse">
		<tr><td align="center" valign="middle"><p>&nbsp;</p>
			<font color="#008000"><span style="font-size: 13pt"><b>Maklumat</b></span></font><b><font color="#008000" style="font-size: 13pt"> 
			Anda Telah Diterima. <br>
			Tapi... Anda Perlu Lakukan Pengesahan Terlebih Dahulu.<br />&nbsp;</font></b><p><b>
			<font color="#FF0000" style="font-size: 13pt">Semak E-Mel Anda Sekarang Untuk 
			Lakukan Pengesahan.
			<br>
			</font>
		</b><font color="#FF0000"><span style="font-size: 13pt"><b>Semak juga di 
			folder SPAM / Junk Mail Jika Tiada Dalam Inbox.</b></span></font></p>
			<p>&nbsp;</p></td></tr></table>
		</div>
		<p>&nbsp;</p>
		</td></tr></table>
	<?php
	}
}
else {
	?>
	<meta http-equiv="Refresh" content="2;url=index.php?modul=profail&menu=daftar">
	<table width="995" cellspacing="0" cellpadding="2" border="0"><tr><td align="center" valign="top" bgcolor="#E2E2E2">
    <p>&nbsp;</p>
    <div align="center">
    <table width="450" cellpadding="10" border="0" bgcolor="#FFFFFF" style="border-collapse: collapse">
    <tr><td align="center" valign="middle"><p>&nbsp;</p>
		<font color="red" style="font-size: 13pt"><b>
        Sila Lengkapkan Maklumat Pendaftaran.
    </b></font><p>&nbsp;</p></td></tr></table>
    </div>
    <p>&nbsp;</p>
    </td></tr></table>
<?php
}
?>