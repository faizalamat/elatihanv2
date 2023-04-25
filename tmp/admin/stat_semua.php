<?php $n = 0 ?>
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
            <table width="500" border="0" cellspacing="0" cellpadding="3">
          	<form id="kursus" name="kursus" method="post" action="index.php?modul=statistik&amp;menu=semua">
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
              <tr bgcolor="#E2E2E2">
                <td colspan="5" align="right" class="text1">
             		[ <a href="cetak.php?menu=semua<?php if ($bahagian != "ALL") { echo "&bahagian=".$bahagian; } ?>&bulan=<?php echo $bulan; ?>&tahun=<?php echo $tahun; ?>">Cetak</a> ] 
                </td>
              </tr>
          	</form>
            </table>
    <br />
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
			if ($staff >= 1) {
				$pl = round($tpt3 / $staff * 100,2);
				$pk = round($tpt2 / $staff * 100,2);
				$ps = round($tpt1 / $staff * 100,2);
				$total = round(($tpt3 / $staff * 100) + ($tpt2 / $staff * 100) + ($tpt1 / $staff * 100),2);
			}
			else {
				$pl = 0;
				$pk = 0;
				$ps = 0;
				$total = 0;
			}
			?>
          <table width="500" border="1" cellspacing="0" cellpadding="2">
            <tr class="text2">
              <td colspan="3" align="center" valign="middle" bgcolor="#DE5302">RINGKASAN LAPORAN PEMANTAUAN KURSUS</td>
            </tr>
            <tr>
              <td width="154" align="center" valign="middle" bgcolor="#CCCCCC">&nbsp;</td>
              <td width="165" align="center" valign="middle" bgcolor="#CCCCCC">JUMLAH PEGAWAI</td>
              <td width="161" align="center" valign="middle" bgcolor="#CCCCCC">%</td>
            </tr>
            <tr>
              <td align="center" valign="middle" bgcolor="#CCCCCC">&gt; 7 HARI</td>
              <td align="center" valign="middle"><?php echo $tpt3; ?></td>
              <td align="center" valign="middle"><?php echo $pl; ?></td>
            </tr>
            <tr>
              <td align="center" valign="middle" bgcolor="#CCCCCC"> &lt;7 HARI</td>
              <td align="center" valign="middle"><?php echo $tpt2; ?></td>
              <td align="center" valign="middle"><?php echo $pk; ?></td>
            </tr>
            <tr>
              <td align="center" valign="middle" bgcolor="#CCCCCC">0 HARI</td>
              <td align="center" valign="middle"><?php echo $tpt1; ?></td>
              <td align="center" valign="middle"><?php echo $ps; ?></td>
            </tr>
            <tr>
              <td align="center" valign="middle" bgcolor="#CCCCCC">JUMLAH</td>
              <td align="center" valign="middle" class="text1"><?php echo $staff; ?></td>
              <td align="center" valign="middle" class="text1"><?php echo $total; ?>%</td>
            </tr>
          </table>
          <div align="center"><br />MAKLUMAT SEHINGGA <?php echo bulan(kosong($bulan,2))." ".$tahun; ?></div>
      <br /></td>
    </tr>
</table>