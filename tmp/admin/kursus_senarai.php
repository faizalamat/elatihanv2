<?php global $con;$n = 0 ?>

<table width="995" cellspacing="0" cellpadding="2" border="0">
    <tr>
        <td align="center" valign="top" bgcolor="#E2E2E2">
            <br />
            <?php
			if (!empty($_POST['anjuran'])) { $anjuran = $_POST['anjuran']; }
			else { $anjuran = "ALL"; }
			if (!empty($_POST['bulan'])) { $bulan = $_POST['bulan']; }
			else { $bulan = "ALL"; }
			if (!empty($_POST['tahun'])) { $tahun = $_POST['tahun']; }
			else { $tahun = date("Y"); }
			?>
            <table width="900" border="0" cellspacing="0" cellpadding="3">
          	<form id="kursus" name="kursus" method="post" action="index.php?modul=kursus&amp;menu=senarai">
              <tr bgcolor="#E2E2E2">
                <td width="689" align="right">Pilihan :</td>
                <td width="41" align="right"><select name="anjuran" id="anjuran">
                  <option value="">- SEMUA -</option>
                  <option value="1" <?php if ($anjuran == 1) { echo 'selected="selected"'; } ?>>JABATAN</option>
                  <option value="2" <?php if ($anjuran == 2) { echo 'selected="selected"'; } ?>>BAHAGIAN</option>
                  <option value="3" <?php if ($anjuran == 3) { echo 'selected="selected"'; } ?>>SWASTA</option>
                  <option value="4" <?php if ($anjuran == 4) { echo 'selected="selected"'; } ?>>AGENSI LUAR</option>
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
          <table width="872" border="1" cellspacing="0" cellpadding="3" style="border-collapse: collapse">
            <tr class="text2">
              <td colspan="6" align="center" bgcolor="#DE5302">SENARAI KURSUS/LATIHAN</td>
            </tr>
            <tr class="text1">
              <td width="40" align="center" bgcolor="#CCCCCC">Bil</td>
              <td width="351" align="left" bgcolor="#CCCCCC">Tajuk &amp; Lokasi</td>
              <td width="175" align="center" bgcolor="#CCCCCC">Tarikh</td>
              <td width="44" align="left" bgcolor="#CCCCCC">
				<p align="center">Hari</td>
              <td width="136" align="left" bgcolor="#CCCCCC">Anjuran</td>
              <td width="79" align="center" bgcolor="#CCCCCC">Tindakan</td>
            </tr>
            <?php
			if ($bulan == "ALL") {
				$s = "SELECT * FROM kursus 
					WHERE kdelete = 1 
					AND ktmula RLIKE '" . input1($tahun) . "' 
				";
				if ($anjuran != "ALL") {
					$s .= "AND kanjuran = '" . input1($anjuran) . "' ";
				}
				$s .= "ORDER BY ktajuk ASC";
			}
			else {
				$s = "SELECT * FROM kursus 
					WHERE kdelete = 1 
					AND ktmula RLIKE '" . kosong($bulan,2)."/".$tahun . "'
				";
				if ($anjuran != "ALL") {
					$s .= "AND kanjuran = '" . input1($anjuran) . "' ";
				}
				$s .= "ORDER BY ktajuk ASC";
			}
			$d = mysqli_query($con,$s);
			while ($t = mysqli_fetch_array($d)) {
				$n = $n + 1;
				?>
                <tr>
                  <td align="center"><?php echo $n; ?></td>
                  <td align="left" valign="middle"><a href="index.php?modul=kursus&menu=hadir&id=<?php echo $t['kids']; ?>"><?php echo output2(nl2br($t['ktajuk'])) . "</a><br>" . output1($t['klokasi']); ?></td>
                  <td align="center" valign="middle"><?php echo output1($t['ktmula']) . " - " . output1($t['kttamat']); ?></td>
                  <td align="left" valign="middle">
					<p align="center"><?php echo output1($t['kjumlah']); ?>
				  	&nbsp;</td>
                  <td align="left" valign="middle">
				  	<?php 
					if ($t['kanjuran'] == 1) { echo "JABATAN"; }
					elseif ($t['kanjuran'] == 2) { 
						$sa = "SELECT * FROM bahagian WHERE bids = '" . $t['bids'] . "' ORDER BY bids ASC";
						$da = mysqli_query($con,$sa);
						$ta = mysqli_fetch_array($da);
						echo output1($ta['bahagian']); 
					}
					elseif ($t['kanjuran'] == 3) { echo "SWASTA"; }
					else { echo "AGENSI LUAR"; }
					?>
                  </td>
                  <td align="center" bgcolor="#33CCFF"><a href="index.php?modul=kursus&menu=kemaskini&id=<?php echo $t['kids']; ?>">Kemaskini</a></td>
                </tr>
            <?php
			}
			if (!$n) {
				?>
                <tr>
                  <td colspan="6" align="center">Tiada maklumat kursus/latihan</td>
                </tr>
            <?php
			}
			?>
      </table><br /></td>
    </tr>
</table>