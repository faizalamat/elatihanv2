<?php
if (!empty($_GET['bahagian'])) { $bahagian = $_GET['bahagian']; }
else { $bahagian = "ALL"; }
if (!empty($_GET['status'])) { $status = $_GET['status']; }
else { $status = "ALL"; }
if (!empty($_GET['bulan'])) { $bulan = $_GET['bulan']; }
else { $bulan = 1; }
if (!empty($_GET['tahun'])) { $tahun = $_GET['tahun']; }
else { $tahun = date("Y"); }
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
$ttk2 = 0;
$ttk3 = 0;
while ($ta = mysql_fetch_array($da)) {
	$n = $n + 1;
  $s = "SELECT * FROM user 
	WHERE ulevel <> 1 
	AND usah = 1 
	AND udelete = 1 
	AND bids = '" . input2($ta['bids']) . "'
	ORDER BY unokp ASC
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
		if ($total < 1) {
			$tpt1 = $tpt1 + 1;
		}
		elseif ($total >= 1 && $total < 43) {
			$tpt2 = $tpt2 + 1;
		}
		elseif ($total >= 43 ) {
			$tpt3 = $tpt3 + 1;
		}
  }
}

$tajuk = "Maklumat Sehingga " . bulan(kosong($bulan,2))." ".$tahun;
include("../inc/chart.php");
$mygraph = new Chart(700);
$mygraph->setTitle('RINGKASAN LAPORAN PEMANTAUAN KURSUS',$tajuk);
$mygraph->addDataSeries('P',PIE_CHART_PCENT + PIE_LEGEND_VALUE,$tpt3,"> 7 Hari");
$mygraph->addDataSeries('P',PIE_CHART_PCENT + PIE_LEGEND_VALUE,$tpt2,"< 7 Hari");
$mygraph->addDataSeries('P',PIE_CHART_PCENT + PIE_LEGEND_VALUE,$tpt1,"0 Hari");
$mygraph->drawGraph();
?>