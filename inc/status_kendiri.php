<?php
if (!empty($_POST['id']) && strlen($_POST['id']) == 32) {
	$s = "SELECT k.*, u.*
		FROM kendiri AS k, user AS u
		WHERE k.unokp = u.unokp
		AND k.dids = '" . input2($_POST['id']) . "'
		AND k.unokp = '" . input1($tm['unokp']) . "'
		AND k.dstatus = 1
		ORDER BY k.dids ASC
	";
	$d = mysql_query($s);
	if (mysql_num_rows($d) == 1) {
		if ($_POST['Submit'] == "Kemaskini") {
			if ($_POST['jenis'] == 1) { 
			  $sa = "SELECT * FROM epsa WHERE eids = '" . input2($_POST['epsa']) . "' ORDER BY eids ASC";
			  $da = mysql_query($sa);
			  $ta = mysql_fetch_array($da);
			  $jumlah = $ta['ejam']; 
			  $tajuk = "";
			  $lain = "";
			  $tempat = "";
			}
			elseif ($_POST['jenis'] == 2) { 
				$jumlah = 6; 
				$tajuk = $_POST['tajuk'];
				$lain = "";
				$tempat = $_POST['tempat'];
			}
			elseif ($_POST['jenis'] == 3) { 
				$jumlah = hari(1,$_POST['tmula'],$_POST['ttamat']) * 6; 
				$tajuk = $_POST['tajuk'];
				$lain = $_POST['lain'];
				$tempat = $_POST['tempat'];
			}
			$sa = "UPDATE kendiri SET
				dpada = '" . time() . "',
				djenis = '" . input1($_POST['jenis']) . "',
				dlain = '" . input1($lain) . "',
				eids = '" . input2($_POST['epsa']) . "',
				dtajuk = '" . input2($tajuk) . "',
				dtmula = '" . input1($_POST['tmula']) . "',
				dtmula2 = '" . tarikh(input1($_POST['tmula'])) . "',
				dttamat = '" . input1($_POST['ttamat']) . "',
				dttamat2 = '" . tarikh(input1($_POST['ttamat'])) . "',
				dtempat = '" . input1($tempat) . "',
				djumlah = '" . input1($jumlah) . "'
				WHERE dids = '" . input2($_POST['id']) . "'
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
			<meta http-equiv="Refresh" content="2;url=index.php?modul=status&menu=kendiri" />
			<table width="995" cellspacing="0" cellpadding="2" border="0"><tr><td align="center" valign="top" bgcolor="#E2E2E2">
			<p>&nbsp;</p>
			<table width="450" cellspacing="0" cellpadding="10" border="1" align="center" bgcolor="#FFFFFF">
			<tr><td align="center" valign="middle"><p>&nbsp;</p><font color="red"><b>
				Rekod Pembelajaran Kendiri Berjaya Dikemaskini.
			</b></font><p>&nbsp;</p></td></tr></table>
			<p>&nbsp;</p>
			</td></tr></table>
		<?php
		}
		elseif ($_POST['Submit'] == "   Ya   ") {
			$sa = "DELETE FROM kendiri 
				WHERE dids = '" . input2($_POST['id']) . "'
				AND unokp = '" . $tm['unokp'] . "'
			";
			mysql_query($sa);
			
			$sa = "DELETE FROM program
				WHERE rids = '" . input2($_POST['id']) . "'
				AND unokp = '" . $tm['unokp'] . "'
			";
			mysql_query($sa);
			?>
			<meta http-equiv="Refresh" content="2;url=index.php?modul=status&menu=kendiri" />
			<table width="995" cellspacing="0" cellpadding="2" border="0"><tr><td align="center" valign="top" bgcolor="#E2E2E2">
			<p>&nbsp;</p>
			<table width="450" cellspacing="0" cellpadding="10" border="1" align="center" bgcolor="#FFFFFF">
			<tr><td align="center" valign="middle"><p>&nbsp;</p><font color="red"><b>
				Rekod Pembelajaran Kendiri Berjaya Dihapuskan.
			</b></font><p>&nbsp;</p></td></tr></table>
			<p>&nbsp;</p>
			</td></tr></table>
		<?php
		}
		else {
			?>
			<meta http-equiv="Refresh" content="0;url=index.php?modul=status&menu=kendiri">
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
		<meta http-equiv="Refresh" content="0;url=index.php?modul=status&menu=kendiri">
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
	<meta http-equiv="Refresh" content="0;url=index.php?modul=status&menu=kendiri">
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