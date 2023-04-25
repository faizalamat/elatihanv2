<table width="995" cellspacing="0" cellpadding="2" border="0">
    <tr>
        <td align="center" valign="top" bgcolor="#E2E2E2">
            <br />
            <table width="819" border="0" cellpadding="3" style="border-collapse: collapse">
          	<form id="kursus" name="kursus" method="post" action="index.php?modul=pendaftaran&amp;menu=kursus">
              <tr>
                <td colspan="2" align="center" bgcolor="#DE5302" class="text2">
				HANTAR MAKLUMAN KURSUS / LATIHAN</td>
              </tr>
              <tr>
                <td colspan="2" align="center" bgcolor="#CCCCCC" class="text1">Maklumat Pegawai</td>
              </tr>
              <tr>
                <td width="158" align="right" bgcolor="#CCCCCC">Nama Penuh :</td>
                <td width="649" align="left" bgcolor="#F0F0F0"><?php echo output1($tm['unama']); ?></td>
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
                <td colspan="2" align="center" bgcolor="#C6E2FF" class="text1">
				Isikan Maklumat Kursus / Latihan Yang Telah Anda Hadiri</td>
              </tr>
              <?php
			  if (!empty($_GET['bulan'])) { $bulan = kosong(input1($_GET['bulan']),2); }
			  else { $bulan = "01"; }
			  if (!empty($_GET['tahun'])) { $tahun = input1($_GET['tahun']); }
			  else { $tahun = date("Y"); }
			  ?>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Bulan :</td>
                <td align="left" bgcolor="#FFFFFF"><select name="bulan" id="bulan" onchange="javascript:window.location.href='index.php?modul=pendaftaran&menu=kursus&bulan='+this.value;">
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
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Tahun :</td>
                <td align="left" bgcolor="#FFFFFF"><select name="tahun" id="tahun" onchange="javascript:window.location.href='index.php?modul=pendaftaran&menu=kursus&bulan=<?php echo $bulan; ?>&tahun='+this.value;">
                  <?php
				  for ($i = date("Y")+1; $i >= 2010; $i--) {
					  if ($i == $tahun) { $select = 'selected="selected"'; }
					  else { $select = ""; }
					?>
                  	<option value="<?php echo $i; ?>" <?php echo $select; ?>><?php echo $i; ?></option>
                  <?php
				  }
				  ?>
                </select></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Tajuk Kursus <span class="text8">*</span> :</td>
                <td align="left" bgcolor="#FFFFFF"><select name="tajuk" id="tajuk">
                  <?php
					$sa = "SELECT * FROM kursus 
						WHERE kdelete = 1 
						AND ktmula RLIKE '" . "/".$bulan."/".$tahun . "'
						ORDER BY ktmula2 ASC
					";
					$da = mysql_query($sa);
					while ($ta = mysql_fetch_array($da)) {
						?>
                  <option value="<?php echo $ta['kids']; ?>"><?php echo $ta['ktajuk'] . " (" . output1($ta['ktmula']) . " - " . output1($ta['kttamat']) . ")"; ?></option>
                  <?php
					}
					?>
                </select></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">&nbsp;</td>
                <td align="left" bgcolor="#FFFFFF"><input type="submit" name="Submit" id="Submit" value="Semak" class="button" />
                <input type="reset" name="Submit" id="Submit" value="Padam" class="button" /></td>
              </tr>
          	</form>
            </table>
      <br /></td>
    </tr>
</table>