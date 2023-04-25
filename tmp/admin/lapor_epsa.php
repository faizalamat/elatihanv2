<?php $n = 0 ?>
<table width="995" cellspacing="0" cellpadding="2" border="0">
    <tr>
        <td align="center" valign="top" bgcolor="#E2E2E2">
            <br />
            <?php
			if (!empty($_POST['kumpulan'])) { $kumpulan = $_POST['kumpulan']; }
			else { $kumpulan = "ALL"; }
			if (!empty($_POST['status'])) { $status = $_POST['status']; }
			else { $status = "ALL"; }
			if (!empty($_POST['bulan'])) { $bulan = $_POST['bulan']; }
			else { $bulan = "ALL"; }
			if (!empty($_POST['tahun'])) { $tahun = $_POST['tahun']; }
			else { $tahun = date("Y"); }
			?>
            <table width="990" border="0" cellspacing="0" cellpadding="3">
          	<form id="kursus" name="kursus" method="post" action="index.php?modul=laporan&amp;menu=epsa">
              <tr bgcolor="#E2E2E2">
                <td width="637" align="right">Pilihan :</td>
                <td width="46" align="right"><select name="kumpulan" id="kumpulan">
                  <option value="">- SEMUA -</option>
                  <?php
				  $sa = "SELECT * FROM kumpulan WHERE pdelete = 1 ORDER BY kumpulan ASC";
				  $da = mysql_query($sa);
				  while ($ta = mysql_fetch_array($da)) {
					  if ($ta['pids'] == isset($_POST['kumpulan'])) { $select = 'selected="selected"'; }
					  else { $select = ""; }
					  ?>
                  	  <option value="<?php echo $ta['pids']; ?>" <?php echo $select; ?>><?php echo $ta['kumpulan']; ?></option>
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
                  <option value="">- SEMUA -</option>
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
                <td width="58" align="center"><input type="submit" name="Submit" id="Submit" value=" Papar " class="button" /></td>
              </tr>
          	</form>
            </table>
          <br />
          <div align="right" class="text1">
          	 <?php
			 if (isset($_POST['Submit'])) {
				 ?>
	             [ <a href="export.php?menu=epsa<?php if ($kumpulan != "ALL") { echo "&kumpulan=".$kumpulan; } ?><?php if ($status != "ALL") { echo "&status=".$status; } ?><?php if ($bulan != "ALL") { echo "&bulan=".$bulan; } ?>&tahun=<?php echo $tahun; ?>">Export</a> ] 
             <?php
			 }
			 else {
				 ?>
	             [ <a href="export.php?menu=epsa">Export</a> ] 
             <?php
			 }
			 ?>
          </div>
          <br />
          <table width="990" border="1" cellspacing="0" cellpadding="3" style="border-collapse: collapse">
            <tr class="text2">
              <td colspan="8" align="center" bgcolor="#DE5302">LAPORAN MENGIKUT KURSUS EPSA</td>
            </tr>
            <tr class="text1">
              <td width="40" align="center" valign="middle" bgcolor="#CCCCCC">Bil</td>
              <td width="161" align="left" valign="middle" bgcolor="#CCCCCC">Nama</td>
              <td width="106" align="center" valign="middle" bgcolor="#CCCCCC">No. Kad Pengenalan</td>
              <td width="131" align="center" valign="middle" bgcolor="#CCCCCC">Kumpulan Perkhidmatan</td>
              <td width="92" align="center" valign="middle" bgcolor="#CCCCCC">Gred</td>
              <td width="129" align="center" valign="middle" bgcolor="#CCCCCC">Unit</td>
              <td width="138" align="center" valign="middle" bgcolor="#CCCCCC">Kod EPSA</td>
              <td width="127" align="center" valign="middle" bgcolor="#CCCCCC">Jumlah Jam/<br />
              Hari EPSA</td>
            </tr>
            <?php
			if (isset($_POST['Submit'])) {
				if ($kumpulan == "ALL") {
					$s = "SELECT u.*, p.*, b.* 
						FROM user AS u, kumpulan AS p, bahagian AS b
						WHERE u.pids = p.pids
						AND u.bids = b.bids
						AND u.usah = 1
						AND u.unokp != 'SUPERADMIN' 
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
						AND u.unokp != 'SUPERADMIN' 
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
				?>
				<tr>
				  <td align="center" valign="middle"><?php echo $n; ?></td>
				  <td align="left" valign="middle"><?php echo output1($t['unama']); ?></td>
				  <td align="center" valign="middle"><?php echo output1($t['unokp']); ?></td>
				  <td align="center" valign="middle"><?php echo output1($t['kumpulan']); ?></td>
				  <td align="center" valign="middle"><?php echo output1($t['ugred']); ?></td>
				  <td align="center" valign="middle">
				  	<?php 
					$sa = "SELECT * FROM bahagian WHERE bids = '" . $t['bids'] . "' ORDER BY bids ASC";
					$da = mysql_query($sa);
					$ta = mysql_fetch_array($da);
					echo output1($ta['bahagian']);
					?>
                  </td>
				  <td align="center" valign="middle">
				  	<?php 
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
					else { $kad = "&nbsp"; }
					echo $kad;
					?>
                  </td>
				  <td align="center" valign="middle">
				  	<?php 
					//echo $kendiri;
					$hari = floor($kendiri / 6);
					$jam = $kendiri - ($hari * 6);
					if ($hari >= 1) { $sesid = $hari . " HARI " . $jam . " JAM"; }
					elseif ($jam >= 1) { $sesid = $jam . " JAM"; }
					elseif ($kendiri == "0.5") { $sesid = "30 MINIT"; }
					else { $sesid = "0"; }
					echo str_replace(" 0 JAM","",str_replace(".5 JAM"," JAM 30 MINIT",$sesid));
					?>
                  </td>
				</tr>
            <?php
			}
			if ($n) {
				?>
				<tr>
				  <td colspan="7" align="center" valign="middle" class="text1">Jumlah Keseluruhan Hari</td>
				  <td align="center" valign="middle" class="text1"><?php 
					$hari = floor($tkendiri / 6);
					$jam = $tkendiri - ($hari * 6);
					if ($hari >= 1) { $sesid = $hari . " HARI " . $jam . " JAM"; }
					elseif ($jam >= 1) { $sesid = $jam . " JAM"; }
					elseif ($tkendiri == "0.5") { $sesid = "30 MINIT"; }
					else { $sesid = "0"; }
					echo str_replace(" 0 JAM","",str_replace(".5 JAM"," JAM 30 MINIT",$sesid));
					?></td>
	        </tr>
			<?php
			}
			if (!$n) {
				?>
                <tr>
                  <td colspan="8" align="center" valign="middle">Tiada maklumat pegawai</td>
                </tr>
            <?php
			}
			?>
      </table><br /></td>
    </tr>
</table>