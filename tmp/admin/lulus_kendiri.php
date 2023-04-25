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
					ORDER BY k.dids ASC
				";
				$d = mysql_query($s);
				$t = mysql_fetch_array($d);
			}
			?>
            <table width="600" border="0" cellpadding="3" style="border-collapse: collapse">
          	<form id="kursus" name="kursus" method="post" action="index.php?modul=kelulusan&amp;menu=kendiri">
              <tr>
                <td colspan="2" align="center" bgcolor="#DE5302" class="text2">
				MAKLUMAN PEMBELAJARAN KENDIRI</td>
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
                <td colspan="2" align="center" bgcolor="#CCCCCC" class="text1">Maklumat Pembelajaran Kendiri</td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Jenis :</td>
                <td align="left"><?php 
					if ($t['djenis'] == 1) { echo "EPSA"; }
					elseif ($t['djenis'] == 2) { echo "PEMBENTANGAN BUKU"; }
					else { echo output1($t['dlain']); }
					?></td>
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
                    <td align="right" bgcolor="#CCCCCC">Tajuk :</td>
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
			  ?>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Jumlah Hari :</td>
                <td align="left">
                    <?php
					if ($t['djenis'] == 1) { 
						echo $t['djumlah'] . " JAM";
					}
					elseif ($t['djenis'] == 2) { 
						echo "1 HARI";
					}
					elseif ($t['djenis'] == 3) { 
						echo hari(1,$t['dtmula'],$t['dttamat']) . " HARI";
					}
                    ?>
                </td>
              </tr>
              <tr>
                <td colspan="2" align="center" bgcolor="#CCCCCC" class="text1">Maklumat Kelulusan</td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Status :</td>
                <td align="left"><select name="status" id="status">
                  <option value="2" <?php if ($t['dstatus'] == 2) { echo 'selected="selected"'; } ?>>DISAHKAN</option>
                  <option value="3" <?php if ($t['dstatus'] == 3) { echo 'selected="selected"'; } ?>>TIDAK DISAHKAN</option>
                  <option value="4" <?php if ($t['dstatus'] == 4) { echo 'selected="selected"'; } ?>>KIV</option>
                  <option value="5" <?php if ($t['dstatus'] == 5) { echo 'selected="selected"'; } ?>>DIBATALKAN</option>
                </select></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC" valign="top">Sebab Tidak Disahkan / 
				KIV /&nbsp; DiBatalkan :</td>
                <td align="left">
				<textarea name="nota" id="nota" cols="53" rows="3" class="input1"><?php echo $t['snota']; ?></textarea></td>
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
                <td align="left"><input name="id" type="hidden" id="id" value="<?php echo $t['dids']; ?>" />
                  <input type="submit" name="Submit" id="Submit" value="Hantar" class="button" />
                  <input type="submit" name="Submit" id="Submit" value="Hapus" class="button" />
                <input type="reset" name="Submit" id="Submit" value="Padam" class="button" /></td>
              </tr>
          	</form>
            </table>
      <br /></td>
    </tr>
</table>