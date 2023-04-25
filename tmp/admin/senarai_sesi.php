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
			else { $bulan = "ALL"; }
			if (!empty($_POST['tahun'])) { $tahun = $_POST['tahun']; }
			else { $tahun = date("Y"); }
			?>
            <table width="990" border="0" cellspacing="0" cellpadding="3">
          	<form id="kursus" name="kursus" method="post" action="index.php?modul=kelulusan&amp;menu=sesi">
              <tr bgcolor="#E2E2E2">
                <td width="730" align="right">Pilihan :</td>
                <td width="41" align="right"><select name="bahagian" id="bahagian">
                  <option value="">- SEMUA -</option>
                  <?php
				  $sa = "SELECT * FROM bahagian WHERE bdelete = 1 ORDER BY bahagian ASC";
				  $da = mysql_query($sa);
				  while ($ta = mysql_fetch_array($da)) {
					  if ($ta['bids'] == isset($_POST['bahagian'])) { $select = 'selected="selected"'; }
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
                <td width="60" align="center"><input type="submit" name="Submit" id="Submit" value=" Papar " class="button" /></td>
              </tr>
          	</form>
            </table>
          <br />
          <table width="990" border="1" cellspacing="0" cellpadding="3" style="border-collapse: collapse">
            <tr class="text2">
              <td colspan="6" align="center" bgcolor="#DE5302">SENARAI MAKLUMAN SESI PEMBELAJARAN</td>
            </tr>
            <tr class="text1">
              <td width="41" align="center" valign="middle" bgcolor="#CCCCCC">Bil</td>
              <td width="130" align="center" valign="middle" bgcolor="#CCCCCC">Tarikh Maklum</td>
              <td width="254" align="left" valign="middle" bgcolor="#CCCCCC">Maklumat Pegawai</td>
              <td width="260" align="left" valign="middle" bgcolor="#CCCCCC">Maklumat Sesi Pembelajaran</td>
              <td width="164" align="center" valign="middle" bgcolor="#CCCCCC">Status</td>
              <td width="91" align="center" valign="middle" bgcolor="#CCCCCC">Tindakan</td>
            </tr>
            <?php
			$s = "SELECT s.*, u.*, b.*
				FROM sesi AS s, user AS u, bahagian AS b
				WHERE s.unokp = u.unokp
				AND u.bids = b.bids
				AND s.sdelete = 1
			";
			if ($bahagian != "ALL") {
				$s .= "AND b.bids = '" . input2($bahagian) . "'";
			}
			if ($status != "ALL") {
				$s .= "AND s.sstatus = '" . input1($status) . "'";
			}
			if ($bulan != "ALL") {
				$s .= "AND s.starikh RLIKE '" . kosong($bulan,2)."/".$tahun . "'";
			}
			else {
				$s .= "AND s.starikh RLIKE '" . $tahun . "'";
			}
			$s .= "ORDER BY s.spada DESC";
			$d = mysql_query($s);
			while ($t = mysql_fetch_array($d)) {
				$n = $n + 1;
				?>
				<tr>
				  <td align="center" valign="middle"><?php echo $n; ?></td>
				  <td align="center" valign="middle"><?php echo date("d/m/Y h:iA",output1($t['spada'])); ?></td>
				  <td align="left" valign="middle"><?php echo output1($t['unama']) . "<br>(" . output1($t['unokp']) . ")<br>" . output1($t['bahagian']); ?></td>
				  <td align="left" valign="middle"><?php echo output1(nl2br($t['stajuk'])) . "<br>" . output1($t['starikh']); ?></td>
				  <td align="center" valign="middle"><?php 
					if ($t['sstatus'] == 2) { echo "DISAHKAN"; }
					elseif ($t['sstatus'] == 3) { echo "TIDAK DISAHKAN"; }
					elseif ($t['sstatus'] == 4) { echo "KIV"; }
					elseif ($t['sstatus'] == 5) { echo "DIBATALKAN"; }
					else { echo "DALAM TINDAKAN"; }
					?></td>
				  <td align="center" bgcolor="#33CCFF"><a href="index.php?modul=kelulusan&amp;menu=sesi&amp;id=<?php echo $t['sids']; ?>">Kemaskini</a></td>
				</tr>
			<?php
			}
			$n = 0;
			if (!$n) {
				?>
                <tr>
                  <td colspan="6" align="center" valign="middle">Tiada maklumat pendaftaran sesi pembelajaran</td>
                </tr>
            <?php
			}
			?>
      </table><br /></td>
    </tr>
</table>