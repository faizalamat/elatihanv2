<table width="995" cellspacing="0" cellpadding="2" border="0">
    <tr>
        <td align="center" valign="top" bgcolor="#E2E2E2">
            <br />
            <?php
			if (!empty($_GET['id']) && strlen($_GET['id']) == 32) {
				$s = "SELECT l.*, k.*, u.*, b.*, p.*
					FROM latihan AS l, kursus AS k, user AS u, bahagian AS b, kumpulan AS p
					WHERE l.kids = k.kids
					AND l.unokp = u.unokp
					AND u.bids = b.bids
					AND u.pids = p.pids
					AND l.ldelete = 1
					AND l.lids = '" . input2($_GET['id']) ."'
					ORDER BY l.lids ASC
				";
				$d = mysql_query($s);
				$t = mysql_fetch_array($d);
			}
			?>
            <table width="600" border="0" cellpadding="3" style="border-collapse: collapse">
          	<form id="kursus" name="kursus" method="post" action="index.php?modul=kelulusan&amp;menu=kursus">
              <tr>
                <td colspan="2" align="center" bgcolor="#DE5302" class="text2">
				MAKLUMAN KURSUS/LATIHAN</td>
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
                <td colspan="2" align="center" bgcolor="#CCCCCC" class="text1">Maklumat Kursus/Latihan</td>
              </tr>
              <?php
			  if (!empty($_GET['bulan'])) { $bulan = kosong(input1($_GET['bulan']),2); }
			  else { $bulan = "01"; }
			  if (!empty($_GET['tahun'])) { $tahun = input1($_GET['tahun']); }
			  else { $tahun = date("Y"); }
			  ?>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Tajuk Kursus :</td>
                <td align="left"><?php echo output1(nl2br($t['ktajuk'])); ?></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Tarikh :</td>
                <td align="left"><?php echo output1($t['ktmula']) . " - " . output1($t['kttamat']) . " (" . output1($t['kjumlah']) . " HARI)"; ?></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Lokasi :</td>
                <td align="left"><?php echo output1($t['klokasi']); ?></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Jumlah Hari :</td>
                <td align="left"><?php echo output1($t['kjumlah']); ?> HARI</td>
              </tr>
              <tr>
                <td colspan="2" align="center" bgcolor="#CCCCCC" class="text1">Maklumat Kelulusan</td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Status :</td>
                <td align="left"><select name="status" id="status">
                  <option value="2" <?php if ($t['lstatus'] == 2) { echo 'selected="selected"'; } ?>>DISAHKAN</option>
                  <option value="3" <?php if ($t['lstatus'] == 3) { echo 'selected="selected"'; } ?>>TIDAK DISAHKAN</option>
                  <option value="4" <?php if ($t['lstatus'] == 4) { echo 'selected="selected"'; } ?>>KIV</option>
                  <option value="5" <?php if ($t['lstatus'] == 5) { echo 'selected="selected"'; } ?>>DIBATALKAN</option>
                </select></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC" valign="top">Sebab Tidak Disahkan / DiBatalkan 
				/ KIV :</td>
                <td align="left">
				<textarea name="nota" id="nota" cols="59" rows="3" class="input1"><?php echo $t['lnota']; ?></textarea></td>
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
                <td align="left"><input name="id" type="hidden" id="id" value="<?php echo $t['lids']; ?>" />
                  <input type="submit" name="Submit" id="Submit" value="Hantar" class="button" />
                  <input type="submit" name="Submit" id="Submit" value="Hapus" class="button" />
                <input type="reset" name="Submit" id="Submit" value="Padam" class="button" /></td>
              </tr>
          	</form>
            </table>
      <br /></td>
    </tr>
</table>