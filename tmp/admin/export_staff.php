<?php
$output = "Bil\tTarikh Mendaftar\tNama Pegawai\tNo. Kad Pengenalan\tKumpulan Perkhidmatan\tUnit\tEmail\tStatus\t\n";
if (!empty($_GET['kumpulan'])) { $bahagian = $_GET['kumpulan']; }
else { $kumpulan = "ALL"; }
if (!empty($_GET['bahagian'])) { $bahagian = $_GET['bahagian']; }
else { $bahagian = "ALL"; }
if (!empty($_GET['pilihan'])) { $pilihan = $_GET['pilihan']; }
else { $pilihan = "1"; }
if (!empty($_GET['carian'])) { $carian = $_GET['carian']; }
else { $carian = "ALL"; }

if (!empty($_POST['carian'])) {
	if ($_POST['pilihan'] == 1) {
		$s = "SELECT u.*, b.*, p.*
			FROM user AS u, bahagian AS b, kumpulan AS p
			WHERE u.bids = b.bids
			AND u.pids = p.pids
			AND u.udelete = 1 
			AND u.usah = 1 
			AND u.ulevel > 1 
			AND u.unama RLIKE '" . input1($_POST['carian']) . "'
		";
		if ($bahagian != "ALL") {
			$s .= "AND u.bids = '" . input2($bahagian) . "' ";
		}
		
		if ($kumpulan != "ALL") {
			$s .= "AND u.pids = '" . input2($kumpulan) . "' ";

		}

		$s .= "ORDER BY u.utsah DESC";
	}
	else {
		$s = "SELECT u.*, b.*, p.*
			FROM user AS u, bahagian AS b, kumpulan AS p
			WHERE u.bids = b.bids
			AND u.pids = p.pids
			AND u.udelete = 1 
			AND u.usah = 1 
			AND u.ulevel > 1 
			AND u.unokp RLIKE '" . input1($_POST['carian']) . "'
		";
		if ($bahagian != "ALL") {
			$s .= "AND u.bids = '" . input2($bahagian) . "' ";
		}
		if ($kumpulan != "ALL") {
			$s .= "AND u.pids = '" . input2($kumpulan) . "' ";

		}

		$s .= "ORDER BY u.utsah DESC";
	}
}
else {
	$s = "SELECT u.*, b.*, p.*
		FROM user AS u, bahagian AS b, kumpulan AS p
		WHERE u.bids = b.bids
		AND u.pids = p.pids
		AND u.udelete = 1 
		AND u.usah = 1 
		AND u.ulevel > 1 
	";
	if ($bahagian != "ALL") {
		$s .= "AND u.bids = '" . input2($bahagian) . "' ";
	}
	if ($kumpulan != "ALL") {
		$s .= "AND u.pids = '" . input2($kumpulan) . "' ";

	}

	$s .= "ORDER BY u.utsah DESC";
}
/*
if ($pilihan == 1) {
	$s = "SELECT u.*, b.*, p.*
		FROM user AS u, bahagian AS b, kumpulan AS p
		WHERE u.bids = b.bids
		AND u.pids = p.pids
		AND u.udelete = 1 
		AND u.usah = 1 
		AND u.ulevel > 1 
		AND u.unama RLIKE '" . input1($carian) . "'
	";
	if ($bahagian != "ALL") {
		$s .= "AND u.bids = '" . input2($bahagian) . "' ";
	}
	if ($kumpulan != "ALL") {
		$s .= "AND u.pids = '" . input2($kumpulan) . "' ";

	}

	$s .= "ORDER BY u.utsah DESC";
}
else {
	$s = "SELECT u.*, b.*, p.*
		FROM user AS u, bahagian AS b, kumpulan AS p
		WHERE u.bids = b.bids
		AND u.pids = p.pids
		AND u.udelete = 1 
		AND u.usah = 1 
		AND u.ulevel > 1 
		AND u.unokp RLIKE '" . input1($carian) . "'
	";
	if ($bahagian != "ALL") {
		$s .= "AND u.bids = '" . input2($bahagian) . "' ";
	}
	if ($kumpulan != "ALL") {
		$s .= "AND u.pids = '" . input2($kumpulan) . "' ";

	}

	$s .= "ORDER BY u.utsah DESC";
}
*/
$d = mysql_query($s);

while ($t = mysql_fetch_array($d)) {
	$n = $n + 1;
	if ($t['ulevel'] == 2) { $status = "PENTADBIR"; }
	elseif ($t['ulevel'] == 3) { $status = "AKTIF"; }
	elseif ($t['ulevel'] == 4) { $status = "PASIF"; }
	else { $status = "&nbsp;"; }
	$output .= $n . "\t" . date("d/m/Y h:iA",output1($t['utsah'])) . "\t" . output1($t['unama']) . "\t" . output1($t['unokp']) . "\t" . output1($t['kumpulan']) . "\t" . output1($t['bahagian']) . "\t" . output1($t['uemail']) . "\t" . $status . "\t\n";
}
header('Content-type: application/ms-excel');
header('Content-Disposition: attachment; filename=LaporanStaff-'.date("Ymd_hia").'.xls');
print $output;
?>