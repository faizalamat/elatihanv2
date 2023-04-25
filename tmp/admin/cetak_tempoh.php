<?php
if (!empty($_GET['bahagian'])) { $bahagian = $_GET['bahagian']; }
else { $bahagian = "ALL"; }
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
    <td align="center" class="text1"><b>BILANGAN HARI BERKURSUS BAGI PEGAWAI YANG BERKHIDMAT DI JABATAN/ AGENSI MENGIKUT TEMPOH PENEMPATAN DI JPM BAGI TAHUN ' . $tahun . '</b></td>
  </tr>
</table>
<br />
<table width="1000" border="0" cellspacing="0" cellpadding="2">
  <tr>
    <td align="left" class="text1">Jabatan/ Agensi: Jabatan Perkhidmatan Awam</td>
  </tr>
</table>
<br>
<table width="1000" border="1" cellpadding="2" cellspacing="0">
  <tr>
	<td width="35" rowspan="4" align="center" valign="middle" bgcolor="#CCCCCC">BIL</td>
	<td width="49" rowspan="4" align="center" valign="middle" bgcolor="#CCCCCC">KUMPULAN GRED</td>
	<td colspan="27" height="30" align="center" valign="middle" bgcolor="#CCCCCC">BILANGAN PEGAWAI MENGIKUT HARI BERKURSUS BERDASARKAN TEMPOH PENEMPATAN DI JPM</td>
	<td width="59" rowspan="4" align="center" valign="middle" bgcolor="#CCCCCC">JUMLAH<br />
    PEGAWAI</td>
  </tr>
  <tr>
	<td height="30" colspan="9" align="center" valign="middle" bgcolor="#CCCCCC"> TEMPOH PENEMPATAN<br />
    1 - 6 BULAN</td>
	<td colspan="9" align="center" valign="middle" bgcolor="#CCCCCC">TEMPOH PENEMPATAN<br />
7 - 12 BULAN</td>
	<td colspan="9" align="center" valign="middle" bgcolor="#CCCCCC">TEMPOH PENEMPATAN<br /> 
	  1 TAHUN @ LEBIH</td>
  </tr>
  <tr>
	<td height="30" colspan="9" align="center" valign="middle" bgcolor="#CCCCCC">(BIL HARI BERKURSUS)</td>
	<td colspan="9" align="center" valign="middle" bgcolor="#CCCCCC">(BIL HARI BERKURSUS)</td>
	<td colspan="9" align="center" valign="middle" bgcolor="#CCCCCC">(BIL HARI BERKURSUS)</td>
  </tr>
  <tr>
	<td width="25" height="30" align="center" valign="middle" bgcolor="#CCCCCC">0</td>
	<td width="25" align="center" valign="middle" bgcolor="#CCCCCC">1</td>
	<td width="25" align="center" valign="middle" bgcolor="#CCCCCC">2</td>
	<td width="25" align="center" valign="middle" bgcolor="#CCCCCC">3</td>
	<td width="25" align="center" valign="middle" bgcolor="#CCCCCC">4</td>
	<td width="25" align="center" valign="middle" bgcolor="#CCCCCC">5</td>
	<td width="25" align="center" valign="middle" bgcolor="#CCCCCC">6</td>
	<td width="25" align="center" valign="middle" bgcolor="#CCCCCC">7</td>
	<td width="25" align="center" valign="middle" bgcolor="#CCCCCC">&gt;7</td>
	<td width="25" align="center" valign="middle" bgcolor="#CCCCCC">0</td>
	<td width="25" align="center" valign="middle" bgcolor="#CCCCCC">1</td>
	<td width="25" align="center" valign="middle" bgcolor="#CCCCCC">2</td>
	<td width="25" align="center" valign="middle" bgcolor="#CCCCCC">3</td>
	<td width="25" align="center" valign="middle" bgcolor="#CCCCCC">4</td>
	<td width="25" align="center" valign="middle" bgcolor="#CCCCCC">5</td>
	<td width="25" align="center" valign="middle" bgcolor="#CCCCCC">6</td>
	<td width="25" align="center" valign="middle" bgcolor="#CCCCCC">7</td>
	<td width="25" align="center" valign="middle" bgcolor="#CCCCCC">&gt;7</td>
	<td width="25" align="center" valign="middle" bgcolor="#CCCCCC">0</td>
	<td width="25" align="center" valign="middle" bgcolor="#CCCCCC">1</td>
	<td width="25" align="center" valign="middle" bgcolor="#CCCCCC">2</td>
	<td width="25" align="center" valign="middle" bgcolor="#CCCCCC">3</td>
	<td width="25" align="center" valign="middle" bgcolor="#CCCCCC">4</td>
	<td width="25" align="center" valign="middle" bgcolor="#CCCCCC">5</td>
	<td width="25" align="center" valign="middle" bgcolor="#CCCCCC">6</td>
	<td width="25" align="center" valign="middle" bgcolor="#CCCCCC">7</td>
	<td width="25" align="center" valign="middle" bgcolor="#CCCCCC">&gt;7</td>
  </tr>
  ';
	$sa = "SELECT * FROM kumpulan WHERE pdelete = 1 ORDER BY pid ASC";
	$da = mysql_query($sa);
	$tstaff1 = 0;
	$tstaff2 = 0;
	$tstaff3 = 0;
	$tstaff4 = 0;
	$tstaff5 = 0;
	$tstaff6 = 0;
	$tstaff7 = 0;
	$tstaff8 = 0;
	$tstaff9 = 0;
	$tst1 = 0;
	$tst2 = 0;
	$tst3 = 0;
	$tst4 = 0;
	$tst5 = 0;
	$tst6 = 0;
	$tst7 = 0;
	$tst8 = 0;
	$tst9 = 0;
	$tsf1 = 0;
	$tsf2 = 0;
	$tsf3 = 0;
	$tsf4 = 0;
	$tsf5 = 0;
	$tsf6 = 0;
	$tsf7 = 0;
	$tsf8 = 0;
	$tsf9 = 0;
	while ($ta = mysql_fetch_array($da)) {
		$n = $n + 1;
		$html .= '
		  <tr>
			<td height="30" align="center" valign="middle">' . $n . '</td>
			<td align="center" valign="middle">' . output1($ta['kumpulan']) . '</td>
			';
		  //senarai staff ikut kumpulan
		  $s = "SELECT * FROM user 
			WHERE pids = '" . $ta['pids'] . "' 
			AND ulevel <> 1 
			AND usah = 1 
			AND udelete = 1 
		  ";
		  if ($bahagian != "ALL") {
			  $s .= "AND bids = '" . input2($bahagian) . "' ";
		  }
		  $s .= "ORDER BY unokp ASC";
		  $d = mysql_query($s);
		  $staff1 = 0;
		  $staff2 = 0;
		  $staff3 = 0;
		  $staff4 = 0;
		  $staff5 = 0;
		  $staff6 = 0;
		  $staff7 = 0;
		  $staff8 = 0;
		  $staff9 = 0;
		  $st1 = 0;
		  $st2 = 0;
		  $st3 = 0;
		  $st4 = 0;
		  $st5 = 0;
		  $st6 = 0;
		  $st7 = 0;
		  $st8 = 0;
		  $st9 = 0;
		  $sf1 = 0;
		  $sf2 = 0;
		  $sf3 = 0;
		  $sf4 = 0;
		  $sf5 = 0;
		  $sf6 = 0;
		  $sf7 = 0;
		  $sf8 = 0;
		  $sf9 = 0;
		  while ($t = mysql_fetch_array($d)) {
			  $kursus = 0;
			  $sesi = 0;
			  $kendiri = 0;
			  if (!empty($t['utpenempatan'])) {
				  if (isset($_POST['bulan'])) {
					  $bun = $bulan + 1;
					  $bln1 = strtotime("1/1/".$tahun);
					  $bln2 = mktime(0,0,0,$bun,1,$tahun);
				  }
				  else {
					  $bln1 = strtotime("1/1/".$tahun);
					  $bln2 = strtotime("2/1/".$tahun);
				  }
				  //senarai staff penempatan < 7 bulan)
				  if (tempat($t['utpenempatan'],date("d/m/Y")) < 182) { 
					$sb = "SELECT k.*,l.* 
						FROM kursus AS k, latihan AS l
						WHERE k.kids = l.kids
						AND l.unokp = '" . $t['unokp'] . "'
						AND k.kttamat2 >= '" . $bln1 . "'
						AND k.kttamat2 < '" . $bln2 . "'
						AND l.lstatus = 2
						ORDER BY l.lids ASC
					";
					$db = mysql_query($sb);
					while($tb = mysql_fetch_array($db)) {
						$kursus = $kursus + $tb['kjumlah'] * 6;
					}

					$sb = "SELECT * FROM sesi
						WHERE unokp = '" . $t['unokp'] . "'
						AND starikh2 >= '" . $bln1 . "'
						AND starikh2 < '" . $bln2 . "'
						AND sstatus = 2
						ORDER BY sids ASC
					";
					$db = mysql_query($sb);
					while ($tb = mysql_fetch_array($db)) {
						$sesi = $sesi + $sesi + $tb['sjumlah'];
					}

					$sb = "SELECT * FROM kendiri
						WHERE unokp = '" . $t['unokp'] . "'
						AND dttamat2 >= '" . $bln1 . "'
						AND dttamat2 < '" . $bln2 . "'
						AND dstatus = 2
						ORDER BY dids ASC
					";
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
					if ($total < 6) {
						$staff1 = $staff1 + 1;
						$tstaff1 = $tstaff1 + 1;
					}
					elseif ($total >= 6 && $total < 12 ) {
						$staff2 = $staff2 + 1;
						$tstaff2 = $tstaff2 + 1;
					}
					elseif ($total >= 12 && $total < 18 ) {
						$staff3 = $staff3 + 1;
						$tstaff3 = $tstaff3 + 1;
					}
					elseif ($total >= 18 && $total < 24 ) {
						$staff4 = $staff4 + 1;
						$tstaff4 = $tstaff4 + 1;
					}
					elseif ($total >= 24 && $total < 30 ) {
						$staff5 = $staff5 + 1;
						$tstaff5 = $tstaff5 + 1;
					}
					elseif ($total >= 30 && $total < 36 ) {
						$staff6 = $staff6 + 1;
						$tstaff6 = $tstaff6 + 1;
					}
					elseif ($total >= 36 && $total < 42 ) {
						$staff7 = $staff7 + 1;
						$tstaff7 = $tstaff7 + 1;
					}
					elseif ($total >= 42 && $total < 48 ) {
						$staff8 = $staff8 + 1;
						$tstaff8 = $tstaff8 + 1;
					}
					elseif ($total >= 48 ) {
						$staff9 = $staff9 + 1;
						$tstaff9 = $tstaff9 + 1;
					}
				  }
				  //senarai staff penempatan > 6 bulan && < 1 thn
				  elseif (tempat($t['utpenempatan'],date("d/m/Y")) >= 182 && tempat($t['utpenempatan'],date("d/m/Y")) < 365) { 
					$sb = "SELECT k.*,l.* 
						FROM kursus AS k, latihan AS l
						WHERE k.kids = l.kids
						AND l.unokp = '" . $t['unokp'] . "'
						AND k.kttamat2 >= '" . $bln1 . "'
						AND k.kttamat2 < '" . $bln2 . "'
						AND l.lstatus = 2
						ORDER BY l.lids ASC
					";
					$db = mysql_query($sb);
					while($tb = mysql_fetch_array($db)) {
						$kursus = $kursus + $tb['kjumlah'] * 6;
					}

					$sb = "SELECT * FROM sesi
						WHERE unokp = '" . $t['unokp'] . "'
						AND starikh2 >= '" . $bln1 . "'
						AND starikh2 < '" . $bln2 . "'
						AND sstatus = 2
						ORDER BY sids ASC
					";
					$db = mysql_query($sb);
					while ($tb = mysql_fetch_array($db)) {
						$sesi = $sesi + $sesi + $tb['sjumlah'];
					}

					$sb = "SELECT * FROM kendiri
						WHERE unokp = '" . $t['unokp'] . "'
						AND dttamat2 >= '" . $bln1 . "'
						AND dttamat2 < '" . $bln2 . "'
						AND dstatus = 2
						ORDER BY dids ASC
					";
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
					if ($total < 6) {
						$st1 = $st1 + 1;
						$tst1 = $tst1 + 1;
					}
					elseif ($total >= 6 && $total < 12 ) {
						$st2 = $st2 + 1;
						$tst2 = $tst2 + 1;
					}
					elseif ($total >= 12 && $total < 18 ) {
						$st3 = $st3 + 1;
						$tst3 = $tst3 + 1;
					}
					elseif ($total >= 18 && $total < 24 ) {
						$st4 = $st4 + 1;
						$tst4 = $tst4 + 1;
					}
					elseif ($total >= 24 && $total < 30 ) {
						$st5 = $st5 + 1;
						$tst5 = $tst5 + 1;
					}
					elseif ($total >= 30 && $total < 36 ) {
						$st6 = $st6 + 1;
						$tst6 = $tst6 + 1;
					}
					elseif ($total >= 36 && $total < 42 ) {
						$st7 = $st7 + 1;
						$tst7 = $tst7 + 1;
					}
					elseif ($total >= 42 && $total < 48 ) {
						$st8 = $st8 + 1;
						$tst8 = $tst8 + 1;
					}
					elseif ($total >= 48 ) {
						$st9 = $st9 + 1;
						$tst9 = $tst9 + 1;
					}
				  }
				  //senarai staff penempatan > 1 thn
				  elseif (tempat($t['utpenempatan'],date("d/m/Y")) >= 365) { 
					$sb = "SELECT k.*,l.* 
						FROM kursus AS k, latihan AS l
						WHERE k.kids = l.kids
						AND l.unokp = '" . $t['unokp'] . "'
						AND k.kttamat2 >= '" . $bln1 . "'
						AND k.kttamat2 < '" . $bln2 . "'
						AND l.lstatus = 2
						ORDER BY l.lids ASC
					";
					$db = mysql_query($sb);
					while($tb = mysql_fetch_array($db)) {
						$kursus = $kursus + $tb['kjumlah'] * 6;
					}

					$sb = "SELECT * FROM sesi
						WHERE unokp = '" . $t['unokp'] . "'
						AND starikh2 >= '" . $bln1 . "'
						AND starikh2 < '" . $bln2 . "'
						AND sstatus = 2
						ORDER BY sids ASC
					";
					$db = mysql_query($sb);
					while ($tb = mysql_fetch_array($db)) {
						$sesi = $sesi + $sesi + $tb['sjumlah'];
					}

					$sb = "SELECT * FROM kendiri
						WHERE unokp = '" . $t['unokp'] . "'
						AND dttamat2 >= '" . $bln1 . "'
						AND dttamat2 < '" . $bln2 . "'
						AND dstatus = 2
						ORDER BY dids ASC
					";
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
					if ($total < 6) {
						$sf1 = $sf1 + 1;
						$tsf1 = $tsf1 + 1;
					}
					elseif ($total >= 6 && $total < 12 ) {
						$sf2 = $sf2 + 1;
						$tsf2 = $tsf2 + 1;
					}
					elseif ($total >= 12 && $total < 18 ) {
						$sf3 = $sf3 + 1;
						$tsf3 = $tsf3 + 1;
					}
					elseif ($total >= 18 && $total < 24 ) {
						$sf4 = $sf4 + 1;
						$tsf4 = $tsf4 + 1;
					}
					elseif ($total >= 24 && $total < 30 ) {
						$sf5 = $sf5 + 1;
						$tsf5 = $tsf5 + 1;
					}
					elseif ($total >= 30 && $total < 36 ) {
						$sf6 = $sf6 + 1;
						$tsf6 = $tsf6 + 1;
					}
					elseif ($total >= 36 && $total < 42 ) {
						$sf7 = $sf7 + 1;
						$tsf7 = $tsf7 + 1;
					}
					elseif ($total >= 42 && $total < 48 ) {
						$sf8 = $sf8 + 1;
						$tsf8 = $tsff8 + 1;
					}
					elseif ($total >= 48 ) {
						$sf9 = $sf9 + 1;
						$tsf9 = $tsf9 + 1;
					}
				  }
			  }
		  }
		  if (!empty($staff1)) { $sta1 = $staff1; } else { $sta1 = "&nbsp;"; }
		  if (!empty($staff2)) { $sta2 = $staff2; } else { $sta2 = "&nbsp;"; }
		  if (!empty($staff3)) { $sta3 = $staff3; } else { $sta3 = "&nbsp;"; }
		  if (!empty($staff4)) { $sta4 = $staff4; } else { $sta4 = "&nbsp;"; }
		  if (!empty($staff5)) { $sta5 = $staff5; } else { $sta5 = "&nbsp;"; }
		  if (!empty($staff6)) { $sta6 = $staff6; } else { $sta6 = "&nbsp;"; }
		  if (!empty($staff7)) { $sta7 = $staff7; } else { $sta7 = "&nbsp;"; }
		  if (!empty($staff8)) { $sta8 = $staff8; } else { $sta8 = "&nbsp;"; }
		  if (!empty($staff9)) { $sta9 = $staff9; } else { $sta9 = "&nbsp;"; }
		  if (!empty($st1)) { $taf1 = $st1; } else { $taf1 = "&nbsp;"; }
		  if (!empty($st2)) { $taf2 = $st2; } else { $taf2 = "&nbsp;"; }
		  if (!empty($st3)) { $taf3 = $st3; } else { $taf3 = "&nbsp;"; }
		  if (!empty($st4)) { $taf4 = $st4; } else { $taf4 = "&nbsp;"; }
		  if (!empty($st5)) { $taf5 = $st5; } else { $taf5 = "&nbsp;"; }
		  if (!empty($st6)) { $taf6 = $st6; } else { $taf6 = "&nbsp;"; }
		  if (!empty($st7)) { $taf7 = $st7; } else { $taf7 = "&nbsp;"; }
		  if (!empty($st8)) { $taf8 = $st8; } else { $taf8 = "&nbsp;"; }
		  if (!empty($st9)) { $taf9 = $st9; } else { $taf9 = "&nbsp;"; }
		  if (!empty($sf1)) { $aff1 = $sf1; } else { $aff1 = "&nbsp;"; }
		  if (!empty($sf2)) { $aff2 = $sf2; } else { $aff2 = "&nbsp;"; }
		  if (!empty($sf3)) { $aff3 = $sf3; } else { $aff3 = "&nbsp;"; }
		  if (!empty($sf4)) { $aff4 = $sf4; } else { $aff4 = "&nbsp;"; }
		  if (!empty($sf5)) { $aff5 = $sf5; } else { $aff5 = "&nbsp;"; }
		  if (!empty($sf6)) { $aff6 = $sf6; } else { $aff6 = "&nbsp;"; }
		  if (!empty($sf7)) { $aff7 = $sf7; } else { $aff7 = "&nbsp;"; }
		  if (!empty($sf8)) { $aff8 = $sf8; } else { $aff8 = "&nbsp;"; }
		  if (!empty($sf9)) { $aff9 = $sf9; } else { $aff9 = "&nbsp;"; }
		  $jumlah = $staff1 + $staff2 + $staff3 + $staff4 + $staff5 + $staff6 + $staff7 + $staff8 + $staff9 + $st1 + $st2 + $st3 + $st4 + $st5 + $st6 + $st7 + $st8 + $st9 + $sf1 + $sf2 + $sf3 + $sf4 + $sf5 + $sf6 + $sf7 + $sf8 + $sf9;
		  $html .= '
			<td align="center" valign="middle">'.$sta1.'</td>
			<td align="center" valign="middle">'.$sta2.'</td>
			<td align="center" valign="middle">'.$sta3.'</td>
			<td align="center" valign="middle">'.$sta4.'</td>
			<td align="center" valign="middle">'.$sta5.'</td>
			<td align="center" valign="middle">'.$sta6.'</td>
			<td align="center" valign="middle">'.$sta7.'</td>
			<td align="center" valign="middle">'.$sta8.'</td>
			<td align="center" valign="middle">'.$sta9.'</td>
			<td align="center" valign="middle">'.$taf1.'</td>
			<td align="center" valign="middle">'.$taf2.'</td>
			<td align="center" valign="middle">'.$taf3.'</td>
			<td align="center" valign="middle">'.$taf4.'</td>
			<td align="center" valign="middle">'.$taf5.'</td>
			<td align="center" valign="middle">'.$taf6.'</td>
			<td align="center" valign="middle">'.$taf7.'</td>
			<td align="center" valign="middle">'.$taf8.'</td>
			<td align="center" valign="middle">'.$taf9.'</td>
			<td align="center" valign="middle">'.$aff1.'</td>
			<td align="center" valign="middle">'.$aff2.'</td>
			<td align="center" valign="middle">'.$aff3.'</td>
			<td align="center" valign="middle">'.$aff4.'</td>
			<td align="center" valign="middle">'.$aff5.'</td>
			<td align="center" valign="middle">'.$aff6.'</td>
			<td align="center" valign="middle">'.$aff7.'</td>
			<td align="center" valign="middle">'.$aff8.'</td>
			<td align="center" valign="middle">'.$aff9.'</td>
			<td align="center" valign="middle">'.$jumlah.'</td>
		  </tr>
	';
	}
  	$tjumlah = $tstaff1 + $tstaff2 + $tstaff3 + $tstaff4 + $tstaff5 + $tstaff6 + $tstaff7 + $tstaff8 + $tstaff9 + $tst1 + $tst2 + $tst3 + $tst4 + $tst5 + $tst6 + $tst7 + $tst8 + $tst9 + $tsf1 + $tsf2 + $tsf3 + $tsf4 + $tsf5 + $tsf6 + $tsf7 + $tsf8 + $tsf9;
	$html .= '
		  <tr>
			<td colspan="2" height="30" align="center" valign="middle">JUMLAH</td>
			<td align="center" valign="middle">'.$tstaff1.'</td>
			<td align="center" valign="middle">'.$tstaff2.'</td>
			<td align="center" valign="middle">'.$tstaff3.'</td>
			<td align="center" valign="middle">'.$tstaff4.'</td>
			<td align="center" valign="middle">'.$tstaff5.'</td>
			<td align="center" valign="middle">'.$tstaff6.'</td>
			<td align="center" valign="middle">'.$tstaff7.'</td>
			<td align="center" valign="middle">'.$tstaff8.'</td>
			<td align="center" valign="middle">'.$tstaff9.'</td>
			<td align="center" valign="middle">'.$tst1.'</td>
			<td align="center" valign="middle">'.$tst2.'</td>
			<td align="center" valign="middle">'.$tst3.'</td>
			<td align="center" valign="middle">'.$tst4.'</td>
			<td align="center" valign="middle">'.$tst5.'</td>
			<td align="center" valign="middle">'.$tst6.'</td>
			<td align="center" valign="middle">'.$tst7.'</td>
			<td align="center" valign="middle">'.$tst8.'</td>
			<td align="center" valign="middle">'.$tst9.'</td>
			<td align="center" valign="middle">'.$tsf1.'</td>
			<td align="center" valign="middle">'.$tsf2.'</td>
			<td align="center" valign="middle">'.$tsf3.'</td>
			<td align="center" valign="middle">'.$tsf4.'</td>
			<td align="center" valign="middle">'.$tsf5.'</td>
			<td align="center" valign="middle">'.$tsf6.'</td>
			<td align="center" valign="middle">'.$tsf7.'</td>
			<td align="center" valign="middle">'.$tsf8.'</td>
			<td align="center" valign="middle">'.$tsf9.'</td>
			<td align="center" valign="middle">'.$tjumlah.'</td>
		  </tr>
</table>
<br />
<table width="950" align="center" border="0" cellspacing="0" cellpadding="2">
  <tr>
    <td align="left">* MAKLUMAT DIKEMASKINI SEHINGGA '.date("d").' '.bulan(date("m")).' '.date("Y").'</td>
  </tr>
  <tr>
    <td align="left" class="text1">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" class="text1">Nota:</td>
  </tr>
  <tr>
    <td align="left" class="text1">1. Maklumat dikemaskini mengikut pengisian perjawatan sehingga '.bulan(kosong($bulan,2)).' '.$tahun.'</td>
  </tr>
  <tr>
    <td align="left" class="text1">&nbsp;&nbsp;&nbsp; seramai '.$tjumlah.' orang pegawai (pengisian perjawatan termasuk di INTAN)</td>
  </tr>
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