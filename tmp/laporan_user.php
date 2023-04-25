<?php $n = 0;
	
echo(__DIR__);
include('conn.php');
?>
<table width="995" cellspacing="0" cellpadding="2" border="0">
    <tr>
        <td align="center" valign="top" bgcolor="#E2E2E2">
            <br />
            <?php

            include('conn.php');
			
			if (isset($_POST['status'])) {
				if (!empty($_POST['status'])) { $status = $_POST['status']; }
				else { $status = "ALL"; }
			}
			else { $status = 2; }
			if (!empty($_POST['bulan'])) { $bulan = $_POST['bulan']; }
			else { $bulan = "ALL"; }
			if (!empty($_POST['tahun'])) { $tahun = $_POST['tahun']; }
			else { $tahun = date("Y"); }
			?>
            <table width="800" border="0" cellspacing="0" cellpadding="3">
          	<form id="kursus" name="kursus" method="post" action="index.php?modul=laporan&amp;menu=kursus">
              <tr bgcolor="#E2E2E2">
                <td width="689" align="right">Pilihan :</td>
                <td width="41" align="right"><select name="status" id="status">
                  <option value="">- SEMUA - </option>
                  <option value="1" <?php if (isset($_POST['status']) == 1) { echo 'selected="selected"'; } ?>>DALAM TINDAKAN</option>
                  <option value="2" <?php if (isset($_POST['status']) == 2) { echo 'selected="selected"'; } ?>>DISAHKAN</option>
                  <option value="3" <?php if (isset($_POST['status']) == 3) { echo 'selected="selected"'; } ?>>TIDAK DISAHKAN</option>
                  <option value="4" <?php if (isset($_POST['status']) == 4) { echo 'selected="selected"'; } ?>>KIV</option>
                  <option value="5" <?php if (isset($_POST['status']) == 5) { echo 'selected="selected"'; } ?>>DIBATALKAN</option>
                </select></td>
                <td width="41" align="right"><select name="bulan" id="bulan">
                  <option value="">- SEMUA -</option>
                  <?php

                  include('conn.php');

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

                    include('conn.php');

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
          <table width="800" border="0" cellspacing="0" cellpadding="0">
            <tr bgcolor="#E2E2E2" valign="bottom">
            	<td colspan="5" align="right" class="text1">
		        	[ 
					<a target="_blank" href="index.php?modul=cetak&menu=staff&status=<?php
                    include('conn.php');
                    echo $status; ?>&bulan=<?php echo $bulan; ?>&tahun=<?php echo $tahun; ?>">Cetak</a> ]
                </td>
          	</tr>
          </table>  
          <br />
          <table width="800" border="0" cellpadding="3" style="border-collapse: collapse">
            <tr>
              <td align="right" valign="middle" bgcolor="#CCCCCC">Nama Penuh :</td>
              <td align="left" valign="middle"><?php
                  include('conn.php');
                  echo output1(isset($tm['unama'])); ?></td>
            </tr>
            <tr>
              <td width="173" align="right" bgcolor="#CCCCCC">No. Kad Pengenalan :</td>
              <td width="609" align="left"><?php echo output1(isset($tm['unokp'])); ?></td>
            </tr>
            <tr>
              <td align="right" valign="middle" bgcolor="#CCCCCC">Unit :</td>
              <td align="left" valign="middle"><?php

                  include('conn.php');

				$sa = "SELECT * FROM bahagian WHERE bids = '" . isset($tm['bids']) . "' ORDER BY bids ASC";
                  if (isset($con)) {
                      $da = mysqli_query($con,$sa);
                  }
				$ta = mysqli_fetch_array($da);
				echo output1($ta['bahagian']); 
			  ?></td>
            </tr>
            <tr>
              <td align="right" valign="middle" bgcolor="#CCCCCC">Kumpulan Perkhidmatan :</td>
              <td align="left" valign="middle"><?php

                  include('conn.php');

				$sa = "SELECT * FROM kumpulan WHERE pids = '" . isset($tm['pids']) . "' ORDER BY pids ASC";
				//$da = mysqli_query($con,$sa);
                  if (isset($con)) {
                      $da = mysqli_query($con,$sa);
                  }
				$ta = mysqli_fetch_array($da);
				echo output1($ta['kumpulan']); 
			  ?></td>
            </tr>
            <tr>
              <td colspan="2" align="center" bgcolor="#E2E2E2"><b>Jenis Kursus</b></td>
            </tr>
            <?php

            include('conn.php');

			$kursus = 0;
			if ($bulan == "ALL") {
				$sb = "SELECT l.*, k.* 
					FROM latihan AS l, kursus AS k
					WHERE l.kids = k.kids
					AND l.unokp = '" . isset($tm['unokp']) . "' 
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
					AND l.unokp = '" . isset($tm['unokp']) . "' 
					AND k.kttamat RLIKE '" . kosong($bulan,2)."/".$tahun . "' 
				";
				if ($status != "ALL") {
					$sb .= "AND l.lstatus = '" . input1($status) . "' ";
				}
				$sb .= "ORDER BY l.unokp ASC";
			}
            if (isset($con)) {
                $db = mysqli_query($con, $sb) or die(mysqli_error($con));


                while ($tb = mysqli_fetch_array($db)) {
                    $kursus = $kursus + $tb['kjumlah'];
                }
            }
			$sesi = 0;
			if ($bulan == "ALL") {
				$sb = "SELECT * FROM sesi
					WHERE unokp = '" . isset($tm['unokp']) . "'
					AND starikh RLIKE '" . $tahun . "' 
				";
				if ($status != "ALL") {
					$sb .= "AND sstatus = '" . input1($status) . "' ";
				}
				$sb .= "ORDER BY unokp ASC";
			}
			else {
				$sb = "SELECT * FROM sesi
					WHERE unokp = '" . isset($tm['unokp']) . "'
					AND starikh RLIKE '" . kosong($bulan,2)."/".$tahun . "' 
				";
				if ($status != "ALL") {
					$sb .= "AND sstatus = '" . input1($status) . "' ";
				}
				$sb .= "ORDER BY unokp ASC";
			}
			$db = mysqli_query($con,$sb);
			while ($tb = mysqli_fetch_array($db)) {
				$sesi = $sesi + $tb['sjumlah'];
			}
			$hari = floor($sesi / 6);
			$jam = isset($ta['sjumlah']) - ($hari * 6);
			if ($hari >= 1) { $sesid = $hari . " HARI " . $jam . " JAM"; }
			elseif ($jam >= 1) { $sesid = $jam . " JAM"; }
			elseif (isset($ta['sjumlah']) == "0.5") { $sesid = "30 MINIT"; }
			else { $sesid = "0"; }
	
			$kendiri = 0;
			if ($bulan == "ALL") {
				$sb = "SELECT * FROM kendiri
					WHERE unokp = '" . isset($tm['unokp']) . "'
					AND dttamat RLIKE '" . $tahun . "' 
				";
				if ($status != "ALL") {
					$sb .= "AND dstatus = '" . input1($status) . "' ";
				}
				$sb .= "ORDER BY unokp ASC";
			}
			else {
				$sb = "SELECT * FROM kendiri
					WHERE unokp = '" . isset($tm['unokp']) . "'
					AND dttamat RLIKE '" . kosong($bulan,2)."/".$tahun . "' 
				";
				if ($status != "ALL") {
					$sb .= "AND dstatus = '" . input1($status) . "' ";
				}
				$sb .= "ORDER BY unokp ASC";
			}
			$db = mysqli_query($con,$sb);
			while ($tb = mysqli_fetch_array($db)) {
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
			?>
            <tr>
              <td align="right" bgcolor="#C6E2FF">Kursus/Latihan :</td>
              <td align="left" valign="middle"><?php

                  include('conn.php');

				if ($kursus >= 1) { echo $kursus . " HARI"; }
				else { echo "0"; }
			  ?></td>
            </tr>
            <tr>
              <td align="right" bgcolor="#C6E2FF">Sesi Pembelajaran :</td>
              <td align="left" valign="middle"><?php

                  include('conn.php');

				$hari = floor($sesi / 6);
				$jam = $sesi - ($hari * 6);
				if ($hari >= 1) { $sesid = $hari . " HARI " . $jam . " JAM"; }
				elseif ($jam >= 1) { $sesid = $jam . " JAM"; }
				elseif ($sesi == "0.5") { $sesid = "30 MINIT"; }
				else { $sesid = "0"; }
				echo str_replace(" 0 JAM","",str_replace(".5 JAM"," JAM 30 MINIT",$sesid));
			  ?></td>
            </tr>
            <tr>
              <td align="right" bgcolor="#C6E2FF">Pembelajaran Kendiri :</td>
              <td align="left" valign="middle"><?php 
				$hari = floor($kendiri / 6);
				$jam = $kendiri - ($hari * 6);
				if ($hari >= 1) { $sesid = $hari . " HARI " . $jam . " JAM"; }
				elseif ($jam >= 1) { $sesid = $jam . " JAM"; }
				elseif ($kendiri == "0.5") { $sesid = "30 MINIT"; }
				else { $sesid = "0"; }
				echo str_replace(" 0 JAM","",str_replace(".5 JAM"," JAM 30 MINIT",$sesid));
			  ?></td>
            </tr>
      	  </table>
          <br />
          <table width="800" border="1" cellspacing="0" cellpadding="3" style="border-collapse: collapse">
            <tr class="text2">
              <td colspan="6" align="center" bgcolor="#DE5302">SENARAI KURSUS</td>
            </tr>
            <tr class="text1">
              <td width="42" align="center" valign="middle" bgcolor="#CCCCCC">Bil</td>
              <td width="513" align="left" valign="middle" bgcolor="#CCCCCC">Nama Kursus</td>
              <td colspan="4" align="center" valign="middle" bgcolor="#CCCCCC">Jumlah Hari</td>
            </tr>
            <?php
			$kursus = 0;
			if ($bulan == "ALL") {
				$sb = "SELECT l.*, k.* 
					FROM latihan AS l, kursus AS k
					WHERE l.kids = k.kids
					AND l.unokp = '" . isset($tm['unokp']) . "' 
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
					AND l.unokp = '" . isset($tm['unokp']) . "' 
					AND k.kttamat RLIKE '" . kosong($bulan,2)."/".$tahun . "' 
				";
				if ($status != "ALL") {
					$sb .= "AND l.lstatus = '" . input1($status) . "' ";
				}
				$sb .= "ORDER BY l.unokp ASC";
			}
			$db = mysqli_query($con,$sb) or die(mysqli_error().$sb);
			while ($tb = mysqli_fetch_array($db)) {
				$n = $n + 1;
				?>
				<tr>
				  <td align="center" valign="middle"><?php echo $n; ?></td>
				  <td align="left" valign="middle"><?php echo output1(nl2br($tb['ktajuk'])) . "<br>" . output1($tb['ktmula']) . " - " . output1($tb['kttamat']) . "<br>" . output1($tb['klokasi']); ?></td>
				  <td width="219" align="center" valign="middle">
					<?php 
					$kursus = $kursus + $tb['kjumlah'];
					echo $tb['kjumlah'] . " HARI"; 
					?>
				  </td>
				</tr>
			<?php
			}
			
			$sesi = 0;
			if ($bulan == "ALL") {
				$sb = "SELECT * FROM sesi
					WHERE unokp = '" . isset($tm['unokp']) . "'
					AND starikh RLIKE '" . $tahun . "' 
				";
				if ($status != "ALL") {
					$sb .= "AND sstatus = '" . input1($status) . "' ";
				}
				$sb .= "ORDER BY unokp ASC";
			}
			else {
				$sb = "SELECT * FROM sesi
					WHERE unokp = '" . isset($tm['unokp']) . "'
					AND starikh RLIKE '" . kosong($bulan,2)."/".$tahun . "' 
				";
				if ($status != "ALL") {
					$sb .= "AND sstatus = '" . input1($status) . "' ";
				}
				$sb .= "ORDER BY unokp ASC";
			}
			$db = mysqli_query($con,$sb);
			while ($tb = mysqli_fetch_array($db)) {
				$n = $n + 1;
				?>
				<tr>
				  <td align="center" valign="middle"><?php echo $n; ?></td>
				  <td align="left" valign="middle"><?php echo output1(nl2br($tb['stajuk'])) . "<br>" . output1($tb['starikh']) . "<br>" . output1($tb['stempat']); ?></td>
				  <td align="center" valign="middle">
					<?php 
					$sesi = $sesi + $tb['sjumlah'];
					$hari = floor($tb['sjumlah'] / 6);
					$jam = $tb['sjumlah'] - ($hari * 6);
					if ($hari >= 1) { $sesid = $hari . " HARI " . $jam . " JAM"; }
					elseif ($jam >= 1) { $sesid = $jam . " JAM"; }
					elseif ($tb['sjumlah'] == "0.5") { $sesid = "30 MINIT"; }
					else { $sesid = "0"; }
					echo str_replace(" 0 JAM","",str_replace(".5 JAM"," JAM 30 MINIT",$sesid));
					?>
				  </td>
				</tr>
			<?php
			}
	
			$kendiri = 0;
			if ($bulan == "ALL") {
				$sb = "SELECT * FROM kendiri
					WHERE unokp = '" . isset($tm['unokp']) . "'
					AND dttamat RLIKE '" . $tahun . "' 
				";
				if ($status != "ALL") {
					$sb .= "AND dstatus = '" . input1($status) . "' ";
				}
				$sb .= "ORDER BY unokp ASC";
			}
			else {
				$sb = "SELECT * FROM kendiri
					WHERE unokp = '" . isset($tm['unokp']) . "'
					AND dttamat RLIKE '" . kosong($bulan,2)."/".$tahun . "' 
				";
				if ($status != "ALL") {
					$sb .= "AND dstatus = '" . input1($status) . "' ";
				}
				$sb .= "ORDER BY unokp ASC";
			}
			$db = mysqli_query($con,$sb);
			while ($tb = mysqli_fetch_array($db)) {
				$n = $n + 1;
				?>
				<tr>
				  <td align="center" valign="middle"><?php echo $n; ?></td>
				  <td align="left" valign="middle">
					<?php 
					if ($tb['djenis'] == 1) {
					  $sc = "SELECT * FROM epsa WHERE eids = '" . input2($tb['eids']) . "' ORDER BY eids ASC";
					  $dc = mysqli_query($con,$sc);
					  $tc = mysqli_fetch_array($dc);
					  echo output1($tc['epsa']); 
					}
					else {
					  echo output1(nl2br($tb['dtajuk'])); 
					}
					echo "<br>" . output1($tb['dtmula']) . " - " . output1($tb['dttamat']);
					if (!empty($tb['dtempat'])) { echo "<br>" . output1($tb['dtempat']); }
					?>
				  </td>
				  <td align="center" valign="middle">
					<?php
					if ($tb['djenis'] == 1) { 
						$kendiri = $kendiri + $tb['djumlah'];
						echo $tb['djumlah'] . " JAM";
					}
					elseif ($tb['djenis'] == 2) { 
						$kendiri = $kendiri + 6;
						echo "1 HARI";
					}
					elseif ($tb['djenis'] == 3) { 
						$kendiri = $kendiri + $tb['djumlah'];
						echo hari(1,$tb['dtmula'],$tb['dttamat']) . " HARI";
					}
					?>
				  </td>
				</tr>
			<?php
			}
			if ($n) {
				?>
				<tr class="text1">
				  <td colspan="2" align="center" valign="middle">Jumlah Keseluruhan Hari</td>
				  <td align="center" valign="middle">
				  	<?php 
					$total = ($kursus * 6) + $sesi + $kendiri;
					$hari = floor($total / 6);
					$jam = $total - ($hari * 6);
					if ($hari >= 1) { $sesid = $hari . " HARI " . $jam . " JAM"; }
					elseif ($jam >= 1) { $sesid = $jam . " JAM"; }
					elseif ($total == "0.5") { $sesid = "30 MINIT"; }
					else { $sesid = "0"; }
					echo str_replace(" 0 JAM","",str_replace(".5 JAM"," JAM 30 MINIT",$sesid));
					?>
                  </td>
				</tr>
			<?php
			}
			if (!$n) {
				?>
                <tr>
                  <td colspan="3" align="center" valign="middle">Tiada maklumat kursus</td>
                </tr>
            <?php
			}
			?>
      </table><br /></td>
    </tr>
</table>