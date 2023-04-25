<?php
if (!empty($_GET['status'])) { $status = $_GET['status']; }
else { $status = "ALL"; }
if (!empty($_GET['bulan'])) { 
	if ($_GET['bulan'] == "ALL") {
		$bulan = "ALL"; 
		$bulan2 = " ";
	}
	else {
		$bulan = $_GET['bulan']; 
		$bulan2 = "BULAN " . bulan(kosong($_GET['bulan'],2)) . " "; 
	}
}
else { 
	$bulan = "ALL"; 
	$bulan2 = " ";
}
if (!empty($_GET['tahun'])) { $tahun = $_GET['tahun']; }
else { $tahun = date("Y"); }
$html = '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.:: Sistem e-Latihan ::.</title>
<style type="text/css">
BODY {
	MARGIN: 0px 0px 0px 0px; 
	FONT-SIZE: 14px; 
	FONT-FAMILY: Arial;
}
.text1 {
	FONT-SIZE: 14px; 
	FONT-FAMILY: Arial;
}
</style>
</head>
<body>
<table width="750" border="0" cellspacing="0" cellpadding="2">
  <tr>
    <td align="center"><b>LAPORAN JUMLAH HARI KURSUS PEGAWAI PADA ' . $bulan2 . 'TAHUN ' . $tahun . '</b></td>
  </tr>
</table>
<br />
';
if (!empty($_GET['id']) && strlen($_GET['id']) == 32) {
  $sc = "SELECT u.*, p.*, b.*
  	FROM user AS u, kumpulan AS p, bahagian AS b
	WHERE u.pids = p.pids
	AND u.bids = b.bids
	AND u.usah = 1
	AND u.uids = '" . input2($_GET['id']) . "' 
	ORDER BY u.uids ASC
  ";
  $dc = mysql_query($sc);
  $tc = mysql_fetch_array($dc);
}
$html .= '
<table width="750" border="0" cellspacing="0" cellpadding="3">
  <tr>
    <td width="160" align="left" valign="top">Nama Pegawai</td>
    <td width="16" align="center" valign="top">:</td>
    <td width="468" align="left" valign="top">' . output1($tc['unama']) . '</td>
  </tr>
  <tr>
    <td align="left" valign="top">No. Kad Pengenalan</td>
    <td align="center" valign="top">:</td>
    <td align="left" valign="top">' . output1($tc['unokp']) . '</td>
  </tr>
  <tr>
    <td align="left" valign="top">Unit</td>
    <td align="center" valign="top">:</td>
    <td align="left" valign="top">' . output1($tc['bahagian']) . '</td>
  </tr>
  <tr>
    <td align="left" valign="top">Kumpulan Perkhidmatan</td>
    <td align="center" valign="top">:</td>
    <td align="left" valign="top">' . output1($tc['kumpulan']) . '</td>
  </tr>
  <tr>
    <td colspan="3" align="left" valign="top">Jenis Kursus</td>
  </tr>
  ';
	$kursus = 0;
	if ($bulan == "ALL") {
		$sb = "SELECT l.*, k.* 
			FROM latihan AS l, kursus AS k
			WHERE l.kids = k.kids
			AND l.unokp = '" . $tc['unokp'] . "' 
			AND k.kttamat RLIKE '" . $tahun . "' 
		";
		if ($status != "ALL") {
			$sb .= "AND l.lstatus = '" . input1($status) . "' ";
		}
		$sb .= "ORDER BY l.unokp ASC";
	}
	else {
		$sb = "SELECT l.*, k.* 
			FROM latihan AS l, kursus AS k
			WHERE l.kids = k.kids
			AND l.unokp = '" . $tc['unokp'] . "' 
			AND k.kttamat RLIKE '" . kosong($bulan,2)."/".$tahun . "' 
		";
		if ($status != "ALL") {
			$sb .= "AND l.lstatus = '" . input1($status) . "' ";
		}
		$sb .= "ORDER BY l.unokp ASC";
	}
	$db = mysql_query($sb) or die(mysql_error().$sb);
	while ($tb = mysql_fetch_array($db)) {
		$kursus = $kursus + $tb['kjumlah'];
	}
	
	$sesi = 0;
	if ($bulan == "ALL") {
		$sb = "SELECT * FROM sesi
			WHERE unokp = '" . $tc['unokp'] . "'
			AND starikh RLIKE '" . $tahun . "' 
		";
		if ($status != "ALL") {
			$sb .= "AND sstatus = '" . input1($status) . "' ";
		}
		$sb .= "ORDER BY unokp ASC";
	}
	else {
		$sb = "SELECT * FROM sesi
			WHERE unokp = '" . $tc['unokp'] . "'
			AND starikh RLIKE '" . kosong($bulan,2)."/".$tahun . "' 
		";
		if ($status != "ALL") {
			$sb .= "AND sstatus = '" . input1($status) . "' ";
		}
		$sb .= "ORDER BY unokp ASC";
	}
	$db = mysql_query($sb);
	while ($tb = mysql_fetch_array($db)) {
		$sesi = $sesi + $tb['sjumlah'];
	}
	$hari = floor($sesi / 6);
	$jam = $ta['sjumlah'] - ($hari * 6);
	if ($hari >= 1) { $sesid = $hari . " HARI " . $jam . " JAM"; }
	elseif ($jam >= 1) { $sesid = $jam . " JAM"; }
	elseif ($ta['sjumlah'] == "0.5") { $sesid = "30 MINIT"; }
	else { $sesid = "0"; }

	$kendiri = 0;
	if ($bulan == "ALL") {
		$sb = "SELECT * FROM kendiri
			WHERE unokp = '" . $tc['unokp'] . "'
			AND dttamat RLIKE '" . $tahun . "' 
		";
		if ($status != "ALL") {
			$sb .= "AND dstatus = '" . input1($status) . "' ";
		}
		$sb .= "ORDER BY unokp ASC";
	}
	else {
		$sb = "SELECT * FROM kendiri
			WHERE unokp = '" . $tc['unokp'] . "'
			AND dttamat RLIKE '" . kosong($bulan,2)."/".$tahun . "' 
		";
		if ($status != "ALL") {
			$sb .= "AND dstatus = '" . input1($status) . "' ";
		}
		$sb .= "ORDER BY unokp ASC";
	}
	$db = mysql_query($sb);
	while ($tb = mysql_fetch_array($db)) {
		if ($tb['djenis'] == 1) { 
			$kendiri = $kendiri + $tb['djumlah'];
		}
		elseif ($tb['djenis'] == 2) { 
			$kendiri = $kendiri + 6;
		}
		elseif ($tb['djenis'] == 3) { 
			$kendiri = $kendiri + $tb['djumlah'];
		}
	}
	if ($kursus >= 1) { $kursus = $kursus . " HARI"; }
	else { $kursus =  "0"; }
	$hari = floor($sesi / 6);
	$jam = $sesi - ($hari * 6);
	if ($hari >= 1) { $sesid = $hari . " HARI " . $jam . " JAM"; }
	elseif ($jam >= 1) { $sesid = $jam . " JAM"; }
	elseif ($sesi == "0.5") { $sesid = "30 MINIT"; }
	else { $sesid = "0"; }
	$sesi = str_replace(" 0 JAM","",str_replace(".5 JAM"," JAM 30 MINIT",$sesid));
	$hari = floor($kendiri / 6);
	$jam = $kendiri - ($hari * 6);
	if ($hari >= 1) { $sesid = $hari . " HARI " . $jam . " JAM"; }
	elseif ($jam >= 1) { $sesid = $jam . " JAM"; }
	elseif ($kendiri == "0.5") { $sesid = "30 MINIT"; }
	else { $sesid = "0"; }
	$kendiri = str_replace(" 0 JAM","",str_replace(".5 JAM"," JAM 30 MINIT",$sesid));
	$html .= '
  <tr>
    <td align="left" valign="top">Kursus/Latihan</td>
    <td align="center" valign="top">:</td>
    <td align="left" valign="top">' . $kursus . '</td>
  </tr>
  <tr>
    <td align="left" valign="top">Sesi Pembelajaran</td>
    <td align="center" valign="top">:</td>
    <td align="left" valign="top">' . $sesi . '</td>
  </tr>
  <tr>
    <td align="left" valign="top">Pembelajaran Kendiri</td>
    <td align="center" valign="top">:</td>
    <td align="left" valign="top">' . $kendiri . '</td>
  </tr>
</table>
<br>
<table width="750" border="1" cellpadding="5" cellspacing="0">
  <tr bgcolor="#FFFF00">
	<td width="46" align="center" valign="middle" nowrap="nowrap" bgcolor="#CCCCCC" class="bluhead1">Bil</td>
	<td width="457" height="10" align="left" valign="middle" nowrap="nowrap" bgcolor="#CCCCCC" class="bluhead1">Nama Kursus</td>
	<td width="209" align="center" valign="middle" nowrap="nowrap" bgcolor="#CCCCCC" class="bluhead1">Jumlah Hari</td>
  </tr>
  ';
	$kursus = 0;
	if ($bulan == "ALL") {
		$sb = "SELECT l.*, k.* 
			FROM latihan AS l, kursus AS k
			WHERE l.kids = k.kids
			AND l.unokp = '" . $tc['unokp'] . "' 
			AND k.kttamat RLIKE '" . $tahun . "' 
		";
		if ($status != "ALL") {
			$sb .= "AND l.lstatus = '" . input1($status) . "' ";
		}
		$sb .= "ORDER BY l.unokp ASC";
	}
	else {
		$sb = "SELECT l.*, k.* 
			FROM latihan AS l, kursus AS k
			WHERE l.kids = k.kids
			AND l.unokp = '" . $tc['unokp'] . "' 
			AND k.kttamat RLIKE '" . kosong($bulan,2)."/".$tahun . "' 
		";
		if ($status != "ALL") {
			$sb .= "AND l.lstatus = '" . input1($status) . "' ";
		}
		$sb .= "ORDER BY l.unokp ASC";
	}
	$db = mysql_query($sb) or die(mysql_error().$sb);
	while ($tb = mysql_fetch_array($db)) {
		$n = $n + 1;
		$kursus = $kursus + $tb['kjumlah'];
		$display = $tb['kjumlah'] . " HARI";
		$html .= '
		<tr>
		  <td align="center" valign="middle">' . $n .'</td>
		  <td align="left" valign="middle">' . output1(nl2br($tb['ktajuk'])) . '<br>' . output1($tb['ktmula']) . ' - ' . output1($tb['kttamat']) . '<br>' . output1($tb['klokasi']) . '</td>
		  <td width="219" align="center" valign="middle">' . $display . '</td>
		</tr>
	';
	}
	
	$sesi = 0;
	if ($bulan == "ALL") {
		$sb = "SELECT * FROM sesi
			WHERE unokp = '" . $tc['unokp'] . "'
			AND starikh RLIKE '" . $tahun . "' 
		";
		if ($status != "ALL") {
			$sb .= "AND sstatus = '" . input1($status) . "' ";
		}
		$sb .= "ORDER BY unokp ASC";
	}
	else {
		$sb = "SELECT * FROM sesi
			WHERE unokp = '" . $tc['unokp'] . "'
			AND starikh RLIKE '" . kosong($bulan,2)."/".$tahun . "' 
		";
		if ($status != "ALL") {
			$sb .= "AND sstatus = '" . input1($status) . "' ";
		}
		$sb .= "ORDER BY unokp ASC";
	}
	$db = mysql_query($sb);
	while ($tb = mysql_fetch_array($db)) {
		$n = $n + 1;
		$sesi = $sesi + $tb['sjumlah'];
		$hari = floor($tb['sjumlah'] / 6);
		$jam = $tb['sjumlah'] - ($hari * 6);
		if ($hari >= 1) { $sesid = $hari . " HARI " . $jam . " JAM"; }
		elseif ($jam >= 1) { $sesid = $jam . " JAM"; }
		elseif ($tb['sjumlah'] == "0.5") { $sesid = "30 MINIT"; }
		else { $sesid = "0"; }
			$html .= '
			<tr>
			  <td align="center" valign="middle">' . $n . '</td>
			  <td align="left" valign="middle">' . output1(nl2br($tb['stajuk'])) . "<br>" . output1($tb['starikh']) . "<br>" . output1($tb['stempat']) . '</td>
			  <td align="center" valign="middle">' . str_replace(" 0 JAM","",str_replace(".5 JAM"," JAM 30 MINIT",$sesid)) . '</td>
			</tr>
		';
	}
	
	$kendiri = 0;
	if ($bulan == "ALL") {
		$sb = "SELECT * FROM kendiri
			WHERE unokp = '" . $tc['unokp'] . "'
			AND dttamat RLIKE '" . $tahun . "' 
		";
		if ($status != "ALL") {
			$sb .= "AND dstatus = '" . input1($status) . "' ";
		}
		$sb .= "ORDER BY unokp ASC";
	}
	else {
		$sb = "SELECT * FROM kendiri
			WHERE unokp = '" . $tc['unokp'] . "'
			AND dttamat RLIKE '" . kosong($bulan,2)."/".$tahun . "' 
		";
		if ($status != "ALL") {
			$sb .= "AND dstatus = '" . input1($status) . "' ";
		}
		$sb .= "ORDER BY unokp ASC";
	}
	$db = mysql_query($sb);
	while ($tb = mysql_fetch_array($db)) {
		$n = $n + 1;
		if ($tb['djenis'] == 1) {
		  $sc = "SELECT * FROM epsa WHERE eids = '" . input2($tb['eids']) . "' ORDER BY eids ASC";
		  $dc = mysql_query($sc);
		  $tc = mysql_fetch_array($dc);
		  $tajuk = output1($tc['epsa']) . "<br>" . output1($tb['dtmula']) . " - " . output1($tb['dttamat']);
		}
		else {
		  $tajuk = output1(nl2br($tb['dtajuk'])); 
		}
		if (!empty($tb['dtempat'])) { $tajuk .= "<br>" . output1($tb['dtempat']); }
		if ($tb['djenis'] == 1) { 
			$kendiri = $kendiri + $tb['djumlah'];
			$display = $tb['djumlah'] . " JAM";
		}
		elseif ($tb['djenis'] == 2) { 
			$kendiri = $kendiri + 6;
			$display = "1 HARI";
		}
		elseif ($tb['djenis'] == 3) { 
			$kendiri = $kendiri + $tb['djumlah'];
			$display = hari(1,$tb['dtmula'],$tb['dttamat']) . " HARI";
		}
		$html .= '
		<tr>
		  <td align="center" valign="middle">' . $n . '</td>
		  <td align="left" valign="middle">' . $tajuk . '</td>
		  <td align="center" valign="middle">' . $display . '</td>
		</tr>
	';
	}
	if ($n) {
		$total = ($kursus * 6) + $sesi + $kendiri;
		$hari = floor($total / 6);
		$jam = $total - ($hari * 6);
		if ($hari >= 1) { $sesid = $hari . " HARI " . $jam . " JAM"; }
		elseif ($jam >= 1) { $sesid = $jam . " JAM"; }
		elseif ($total == "0.5") { $sesid = "30 MINIT"; }
		else { $sesid = "0"; }
		$display = str_replace(" 0 JAM","",str_replace(".5 JAM"," JAM 30 MINIT",$sesid));
		$html .= '
		<tr>
		  <td colspan="2" align="center" valign="middle"><b>Jumlah Keseluruhan Hari</b></td>
		  <td align="center" valign="middle"><b>' . $display . '</b></td>
		</tr>
	';
	}
  	if (!$n) {
	  $html .= '
	  <tr>
		<td colspan="3" align="center" valign="top">Tiada maklumat kursus</td>
	  </tr>
	  ';
  	}
$html .= '
</table>
<br />
</p>
</body>
</html>
';
include("../mpdf/mpdf.php");

$mpdf=new mPDF(); 

$mpdf->WriteHTML($html);
$mpdf->Output();
exit;
?>