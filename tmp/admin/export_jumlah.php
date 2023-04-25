<?php
$output = "Bil\tNama\tNo. Kad Pengenalan\tBahagian\tKumpulan Perkhidmatan\tKursus/Latihan\tSesi Pembelajaran\tPembelajaran Kendiri\tJumlah Hari\t\n";
if (!empty($_GET['tambah'])) { $tambah = $_GET['tambah']; }
else { $tambah = "1"; }
if (!empty($_GET['jumlah'])) { $jumlah = $_GET['jumlah']; }
else { $jumlah = "0"; }
if (!empty($_GET['bahagian'])) { $bahagian = $_GET['bahagian']; }
else { $bahagian = "ALL"; }
if (!empty($_GET['status'])) { $status = $_GET['status']; }
else { $status = "ALL"; }
if (!empty($_GET['bulan'])) { $bulan = $_GET['bulan']; }
else { $bulan = "ALL"; }
if (!empty($_GET['tahun'])) { $tahun = $_GET['tahun']; }
else { $tahun = date("Y"); }

if (isset($_GET['tahun'])) {
	if ($bahagian == "ALL") {
		$s = "SELECT u.*, p.*, b.* 
			FROM user AS u, kumpulan AS p, bahagian AS b
			WHERE u.pids = p.pids
			AND u.bids = b.bids
			AND u.usah = 1
			AND u.udelete = 1 
			AND u.ulevel < 4
			ORDER BY u.unama ASC
		";
	}
	else {
		$s = "SELECT u.*, p.*, b.* 
			FROM user AS u, kumpulan AS p, bahagian AS b
			WHERE u.pids = p.pids
			AND u.bids = b.bids
			AND u.usah = 1
			AND u.udelete = 1 
			AND u.ulevel < 4
			AND u.bids = '" . input2($bahagian) . "'
			ORDER BY u.unama ASC
		";
	}
}
else {
	$s = "SELECT * FROM user WHERE unama = 'JomTraining.Com.Zaki.123'";
}
$d = mysql_query($s);

$tkursus = 0;
$tsesi = 0;
$tkendiri = 0;
$total = 0;
while ($t = mysql_fetch_array($d)) {
	$kursus = 0;
	if ($bulan == "ALL") {
		$sb = "SELECT l.*, k.* 
			FROM latihan AS l, kursus AS k
			WHERE l.kids = k.kids
			AND l.unokp = '" . $t['unokp'] . "' 
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
			AND l.unokp = '" . $t['unokp'] . "' 
			AND k.kttamat RLIKE '" . kosong($bulan,2)."/".$tahun . "' 
		";
		if ($status != "ALL") {
			$sb .= "AND l.lstatus = '" . input1($status) . "' ";
		}
		$sb .= "ORDER BY l.unokp ASC";
	}
	$db = mysql_query($sb);
	while ($tb = mysql_fetch_array($db)) {
		$kursus = $kursus + $tb['kjumlah'] * 6;
		$tkursus = $tkursus + $tb['kjumlah'] * 6;
	}
	
	$sesi = 0;
	if ($bulan == "ALL") {
		$sb = "SELECT * FROM sesi
			WHERE unokp = '" . $t['unokp'] . "'
			AND starikh RLIKE '" . $tahun . "' 
		";
		if ($status != "ALL") {
			$sb .= "AND sstatus = '" . input1($status) . "' ";
		}
		$sb .= "ORDER BY unokp ASC";
	}
	else {
		$sb = "SELECT * FROM sesi
			WHERE unokp = '" . $t['unokp'] . "'
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
		$tsesi = $tsesi + $tb['sjumlah'];
	}

	$kendiri = 0;
	if ($bulan == "ALL") {
		$sb = "SELECT * FROM kendiri
			WHERE unokp = '" . $t['unokp'] . "'
			AND dttamat RLIKE '" . $tahun . "' 
		";
		if ($status != "ALL") {
			$sb .= "AND dstatus = '" . input1($status) . "' ";
		}
		$sb .= "ORDER BY unokp ASC";
	}
	else {
		$sb = "SELECT * FROM kendiri
			WHERE unokp = '" . $t['unokp'] . "'
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
			$tkendiri = $tkendiri + $tb['djumlah'];
		}
		elseif ($tb['djenis'] == 2) { 
			$kendiri = $kendiri + 6;
			$tkendiri = $tkendiri + 6;
		}
		elseif ($tb['djenis'] == 3) { 
			$kendiri = $kendiri + $tb['djumlah'];
			$tkendiri = $tkendiri + $tb['djumlah'];
		}
	}
	$total = $kursus + $sesi + $kendiri;
	if ($tambah == 1) {
		if ($total == ($jumlah * 6)) { $zaki = true; }
		else { $zaki = false; }
	}
	elseif ($tambah == 2) {
		if ($total < ($jumlah * 6)) { $zaki = true; }
		else { $zaki = false; }
	}
	elseif ($tambah == 3) {
		if ($total > ($jumlah * 6)) { $zaki = true; }
		else { $zaki = false; }
	}
	if ($zaki) {
		$n = $n + 1;
		if ($kursus >= 1) { $dkursus = ($kursus / 6) . " HARI"; }
		else { $dkursus = "0"; }
		$hari = floor($sesi / 6);
		$jam = $sesi - ($hari * 6);
		if ($hari >= 1) { $sesid = $hari . " HARI " . $jam . " JAM"; }
		elseif ($jam >= 1) { $sesid = $jam . " JAM"; }
		elseif ($sesi == "0.5") { $sesid = "30 MINIT"; }
		else { $sesid = "0"; }
		$dsesi = str_replace(" 0 JAM","",str_replace(".5 JAM"," JAM 30 MINIT",$sesid));
		$hari = floor($kendiri / 6);
		$jam = $kendiri - ($hari * 6);
		if ($hari >= 1) { $sesid = $hari . " HARI " . $jam . " JAM"; }
		elseif ($jam >= 1) { $sesid = $jam . " JAM"; }
		elseif ($kendiri == "0.5") { $sesid = "30 MINIT"; }
		else { $sesid = "0"; }
		$dkendiri = str_replace(" 0 JAM","",str_replace(".5 JAM"," JAM 30 MINIT",$sesid));
		$total = $kursus + $sesi + $kendiri;
		$ttotal = $ttotal + $total;
		$hari = floor($total / 6);
		$jam = $total - ($hari * 6);
		if ($hari >= 1) { $sesid = $hari . " HARI " . $jam . " JAM"; }
		elseif ($jam >= 1) { $sesid = $jam . " JAM"; }
		elseif ($total == "0.5") { $sesid = "30 MINIT"; }
		else { $sesid = "0"; }
		$dtotal = str_replace(" 0 JAM","",str_replace(".5 JAM"," JAM 30 MINIT",$sesid));
		$output .= $n . "\t" . output1($t['unama']) . "\t" . output1($t['unokp']) . "\t" . output1($t['bahagian']) . "\t" . output2($t['kumpulan']) . "\t" . $dkursus . "\t" . $dsesi . "\t" . $dkendiri . "\t" . $dtotal . "\t\n";
	}
}
header('Content-type: application/ms-excel');
header('Content-Disposition: attachment; filename=LaporanJumlah-'.date("Ymd_hia").'.xls');
print $output;
?>