<?php

require_once('conn.php');

if (!empty($_POST['nokp1']) && !empty($_POST['nokp2']) && !empty($_POST['nokp3']) && !empty($_POST['jawapan'])) {
	$s = "SELECT * FROM user 
		WHERE unokp = '" . input1($_POST['nokp1']) . input1($_POST['nokp2']) . input1($_POST['nokp3']) . "'
		ORDER BY unokp ASC
	";
	$d = mysqli_query($conn,$s);
	if (mysql_num_rows($d) == 1) {
		$t = mysql_fetch_array($d);
		if (input1($_POST['jawapan']) == $t['ujawapan']) {
			$pass = rand(100000,999999);
			$sa = "UPDATE user SET
				upass = '" . md5($pass."p4Kc@") . "'
				WHERE unokp = '" . input1($_POST['nokp1']) . input1($_POST['nokp2']) . input1($_POST['nokp3']) . "'
			";
			mysqli_query($conn,$sa);
			
			$drp = "From: pentadbiraplikasi@mkn.gov.my";
			$kpd = $t['uemail'];
			$per = "e-Latihan : Reset Katalaluan Pegawai";
			$msg = "Salam sejahtera " . output1($t['unama']) .  "," . "\n\n";
			$msg .= "No. Kad Pengenalan: " . output1($t['unokp']) . "\n";
			$msg .= "\n";
			$msg .= "Katalaluan baru: " . $pass . "\n\n\n";
			$msg .= "Direset oleh " .  output1($t['unama']) . "\n";
			@mail($kpd, $per, $msg, $drp);
			?>
			<table width="995" cellspacing="0" cellpadding="2" border="0"><tr><td align="center" valign="top" bgcolor="#E2E2E2">
			<p>&nbsp;</p>
			<div align="center">
			<table width="450" cellpadding="10" border="0" bgcolor="#FFFFFF" style="border-collapse: collapse">
			<tr><td align="center" valign="middle"><p>&nbsp;</p>
				<font color="#008000" style="font-size: 13pt"><b>
				Katalaluan Anda Telah Direset.<br />Sila Semak Email Anda.
			</b></font><p>&nbsp;</p></td></tr></table>
			</div>
			<p>&nbsp;</p>
			</td></tr></table>
		<?php
		}
		else {
			?>
			<meta http-equiv="Refresh" content="2;url=index.php?modul=profail&menu=reset">
			<table width="995" cellspacing="0" cellpadding="2" border="0"><tr><td align="center" valign="top" bgcolor="#E2E2E2">
			<p>&nbsp;</p>
			<div align="center">
			<table width="450" cellpadding="10" border="0" bgcolor="#FFFFFF" style="border-collapse: collapse">
			<tr><td align="center" valign="middle"><p>&nbsp;</p>
				<font color="red" style="font-size: 13pt"><b>
				Maklumat Jawapan Anda Tidak Tepat.
			</b></font><p>&nbsp;</p></td></tr></table>
			</div>
			<p>&nbsp;</p>
			</td></tr></table>
		<?php
		}
	}
	else {
		?>
		<meta http-equiv="Refresh" content="2;url=index.php?modul=profail&menu=reset">
		<table width="995" cellspacing="0" cellpadding="2" border="0"><tr><td align="center" valign="top" bgcolor="#E2E2E2">
		<p>&nbsp;</p>
		<div align="center">
		<table width="450" cellpadding="10" border="0" bgcolor="#FFFFFF" style="border-collapse: collapse">
		<tr><td align="center" valign="middle"><p>&nbsp;</p>
			<font color="red" style="font-size: 13pt"><b>
			Maklumat Pegawai Tidak Wujud.
		</b></font><p>&nbsp;</p></td></tr></table>
		</div>
		<p>&nbsp;</p>
		</td></tr></table>
	<?php
	}
}
else {
	?>
	<meta http-equiv="Refresh" content="2;url=index.php?modul=profail&menu=reset">
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