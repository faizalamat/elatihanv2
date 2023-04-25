<?php
$output = "Bil\tNama\tNo. Kad Pengenalan\tKumpulan Perkhidmatan\tGred\tBahagian\tKod EPSA\tJumlah Hari/Jam EPSA\t\n";
if (!empty($_GET['kumpulan'])) { $kumpulan = $_GET['kumpulan']; }
else { $kumpulan = "ALL"; }
if (!empty($_GET['status'])) { $status = $_GET['status']; }
else { $status = "ALL"; }
if (!empty($_GET['bulan'])) { $bulan = $_GET['bulan']; }
else { $bulan = "ALL"; }
if (!empty($_GET['tahun'])) { $tahun = $_GET['tahun']; }
else { $tahun = date("Y"); }

if (isset($_GET['tahun'])) {
	if ($kumpulan == "ALL") {
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
			AND u.pids = '" . input2($kumpulan) . "'
			ORDER BY u.unama ASC
		";
	}
}
else {
	$s = "SELECT * FROM user WHERE unama = 'JomTraining.Com.Zaki.123'";
}
$d = mysql_query($s);

$tkendiri = 0;
while ($t = mysql_fetch_array($d)) {
	$n = $n + 1;
	if ($bulan == "ALL") {
		$sb = "SELECT * FROM kendiri
			WHERE unokp = '" . $t['unokp'] . "' 
			AND djenis = 1
			AND dttamat RLIKE '" . $tahun . "' 
		";
		if ($status != "ALL") {
			$sb .= "AND dstatus = '" . input1($status) . "' ";
		}
		$sb .= "ORDER BY dpada ASC";
	}
	else {
		$sb = "SELECT * FROM kendiri
			WHERE unokp = '" . $t['unokp'] . "' 
			AND djenis = 1
			AND dttamat RLIKE '" . kosong($bulan,2)."/".$tahun . "' 
		";
		if ($status != "ALL") {
			$sb .= "AND dstatus = '" . input1($status) . "' ";
		}
		$sb .= "ORDER BY dpada ASC";
	}
	$db = mysql_query($sb);
	$kendiri = 0;
	$kod = FALSE;
	while($tb = mysql_fetch_array($db)) {
		$sc = "SELECT * FROM epsa 
			WHERE eids = '" . $tb['eids'] . "'
			ORDER BY eids ASC
		";
		$dc = mysql_query($sc);
		$tc = mysql_fetch_array($dc);
		$kod[] = $tc['ekod'];
		$kendiri = $kendiri + $tb['djumlah'];
		$tkendiri = $tkendiri + $tb['djumlah'];
	}
	if ($kod) { $kad = implode(", ",$kod); }
	else { $kad = ""; }
	
	$hari = floor($kendiri / 6);
	$jam = $kendiri - ($hari * 6);
	if ($hari >= 1) { $sesid = $hari . " HARI " . $jam . " JAM"; }
	elseif ($jam >= 1) { $sesid = $jam . " JAM"; }
	elseif ($kendiri == "0.5") { $sesid = "30 MINIT"; }
	else { $sesid = "0"; }
	$dkendiri = str_replace(" 0 JAM","",str_replace(".5 JAM"," JAM 30 MINIT",$sesid));
	$output .= $n . "\t" . output1($t['unama']) . "\t" . output1($t['unokp']) . "\t" . output2($t['kumpulan']) . "\t" . output1($t['ugred']) . "\t" . output1($t['bahagian']) . "\t" . $kad . "\t" . $dkendiri . "\t\n";
}
header('Content-type: application/ms-excel');
header('Content-Disposition: attachment; filename=LaporanEPSA-'.date("Ymd_hia").'.xls');
print $output;
?>