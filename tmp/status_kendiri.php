<?php $n = 0 ?>
<table width="995" cellspacing="0" cellpadding="2" border="0">
    <tr>
        <td align="center" valign="top" bgcolor="#E2E2E2">
            <br />
            <?php
			if (!empty($_GET['id']) && strlen($_GET['id']) == 32) {
				$s = "SELECT k.*, u.*, b.*, p.*
					FROM kendiri AS k, user AS u, bahagian AS b, kumpulan AS p
					WHERE k.unokp = u.unokp
					AND u.bids = b.bids
					AND u.pids = p.pids
					AND k.ddelete = 1
					AND k.dids = '" . input2($_GET['id']) ."'
					AND u.unokp = '" . $tm['unokp'] . "'
					ORDER BY k.dids ASC
				";
				$d = mysql_query($s);
				$t = mysql_fetch_array($d);
			}
			if (isset($_GET['kategori']) && strlen($_GET['kategori']) == 32) {
				$kat = $_GET['kategori'];
			}
			else {
				$sx = "SELECT * FROM epsa WHERE eids = '" . input2($t['eids']) . "' ORDER BY eids ASC";
				$dx = mysql_query($sx);
				$tx = mysql_fetch_array($dx);
				$kat = $tx['tids'];
			}
			?>
            <table width="716" border="0" cellpadding="3" style="border-collapse: collapse">
          	<form id="kursus" name="kursus" method="post" action="index.php?modul=status&amp;menu=kendiri" onsubmit="return lengkap5();">
              <tr>
                <td colspan="2" align="center" bgcolor="#DE5302" class="text2">PEMBELAJARAN KENDIRI</td>
              </tr>
              <tr>
                <td colspan="2" align="center" bgcolor="#CCCCCC" class="text1">Maklumat Pegawai</td>
              </tr>
              <tr>
                <td width="195" align="right" bgcolor="#CCCCCC">Nama :</td>
                <td width="506" align="left"><?php echo output1($t['unama']); ?></td>
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
                <td colspan="2" align="center" bgcolor="#CCCCCC" class="text1">Maklumat Pembelajaran Kendiri</td>
              </tr>
              <?php
              if ($t['dstatus'] < 2) {
				  ?>
                  <tr>
                    <td align="right" bgcolor="#CCCCCC">Jenis <span class="text8">*</span> :</td>
                    <td align="left"><select name="jenis" id="jenis" onchange="papar3(this.value);">
                      <option value="1" <?php if ($t['djenis'] == 1) { echo 'selected="selected"'; } ?>>EPSA</option>
                      <option value="2" <?php if ($t['djenis'] == 2) { echo 'selected="selected"'; } ?>>PEMBENTANGAN BUKU</option>
                      <option value="3" <?php if ($t['djenis'] == 3) { echo 'selected="selected"'; } ?>>LAIN-LAIN (SILA NYATAKAN)</option>
                    </select></td>
                  </tr>
                  <tr id="Row1" <?php if ($t['djenis'] != 3) { echo 'style="display: none"'; } ?>>
                    <td align="right" bgcolor="#CCCCCC"><span class="text8">*</span></td>
                    <td align="left"><input name="lain" value="<?php echo $t['dlain']; ?>" type="text" id="lain" size="60" maxlength="255" class="input1" /></td>
                  </tr>
                  <tr id="Row2" <?php if ($t['djenis'] != 1) { echo 'style="display: none"'; } ?>>
                    <td align="right" bgcolor="#CCCCCC">Tajuk <span class="text8">*</span> :</td>
                    <td align="left"><select name="kategori" id="kategori" onchange="javascript:window.location.href='index.php?modul=status&menu=kendiri&amp;id=<?php echo $_GET['id']; ?>&amp;kategori='+this.value;">
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
                    <select name="epsa" id="epsa">
                    <?php
                    $sb = "SELECT * FROM epsa WHERE edelete = 1 AND tids = '" . input2($kat) . "' ORDER BY epsa ASC";
                    $db = mysql_query($sb);
                    while ($tb = mysql_fetch_array($db)) {
						  if ($tb['eids'] == $tx['eids']) { $select = 'selected="selected"'; }
						  else { $select = ""; }
                        ?>
                        <option value="<?php echo $tb['eids']; ?>" <?php echo $select; ?>><?php echo $tb['epsa'] . " (" . $tb['ekod'] . ")"; ?></option>
                    <?php
                    }
                    ?>
                    </select>
                    </td>
                  </tr>
                  <tr id="Row3" <?php if ($t['djenis'] != 2) { echo 'style="display: none"'; } ?>>
                    <td align="right" bgcolor="#CCCCCC" valign="top">Tajuk <span class="text8">*</span> :</td>
                    <td align="left">
					<textarea name="tajuk" id="tajuk" cols="51" rows="5" class="input2"><?php echo $t['dtajuk']; ?></textarea></td>
                  </tr>
                  <tr>
                    <td align="right" bgcolor="#CCCCCC">Tarikh Mula <span class="text8">*</span> :</td>
                    <td align="left" valign="middle"><input name="tmula" value="<?php echo $t['dtmula']; ?>" type="text" class="input1" id="tmula" size="12" maxlength="10" readonly="readonly" onfocus="hari();" />
                      <img src="files/cal.gif" align="top" onclick="javascript:showCal('Cal1')" /></td>
                  </tr>
                  <tr>
                    <td align="right" bgcolor="#CCCCCC">Tarikh Tamat <span class="text8">*</span> :</td>
                    <td align="left" valign="middle"><input name="ttamat" value="<?php echo $t['dttamat']; ?>" type="text" class="input1" id="ttamat" size="12" maxlength="10" readonly="readonly" onfocus="hari();" />
                      <img src="files/cal.gif" align="top" onclick="javascript:showCal('Cal2')" /></td>
                  </tr>
                  <tr id="Row4" <?php if ($t['djenis'] == 1) { echo 'style="display: none"'; } ?>>
                    <td align="right" bgcolor="#CCCCCC">Tempat :</td>
                    <td align="left">
					<input name="tempat" value="<?php echo $t['dtempat']; ?>" type="text" id="tempat" size="60" maxlength="255" class="input1" /></td>
                  </tr>
                  <?php
			  }
			  else {
				  ?>
                  <tr>
                    <td align="right" bgcolor="#CCCCCC">Jenis :</td>
                    <td align="left">
                        <?php 
                        if ($t['djenis'] == 1) { echo "EPSA"; }
                        elseif ($t['djenis'] == 2) { echo "PEMBENTANGAN BUKU"; }
                        else { echo output1($t['dlain']); }
                        ?>
                    </td>
                  </tr>
                  <?php
                  if ($t['djenis'] == 1) {
                      $sa = "SELECT k.*, e.*
					  	FROM kategori AS k, epsa AS e
						WHERE k.tids = e.tids
						AND e.eids = '" . input2($t['eids']) . "' 
						ORDER BY e.eids ASC
					  ";
                      $da = mysql_query($sa);
                      $ta = mysql_fetch_array($da);
                      ?>
                      <tr>
                        <td align="right" bgcolor="#CCCCCC">Kategori  :</td>
                        <td align="left"><?php echo output1($ta['kategori']); ?></td>
                      </tr>
                      <tr>
                        <td align="right" bgcolor="#CCCCCC">Tajuk  :</td>
                    <td align="left"><?php echo output1($ta['epsa']) . " (" . output1($ta['ekod']) . ")"; ?></td>
                      </tr>
                  <?php
                  }
                  if ($t['djenis'] != 1) {
                      ?>
                      <tr>
                        <td align="right" bgcolor="#CCCCCC">Tajuk  :</td>
                        <td align="left"><?php echo output1(nl2br($t['dtajuk'])); ?></td>
                      </tr>
                  <?php
                  }
                  ?>
                  <tr>
                    <td align="right" bgcolor="#CCCCCC">Tarikh :</td>
                    <td align="left"><?php echo output1($t['dtmula']) . " - " . output1($t['dttamat']); ?></td>
                  </tr>
                  <?php
                  if ($t['djenis'] != 1) {
                      ?>
                      <tr>
                        <td align="right" bgcolor="#CCCCCC">Tempat :</td>
                        <td align="left"><?php echo output1($t['dtempat']); ?></td>
                      </tr>
                  <?php
                  }
			  }
			  ?>
              <tr>
                <td colspan="2" align="center" bgcolor="#CCCCCC" class="text1">Maklumat Kelulusan</td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Status :</td>
                <td align="left"><?php 
					if ($t['dstatus'] == 2) { echo "DISAHKAN"; }
					elseif ($t['dstatus'] == 3) { echo "TIDAK DISAHKAN"; }
					elseif ($t['dstatus'] == 4) { echo "KIV"; }
					elseif ($t['dstatus'] == 5) { echo "DIBATALKAN"; }
					else { echo "DALAM TINDAKAN"; }
				?></td>
              </tr>
              <?php
			  if ($t['dstatus'] > 1) {
				  ?>
                  <tr>
                    <td align="right" bgcolor="#CCCCCC">Sebab Tidak Disahkan / DiBatalkan 
					/ KIV :</td>
                    <td align="left"><?php echo strtoupper(output1(nl2br($t['dnota']))); ?></td>
                  </tr>
                  <tr>
                    <td align="right" bgcolor="#CCCCCC">Pegawai Yang Mengesahkan :</td>
                    <td align="left">
						<?php 
						$sa = "SELECT * FROM user WHERE unokp = '" . $t['dpelulus'] . "' ORDER BY unokp ASC";
						$da = mysql_query($sa);
						$ta = mysql_fetch_array($da);
						echo output1($ta['unama']); 
						?>
                    </td>
                  </tr>
                  <tr>
                    <td align="right" bgcolor="#CCCCCC">Tarikh Tindakan :</td>
                    <td align="left"><?php echo date("d/m/Y h:iA",output1($t['dtlulus'])); ?></td>
                  </tr>
              <?php
			  }
			  if ($t['dstatus'] < 2) {
				  ?>
				  <tr>
					<td align="right" bgcolor="#CCCCCC">&nbsp;</td>
					<td align="left">
                    <input name="id" type="hidden" id="id" value="<?php echo $t['dids']; ?>" />					  <input type="submit" name="Submit" id="Submit" value="Kemaskini" class="button" />					<input type="submit" name="Submit" id="Submit" value="Hapus" class="button" /></td>
				  </tr>
              <?php
			  }
			  ?>
          	</form>
            </table>
      <br /></td>
    </tr>
</table>