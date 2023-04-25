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
					ORDER BY s.sids ASC
				";
				$d = mysql_query($s);
				$t = mysql_fetch_array($d);
			}
			?>
            <table width="600" border="0" cellpadding="3" style="border-collapse: collapse">
          	<form id="kursus" name="kursus" method="post" action="index.php?modul=kelulusan&amp;menu=sesi" onsubmit="return lengkap4();">
              <tr>
                <td colspan="2" align="center" bgcolor="#DE5302" class="text2">PENDAFTARAN SESI PEMBELAJARAN</td>
              </tr>
              <tr>
                <td colspan="2" align="center" bgcolor="#CCCCCC" class="text1">Maklumat Pegawai</td>
              </tr>
              <tr>
                <td width="158" align="right" bgcolor="#CCCCCC">Nama Penuh :</td>
                <td width="424" align="left"><?php echo output1($t['unama']); ?></td>
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
              <tr>
                <td align="right" bgcolor="#CCCCCC">Jenis <span class="text8">*</span> :</td>
                <td align="left"><select name="jenis" id="jenis" onchange="papar4(this.value);">
                  <option value="1" <?php if ($t['sjenis'] == 1) { echo 'selected="selected"'; } ?>>PROGRAM KE ARAH PERKHIDMATAN CEMERLANG DAN CINTAILAH NEGARA KITA</option>
                  <option value="2" <?php if ($t['sjenis'] == 2) { echo 'selected="selected"'; } ?>>PERHIMPUNAN BULANAN BERSAMA YBHG. DATUK TKSUK</option>
				  <option value="5" <?php if ($t['sjenis'] == 5) { echo 'selected="selected"'; } ?>>HARI INOVASI JABATAN PERDANA MENTERI</option>
                  <option value="7" <?php if ($t['sjenis'] == 7) { echo 'selected="selected"'; } ?>>LAIN-LAIN (SILA NYATAKAN)</option>
                </select></td>
              </tr>
              <?php
              if ($t['sjenis'] == 7) {
				  ?>
				  <tr id="Row1">
					<td align="right" bgcolor="#CCCCCC"><span class="text8">*</span></td>
					<td align="left"><input name="lain" value="<?php echo $t['slain']; ?>" type="text" id="lain" size="60" maxlength="255" class="input1" /></td>
				  </tr>
			  <?php
			  }
              else {
				  ?>
				  <tr style="display: none" id="Row1">
					<td align="right" bgcolor="#CCCCCC"><span class="text8">*</span></td>
					<td align="left"><input name="lain" value="<?php echo $t['slain']; ?>" type="text" id="lain" size="60" maxlength="255" class="input1" /></td>
				  </tr>
			  <?php
			  }
			  ?>
              <tr>
                <td align="right" bgcolor="#CCCCCC" valign="top">Tajuk <span class="text8">*</span> :</td>
                <td align="left">
				<textarea name="tajuk" id="tajuk" cols="51" rows="3" class="input2"><?php echo $t['stajuk']; ?></textarea></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC" valign="top">Anjuran :</td>
                <td align="left">
				<textarea name="anjuran" id="anjuran" cols="51" rows="3" class="input1"><?php echo $t['sanjuran']; ?></textarea></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Tarikh <span class="text8">*</span> :</td>
                <td align="left" valign="middle"><input name="tmula" value="<?php echo $t['starikh']; ?>" type="text" class="input1" id="tmula" size="12" maxlength="10" readonly="readonly" />
                  <img src="../files/cal.gif" align="top" onclick="javascript:showCal('Cal1')" /></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Tempat :</td>
                <td align="left">
				<input name="tempat" value="<?php echo $t['stempat']; ?>" type="text" id="tempat" size="60" maxlength="255" class="input1" /></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Waktu Mula :</td>
                <td align="left"><select name="wmula" id="wmula" onchange="kira2()">
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
                <td align="left"><select name="wtamat" id="wtamat" onchange="kira2()">
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
              if ($t['sjenis'] == 1 || $t['sjenis'] == 2) {
				  ?>
				  <tr id="Row2">
					<td align="right" bgcolor="#CCCCCC">Jumlah Jam :</td>
					<td align="left"><input name="jam1" value="1 JAM" type="text" id="jam1" size="20" class="input1" readonly="readonly" /><input name="jumlah1" value="1" type="hidden" /></td>
				  </tr>
				  <tr style="display: none" id="Row3">
					<td align="right" bgcolor="#CCCCCC">Jumlah Jam :</td>
					<td align="left"><input name="jam2" value="1 JAM" type="text" id="jam2" size="20" class="input1" readonly="readonly" /><input name="jumlah2" value="1" type="hidden" /></td>
				  </tr>
				  <tr style="display: none" id="Row4">
					<td align="right" bgcolor="#CCCCCC">Jumlah Jam :</td>
					<td align="left"><input name="jam3" value="30 MINIT" type="text" id="jam3" size="20" class="input1" readonly="readonly" /><input name="jumlah3" value="" type="hidden" /></td>
				  </tr>
			  <?php
			  }
              elseif ($t['sjenis'] == 3) {
				  ?>
				  <tr style="display: none" id="Row2">
					<td align="right" bgcolor="#CCCCCC">Jumlah Jam :</td>
					<td align="left"><input name="jam1" value="1 JAM" type="text" id="jam1" size="20" class="input1" readonly="readonly" /><input name="jumlah1" value="1" type="hidden" /></td>
				  </tr>
				  <tr id="Row3">
					<td align="right" bgcolor="#CCCCCC">Jumlah Jam :</td>
					<td align="left"><input name="jam2" value="30 MINIT" type="text" id="jam2" size="20" class="input1" readonly="readonly" /><input name="jumlah2" value="0.5" type="hidden" /></td>
				  </tr>
				  <tr style="display: none" id="Row4">
					<td align="right" bgcolor="#CCCCCC">Jumlah Jam :</td>
					<td align="left"><input name="jam3" value="30 MINIT" type="text" id="jam3" size="20" class="input1" readonly="readonly" /><input name="jumlah3" value="" type="hidden" /></td>
				  </tr>
			  <?php
			  }
              else {
				  ?>
				  <tr style="display: none" id="Row2">
					<td align="right" bgcolor="#CCCCCC">Jumlah Jam :</td>
					<td align="left"><input name="jam1" value="1 JAM" type="text" id="jam1" size="20" class="input1" readonly="readonly" /><input name="jumlah1" value="1" type="hidden" /></td>
				  </tr>
				  <tr style="display: none" id="Row3">
					<td align="right" bgcolor="#CCCCCC">Jumlah Jam :</td>
					<td align="left"><input name="jam2" value="30 MINIT" type="text" id="jam2" size="20" class="input1" readonly="readonly" /><input name="jumlah2" value="0.5" type="hidden" /></td>
				  </tr>
				  <tr id="Row4">
					<td align="right" bgcolor="#CCCCCC">Jumlah Jam :</td>
					<td align="left"><input name="jam3" value="<?php echo str_replace(".5"," JAM 30 MINIT",$t['sjumlah']); ?>" type="text" id="jam3" size="20" class="input1" readonly="readonly" /><input name="jumlah3" value="<?php echo $t['sjumlah']; ?>" type="hidden" /></td>
				  </tr>
			  <?php
			  }
			  ?>
              <tr>
                <td colspan="2" align="center" bgcolor="#CCCCCC" class="text1">Maklumat Kelulusan</td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Status :</td>
                <td align="left"><select name="status" id="status">
                  <option value="2" <?php if ($t['sstatus'] == 2) { echo 'selected="selected"'; } ?>>DISAHKAN</option>
                  <option value="3" <?php if ($t['sstatus'] == 3) { echo 'selected="selected"'; } ?>>TIDAK DISAHKAN</option>
                  <option value="4" <?php if ($t['sstatus'] == 4) { echo 'selected="selected"'; } ?>>KIV</option>
                  <option value="5" <?php if ($t['sstatus'] == 5) { echo 'selected="selected"'; } ?>>DIBATALKAN</option>
                </select></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC" valign="top">Sebab Tidak Disahkan / 
				KIV /&nbsp; DiBatalkan :</td>
                <td align="left">
				<textarea name="nota" id="nota" cols="51" rows="3" class="input1"><?php echo $t['snota']; ?></textarea></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Pegawai Yang Mengesahkan :</td>
                <td align="left"><?php echo output1($tm['unama']); ?></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Tarikh Tindakan :</td>
                <td align="left"><?php echo date("d/m/Y h:iA"); ?></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">&nbsp;</td>
                <td align="left"><input name="id" type="hidden" id="id" value="<?php echo $t['sids']; ?>" />
                  <input type="submit" name="Submit" id="Submit" value="Hantar" class="button" />
                  <input type="submit" name="Submit" id="Submit" value="Hapus" class="button" />
                <input type="reset" name="Submit" id="Submit" value="Padam" class="button" /></td>
              </tr>
          	</form>
            </table>
      <br /></td>
    </tr>
</table>