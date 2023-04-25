<table width="995" cellspacing="0" cellpadding="2" border="0">
    <tr>
        <td align="center" valign="top" bgcolor="#E2E2E2">
            <br />
            <table width="814" border="0" cellpadding="3" style="border-collapse: collapse">
          	<form id="kursus" name="kursus" method="post" action="index.php?modul=pendaftaran&amp;menu=kursus">
              <tr>
                <td colspan="2" align="center" bgcolor="#DE5302" class="text2">
				SEMAK KURSUS/LATIHAN YANG TELAH DIHADIRI</td>
              </tr>
              <tr>
                <td colspan="2" align="center" bgcolor="#E2E2E2" class="text1">Maklumat Pegawai</td>
              </tr>
              <tr>
                <td width="170" align="right" bgcolor="#CCCCCC">Nama Penuh :</td>
                <td width="632" align="left" bgcolor="#F0F0F0"><?php echo output1($tm['unama']); ?></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">No. Kad Pengenalan :</td>
                <td align="left" bgcolor="#F0F0F0"><?php echo output1($tm['unokp']); ?></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">No. Kad ID :</td>
                <td align="left" bgcolor="#F0F0F0"><?php echo output1($tm['unoid']); ?></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Unit :</td>
                <td align="left" bgcolor="#F0F0F0">
					<?php 
					$sa = "SELECT * FROM bahagian WHERE bids = '" . $tm['bids'] . "' ORDER BY bids ASC";
					$da = mysql_query($sa);
					$ta = mysql_fetch_array($da);
					echo output1($ta['bahagian']); 
					?>
                </td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Kumpulan Perkhidmatan :</td>
                <td align="left" bgcolor="#F0F0F0">
					<?php 
					$sa = "SELECT * FROM kumpulan WHERE pids = '" . $tm['pids'] . "' ORDER BY pids ASC";
					$da = mysql_query($sa);
					$ta = mysql_fetch_array($da);
					echo output1($ta['kumpulan']); 
					?>
                </td>
              </tr>
              <tr>
                <td colspan="2" align="center" bgcolor="#E2E2E2" class="text1">Maklumat Kursus / Latihan 
				Yang Telah Dihadiri</td>
              </tr>
              <?php
			  if (!empty($_POST['tajuk']) && strlen($_POST['tajuk']) == 32) {
				  $s = "SELECT * FROM kursus WHERE kids = '" . input2($_POST['tajuk']) . "' ORDER BY kids ASC";
				  $d = mysql_query($s);
				  $t = mysql_fetch_array($d);
			  }
			  ?>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Jenis :</td>
                <td align="left" bgcolor="#F0F0F0">
					<?php 
					if ($t['kjenis'] == 1) { echo "DALAM NEGARA"; }
					else { echo "LUAR NEGARA"; }
					?>
                </td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Anjuran :</td>
                <td align="left" bgcolor="#F0F0F0">
					<?php 
					if ($t['kanjuran'] == 1) { echo "JABATAN"; }
					elseif ($t['kanjuran'] == 2) { echo "BAHAGIAN"; }
					elseif ($t['kanjuran'] == 3) { echo "SWASTA"; }
					else { echo "AGENSI LUAR"; }
					?>
                </td>
              </tr>
              <?php
			  if ($t['kanjuran'] == 1) {
				  ?>
                  <tr>
                    <td align="right" bgcolor="#CCCCCC">Unit :</td>
                    <td align="left" bgcolor="#F0F0F0">
                        <?php 
                        $sa = "SELECT * FROM bahagian WHERE bids = '" . $t['bids'] . "' ORDER BY bids ASC";
                        $da = mysql_query($sa);
                        $ta = mysql_fetch_array($da);
                        echo output1($ta['bahagian']); 
                        ?>
                    </td>
                  </tr>
              <?php
			  }
			  else {
				  ?>
				  <tr>
					<td align="right" bgcolor="#CCCCCC">Nama Syarikat/Sektor :</td>
					<td align="left" bgcolor="#F0F0F0"><?php echo output1($t['ksektor']); ?></td>
				  </tr>
              <?php
			  }
			  ?>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Tajuk Kursus :</td>
                <td align="left" bgcolor="#F0F0F0"><?php echo output2(nl2br($t['ktajuk'])); ?></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Bidang :</td>
                <td align="left" bgcolor="#F0F0F0"><?php echo output1($t['kbidang']); ?></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Tarikh :</td>
                <td align="left" bgcolor="#F0F0F0"><?php echo output1($t['ktmula']) . " - " . output1($t['kttamat']) . " (" . output1($t['kjumlah']) . " HARI)"; ?></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Lokasi :</td>
                <td align="left" bgcolor="#F0F0F0"><?php echo output1($t['klokasi']); ?></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">&nbsp;</td>
                <td align="left" class="text8" bgcolor="#F0F0F0">Klik butang Hantar di bawah untuk menghantar ke Unit Latihan.</td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">&nbsp;</td>
                <td align="left" bgcolor="#F0F0F0"><input name="id" type="hidden" id="id" value="<?php echo $t['kids']; ?>" />
                  <input type="submit" name="akuan" id="akuan" value="Hantar" class="button" />
                <input type="submit" name="Submit" id="Submit" value="Kembali" class="button" /></td>
              </tr>
          	</form>
            </table>
      <br /></td>
    </tr>
</table>