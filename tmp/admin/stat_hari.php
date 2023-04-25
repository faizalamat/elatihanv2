<?php $n = 0 ?>
<table width="995" cellspacing="0" cellpadding="2" border="0">
    <tr>
        <td align="center" valign="top" bgcolor="#E2E2E2">
            <br />
            <?php
			if (!empty($_POST['bahagian'])) { $bahagian = $_POST['bahagian']; }
			else { $bahagian = "ALL"; }
			if (!empty($_POST['status'])) { $status = $_POST['status']; }
			else { $status = "ALL"; }
			if (!empty($_POST['bulan'])) { $bulan = $_POST['bulan']; }
			else { $bulan = 1; }
			if (!empty($_POST['tahun'])) { $tahun = $_POST['tahun']; }
			else { $tahun = date("Y"); }
			?>
            <table width="990" border="0" cellspacing="0" cellpadding="3">
          	<form id="kursus" name="kursus" method="post" action="index.php?modul=statistik&amp;menu=hari">
              <tr bgcolor="#E2E2E2">
                <td width="729" align="right">Pilihan :</td>
                <td width="41" align="right"><select name="bahagian" id="bahagian">
                  <option value="">- SEMUA -</option>
				  <?php
				  $sa = "SELECT * FROM bahagian WHERE bdelete = 1 ORDER BY bahagian ASC";
				  $da = mysql_query($sa);
				  while ($ta = mysql_fetch_array($da)) {
					  if ($ta['bids'] == $bahagian) { $select = 'selected="selected"'; }
					  else { $select = ""; }
					  ?>
                  	  <option value="<?php echo $ta['bids']; ?>" <?php echo $select; ?>><?php echo $ta['bahagian']; ?></option>
                  <?php
				  }
				  ?>
                </select></td>
                <td width="41" align="right"><select name="status" id="status">
                  <option value="">- SEMUA -</option>
                  <option value="1" <?php if ($status == 1) { echo 'selected="selected"'; } ?>>DALAM TINDAKAN</option>
                  <option value="2" <?php if ($status == 2) { echo 'selected="selected"'; } ?>>DISAHKAN</option>
                  <option value="3" <?php if ($status == 3) { echo 'selected="selected"'; } ?>>TIDAK DISAHKAN</option>
                  <option value="4" <?php if ($status == 4) { echo 'selected="selected"'; } ?>>KIV</option>
                  <option value="5" <?php if ($status == 5) { echo 'selected="selected"'; } ?>>DIBATALKAN</option>
                </select></td>
                <td width="41" align="right"><select name="bulan" id="bulan">
                  <?php
				  for ($i = 1; $i <= 12; $i++) {
					  if (kosong($i,2) == $bulan) { $select = 'selected="selected"'; }
					  else { $select = ""; }
					?>
                  	<option value="<?php echo $i; ?>" <?php echo $select; ?>><?php echo bulan(kosong($i,2)); ?></option>
                  <?php
				  }
				  ?>
                </select></td>
                <td width="41" align="center"><select name="tahun" id="tahun">
                	<?php
					for ($i = date("Y")+1; $i >= 2010; $i--) {
						if ($tahun == $i) { $select = 'selected="selected"'; }
						else { $select = ""; }
						?>
                        <option value="<?php echo $i; ?>" <?php echo $select; ?>><?php echo $i; ?></option>
                    <?php
					}
					?>
                </select></td>
                <td width="61" align="center"><input type="submit" name="Submit" id="Submit" value=" Papar " class="button" /></td>
              </tr>
          	</form>
            </table>
          <br />
          <div align="right" class="text1">
             [ <a href="cetak.php?menu=hari<?php if ($bahagian != "ALL") { echo "&bahagian=".$bahagian; } ?><?php if ($status != "ALL") { echo "&status=".$status; } ?>&bulan=<?php echo $bulan; ?>&tahun=<?php echo $tahun; ?>">Cetak</a> ] 
          </div>
          <br />
          <table width="990" border="1" cellspacing="0" cellpadding="2" class="text9">
            <tr class="text2">
              <td colspan="19" align="center" valign="middle" bgcolor="#DE5302">LAPORAN PEMANTAUAN KURSUS</td>
            </tr>
            <tr>
              <td width="35" rowspan="2" align="center" valign="middle">BIL</td>
              <td width="126" rowspan="2" align="left" valign="middle">UNIT - UNIT DALAM BIUPA</td>
              <td colspan="5" height="25" align="center" valign="middle">BELUM HADIR KURSUS</td>
              <td colspan="5" align="center" valign="middle">KURANG DARI 7 HARI</td>
              <td width="50" rowspan="2" align="center" valign="middle">JUMLAH HARI BERKURSUS</td>
              <td colspan="5" align="center" valign="middle">7 HARI DAN LEBIH</td>
              <td width="50" rowspan="2" align="center" valign="middle">JUMLAH HARI BERKURSUS</td>
            </tr>
            <tr>
              <td width="40" height="25" align="center" valign="middle">PENGURUSAN<br />
              TERTINGGI</td>
              <td width="40" align="center" valign="middle">P&amp;P</td>
              <td width="40" align="center" valign="middle">SOK.1</td>
              <td width="40" align="center" valign="middle">SOK.2</td>
              <td width="50" align="center" valign="middle">JUMLAH <br />
              PEGAWAI</td>
              <td align="center" valign="middle">PENGURUSAN<br />
TERTINGGI</td>
              <td align="center" valign="middle">P&amp;P</td>
              <td align="center" valign="middle">SOK.1</td>
              <td align="center" valign="middle">SOK.2</td>
              <td align="center" valign="middle">JUMLAH <br />
              PEGAWAI</td>
              <td align="center" valign="middle">PENGURUSAN<br />
TERTINGGI</td>
              <td align="center" valign="middle">P&amp;P</td>
              <td align="center" valign="middle">SOK.1</td>
              <td align="center" valign="middle">SOK.2</td>
              <td align="center" valign="middle">JUMLAH <br />
              PEGAWAI</td>
            </tr>
            <?php
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
				?>
                <tr>
                  <td height="25" align="center" valign="middle"><?php echo $n; ?></td>
                  <td align="left" valign="middle"><?php echo output1($ta['bahagian']); ?></td>
                  <?php
				  //pegawai kumpulan pengurusan tertinggi
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
					  if (isset($_POST['bulan'])) {
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
						  	//echo "2:".$ta['bahagian']."-".$t['unokp']."-".($tpt2 + $tpp2 + $tsp2 + $tsk2)."<br>";
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
					  if (isset($_POST['bulan'])) {
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
					  if (isset($_POST['bulan'])) {
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
					  if (isset($_POST['bulan'])) {
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
				  ?>
                  <td align="center" valign="middle"><?php echo $pt1; ?></td>
                  <td align="center" valign="middle"><?php echo $pp1; ?></td>
                  <td align="center" valign="middle"><?php echo $sp1; ?></td>
                  <td align="center" valign="middle"><?php echo $sk1; ?></td>
                  <td align="center" valign="middle">
                  	<?php 
					echo ($pt1 + $pp1 + $sp1 + $sk1); 
					?>
                  </td>
                  <td align="center" valign="middle"><?php echo $pt2; ?></td>
                  <td align="center" valign="middle"><?php echo $pp2; ?></td>
                  <td align="center" valign="middle"><?php echo $sp2; ?></td>
                  <td align="center" valign="middle"><?php echo $sk2; ?></td>
                  <td align="center" valign="middle">
                  	<?php 
					echo ($pt2 + $pp2 + $sp2 + $sk2);
					?>
                  </td>
                  <td align="center" valign="middle"><?php echo floor($tk2 / 6); ?></td>
                  <td align="center" valign="middle"><?php echo $pt3; ?></td>
                  <td align="center" valign="middle"><?php echo $pp3; ?></td>
                  <td align="center" valign="middle"><?php echo $sp3; ?></td>
                  <td align="center" valign="middle"><?php echo $sk3; ?></td>
                  <td align="center" valign="middle">
                  	<?php 
					echo $pt3 + $pp3 + $sp3 + $sk3; 
					?>
                  </td>
                  <td align="center" valign="middle"><?php echo floor($tk3 / 6); ?></td>
                </tr>
            <?php
			}
			?>
            <tr>
              <td colspan="2" height="25" align="center" valign="middle">JUMLAH</td>
              <td align="center" valign="middle"><?php echo $tpt1; ?></td>
              <td align="center" valign="middle"><?php echo $tpp1; ?></td>
              <td align="center" valign="middle"><?php echo $tsp1; ?></td>
              <td align="center" valign="middle"><?php echo $tsk1; ?></td>
              <td align="center" valign="middle">
                <?php 
                echo $tpt1 + $tpp1 + $tsp1 + $tsk1; 
                ?>
              </td>
              <td align="center" valign="middle"><?php echo $tpt2; ?></td>
              <td align="center" valign="middle"><?php echo $tpp2; ?></td>
              <td align="center" valign="middle"><?php echo $tsp2; ?></td>
              <td align="center" valign="middle"><?php echo $tsk2; ?></td>
              <td align="center" valign="middle">
                <?php 
                echo $tpt2 + $tpp2 + $tsp2 + $tsk2; 
                ?>
              </td>
                  <td align="center" valign="middle"><?php echo $ttk2; ?></td>
              <td align="center" valign="middle"><?php echo $tpt3; ?></td>
              <td align="center" valign="middle"><?php echo $tpp3; ?></td>
              <td align="center" valign="middle"><?php echo $tsp3; ?></td>
              <td align="center" valign="middle"><?php echo $tsk3; ?></td>
              <td align="center" valign="middle">
                <?php 
                echo $tpt3 + $tpp3 + $tsp3 + $tsk3; 
                ?>
              </td>
                  <td align="center" valign="middle"><?php echo $ttk3; ?></td>
            </tr>
            <tr>
              <td colspan="6" height="25" align="center" valign="middle">PERATUS KESELURUHAN</td>
              <td align="center" valign="middle">
			  	<?php 
				if ($staff >= 1) {
					echo round(($tpt1 + $tpp1 + $tsp1 + $tsk1) / $staff * 100)."%";
				}
				else { echo "0"; }
				?>
              </td>
              <td colspan="4" align="center" valign="middle">&nbsp;</td>
              <td align="center" valign="middle">
			  	<?php 
				if ($staff >= 1) {
					echo round(($tpt2 + $tpp2 + $tsp2 + $tsk2) / $staff * 100)."%";
				}
				else { echo "0"; }
				?>
              </td>
              <td colspan="5" align="center" valign="middle">&nbsp;</td>
              <td align="center" valign="middle">
			  	<?php 
				if ($staff >= 1) {
					echo round(($tpt3 + $tpp3 + $tsp3 + $tsk3) / $staff * 100)."%";
				}
				else { echo "0"; }
				?>
              </td>
              <td align="center" valign="middle">&nbsp;</td>
            </tr>
          </table>
      <br /></td>
    </tr>
</table>