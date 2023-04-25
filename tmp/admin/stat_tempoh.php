<table width="995" cellspacing="0" cellpadding="2" border="0">
    <tr>
        <td align="center" valign="top" bgcolor="#E2E2E2">
            <br />
            <?php
			if (!empty($_POST['bahagian'])) { $bahagian = $_POST['bahagian']; }
			else { $bahagian = "ALL"; }
			if (!empty($_POST['bulan'])) { $bulan = $_POST['bulan']; }
			else { $bulan = 1; }
			if (!empty($_POST['tahun'])) { $tahun = $_POST['tahun']; }
			else { $tahun = date("Y"); }
			?>
            <table width="990" border="0" cellspacing="0" cellpadding="3">
          	<form id="kursus" name="kursus" method="post" action="index.php?modul=statistik&amp;menu=tempoh">
              <tr bgcolor="#E2E2E2">
                <td width="776" align="right">Pilihan :</td>
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
             [ <a href="cetak.php?menu=tempoh<?php if ($bahagian != "ALL") { echo "&bahagian=".$bahagian; } ?>&bulan=<?php echo $bulan; ?>&tahun=<?php echo $tahun; ?>">Cetak</a> ] 
          </div>
          <br />
          <table width="990" border="1" cellspacing="0" cellpadding="3" class="text9">
            <tr class="text2">
              <td colspan="30" height="25" align="center" valign="middle" bgcolor="#DE5302">STATISTIK BILANGAN HARI BERKURSUS BAGI PEGAWAI YANG BERKHIDMAT DI JPM</td>
            </tr>
            <tr>
              <td width="35" rowspan="4" align="center" valign="middle" bgcolor="#CCCCCC">BIL</td>
              <td width="68" rowspan="4" align="center" valign="middle" bgcolor="#CCCCCC">KUMPULAN GRED</td>
              <td colspan="27" height="25" align="center" valign="middle" bgcolor="#CCCCCC">BILANGAN PEGAWAI MENGIKUT HARI BERKURSUS BERDASARKAN TEMPOH PENEMPATAN DI JPM</td>
              <td width="77" rowspan="4" align="center" valign="middle" bgcolor="#CCCCCC">JUMLAH PEGAWAI</td>
            </tr>
            <tr>
              <td colspan="9" height="25" align="center" valign="middle" bgcolor="#CCCCCC">TEMPOH PENEMPATAN<br />
              1 - 6 BULAN</td>
              <td colspan="9" align="center" valign="middle" bgcolor="#CCCCCC">TEMPOH PENEMPATAN<br />
7 - 12 BULAN</td>
              <td colspan="9" align="center" valign="middle" bgcolor="#CCCCCC">TEMPOH PENEMPATAN<br /> 
                1 TAHUN @ LEBIH
</td>
            </tr>
            <tr>
              <td colspan="9" height="25" align="center" valign="middle" bgcolor="#CCCCCC">(BIL HARI KURSUS)</td>
              <td colspan="9" align="center" valign="middle" bgcolor="#CCCCCC">(BIL HARI KURSUS)</td>
              <td colspan="9" align="center" valign="middle" bgcolor="#CCCCCC">(BIL HARI KURSUS)</td>
            </tr>
            <tr>
              <td width="22" height="25" align="center" valign="middle" bgcolor="#CCCCCC">0</td>
              <td width="21" align="center" valign="middle" bgcolor="#CCCCCC">1</td>
              <td width="21" align="center" valign="middle" bgcolor="#CCCCCC">2</td>
              <td width="21" align="center" valign="middle" bgcolor="#CCCCCC">3</td>
              <td width="21" align="center" valign="middle" bgcolor="#CCCCCC">4</td>
              <td width="21" align="center" valign="middle" bgcolor="#CCCCCC">5</td>
              <td width="21" align="center" valign="middle" bgcolor="#CCCCCC">6</td>
              <td width="21" align="center" valign="middle" bgcolor="#CCCCCC">7</td>
              <td width="21" align="center" valign="middle" bgcolor="#CCCCCC">&gt;7</td>
              <td width="21" align="center" valign="middle" bgcolor="#CCCCCC">0</td>
              <td width="21" align="center" valign="middle" bgcolor="#CCCCCC">1</td>
              <td width="21" align="center" valign="middle" bgcolor="#CCCCCC">2</td>
              <td width="21" align="center" valign="middle" bgcolor="#CCCCCC">3</td>
              <td width="21" align="center" valign="middle" bgcolor="#CCCCCC">4</td>
              <td width="21" align="center" valign="middle" bgcolor="#CCCCCC">5</td>
              <td width="21" align="center" valign="middle" bgcolor="#CCCCCC">6</td>
              <td width="21" align="center" valign="middle" bgcolor="#CCCCCC">7</td>
              <td width="21" align="center" valign="middle" bgcolor="#CCCCCC">&gt;7</td>
              <td width="21" align="center" valign="middle" bgcolor="#CCCCCC">0</td>
              <td width="21" align="center" valign="middle" bgcolor="#CCCCCC">1</td>
              <td width="21" align="center" valign="middle" bgcolor="#CCCCCC">2</td>
              <td width="21" align="center" valign="middle" bgcolor="#CCCCCC">3</td>
              <td width="21" align="center" valign="middle" bgcolor="#CCCCCC">4</td>
              <td width="21" align="center" valign="middle" bgcolor="#CCCCCC">5</td>
              <td width="21" align="center" valign="middle" bgcolor="#CCCCCC">6</td>
              <td width="21" align="center" valign="middle" bgcolor="#CCCCCC">7</td>
              <td width="21" align="center" valign="middle" bgcolor="#CCCCCC">&gt;7</td>
            </tr>
            <?php
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
				?>
				<tr>
				  <td height="25" align="center" valign="middle"><?php echo $n; ?></td>
				  <td align="center" valign="middle"><?php echo output1($ta['kumpulan']); ?></td>
                  <?php
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
				  ?>
				  <td align="center" valign="middle"><?php if (!empty($staff1)) { echo $staff1; } else { echo "&nbsp;"; } ?></td>
				  <td align="center" valign="middle"><?php if (!empty($staff2)) { echo $staff2; } else { echo "&nbsp;"; } ?></td>
				  <td align="center" valign="middle"><?php if (!empty($staff3)) { echo $staff3; } else { echo "&nbsp;"; } ?></td>
				  <td align="center" valign="middle"><?php if (!empty($staff4)) { echo $staff4; } else { echo "&nbsp;"; } ?></td>
				  <td align="center" valign="middle"><?php if (!empty($staff5)) { echo $staff5; } else { echo "&nbsp;"; } ?></td>
				  <td align="center" valign="middle"><?php if (!empty($staff6)) { echo $staff6; } else { echo "&nbsp;"; } ?></td>
				  <td align="center" valign="middle"><?php if (!empty($staff7)) { echo $staff7; } else { echo "&nbsp;"; } ?></td>
				  <td align="center" valign="middle"><?php if (!empty($staff8)) { echo $staff8; } else { echo "&nbsp;"; } ?></td>
				  <td align="center" valign="middle"><?php if (!empty($staff9)) { echo $staff9; } else { echo "&nbsp;"; } ?></td>
				  <td align="center" valign="middle"><?php if (!empty($st1)) { echo $st1; } else { echo "&nbsp;"; } ?></td>
				  <td align="center" valign="middle"><?php if (!empty($st2)) { echo $st2; } else { echo "&nbsp;"; } ?></td>
				  <td align="center" valign="middle"><?php if (!empty($st3)) { echo $st3; } else { echo "&nbsp;"; } ?></td>
				  <td align="center" valign="middle"><?php if (!empty($st4)) { echo $st4; } else { echo "&nbsp;"; } ?></td>
				  <td align="center" valign="middle"><?php if (!empty($st5)) { echo $st5; } else { echo "&nbsp;"; } ?></td>
				  <td align="center" valign="middle"><?php if (!empty($st6)) { echo $st6; } else { echo "&nbsp;"; } ?></td>
				  <td align="center" valign="middle"><?php if (!empty($st7)) { echo $st7; } else { echo "&nbsp;"; } ?></td>
				  <td align="center" valign="middle"><?php if (!empty($st8)) { echo $st8; } else { echo "&nbsp;"; } ?></td>
				  <td align="center" valign="middle"><?php if (!empty($st9)) { echo $st9; } else { echo "&nbsp;"; } ?></td>
				  <td align="center" valign="middle"><?php if (!empty($sf1)) { echo $sf1; } else { echo "&nbsp;"; } ?></td>
				  <td align="center" valign="middle"><?php if (!empty($sf2)) { echo $sf2; } else { echo "&nbsp;"; } ?></td>
				  <td align="center" valign="middle"><?php if (!empty($sf3)) { echo $sf3; } else { echo "&nbsp;"; } ?></td>
				  <td align="center" valign="middle"><?php if (!empty($sf4)) { echo $sf4; } else { echo "&nbsp;"; } ?></td>
				  <td align="center" valign="middle"><?php if (!empty($sf5)) { echo $sf5; } else { echo "&nbsp;"; } ?></td>
				  <td align="center" valign="middle"><?php if (!empty($sf6)) { echo $sf6; } else { echo "&nbsp;"; } ?></td>
				  <td align="center" valign="middle"><?php if (!empty($sf7)) { echo $sf7; } else { echo "&nbsp;"; } ?></td>
				  <td align="center" valign="middle"><?php if (!empty($sf8)) { echo $sf8; } else { echo "&nbsp;"; } ?></td>
				  <td align="center" valign="middle"><?php if (!empty($sf9)) { echo $sf9; } else { echo "&nbsp;"; } ?></td>
				  <td align="center" valign="middle">
                  	<?php
					echo $staff1 + $staff2 + $staff3 + $staff4 + $staff5 + $staff6 + $staff7 + $staff8 + $staff9 + $st1 + $st2 + $st3 + $st4 + $st5 + $st6 + $st7 + $st8 + $st9 + $sf1 + $sf2 + $sf3 + $sf4 + $sf5 + $sf6 + $sf7 + $sf8 + $sf9;
					?>
                  </td>
				</tr>
            <?php
			}
			?>
            <tr>
              <td colspan="2" height="25" align="center" valign="middle">JUMLAH</td>
              <td align="center" valign="middle"><?php echo $tstaff1; ?></td>
              <td align="center" valign="middle"><?php echo $tstaff2; ?></td>
              <td align="center" valign="middle"><?php echo $tstaff3; ?></td>
              <td align="center" valign="middle"><?php echo $tstaff4; ?></td>
              <td align="center" valign="middle"><?php echo $tstaff5; ?></td>
              <td align="center" valign="middle"><?php echo $tstaff6; ?></td>
              <td align="center" valign="middle"><?php echo $tstaff7; ?></td>
              <td align="center" valign="middle"><?php echo $tstaff8; ?></td>
              <td align="center" valign="middle"><?php echo $tstaff9; ?></td>
              <td align="center" valign="middle"><?php echo $tst1; ?></td>
              <td align="center" valign="middle"><?php echo $tst2; ?></td>
              <td align="center" valign="middle"><?php echo $tst3; ?></td>
              <td align="center" valign="middle"><?php echo $tst4; ?></td>
              <td align="center" valign="middle"><?php echo $tst5; ?></td>
              <td align="center" valign="middle"><?php echo $tst6; ?></td>
              <td align="center" valign="middle"><?php echo $tst7; ?></td>
              <td align="center" valign="middle"><?php echo $tst8; ?></td>
              <td align="center" valign="middle"><?php echo $tst9; ?></td>
              <td align="center" valign="middle"><?php echo $tsf1; ?></td>
              <td align="center" valign="middle"><?php echo $tsf2; ?></td>
              <td align="center" valign="middle"><?php echo $tsf3; ?></td>
              <td align="center" valign="middle"><?php echo $tsf4; ?></td>
              <td align="center" valign="middle"><?php echo $tsf5; ?></td>
              <td align="center" valign="middle"><?php echo $tsf6; ?></td>
              <td align="center" valign="middle"><?php echo $tsf7; ?></td>
              <td align="center" valign="middle"><?php echo $tsf8; ?></td>
              <td align="center" valign="middle"><?php echo $tsf9; ?></td>
				  <td align="center" valign="middle">
                  	<?php
					echo $tstaff1 + $tstaff2 + $tstaff3 + $tstaff4 + $tstaff5 + $tstaff6 + $tstaff7 + $tstaff8 + $tstaff9 + $tst1 + $tst2 + $tst3 + $tst4 + $tst5 + $tst6 + $tst7 + $tst8 + $tst9 + $tsf1 + $tsf2 + $tsf3 + $tsf4 + $tsf5 + $tsf6 + $tsf7 + $tsf8 + $tsf9;
					?>
                  </td>
            </tr>
          </table>
      <br /></td>
    </tr>
</table>