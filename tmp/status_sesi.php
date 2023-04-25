<table width="995" cellspacing="0" cellpadding="2" border="0">
    <tr>
        <td align="center" valign="top" bgcolor="#E2E2E2">
            <br />
            <?php
			if (!empty($_GET['id']) && strlen($_GET['id']) == 32) {
				$s = "SELECT s.*, u.*, b.*, p.*
					FROM sesi AS s, user AS u, bahagian AS b, kumpulan AS p
					WHERE s.unokp = u.unokp
					AND u.bids = b.bids
					AND u.pids = p.pids
					AND s.sdelete = 1
					AND s.sids = '" . input2($_GET['id']) ."'
					AND u.unokp = '" . $tm['unokp'] . "'
					ORDER BY s.sids ASC
				";
				$d = mysql_query($s);
				$t = mysql_fetch_array($d);
			}
			?>
            <table width="787" border="0" cellpadding="3" style="border-collapse: collapse">
          	<form id="kursus" name="kursus" method="post" action="index.php?modul=status&amp;menu=sesi" onsubmit="return lengkap4();">
              <tr>
                <td colspan="2" align="center" bgcolor="#DE5302" class="text2">
				SESI PEMBELAJARAN</td>
              </tr>
              <tr>
                <td colspan="2" align="center" bgcolor="#CCCCCC" class="text1">Maklumat Pegawai</td>
              </tr>
              <tr>
                <td width="223" align="right" bgcolor="#CCCCCC">Nama Penuh :</td>
                <td width="552" align="left"><?php echo output1($t['unama']); ?></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">No. Kad Pengenalan :</td>
                <td align="left"><?php echo output1($t['unokp']); ?></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">No. Kad ID :</td>
                <td align="left"><?php echo output1($t['unoid']); ?></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Unit :</td>
                <td align="left"><?php echo output1($t['bahagian']); ?></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Kumpulan Perkhidmatan :</td>
                <td align="left"><?php echo output1($t['kumpulan']); ?></td>
              </tr>
              <tr>
                <td colspan="2" align="center" bgcolor="#CCCCCC" class="text1">Maklumat Sesi Pembelajaran</td>
              </tr>
              <?php
              if ($t['sstatus'] < 2) {
				  ?>
                  <tr>
                    <td align="right" bgcolor="#CCCCCC">Jenis <span class="text8">*</span> :</td>
                    <td align="left"><select name="jenis" id="jenis" onchange="papar2(this.value);">
                      <option value="1" <?php if ($t['sjenis'] == 1) { echo 'selected="selected"'; } ?>>CERAMAH</option>
                      <option value="2" <?php if ($t['sjenis'] == 2) { echo 'selected="selected"'; } ?>>PERHIMPUNAN BULANAN JABATAN</option>
                      <option value="3" <?php if ($t['sjenis'] == 3) { echo 'selected="selected"'; } ?>>PERHIMPUNAN BULANAN BAHAGIAN</option>
                      <option value="4" <?php if ($t['sjenis'] == 4) { echo 'selected="selected"'; } ?>>SESI PEMBELAJARAN</option>
                      <option value="5" <?php if ($t['sjenis'] == 5) { echo 'selected="selected"'; } ?>>SESI PEMBELAJARAN</option>
                      <option value="6" <?php if ($t['sjenis'] == 6) { echo 'selected="selected"'; } ?>>PEMBENTANGAN KERTAS KERJA</option>
                      <option value="7" <?php if ($t['sjenis'] == 7) { echo 'selected="selected"'; } ?>>LAIN-LAIN (SILA NYATAKAN)</option>
                    </select></td>
                  </tr>
                  <tr id="Row1" <?php if ($t['sjenis'] != 7) { echo 'style="display: none"'; } ?>>
                    <td align="right" bgcolor="#CCCCCC"><span class="text8">*</span> </td>
                    <td align="left"><input name="lain" value="<?php echo $t['slain']; ?>" type="text" id="lain" size="60" maxlength="255" class="input1" /></td>
                  </tr>
                  <tr>
                    <td align="right" bgcolor="#CCCCCC" valign="top">Tajuk <span class="text8">*</span> :</td>
                    <td align="left">
					<textarea name="tajuk" id="tajuk" cols="64" rows="5" class="input2"><?php echo $t['stajuk']; ?></textarea></td>
                  </tr>
                  <tr>
                    <td align="right" bgcolor="#CCCCCC" valign="top">Anjuran :</td>
                    <td align="left">
					<textarea name="anjuran" id="anjuran" cols="64" rows="5" class="input1"><?php echo $t['sanjuran']; ?></textarea></td>
                  </tr>
                  <tr>
                    <td align="right" bgcolor="#CCCCCC">Tarikh <span class="text8">*</span> :</td>
                    <td align="left" valign="middle"><input name="tmula" value="<?php echo $t['starikh']; ?>" type="text" class="input1" id="tmula" size="12" maxlength="10" readonly="readonly" />
                      <img src="files/cal.gif" align="top" onclick="javascript:showCal('Cal1')" /></td>
                  </tr>
                  <tr>
                    <td align="right" bgcolor="#CCCCCC">Tempat :</td>
                    <td align="left"><input name="tempat" value="<?php echo $t['stempat']; ?>" type="text" id="tempat" size="70" maxlength="255" class="input1" /></td>
                  </tr>
                  <tr>
                    <td align="right" bgcolor="#CCCCCC">Waktu Mula :</td>
                    <td align="left"><select name="wmula" id="wmula">
                      <option value="8" <?php if ($t['swmula'] == 8) { echo 'selected="selected"'; } ?>>08:00AM</option>
                      <option value="8.5" <?php if ($t['swmula'] == 8.5) { echo 'selected="selected"'; } ?>>08:30AM</option>
                      <option value="9" <?php if ($t['swmula'] == 9) { echo 'selected="selected"'; } ?>>09:00AM</option>
                      <option value="9.5" <?php if ($t['swmula'] == 9.5) { echo 'selected="selected"'; } ?>>09:30AM</option>
                      <option value="10" <?php if ($t['swmula'] == 10) { echo 'selected="selected"'; } ?>>10:00AM</option>
                      <option value="10.5" <?php if ($t['swmula'] == 10.5) { echo 'selected="selected"'; } ?>>10:30AM</option>
                      <option value="11" <?php if ($t['swmula'] == 11) { echo 'selected="selected"'; } ?>>11:00AM</option>
                      <option value="11.5" <?php if ($t['swmula'] == 11.5) { echo 'selected="selected"'; } ?>>11:30AM</option>
                      <option value="12" <?php if ($t['swmula'] == 12) { echo 'selected="selected"'; } ?>>12:00PM</option>
                      <option value="12.5" <?php if ($t['swmula'] == 12.5) { echo 'selected="selected"'; } ?>>12:30PM</option>
                      <option value="13" <?php if ($t['swmula'] == 13) { echo 'selected="selected"'; } ?>>01:00PM</option>
                      <option value="13.5" <?php if ($t['swmula'] == 13.5) { echo 'selected="selected"'; } ?>>01:30PM</option>
                      <option value="14" <?php if ($t['swmula'] == 14) { echo 'selected="selected"'; } ?>>02:00PM</option>
                      <option value="14.5" <?php if ($t['swmula'] == 14.5) { echo 'selected="selected"'; } ?>>02:30PM</option>
                      <option value="15" <?php if ($t['swmula'] == 15) { echo 'selected="selected"'; } ?>>03:00PM</option>
                      <option value="15.5" <?php if ($t['swmula'] == 15.5) { echo 'selected="selected"'; } ?>>03:30PM</option>
                      <option value="16" <?php if ($t['swmula'] == 16) { echo 'selected="selected"'; } ?>>04:00PM</option>
                      <option value="16.5" <?php if ($t['swmula'] == 16.5) { echo 'selected="selected"'; } ?>>04:30PM</option>
                      <option value="17" <?php if ($t['swmula'] == 17) { echo 'selected="selected"'; } ?>>05:00PM</option>
                    </select></td>
                  </tr>
                  <tr>
                    <td align="right" bgcolor="#CCCCCC">Waktu Tamat :</td>
                    <td align="left"><select name="wtamat" id="wtamat">
                      <option value="8.5" <?php if ($t['swtamat'] == 8.5) { echo 'selected="selected"'; } ?>>08:30AM</option>
                      <option value="9" <?php if ($t['swtamat'] == 9) { echo 'selected="selected"'; } ?>>09:00AM</option>
                      <option value="9.5" <?php if ($t['swtamat'] == 9.5) { echo 'selected="selected"'; } ?>>09:30AM</option>
                      <option value="10" <?php if ($t['swtamat'] == 10) { echo 'selected="selected"'; } ?>>10:00AM</option>
                      <option value="10.5" <?php if ($t['swtamat'] == 10.5) { echo 'selected="selected"'; } ?>>10:30AM</option>
                      <option value="11" <?php if ($t['swtamat'] == 11) { echo 'selected="selected"'; } ?>>11:00AM</option>
                      <option value="11.5" <?php if ($t['swtamat'] == 11.5) { echo 'selected="selected"'; } ?>>11:30AM</option>
                      <option value="12" <?php if ($t['swtamat'] == 12) { echo 'selected="selected"'; } ?>>12:00PM</option>
                      <option value="12.5" <?php if ($t['swtamat'] == 12.5) { echo 'selected="selected"'; } ?>>12:30PM</option>
                      <option value="13" <?php if ($t['swtamat'] == 13) { echo 'selected="selected"'; } ?>>01:00PM</option>
                      <option value="13.5" <?php if ($t['swtamat'] == 13.5) { echo 'selected="selected"'; } ?>>01:30PM</option>
                      <option value="14" <?php if ($t['swtamat'] == 14) { echo 'selected="selected"'; } ?>>02:00PM</option>
                      <option value="14.5" <?php if ($t['swtamat'] == 14.5) { echo 'selected="selected"'; } ?>>02:30PM</option>
                      <option value="15" <?php if ($t['swtamat'] == 15) { echo 'selected="selected"'; } ?>>03:00PM</option>
                      <option value="15.5" <?php if ($t['swtamat'] == 15.5) { echo 'selected="selected"'; } ?>>03:30PM</option>
                      <option value="16" <?php if ($t['swtamat'] == 16) { echo 'selected="selected"'; } ?>>04:00PM</option>
                      <option value="16.5" <?php if ($t['swtamat'] == 16.5) { echo 'selected="selected"'; } ?>>04:30PM</option>
                      <option value="17" <?php if ($t['swtamat'] == 17) { echo 'selected="selected"'; } ?>>05:00PM</option>
                      <option value="17.5" <?php if ($t['swtamat'] == 17.5) { echo 'selected="selected"'; } ?>>05:30PM</option>
                    </select></td>
                  </tr>
              <?php  
			  }
			  else {
				  ?>
                  <tr>
                    <td align="right" bgcolor="#CCCCCC">Jenis :</td>
                    <td align="left">
                        <?php 
                        if ($t['sjenis'] == 1) { echo "CERAMAH"; }
                        elseif ($t['sjenis'] == 2) { echo "PERHIMPUNAN BULANAN JABATAN"; }
                        elseif ($t['sjenis'] == 3) { echo "PERHIMPUNAN BULANAN BAHAGIAN"; }
                        elseif ($t['sjenis'] == 4) { echo "SESI PEMBELAJARAN"; }
                        elseif ($t['sjenis'] == 5) { echo "SESI PEMBELAJARAN"; }
                        elseif ($t['sjenis'] == 6) { echo "PEMBENTANGAN KERTAS KERJA"; }
                        else { echo output1($t['slain']); }
                        ?>
                    </td>
                  </tr>
                  <tr>
                    <td align="right" bgcolor="#CCCCCC">Tajuk Sesi Pembelajaran :</td>
                    <td align="left"><?php echo output1(nl2br($t['stajuk'])); ?></td>
                  </tr>
                  <tr>
                    <td align="right" bgcolor="#CCCCCC">Tarikh :</td>
                    <td align="left"><?php echo output1($t['starikh']); ?></td>
                  </tr>
                  <tr>
                    <td align="right" bgcolor="#CCCCCC">Masa :</td>
                    <td align="left"><?php echo jam(output1($t['swmula'])) . " - " . jam(output1($t['swtamat'])); ?></td>
                  </tr>
                  <tr>
                    <td align="right" bgcolor="#CCCCCC">Tempat :</td>
                    <td align="left"><?php echo output1($t['stempat']); ?></td>
                  </tr>
              <?php
			  }
			  ?>
              <tr>
                <td colspan="2" align="center" bgcolor="#CCCCCC" class="text1">Maklumat Kelulusan</td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Status :</td>
                <td align="left"><?php 
                    if ($t['sstatus'] == 2) { echo "DISAHKAN"; }
                    elseif ($t['sstatus'] == 3) { echo "TIDAK DISAHKAN"; }
                    elseif ($t['sstatus'] == 4) { echo "KIV"; }
                    elseif ($t['sstatus'] == 5) { echo "DIBATALKAN"; }
                    else { echo "DALAM TINDAKAN"; }
                ?></td>
              </tr>
              <?php
			  if ($t['sstatus'] > 1) {
				  ?>
                  <tr>
                    <td align="right" bgcolor="#CCCCCC">Sebab Tidak Disahkan / DiBatalkan 
					/ KIV :</td>
                    <td align="left"><?php echo strtoupper(output1(nl2br($t['snota']))); ?></td>
                  </tr>
                  <tr>
                    <td align="right" bgcolor="#CCCCCC">Pegawai Yang Mengesahkan :</td>
                    <td align="left">
						<?php 
						$sa = "SELECT * FROM user WHERE unokp = '" . $t['spelulus'] . "' ORDER BY unokp ASC";
						$da = mysql_query($sa);
						$ta = mysql_fetch_array($da);
						echo output1($ta['unama']); 
						?>
                    </td>
                  </tr>
                  <tr>
                    <td align="right" bgcolor="#CCCCCC">Tarikh Tindakan :</td>
                    <td align="left"><?php echo date("d/m/Y h:iA",output1($t['stlulus'])); ?></td>
                  </tr>
              <?php
			  }
			  if ($t['sstatus'] < 2) {
				  ?>
				  <tr>
					<td align="right" bgcolor="#CCCCCC">&nbsp;</td>
					<td align="left"><input name="id" type="hidden" id="id" value="<?php echo $t['sids']; ?>" />					  <input type="submit" name="Submit" id="Submit" value="Kemaskini" class="button" />					<input type="submit" name="Submit" id="Submit" value="Hapus" class="button" /></td>
				  </tr>
              <?php
			  }
			  ?>
          	</form>
            </table>
      <br /></td>
    </tr>
</table>