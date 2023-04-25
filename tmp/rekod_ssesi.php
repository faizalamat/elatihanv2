<table width="995" cellspacing="0" cellpadding="2" border="0">
    <tr>
        <td align="center" valign="top" bgcolor="#E2E2E2">
            <br />
            <table width="816" border="0" cellpadding="3" style="border-collapse: collapse">
          	<form id="kursus" name="kursus" method="post" action="index.php?modul=pendaftaran&amp;menu=sesi" onsubmit="return lengkap4();">
              <tr>
                <td colspan="2" align="center" bgcolor="#DE5302" class="text2">
				SEMAK SESI PEMBELAJARAN</td>
              </tr>
              <tr>
                <td colspan="2" align="center" bgcolor="#CCCCCC" class="text1">Maklumat Pegawai</td>
              </tr>
              <tr>
                <td width="179" align="right" bgcolor="#CCCCCC">Nama Penuh :</td>
                <td width="625" align="left" bgcolor="#F0F0F0"><?php echo output1($tm['unama']); ?></td>
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
                <td colspan="2" align="center" bgcolor="#CCCCCC" class="text1">Maklumat 
				Sesi Pembelajaran Yang Telah Dihadiri</td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Jenis :</td>
                <td align="left" bgcolor="#F0F0F0">
                  <?php
                  if ($_POST['jenis'] == 1) { echo "PROGRAM KE ARAH PERKHIDMATAN CEMERLANG DAN CINTAILAH NEGARA KITA"; }
                  elseif ($_POST['jenis'] == 2) { echo "PERHIMPUNAN BULANAN BERSAMA YBHG. DATUK TKSUK"; }
                  elseif ($_POST['jenis'] == 3) { echo "MAJLIS PERDANA PERKHIDMATAN AWAM KETIGA BELAS (MAPPA XIII)"; }
                  elseif ($_POST['jenis'] == 4) { echo "SESI PEMBELAJARAN"; }
                  elseif ($_POST['jenis'] == 5) { echo "SESI PEMBELAJARAN"; }
                  elseif ($_POST['jenis'] == 6) { echo "PEMBENTANGAN KERTAS KERJA"; }
                  else { echo "LAIN-LAIN (SILA NYATAKAN)"; }
				  ?>
                  <input name="jenis" value="<?php echo $_POST['jenis']; ?>" type="hidden" />
                </td>
              </tr>
              <?php
              if ($_POST['jenis'] == 7) {
				  ?>
                  <tr>
                    <td align="right" bgcolor="#CCCCCC">&nbsp;</td>
                    <td align="left" bgcolor="#F0F0F0"><?php echo strtoupper(output1($_POST['lain'])); ?><input name="lain" value="<?php echo $_POST['lain']; ?>" type="hidden" /></td>
                  </tr>
              <?php
			  }
			  ?>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Tajuk :</td>
                <td align="left" bgcolor="#F0F0F0"><?php echo output2(nl2br($_POST['tajuk'])); ?><input name="tajuk" value="<?php echo $_POST['tajuk']; ?>" type="hidden" /></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Anjuran :</td>
                <td align="left" bgcolor="#F0F0F0"><?php echo strtoupper(output2(nl2br($_POST['anjuran']))); ?><input name="anjuran" value="<?php echo $_POST['anjuran']; ?>" type="hidden" /></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Tarikh :</td>
                <td align="left" valign="middle" bgcolor="#F0F0F0"><?php echo strtoupper(output1($_POST['tmula'])); ?><input name="tmula" value="<?php echo $_POST['tmula']; ?>" type="hidden" /></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Tempat :</td>
                <td align="left" bgcolor="#F0F0F0"><?php echo strtoupper(output1($_POST['tempat'])); ?><input name="tempat" value="<?php echo $_POST['tempat']; ?>" type="hidden" /></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Waktu Mula :</td>
                <td align="left" bgcolor="#F0F0F0"><?php echo jam(output1($_POST['wmula'])); ?><input name="wmula" value="<?php echo $_POST['wmula']; ?>" type="hidden" /></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Waktu Tamat :</td>
                <td align="left" bgcolor="#F0F0F0">
					<?php echo jam(output1($_POST['wtamat'])); ?><input name="wtamat" value="<?php echo $_POST['wtamat']; ?>" type="hidden" />
                	<?php 
                  	if ($_POST['jenis'] == 1 || $_POST['jenis'] == 2) { $jumlah = 1; }
                  	elseif ($_POST['jenis'] == 3) { $jumlah = 0.5; }
					else { $jumlah = output1($_POST['wtamat']) - output1($_POST['wmula']); }
					?><input name="jumlah" value="<?php echo $jumlah; ?>" type="hidden" />
                </td>
              </tr>
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