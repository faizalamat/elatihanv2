<table width="995" cellspacing="0" cellpadding="2" border="0">
    <tr>
        <td align="center" valign="top" bgcolor="#E2E2E2">
        	<?php
			if (isset($_GET['kategori']) && strlen($_GET['kategori']) == 32) {
				$kat = $_GET['kategori'];
			}
			else {
				$s = "SELECT * FROM kategori ORDER BY kategori ASC";
				$d = mysql_query($s);
				$t = mysql_fetch_array($d);
				$kat = $t['tids'];
			}
			?>
            <br />
            <table width="740" border="0" cellpadding="3" style="border-collapse: collapse">
          	<form id="kursus" name="kursus" method="post" action="index.php?modul=pendaftaran&amp;menu=kendiri" onsubmit="return lengkap5();">
              <tr>
                <td colspan="2" align="center" bgcolor="#DE5302" class="text2">
				HANTAR MAKLUMAN PEMBELAJARAN KENDIRI</td>
              </tr>
              <tr>
                <td colspan="2" align="center" bgcolor="#CCCCCC" class="text1">Maklumat Pegawai</td>
              </tr>
              <tr>
                <td width="185" align="right" bgcolor="#CCCCCC">Nama Penuh :</td>
                <td width="543" align="left" bgcolor="#F0F0F0"><?php echo output1($tm['unama']); ?></td>
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
				<b>Isikan Maklumat Pembelajaran Kendiri Yang Telah Dihadiri</b></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Jenis <span class="text8">*</span> :</td>
                <td align="left"><select name="jenis" id="jenis" onchange="papar3(this.value);">
                  <option value="1">EPSA</option>
                  <option value="2">PEMBENTANGAN BUKU</option>
                  <option value="3">LAIN-LAIN (SILA NYATAKAN)</option>
                </select></td>
              </tr>
              <tr style="display: none" id="Row1">
                <td align="right" bgcolor="#CCCCCC"><span class="text8">*</span></td>
                <td align="left"><input name="lain" type="text" id="lain" size="60" maxlength="255" class="input1" /></td>
              </tr>
              <tr id="Row2">
                <td align="right" bgcolor="#CCCCCC" valign="top">Kategori EPSA<span class="text8"> *</span> :<p>
				Tajuk EPSA <span class="text8">* </span> : </td>
                <td align="left" valign="top"><select name="kategori" id="kategori" onchange="javascript:window.location.href='index.php?modul=pendaftaran&menu=kendiri&amp;kategori='+this.value;">
                  <?php
				  $sa = "SELECT * FROM kategori ORDER BY kategori ASC";
				  $da = mysql_query($sa);
				  while ($ta = mysql_fetch_array($da)) {
					  if ($ta['tids'] == $kat) { $select = 'selected="selected"'; }
					  else { $select = ""; }
					?>
                    <option value="<?php echo $ta['tids']; ?>" <?php echo $select; ?>><?php echo $ta['kategori']; ?></option>
                  <?php
				  }
				  ?>
                </select>
                <br>
				<br>
                <select name="epsa" id="epsa">
                <?php
				$da = mysql_query($sa);
				$ta = mysql_fetch_array($da);
                $sb = "SELECT * FROM epsa WHERE edelete = 1 AND tids = '" . input2($kat) . "' ORDER BY epsa ASC";
                $db = mysql_query($sb);
                while ($tb = mysql_fetch_array($db)) {
                    ?>
                    <option value="<?php echo $tb['eids']; ?>"><?php echo $tb['epsa'] . " (" . $tb['ekod'] . ")"; ?></option>
                <?php
                }
                ?>
                </select>
                </td>
              </tr>
              <tr style="display: none" id="Row3">
                <td align="right" bgcolor="#CCCCCC">Tajuk <span class="text8">*</span> :</td>
                <td align="left">
				<textarea name="tajuk" id="tajuk" cols="56" rows="5" class="input2"></textarea></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Tarikh Mula <span class="text8">*</span> :</td>
                <td align="left" valign="middle"><input name="tmula" type="text" class="input1" id="tmula" size="12" maxlength="10" readonly="readonly" onfocus="hari();" />
                  <img src="files/cal.gif" align="top" onclick="javascript:showCal('Cal1')" /></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Tarikh Tamat <span class="text8">*</span> :</td>
                <td align="left" valign="middle"><input name="ttamat" type="text" class="input1" id="ttamat" size="12" maxlength="10" readonly="readonly" onfocus="hari();" />
                  <img src="files/cal.gif" align="top" onclick="javascript:showCal('Cal2')" /></td>
              </tr>
              <tr style="display: none" id="Row4">
                <td align="right" bgcolor="#CCCCCC">Tempat :</td>
                <td align="left"><input name="tempat" type="text" id="tempat" size="70" maxlength="255" class="input1" /></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">&nbsp;</td>
                <td align="left"><input type="submit" name="Submit" id="Submit" value="Semak" class="button" />
                <input type="reset" name="Submit" id="Submit" value="Padam" class="button" /></td>
              </tr>
          	</form>
            </table>
      <br /></td>
    </tr>
</table>