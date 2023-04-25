<?php
if (!empty($_GET['bahagian'])) { $bahagian = $_GET['bahagian']; }
else { $bahagian = "ALL"; }
if (!empty($_GET['status'])) { $status = $_GET['status']; }
else { $status = "ALL"; }
if (!empty($_GET['bulan'])) { $bulan = $_GET['bulan']; }
else { $bulan = 1; }
if (!empty($_GET['tahun'])) { $tahun = $_GET['tahun']; }
else { $tahun = date("Y"); }
$html = '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.:: Sistem e-Latihan JPA ::.</title>
<style type="text/css">
BODY {
	MARGIN: 0px 0px 0px 0px; 
	FONT-SIZE: 12px; 
	FONT-FAMILY: Arial;
}
.text1 {
	FONT-SIZE: 13px; 
	FONT-FAMILY: Arial;
}
</style>
</head>
<body>
<table width="1000" border="0" cellspacing="0" cellpadding="2">
  <tr>
    <td align="center" clas="text1">
		<b>LAPORAN PEMANTAUAN KURSUS BAGI TAHUN ' . $tahun . '</b><br>
		Bahagian Istiadat dan Urusetia Persidangan Antarabangsa<br>
	</td>
  </tr>
  <tr>
    <td align="center" clas="text1">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" clas="text1">
		Jadual 3 - Pecahan Berdasarkan Tempoh Berkursus 7 Hari Sehingga '.bulan($bulan).' '.$tahun.' 
	</td>
  </tr>
</table>
<br />
<table width="1000" border="1" cellspacing="0" cellpadding="2">
    <tr>
      <td width="35" rowspan="2" align="center" valign="middle" bgcolor="#CCCCCC">BIL</td>
      <td width="126" rowspan="2" align="left" valign="middle" bgcolor="#CCCCCC">UNIT</td>
      <td colspan="5" height="30" align="center" valign="middle" bgcolor="#CCCCCC">BELUM HADIR KURSUS</td>
      <td colspan="5" align="center" valign="middle" bgcolor="#CCCCCC">KURANG DARI 7 HARI</td>
      <td width="50" rowspan="2" align="center" valign="middle" bgcolor="#CCCCCC">JUMLAH HARI BERKURSUS</td>
      <td colspan="5" align="center" valign="middle" bgcolor="#CCCCCC">7 HARI DAN LEBIH</td>
      <td width="50" rowspan="2" align="center" valign="middle" bgcolor="#CCCCCC">JUMLAH HARI BERKURSUS</td>
    </tr>
    <tr>
      <td width="40" height="30" align="center" valign="middle" bgcolor="#CCCCCC">PENGURUSAN<br />
      TERTINGGI</td>
      <td width="40" align="center" valign="middle" bgcolor="#CCCCCC">P&amp;P</td>
      <td width="40" align="center" valign="middle" bgcolor="#CCCCCC">SOK.1</td>
      <td width="40" align="center" valign="middle" bgcolor="#CCCCCC">SOK.2</td>
      <td width="50" align="center" valign="middle" bgcolor="#CCCCCC">JUMLAH <br />
      PEGAWAI</td>
      <td align="center" valign="middle" bgcolor="#CCCCCC">PENGURUSAN<br />
TERTINGGI</td>
      <td align="center" valign="middle" bgcolor="#CCCCCC">P&amp;P</td>
      <td align="center" valign="middle" bgcolor="#CCCCCC">SOK.1</td>
      <td align="center" valign="middle" bgcolor="#CCCCCC">SOK.2</td>
      <td align="center" valign="middle" bgcolor="#CCCCCC">JUMLAH <br />
      PEGAWAI</td>
      <td align="center" valign="middle" bgcolor="#CCCCCC">PENGURUSAN<br />
TERTINGGI</td>
      <td align="center" valign="middle" bgcolor="#CCCCCC">P&amp;P</td>
      <td align="center" valign="middle" bgcolor="#CCCCCC">SOK.1</td>
      <td align="center" valign="middle" bgcolor="#CCCCCC">SOK.2</td>
      <td align="center" valign="middle" bgcolor="#CCCCCC">JUMLAH <br />
      PEGAWAI</td>
    </tr>
    ';
	$s = "SELECT * FROM user 
		WHERE ulevel <> 1 
		AND usah = 1 
		AND udelete = 1 
	";
	if ($bahagian != "ALL") {
		$s .= "AND bids = '" . input2($bahagian) . "' ";
	}
	$s .= "ORDER BY unokp ASC";
	$d = mysql_query($s);
	$staff = mysql_num_rows($d);
	
	$sa = "SELECT * FROM bahagian 
		WHERE bdelete = 1 
	";
	if ($bahagian != "ALL") {
		$sa .= "AND bids = '" . input2($bahagian) . "' ";
	}
	$sa .= "ORDER BY bahagian ASC";
	$da = mysql_query($sa);
	$tpt1 = 0;
	$tpt2 = 0;
	$tpt3 = 0;
	$tpp1 = 0;
	$tpp2 = 0;
	$tpp3 = 0;
	$tsp1 = 0;
	$tsp2 = 0;
	$tsp3 = 0;
	$tsk1 = 0;
	$tsk2 = 0;
	$tsk3 = 0;
	$ttk2 = 0;
	$ttk3 = 0;
	while ($ta = mysql_fetch_array($da)) {
		$n = $n + 1;
		$pt1 = 0;
		$pt2 = 0;
		$pt3 = 0;
		$pp1 = 0;
		$pp2 = 0;
		$pp3 = 0;
		$sp1 = 0;
		$sp2 = 0;
		$sp3 = 0;
		$sk1 = 0;
		$sk2 = 0;
		$sk3 = 0;
		$tk2 = 0;
		$tk3 = 0;
		$html .= '
	  <tr>
		<td height="30" align="center" valign="middle">' . $n . '</td>
		<td align="left" valign="middle">' . output1($ta['bahagian']) . '</td>
		';
	  $s = "SELECT u.*, p.*
		FROM user AS u, kumpulan AS p
		WHERE u.pids = p.pids
		AND p.kumpulan = 'PENGURUSAN TERTINGGI' 
		AND u.ulevel <> 1 
		AND u.usah = 1 
		AND u.udelete = 1 
		AND u.bids = '" . input2($ta['bids']) . "'
		ORDER BY u.unokp ASC
	  ";
	  $d = mysql_query($s);
	  while ($t = mysql_fetch_array($d)) {
		  $kursus = 0;
		  $sesi = 0;
		  $kendiri = 0;
		  if (isset($_GET['bulan'])) {
			  $bun = $bulan + 1;
			  $bln1 = strtotime("1/1/".$tahun);
			  $bln2 = mktime(0,0,0,$bun,1,$tahun);
		  }
		  else {
			  $bln1 = strtotime("1/1/".$tahun);
			  $bln2 = strtotime("2/1/".$tahun);
		  }
			$sb = "SELECT k.*,l.* 
				FROM kursus AS k, latihan AS l
				WHERE k.kids = l.kids
				AND l.unokp = '" . $t['unokp'] . "'
				AND k.kttamat2 >= '" . $bln1 . "'
				AND k.kttamat2 < '" . $bln2 . "'
			";
			if ($status != "ALL") {
				$sb .= "AND l.lstatus = '" . input1($status) . "' ";
			}
			$sb .= "ORDER BY l.lids ASC";
			$db = mysql_query($sb);
			while($tb = mysql_fetch_array($db)) {
				$kursus = $kursus + $tb['kjumlah'] * 6;
			}

			$sb = "SELECT * FROM sesi
				WHERE unokp = '" . $t['unokp'] . "'
				AND starikh2 >= '" . $bln1 . "'
				AND starikh2 < '" . $bln2 . "'
			";
			if ($status != "ALL") {
				$sb .= "AND sstatus = '" . input1($status) . "' ";
			}
			$sb .= "ORDER BY sids ASC";
			$db = mysql_query($sb);
			while ($tb = mysql_fetch_array($db)) {
				$sesi = $sesi + $sesi + $tb['sjumlah'];
			}

			$sb = "SELECT * FROM kendiri
				WHERE unokp = '" . $t['unokp'] . "'
				AND dttamat2 >= '" . $bln1 . "'
				AND dttamat2 < '" . $bln2 . "'
			";
			if ($status != "ALL") {
				$sb .= "AND dstatus = '" . input1($status) . "' ";
			}
			$sb .= "ORDER BY dids ASC";
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
			
			$total = $kursus + $sesi + $kendiri;
			if ($total < 1) {
				$pt1 = $pt1 + 1;
				$tpt1 = $tpt1 + 1;
			}
			elseif ($total >= 1 && $total < 43) {
				$pt2 = $pt2 + 1;
				$tpt2 = $tpt2 + 1;
				$tk2 = $tk2 + $total;
				$ttk2 = $ttk2 + floor($total / 6);
			}
			elseif ($total >= 43 ) {
				$pt3 = $pt3 + 1;
				$tpt3 = $tpt3 + 1;
				$tk3 = $tk3 + $total;
				$ttk3 = $ttk3 + floor($total / 6);
			}
	  }
	  
	  //pegawai kumpulan pengurusan & profesional
	  $s = "SELECT u.*, p.*
		FROM user AS u, kumpulan AS p
		WHERE u.pids = p.pids
		AND p.kumpulan = 'PENGURUSAN &amp; PROFESIONAL' 
		AND u.ulevel <> 1 
		AND u.usah = 1 
		AND u.udelete = 1 
		AND u.bids = '" . input2($ta['bids']) . "'
		ORDER BY u.unokp ASC
	  ";
	  $d = mysql_query($s);
	  while ($t = mysql_fetch_array($d)) {
		  $kursus = 0;
		  $sesi = 0;
		  $kendiri = 0;
		  if (isset($_GET['bulan'])) {
			  $bun = $bulan + 1;
			  $bln1 = strtotime("1/1/".$tahun);
			  $bln2 = mktime(0,0,0,$bun,1,$tahun);
		  }
		  else {
			  $bln1 = strtotime("1/1/".$tahun);
			  $bln2 = strtotime("2/1/".$tahun);
		  }
			$sb = "SELECT k.*,l.* 
				FROM kursus AS k, latihan AS l
				WHERE k.kids = l.kids
				AND l.unokp = '" . $t['unokp'] . "'
				AND k.kttamat2 >= '" . $bln1 . "'
				AND k.kttamat2 < '" . $bln2 . "'
			";
			if ($status != "ALL") {
				$sb .= "AND l.lstatus = '" . input1($status) . "' ";
			}
			$sb .= "ORDER BY l.lids ASC";
			$db = mysql_query($sb);
			while($tb = mysql_fetch_array($db)) {
				$kursus = $kursus + $tb['kjumlah'] * 6;
			}


			$sb = "SELECT * FROM sesi
				WHERE unokp = '" . $t['unokp'] . "'
				AND starikh2 >= '" . $bln1 . "'
				AND starikh2 < '" . $bln2 . "'
			";
			if ($status != "ALL") {
				$sb .= "AND sstatus = '" . input1($status) . "' ";
			}
			$sb .= "ORDER BY sids ASC";
			$db = mysql_query($sb);
			while ($tb = mysql_fetch_array($db)) {
				$sesi = $sesi + $sesi + $tb['sjumlah'];
			}

			$sb = "SELECT * FROM kendiri
				WHERE unokp = '" . $t['unokp'] . "'
				AND dttamat2 >= '" . $bln1 . "'
				AND dttamat2 < '" . $bln2 . "'
			";
			if ($status != "ALL") {
				$sb .= "AND dstatus = '" . input1($status) . "' ";
			}
			$sb .= "ORDER BY dids ASC";
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
			
			$total = $kursus + $sesi + $kendiri;
			if ($total < 1) {
				$pp1 = $pp1 + 1;
				$tpp1 = $tpp1 + 1;
			}
			elseif ($total >= 1 && $total < 43) {
				$pp2 = $pp2 + 1;
				$tpp2 = $tpp2 + 1;
				$tk2 = $tk2 + $total;
				$ttk2 = $ttk2 + floor($total / 6);
			}
			elseif ($total >= 43 ) {
				$pp3 = $pp3 + 1;
				$tpp3 = $tpp3 + 1;
				$tk3 = $tk3 + $total;
				$ttk3 = $ttk3 + floor($total / 6);
			}
	  }
	  
	  //pegawai kumpulan sokongan I
	  $s = "SELECT u.*, p.*
		FROM user AS u, kumpulan AS p
		WHERE u.pids = p.pids
		AND p.kumpulan = 'SOKONGAN I' 
		AND u.ulevel <> 1 
		AND u.usah = 1 
		AND u.udelete = 1 
		AND u.bids = '" . input2($ta['bids']) . "'
		ORDER BY u.unokp ASC
	  ";
	  $d = mysql_query($s);
	  while ($t = mysql_fetch_array($d)) {
		  $kursus = 0;
		  $sesi = 0;
		  $kendiri = 0;
		  if (isset($_GET['bulan'])) {
			  $bun = $bulan + 1;
			  $bln1 = strtotime("1/1/".$tahun);
			  $bln2 = mktime(0,0,0,$bun,1,$tahun);
		  }
		  else {
			  $bln1 = strtotime("1/1/".$tahun);
			  $bln2 = strtotime("2/1/".$tahun);
		  }
			$sb = "SELECT k.*,l.* 
				FROM kursus AS k, latihan AS l
				WHERE k.kids = l.kids
				AND l.unokp = '" . $t['unokp'] . "'
				AND k.kttamat2 >= '" . $bln1 . "'
				AND k.kttamat2 < '" . $bln2 . "'
			";
			if ($status != "ALL") {
				$sb .= "AND l.lstatus = '" . input1($status) . "' ";
			}
			$sb .= "ORDER BY l.lids ASC";
			$db = mysql_query($sb);
			while($tb = mysql_fetch_array($db)) {
				$kursus = $kursus + $tb['kjumlah'] * 6;
			}

			$sb = "SELECT * FROM sesi
				WHERE unokp = '" . $t['unokp'] . "'
				AND starikh2 >= '" . $bln1 . "'
				AND starikh2 < '" . $bln2 . "'
			";
			if ($status != "ALL") {
				$sb .= "AND sstatus = '" . input1($status) . "' ";
			}
			$sb .= "ORDER BY sids ASC";
			$db = mysql_query($sb);
			while ($tb = mysql_fetch_array($db)) {
				$sesi = $sesi + $sesi + $tb['sjumlah'];
			}

			$sb = "SELECT * FROM kendiri
				WHERE unokp = '" . $t['unokp'] . "'
				AND dttamat2 >= '" . $bln1 . "'
				AND dttamat2 < '" . $bln2 . "'
			";
			if ($status != "ALL") {
				$sb .= "AND dstatus = '" . input1($status) . "' ";
			}
			$sb .= "ORDER BY dids ASC";
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
			
			$total = $kursus + $sesi + $kendiri;
			if ($total < 1) {
				$sp1 = $sp1 + 1;
				$tsp1 = $tsp1 + 1;
			}
			elseif ($total >= 1 && $total < 43) {
				$sp2 = $sp2 + 1;
				$tsp2 = $tsp2 + 1;
				$tk2 = $tk2 + $total;
				$ttk2 = $ttk2 + floor($total / 6);
			}
			elseif ($total >= 43 ) {
				$sp3 = $sp3 + 1;
				$tsp3 = $tsp3 + 1;
				$tk3 = $tk3 + $total;
				$ttk3 = $ttk3 + floor($total / 6);
			}
	  }
	  
	  //pegawai kumpulan sokongan II
	  $s = "SELECT u.*, p.*
		FROM user AS u, kumpulan AS p
		WHERE u.pids = p.pids
		AND p.kumpulan = 'SOKONGAN II' 
		AND u.ulevel <> 1 
		AND u.usah = 1 
		AND u.udelete = 1 
		AND u.bids = '" . input2($ta['bids']) . "'
		ORDER BY u.unokp ASC
	  ";
	  $d = mysql_query($s);
	  while ($t = mysql_fetch_array($d)) {
		  $kursus = 0;
		  $sesi = 0;
		  $kendiri = 0;
		  if (isset($_GET['bulan'])) {
			  $bun = $bulan + 1;
			  $bln1 = strtotime("1/1/".$tahun);
			  $bln2 = mktime(0,0,0,$bun,1,$tahun);
		  }
		  else {
			  $bln1 = strtotime("1/1/".$tahun);
			  $bln2 = strtotime("2/1/".$tahun);
		  }
			$sb = "SELECT k.*,l.* 
				FROM kursus AS k, latihan AS l
				WHERE k.kids = l.kids
				AND l.unokp = '" . $t['unokp'] . "'
				AND k.kttamat2 >= '" . $bln1 . "'
				AND k.kttamat2 < '" . $bln2 . "'
			";
			if ($status != "ALL") {
				$sb .= "AND l.lstatus = '" . input1($status) . "' ";
			}
			$sb .= "ORDER BY l.lids ASC";
			$db = mysql_query($sb);
			while($tb = mysql_fetch_array($db)) {
				$kursus = $kursus + $tb['kjumlah'] * 6;
			}

			$sb = "SELECT * FROM sesi
				WHERE unokp = '" . $t['unokp'] . "'
				AND starikh2 >= '" . $bln1 . "'
				AND starikh2 < '" . $bln2 . "'
			";
			if ($status != "ALL") {
				$sb .= "AND sstatus = '" . input1($status) . "' ";
			}
			$sb .= "ORDER BY sids ASC";
			$db = mysql_query($sb);
			while ($tb = mysql_fetch_array($db)) {
				$sesi = $sesi + $sesi + $tb['sjumlah'];
			}

			$sb = "SELECT * FROM kendiri
				WHERE unokp = '" . $t['unokp'] . "'
				AND dttamat2 >= '" . $bln1 . "'
				AND dttamat2 < '" . $bln2 . "'
			";
			if ($status != "ALL") {
				$sb .= "AND dstatus = '" . input1($status) . "' ";
			}
			$sb .= "ORDER BY dids ASC";
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
			
			$total = $kursus + $sesi + $kendiri;
			if ($total < 1) {
				$sk1 = $sk1 + 1;
				$tsk1 = $tsk1 + 1;
			}
			elseif ($total >= 1 && $total < 43) {
				$sk2 = $sk2 + 1;
				$tsk2 = $tsk2 + 1;
				$tk2 = $tk2 + $total;
				$ttk2 = $ttk2 + floor($total / 6);
			}
			elseif ($total >= 43 ) {
				$sk3 = $sk3 + 1;
				$tsk3 = $tsk3 + 1;
				$tk3 = $tk3 + $total;
				$ttk3 = $ttk3 + floor($total / 6);
			}
	  }
		$jps1 = $pt1 + $pp1 + $sp1 + $sk1; 
		$jps2 = $pt2 + $pp2 + $sp2 + $sk2;
		$jps3 = $pt3 + $pp3 + $sp3 + $sk3; 
		$html .= '
		<td align="center" valign="middle">' . $pt1 . '</td>
		<td align="center" valign="middle">' . $pp1 . '</td>
		<td align="center" valign="middle">' . $sp1 . '</td>
		<td align="center" valign="middle">' . $sk1 . '</td>
		<td align="center" valign="middle">' . $jps1 . '</td>
		<td align="center" valign="middle">' . $pt2 . '</td>
		<td align="center" valign="middle">' . $pp2 . '</td>
		<td align="center" valign="middle">' . $sp2 . '</td>
		<td align="center" valign="middle">' . $sk2 . '</td>
		<td align="center" valign="middle">' . $jps2 . '</td>
		<td align="center" valign="middle">' . floor($tk2 / 6) . '</td>
		<td align="center" valign="middle">' . $pt3 . '</td>
		<td align="center" valign="middle">' . $pp3 . '</td>
		<td align="center" valign="middle">' . $sp3 . '</td>
		<td align="center" valign="middle">' . $sk3 . '</td>
		<td align="center" valign="middle">' . $jps3 . '</td>
		<td align="center" valign="middle">' . floor($tk3 / 6) . '</td>
	  </tr>
	';
	}
	$tjps1 = $tpt1 + $tpp1 + $tsp1 + $tsk1;
	$tjps2 = $tpt2 + $tpp2 + $tsp2 + $tsk2;
	$tjps3 = $tpt3 + $tpp3 + $tsp3 + $tsk3;
	if ($staff >= 1) {
		$pr1 = round(($tpt1 + $tpp1 + $tsp1 + $tsk1) / $staff * 100);
		$pr2 = round(($tpt2 + $tpp2 + $tsp2 + $tsk2) / $staff * 100);
		$pr3 = round(($tpt3 + $tpp3 + $tsp3 + $tsk3) / $staff * 100);
	}
	else { 
		$pr1 = "0"; 
		$pr2 = "0"; 
		$pr3 = "0"; 
	}
	$html .= '
  <tr>
    <td colspan="2" height="30" align="center" valign="middle">JUMLAH</td>
    <td align="center" valign="middle">' . $tpt1 . '</td>
    <td align="center" valign="middle">' . $tpp1 . '</td>
    <td align="center" valign="middle">' . $tsp1 . '</td>
    <td align="center" valign="middle">' . $tsk1 . '</td>
    <td align="center" valign="middle">' . $tjps1 . '</td>
    <td align="center" valign="middle">' . $tpt2 . '</td>
    <td align="center" valign="middle">' . $tpp2 . '</td>
    <td align="center" valign="middle">' . $tsp2 . '</td>
    <td align="center" valign="middle">' . $tsk2 . '</td>
    <td align="center" valign="middle">' . $tjps2 . '</td>
    <td align="center" valign="middle">' . $ttk2 . '</td>
    <td align="center" valign="middle">' . $tpt3 . '</td>
    <td align="center" valign="middle">' . $tpp3 . '</td>
    <td align="center" valign="middle">' . $tsp3 . '</td>
    <td align="center" valign="middle">' . $tsk3 . '</td>
    <td align="center" valign="middle">' . $tjps3 . '</td>
    <td align="center" valign="middle">' . $ttk3 . '</td>
  </tr>
  <tr>
    <td colspan="6" height="30" align="center" valign="middle">PERATUS KESELURUHAN</td>
    <td align="center" valign="middle">' . $pr1 . '%</td>
    <td colspan="4" align="center" valign="middle">&nbsp;</td>
    <td align="center" valign="middle">' . $pr2 . '%</td>
    <td colspan="5" align="center" valign="middle">&nbsp;</td>
    <td align="center" valign="middle">&nbsp;</td>
    <td align="center" valign="middle">' . $pr3 . '%</td>
  </tr>
</table>
';
if ($staff >= 1) {
	$kursus = $tjps1 + $tjps2 + $tjps3;
	$okursus = $tjps2 + $tjps3;
	$hkursus = $ttk2 + $ttk3;
	if ($okursus != 0) { 
		$pkursus = round(($hkursus / ($kursus * 7) * 100),2); 
		$phkursus = round(($hkursus / $okursus),2);
	}
	else { 
		$pkursus = 0; 
		$phkursus = 0;
	}
	if ($kursus != 0) { $pokursus = round(($hkursus / $kursus),2); }
	else { $pokursus = 0; }
}
else {
	$kursus = 0;
	$okursus = 0;
	$hkursus = 0;
	$pkursus = 0;
	$phkursus = 0;
	$pokursus = 0;
}
$html .='
<table width="1000" border="0" cellspacing="0" cellpadding="3">
  <tr>
    <td colspan="3" align="left" valign="middle">Sasaran Keseluruhan Hari Berkursus Warga BIUPA Mengikut Dasar Latihan 7 Hari Setahun : <b>' . ($kursus * 7) . ' Hari</b></td>
  </tr>
  <tr>
    <td colspan="3" align="left" valign="middle">&nbsp;</td>
  </tr>
  <tr>
    <td width="470" align="left" valign="middle">Pencapaian Hari Berkursus Sehingga : <b>'.bulan($bulan).' '.$tahun.'</b></td>
    <td width="42" align="left" valign="middle">&nbsp;</td>
    <td width="470" align="left" valign="middle">Peratus Pencapaian Keseluruhan Hari Berkursus : <b>'.$pkursus.'%</td>
  </tr>
  <tr>
    <td align="left" valign="middle">Jumlah Pegawai Berkursus : <b>'.$okursus.' Orang</b></td>
    <td align="left" valign="middle">&nbsp;</td>
    <td align="left" valign="middle">Purata Hari Berkursus Bagi Warga BIUPA Yang Berkursus : <b>'.$phkursus.'%</b></td>
  </tr>
  <tr>
    <td align="left" valign="middle">Jumlah Keseluruhan Hari Berkursus : <b>'.$hkursus.' Hari</b></td>
    <td align="left" valign="middle">&nbsp;</td>
    <td align="left" valign="middle">Purata Hari Berkursus Bagi Keseluruhan Warga BIUPA : <b>'.$pokursus.'%</b></td>
  </tr>
  <!--<tr>
    <td align="left" valign="middle">Jumlah Perbelanjaan Kursus Bagi Sektor Pembangunan Sumber Manusia : RM</td>
    <td align="left" valign="middle">&nbsp;</td>
    <td align="left" valign="middle">Peratus Perbelanjaan Kursus Bagi Seksyen Latihan &amp; Kompetensi : </td>
  </tr> -->
</table>
</body>
</html>
';
include("../mpdf/mpdf.php");

$mpdf=new mPDF('','A4-L');

$mpdf->WriteHTML($html);
$mpdf->Output();
exit;
?>