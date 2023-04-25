<?php $n = 0 ?>
<table width="995" cellspacing="0" cellpadding="2" border="0">
    <tr>
        <td align="center" valign="top" bgcolor="#E2E2E2">
          <br />
            <?php
			if (!empty($_POST['status'])) { $status = $_POST['status']; }
			else { $status = "ALL"; }
			if (!empty($_POST['bulan'])) { $bulan = $_POST['bulan']; }
			else { $bulan = "ALL"; }
			if (!empty($_POST['tahun'])) { $tahun = $_POST['tahun']; }
			else { $tahun = date("Y"); }
			?>
            <table width="800" border="0" cellspacing="0" cellpadding="3">
          	<form id="kursus" name="kursus" method="post" action="index.php?modul=status&amp;menu=sesi">
              <tr bgcolor="#E2E2E2">
                <td width="588" align="right">Pilihan :</td>
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
                <td width="59" align="center"><input type="submit" name="Submit" id="Submit" value=" Papar " class="button" /></td>
              </tr>
          	</form>
            </table>
          <br />
          <table width="906" border="1" cellspacing="0" cellpadding="3" style="border-collapse: collapse">
            <tr class="text2">
              <td colspan="5" align="center" bgcolor="#DE5302">SENARAI HANTAR 
				MAKLUMAN SESI PEMBELAJARAN</td>
            </tr>
            <tr class="text1">
              <td width="41" align="center" valign="middle" bgcolor="#CCCCCC">Bil</td>
              <td width="154" align="center" valign="middle" bgcolor="#CCCCCC">Tarikh 
				&amp; Masa Maklum</td>
              <td align="left" valign="middle" bgcolor="#CCCCCC" width="450">Maklumat Sesi Pembelajaran</td>
              <td width="125" align="center" valign="middle" bgcolor="#CCCCCC">Status</td>
              <td width="95" align="center" valign="middle" bgcolor="#CCCCCC">Tindakan</td>
            </tr>
            <?php
			$s = "SELECT * FROM sesi 
				WHERE sdelete = 1 
				AND unokp = '" . $tm['unokp'] . "' 
			";
			if ($status != "ALL") {
				$s .= "AND sstatus = '" . input1($status) . "'";
			}
			if ($bulan != "ALL") {
				$s .= "AND starikh RLIKE '" . kosong($bulan,2)."/".$tahun . "'";
			}
			else {
				$s .= "AND starikh RLIKE '" . $tahun . "'";
			}
			$s .= "ORDER BY spada DESC";
			$d = mysql_query($s);
			while ($t = mysql_fetch_array($d)) {
				$n = $n + 1;
				?>
				<tr>
				  <td align="center" valign="middle"><?php echo $n; ?></td>
				  <td align="center" valign="middle"><?php echo date("d/m/Y h:iA",output1($t['spada'])); ?></td>
				  <td align="left" valign="middle" width="450"><?php echo output1(nl2br($t['stajuk'])) . "<br>" . output1($t['starikh']); ?></td>
				  <td align="center" valign="middle"><?php 
					if ($t['sstatus'] == 2) { echo "DISAHKAN"; }
					elseif ($t['sstatus'] == 3) { echo "TIDAK DISAHKAN"; }
					elseif ($t['sstatus'] == 4) { echo "KIV"; }
					elseif ($t['sstatus'] == 5) { echo "DIBATALKAN"; }
					else { echo "DALAM TINDAKAN"; }
					?></td>
				  <td align="center" valign="middle"><a href="index.php?modul=status&amp;menu=sesi&amp;id=<?php echo $t['sids']; ?>">Lihat</a></td>
				</tr>
			<?php
			}
			if (!$n) {
				?>
                <tr>
                  <td colspan="5" align="center" valign="middle">Tiada maklumat pendaftaran sesi pembelajaran</td>
                </tr>
            <?php
			}
			?>
      </table><br /></td>
    </tr>
</table>