<table width="995" cellspacing="0" cellpadding="2" border="0">
    <tr>
        <td align="center" valign="top" bgcolor="#E2E2E2">
            <br />
            <table width="796" border="0" cellpadding="3" style="border-collapse: collapse">
          	<form id="kursus" name="kursus" method="post" action="index.php?modul=pendaftaran&amp;menu=kendiri" onsubmit="return lengkap5();">
              <tr>
                <td colspan="2" align="center" bgcolor="#DE5302" class="text2">
				SEMAK PEMBELAJARAN KENDIRI</td>
              </tr>
              <tr>
                <td colspan="2" align="center" bgcolor="#CCCCCC" class="text1">Maklumat Pegawai</td>
              </tr>
              <tr>
                <td width="158" align="right" bgcolor="#CCCCCC">Nama Penuh :</td>
                <td width="626" align="left" bgcolor="#F0F0F0"><?php echo output1($tm['unama']); ?></td>
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
                <td colspan="2" align="center" bgcolor="#CCCCCC" class="text1">Maklumat Kursus Yang Telah Dihadiri</td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Jenis :</td>
                <td align="left" bgcolor="#F0F0F0">
                  <?php
                  if ($_POST['jenis'] == 1) { echo "EPSA"; }
                  elseif ($_POST['jenis'] == 2) { echo "PEMBENTANGAN BUKU"; }
                  else { echo "LAIN-LAIN (SILA NYATAKAN)"; }
				  ?>
                  <input name="jenis" value="<?php echo $_POST['jenis']; ?>" type="hidden" />
                </td>
              </tr>
              <?php
              if ($_POST['jenis'] == 1) {
				  $sa = "SELECT * FROM epsa WHERE edelete = 1 AND eids = '" . input2($_POST['epsa']) . "' ORDER BY eids ASC";
				  $da = mysql_query($sa);
				  $ta = mysql_fetch_array($da);
				  ?>
                  <tr>
                    <td align="right" bgcolor="#CCCCCC">Tajuk :</td>
                    <td align="left" bgcolor="#F0F0F0"><?php echo output1($ta['epsa']) . " (" . output1($ta['ekod']) . ")"; ?><input name="epsa" value="<?php echo $_POST['epsa']; ?>" type="hidden" /></td>
                  </tr>
              <?php
			  }
              elseif ($_POST['jenis'] == 2) {
				  ?>
                  <tr>
                    <td align="right" bgcolor="#CCCCCC">Tajuk :</td>
                    <td align="left" bgcolor="#F0F0F0"><?php echo output1($_POST['tajuk']); ?><input name="tajuk" value="<?php echo $_POST['tajuk']; ?>" type="hidden" /></td>
                  </tr>
              <?php
			  }
              elseif ($_POST['jenis'] == 3) {
				  ?>
                  <tr>
                    <td align="right" bgcolor="#CCCCCC">&nbsp;</td>
                    <td align="left" bgcolor="#F0F0F0"><?php echo strtoupper(output1($_POST['lain'])); ?><input name="lain" value="<?php echo $_POST['lain']; ?>" type="hidden" /></td>
                  </tr>
                  <tr>
                    <td align="right" bgcolor="#CCCCCC">Tajuk :</td>
                    <td align="left" bgcolor="#F0F0F0"><?php echo output1($_POST['tajuk']); ?><input name="tajuk" value="<?php echo $_POST['tajuk']; ?>" type="hidden" /></td>
                  </tr>
              <?php
			  }
			  ?>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Tarikh Mula :</td>
                <td align="left" valign="middle" bgcolor="#F0F0F0"><?php echo strtoupper(output1($_POST['tmula'])); ?><input name="tmula" value="<?php echo $_POST['tmula']; ?>" type="hidden" /></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Tarikh Tamat :</td>
                <td align="left" valign="middle" bgcolor="#F0F0F0">
					<?php echo strtoupper(output1($_POST['ttamat'])); ?><input name="ttamat" value="<?php echo $_POST['ttamat']; ?>" type="hidden" />
                    <?php
					if ($_POST['jenis'] == 1) { $jumlah = $ta['ejam']; }
					elseif ($_POST['jenis'] == 2) { $jumlah = 6; }
					elseif ($_POST['jenis'] == 3) { $jumlah = hari(1,$_POST['tmula'],$_POST['ttamat']) * 6; }
					?><input name="jumlah" value="<?php echo $jumlah; ?>" type="hidden" />
                </td>
              </tr>
              <?php
              if ($_POST['jenis'] != 1) {
				  ?>
                  <tr>
                    <td align="right" bgcolor="#CCCCCC">Tempat :</td>
                    <td align="left" bgcolor="#F0F0F0"><?php echo strtoupper(output1($_POST['tempat'])); ?><input name="tempat" value="<?php echo $_POST['tempat']; ?>" type="hidden" /></td>
                  </tr>
              <?php
			  }
			  ?>
              <tr>
                <td align="right" bgcolor="#CCCCCC">&nbsp;</td>
                <td align="left" class="text8" bgcolor="#F0F0F0">Klik butang Hantar Makluman di bawah untuk menghantar ke Unit Latihan.</td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">&nbsp;</td>
                <td align="left" bgcolor="#F0F0F0">
				<input type="submit" name="akuan" id="akuan" value="Hantar Makluman" class="button" />
                <input type="submit" name="Submit" id="Submit" value="Kembali" class="button" /></td>
              </tr>
          	</form>
            </table>
      <br /></td>
    </tr>
</table>