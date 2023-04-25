<table width="995" cellspacing="0" cellpadding="2" border="0">
    <tr>
        <td align="center" valign="top" bgcolor="#E2E2E2">
            <br />
            <?php
			if (!empty($_GET['id']) && strlen($_GET['id']) == 32) {
				$s = "SELECT u.*, b.*, p.*
					FROM user AS u, bahagian AS b, kumpulan AS p
					WHERE u.bids = b.bids
					AND u.pids = p.pids
					AND u.unokp = '" . $tm['unokp'] . "'
					ORDER BY u.unokp ASC
				";
				$d = mysql_query($s);
				$t = mysql_fetch_array($d);
			}
			?>
            <table width="762" border="0" cellpadding="3" style="border-collapse: collapse">
          	<form id="kursus" name="kursus" method="post" action="index.php?modul=status&amp;menu=kursus">
              <tr>
                <td colspan="2" align="center" bgcolor="#DE5302" class="text2">KURSUS/LATIHAN</td>
              </tr>
              <tr>
                <td colspan="2" align="center" bgcolor="#CCCCCC" class="text1">Maklumat Pegawai</td>
              </tr>
              <tr>
                <td width="237" align="right" bgcolor="#CCCCCC">Nama Penuh :</td>
                <td width="513" align="left"><?php echo output1($t['unama']); ?></td>
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
			  $s = "SELECT * FROM latihan 
				  WHERE ldelete = 1
				  AND lids = '" . input2($_GET['id']) ."'
				  AND unokp = '" . $tm['unokp'] . "'
				  ORDER BY lids ASC
			  ";
			  $d = mysql_query($s);
			  $t = mysql_fetch_array($d);
			  $sa = "SELECT * FROM kursus 
				WHERE kids = '" . $t['kids'] . "'
				ORDER BY kids ASC
			  ";
			  $da = mysql_query($sa);
			  $ta = mysql_fetch_array($da);
			  if ($t['lstatus'] < 2) {
				  if (!empty($_GET['bulan'])) { $bulan = kosong(input1($_GET['bulan']),2); }
				  else { 
				  	$bulan = explode("/",$ta['ktmula']);
					$bulan = $bulan[1];
				  }
				  if (!empty($_GET['tahun'])) { $tahun = input1($_GET['tahun']); }
				  else { 
				  	if (!empty($ta['ktmula'])) {
						$tahun = explode("/",$ta['ktmula']);
						$tahun = $tahun[2];
					}
					else {
						$tahun = date("Y");
					}
				  }
				  ?>
                  <tr>
                    <td align="right" bgcolor="#CCCCCC">Bulan :</td>
                    <td align="left"><select name="bulan" id="bulan" onchange="javascript:window.location.href='index.php?modul=status&amp;menu=kursus&amp;id=<?php echo $t['lids']; ?>&amp;bulan='+this.value;">
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
                    <td align="left"><select name="tahun" id="tahun" onchange="javascript:window.location.href='index.php?modul=status&amp;menu=kursus&amp;id=<?php echo $t['lids']; ?>&amp;bulan=<?php echo $bulan; ?>&amp;tahun='+this.value;">
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
                    <td align="left"><select name="tajuk" id="tajuk">
                      <?php
                        $sb = "SELECT * FROM kursus 
                            WHERE kdelete = 1 
                            AND ktmula RLIKE '" . "/".$bulan."/".$tahun . "'
                            ORDER BY ktmula2 ASC
                        ";
                        $db = mysql_query($sb);
                        while ($tb = mysql_fetch_array($db)) {
							if ($tb['kids'] == $ta['kids']) { $select = 'selected="selected"'; }
							else { $select = ""; }
                            ?>
	                      <option value="<?php echo $tb['kids']; ?>" <?php echo $select; ?>><?php echo $tb['ktajuk'] . " (" . output1($tb['ktmula']) . " - " . output1($tb['kttamat']) . ")"; ?></option>
                      <?php
                        }
                        ?>
                    </select></td>
                  </tr>
                  <?php
			  }
			  else {
				  ?>
                  <tr>
                    <td align="right" bgcolor="#CCCCCC">Tajuk Kursus :</td>
                    <td align="left"><?php echo output1(nl2br($ta['ktajuk'])); ?></td>
                  </tr>
                  <tr>
                    <td align="right" bgcolor="#CCCCCC">Tarikh :</td>
                    <td align="left"><?php echo output1($ta['ktmula']) . " - " . output1($ta['kttamat']) . " (" . output1($ta['kjumlah']) . " HARI)"; ?></td>
                  </tr>
                  <tr>
                    <td align="right" bgcolor="#CCCCCC">Lokasi :</td>
                    <td align="left"><?php echo output1($ta['klokasi']); ?></td>
                  </tr>
              <?php
			  }
			  ?>
              <tr>
                <td colspan="2" align="center" bgcolor="#CCCCCC" class="text1">Maklumat 
				Pengesahan</td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Status :</td>
                <td align="left"><?php 
					if ($t['lstatus'] == 2) { echo "DISAHKAN"; }
					elseif ($t['lstatus'] == 3) { echo "TIDAK DISAHKAN"; }
					elseif ($t['lstatus'] == 4) { echo "KIV"; }
					elseif ($t['lstatus'] == 5) { echo "DIBATALKAN"; }
					else { echo "DALAM TINDAKAN"; }
				?></td>
              </tr>
              <?php
			  if ($t['lstatus'] > 1) {
				  ?>
                  <tr>
                    <td align="right" bgcolor="#CCCCCC">Sebab Tidak Disahkan / DiBatalkan 
					/ KIV :</td>
                    <td align="left"><?php echo strtoupper(output1(nl2br($t['lnota']))); ?></td>
                  </tr>
                  <tr>
                    <td align="right" bgcolor="#CCCCCC">Pegawai Yang Mengesahkan :</td>
                    <td align="left">
						<?php 
						$sb = "SELECT * FROM user WHERE unokp = '" . $t['lpelulus'] . "' ORDER BY unokp ASC";
						$db = mysql_query($sb);
						$tb = mysql_fetch_array($db);
						echo output1($tb['unama']); 
						?>
                    </td>
                  </tr>
                  <tr>
                    <td align="right" bgcolor="#CCCCCC">Tarikh Tindakan :</td>
                    <td align="left"><?php echo date("d/m/Y h:iA",output1($t['ltlulus'])); ?></td>
                  </tr>
              <?php
			  }
			  if ($t['lstatus'] < 2) {
				  ?>
				  <tr>
					<td align="right" bgcolor="#CCCCCC">&nbsp;</td>
					<td align="left"><input name="id" type="hidden" id="id" value="<?php echo $t['lids']; ?>" />					  <input type="submit" name="Submit" id="Submit" value="Kemaskini" class="button" />					  <input type="submit" name="Submit" id="Submit" value="Hapus" class="button" /></td>
				  </tr>
              <?php
			  }
			  ?>
          	</form>
            </table>
      <br /></td>
    </tr>
</table>