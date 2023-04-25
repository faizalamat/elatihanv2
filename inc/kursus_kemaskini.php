<?php
global $con;
if (!empty($_POST['id']) && strlen($_POST['id']) == 32) {
	if ($_POST['Submit'] == "Kemaskini" && !empty($_POST['tajuk']) && !empty($_POST['tmula']) && !empty($_POST['ttamat'])) {
		if (tarikh(input1($_POST['ttamat'])) < tarikh(input1($_POST['tmula']))) {
			?>
			<meta http-equiv="Refresh" content="2;url=index.php?modul=kursus&menu=kemaskini&id=<?php echo ($_POST['id']); ?>">
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
			if ($_POST['anjuran'] == 2) { 
				$bah = input2($_POST['bahagian']);
				$sektor = "";
			}
			else {
				$bah = "";
				$sektor = input1($_POST['sektor']);
			}
			$s = "UPDATE kursus SET
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
				kjumlah = '" . hari(input1($_POST['cuti']),input1($_POST['tmula']),input1($_POST['ttamat'])) . "',
				klokasi = '" . input1($_POST['lokasi']) . "',
				kpenyedia = '" . input1($_POST['penyedia']) . "',
				kkos = '" . input1($_POST['kos']) . "',
				koleh = '" . input1($_SESSION['staff']) . "',
				kpada = '" . time() . "'
				WHERE kids = '" . input2($_POST['id']) . "'
			";
			mysql_query($s);
			?>
			<meta http-equiv="Refresh" content="2;url=index.php?modul=kursus&menu=senarai" />
			<table width="995" cellspacing="0" cellpadding="2" border="0"><tr><td align="center" valign="top" bgcolor="#E2E2E2">
			<p>&nbsp;</p>
			<table width="450" cellspacing="0" cellpadding="10" border="1" align="center" bgcolor="#FFFFFF">
			<tr><td align="center" valign="middle"><p>&nbsp;</p><font color="red"><b>
				Maklumat Kursus Berjaya Dikemaskini.
			</b></font><p>&nbsp;</p></td></tr></table>
			<p>&nbsp;</p>
			</td></tr></table>
		<?php
		}
	}
	elseif ($_POST['Submit'] == "   Ya   ") {
		$s = "DELETE FROM kursus 
			WHERE kids = '" . input2($_POST['id']) . "'
		";
		mysql_query($s);
		?>
		<meta http-equiv="Refresh" content="2;url=index.php?modul=kursus&menu=senarai">
		<table width="995" cellspacing="0" cellpadding="2" border="0"><tr><td align="center" valign="top" bgcolor="#E2E2E2">
		<p>&nbsp;</p>
		<table width="450" cellspacing="0" cellpadding="10" border="1" align="center" bgcolor="#FFFFFF">
		<tr><td align="center" valign="middle"><p>&nbsp;</p><font color="red"><b>
			Maklumat Kursus Berjaya Dihapuskan.
		</b></font><p>&nbsp;</p></td></tr></table>
		<p>&nbsp;</p>
		</td></tr></table>
	<?php
	}
	else {
		echo '<meta http-equiv="Refresh" content="0;url=index.php?modul=kursus&menu=senarai">';
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