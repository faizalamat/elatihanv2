<?php
if (!empty($_POST['id']) && strlen($_POST['id']) == 32) {
	$s = "SELECT * FROM user 
		WHERE uids = '" . input2($_POST['id']) . "'
		ORDER BY uids ASC
	";
	$d = mysql_query($s);
	if (mysql_num_rows($d) == 1) {
		$t = mysql_fetch_array($d);
		if ($_POST['Submit'] == "Kemaskini" && !empty($_POST['nama']) && !empty($_POST['email'])) {
			$email = explode("@",input1($_POST['email']));
			$email = $email[0] . input1($_POST['domain']);
			$s = "UPDATE user SET
				ulevel = '" . input1($_POST['status']) . "',
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
				ueselia = '" . input1($_POST['eselia']) . "'
				WHERE uids = '" . input2($_POST['id']) . "'
			";
			mysql_query($s);
			?>
			<meta http-equiv="Refresh" content="2;url=index.php?modul=staff&menu=senarai">
			<table width="995" cellspacing="0" cellpadding="2" border="0"><tr><td align="center" valign="top" bgcolor="#E2E2E2">
			<p>&nbsp;</p>
			<div align="center">
			<table width="450" cellpadding="10" border="0" bgcolor="#FFFFFF" style="border-collapse: collapse">
			<tr><td align="center" valign="middle"><p>&nbsp;</p>
				<font color="#008000" style="font-size: 13pt"><b>
				Maklumat Pegawai Berjaya Dikemaskini.
			</b></font><p>&nbsp;</p></td></tr></table>
			</div>
			<p>&nbsp;</p>
			</td></tr></table>
		<?php
		}
		elseif ($_POST['Submit'] == "   Ya   ") {
			$s = "DELETE FROM user
				WHERE uids = '" . input2($_POST['id']) . "'
			";
			mysql_query($s);
			?>
			<meta http-equiv="Refresh" content="2;url=index.php?modul=staff&menu=senarai">
			<table width="995" cellspacing="0" cellpadding="2" border="0"><tr><td align="center" valign="top" bgcolor="#E2E2E2">
			<p>&nbsp;</p>
			<div align="center">
			<table width="450" cellpadding="10" border="0" bgcolor="#FFFFFF" style="border-collapse: collapse">
			<tr><td align="center" valign="middle"><p>&nbsp;</p>
				<font color="red" style="font-size: 13pt"><b>
				Maklumat Pegawai Berjaya Dihapuskan.
			</b></font><p>&nbsp;</p></td></tr></table>
			</div>
			<p>&nbsp;</p>
			</td></tr></table>
		<?php
		}
		elseif ($_POST['Submit'] == "Reset Katalaluan") {
			$pass = rand(100000,999999);
			$s = "UPDATE user SET
				upass = '" . md5($pass."p4Kc@") . "'
				WHERE uids = '" . input2($_POST['id']) . "'
			";
			mysql_query($s);
			
			$drp = "From: L.BKP@jpa.gov.my";
			$kpd = $t['uemail'];
			$per = "e-Latihan : Reset Katalaluan Pegawai";
			$msg = "Salam sejahtera " . output1($t['unama']) .  "," . "\n\n";
			$msg .= "No. Kad Pengenalan: " . output1($t['unokp']) . "\n";
			$msg .= "Katalaluan Baru: " . $pass . "\n\n\n";
			$msg .= "Direset oleh: Super Admin" . "\n\n";
			$msg .= "Unit Latihan, Bahagian Khidmat Pengurusan." . "\n";
			$msg .= "Jabatan Perkhidmatan Awam (JPA) Malaysia." . "\n\n";
			$msg .= "Sistem e-Latihan." . "\n";

			@mail($kpd, $per, $msg, $drp);
			?>
			
			<meta http-equiv="Refresh" content="2;url=index.php?modul=staff&menu=senarai">
			<table width="995" cellspacing="0" cellpadding="2" border="0"><tr><td align="center" valign="top" bgcolor="#E2E2E2">
			<p>&nbsp;</p>
			<div align="center">
			<table width="600" cellpadding="10" border="0" bgcolor="#FFFFFF" style="border-collapse: collapse">
			<tr><td align="center" valign="middle"><p>&nbsp;</p>
				<font color="#008000" style="font-size: 13pt"><b>
				Katalaluan Pegawai Berjaya Direset. <br>
				Password Baru Telah di E-Mel Kepada Pegawai.</b></font><p>&nbsp;</p></td></tr></table>
			</div>
			<p>&nbsp;</p>
			</td></tr></table>
		<?php
		}
		else {
			?>
			<meta http-equiv="Refresh" content="0;url=index.php?modul=staff&menu=senarai">
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
	<table width="995" cellspacing="0" cellpadding="2" border="0"><tr><td align="center" valign="top" bgcolor="#E2E2E2">
    <p>&nbsp;</p>
    <div align="center">
    <table width="450" cellpadding="10" border="0" bgcolor="#FFFFFF" style="border-collapse: collapse">
    <tr><td align="center" valign="middle"><p>&nbsp;</p>
		<font color="red" style="font-size: 13pt"><b>
        Sila Lengkapkan Maklumat Pegawai.
    </b></font><p>&nbsp;</p></td></tr></table>
    </div>
    <p>&nbsp;</p>
    </td></tr></table>
<?php
}
?>