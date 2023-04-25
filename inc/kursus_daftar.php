<?php
global $con;
if (!empty($_POST['tajuk']) && !empty($_POST['tmula']) && !empty($_POST['ttamat'])) {
	if (tarikh(input1($_POST['ttamat'])) < tarikh(input1($_POST['tmula']))) {
		?>
		<meta http-equiv="Refresh" content="2;url=index.php?modul=kursus&menu=daftar">
		<table width="995" cellspacing="0" cellpadding="2" border="0"><tr><td align="center" valign="top" bgcolor="#E2E2E2">
		<p>&nbsp;</p>
		<table width="450" cellspacing="0" cellpadding="10" border="1" align="center" bgcolor="#FFFFFF">
		<tr><td align="center" valign="middle"><p>&nbsp;</p><font color="red"><b>
			Tarikh Tamat Kursus Tidak Sah.
		</b></font><p>&nbsp;</p></td></tr></table>
		<p>&nbsp;</p>
		</td></tr></table>
	<?php
	}
	else {
		$s = "SELECT * FROM kursus 
			WHERE ktajuk = '" . input2($_POST['tajuk']) . "' 
			AND ktmula = '" . input1($_POST['tmula']) . "' 
			AND kttamat = '" . input1($_POST['ttamat']) . "'
			ORDER BY ktajuk ASC
		";
		$d = mysqli_query($con,$s);
		if (mysqli_num_rows($d) == 1) {
			?>
			<meta http-equiv="Refresh" content="2;url=index.php?modul=kursus&menu=daftar">
			<table width="995" cellspacing="0" cellpadding="2" border="0"><tr><td align="center" valign="top" bgcolor="#E2E2E2">
			<p>&nbsp;</p>
			<table width="450" cellspacing="0" cellpadding="10" border="1" align="center" bgcolor="#FFFFFF">
			<tr><td align="center" valign="middle"><p>&nbsp;</p><font color="red"><b>
				Maklumat Tursus Telah Wujud.
			</b></font><p>&nbsp;</p></td></tr></table>
			<p>&nbsp;</p>
			</td></tr></table>
		<?php
		}
		else {
			if ($_POST['anjuran'] == 2) { 
				$bah = input2($_POST['bahagian']);
				$sektor = "";
			}
			else {
				$bah = "";
				$sektor = input1($_POST['sektor']);
			}

			$s = "INSERT INTO kursus SET
				kids = '" . md5(time().input2($_POST['tajuk'])."p4Kc@") . "',
				kjenis = '" . input1($_POST['jenis']) . "',
				kanjuran = '" . input1($_POST['anjuran']) . "',
				bids = '" . $bah . "',
				ksektor = '" . $sektor . "',
				ktajuk = '" . input2($_POST['tajuk']) . "',
				kbidang = '" . input1($_POST['bidang']) . "',
				ktmula = '" . input1($_POST['tmula']) . "',
				ktmula2 = '" . tarikh(input1($_POST['tmula'])) . "',
				kttamat = '" . input1($_POST['ttamat']) . "',
				kttamat2 = '" . tarikh(input1($_POST['ttamat'])) . "',
				kcuti = '" . input1($_POST['cuti']) . "',
				kjumlah = '" . hari(input1($_POST['cuti']),input1(isset($_POST['ktmula2'])),input1(isset($_POST['kttamat2']))) . "',
				klokasi = '" . input1($_POST['lokasi']) . "',
				kpenyedia = '" . input1($_POST['penyedia']) . "',
				kkos = '" . input1($_POST['kos']) . "',
				koleh = '" . input1($_SESSION['staff']) . "',
				kpada = '" . time() . "'
			";
			mysqli_query($con,$s);
			?>
			<meta http-equiv="Refresh" content="2;url=index.php?modul=kursus&menu=senarai" />
			<table width="995" cellspacing="0" cellpadding="2" border="0"><tr><td align="center" valign="top" bgcolor="#E2E2E2">
			<p>&nbsp;</p>
			<table width="450" cellspacing="0" cellpadding="10" border="1" align="center" bgcolor="#FFFFFF">
			<tr><td align="center" valign="middle"><p>&nbsp;</p><font color="red"><b>
				Maklumat Kursus Berjaya Ditambah.
			</b></font><p>&nbsp;</p></td></tr></table>
			<p>&nbsp;</p>
			</td></tr></table>
		<?php
		}
	}
}
else {
	?>
	<meta http-equiv="Refresh" content="2;url=index.php?modul=kursus&menu=daftar">
	<table width="995" cellspacing="0" cellpadding="2" border="0"><tr><td align="center" valign="top" bgcolor="#E2E2E2">
    <p>&nbsp;</p>
    <table width="450" cellspacing="0" cellpadding="10" border="1" align="center" bgcolor="#FFFFFF">
    <tr><td align="center" valign="middle"><p>&nbsp;</p><font color="red"><b>
        Sila Lengkapkan Maklumat Kursus.
    </b></font><p>&nbsp;</p></td></tr></table>
    <p>&nbsp;</p>
    </td></tr></table>
<?php
}
?>