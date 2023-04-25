<table width="995" cellspacing="0" cellpadding="2" border="0">
    <tr>
        <td align="center" valign="top" bgcolor="#E2E2E2">
          <br />
          <?php
          $s = "SELECT * FROM kursus WHERE kids = '" . input2($_GET['id']) . "' ORDER BY kids ASC";
		  $d = mysql_query($s);
		  $t = mysql_fetch_array($d);
		  ?>
          <table width="900" border="1" cellspacing="0" cellpadding="3" style="border-collapse: collapse">
            <tr class="text2">
              <td colspan="2" align="center" bgcolor="#DE5302">MAKLUMAT KURSUS/LATIHAN</td>
            </tr>
            <tr>
              <td width="180" align="right" valign="middle" bgcolor="#CCCCCC">Anjuran :</td>
              <td width="702" align="left" valign="middle" bgcolor="#FFFFFF">
				<?php 
                if ($t['kanjuran'] == 1) { echo "JABATAN"; }
                elseif ($t['kanjuran'] == 2) { echo "BAHAGIAN"; }
                elseif ($t['kanjuran'] == 3) { echo "SWASTA"; }
                else { echo "AGENSI LUAR"; }
                ?>
              </td>
            </tr>
            <tr>
              <td align="right" valign="middle" bgcolor="#CCCCCC">Nama Penganjur :</td>
              <td align="left" valign="middle" bgcolor="#FFFFFF">
				<?php 
                //if ($t['kanjuran'] == 2) { 
                //    $sa = "SELECT * FROM bahagian WHERE bids = '" . $t['bids'] . "' ORDER BY bids ASC";
                //    $da = mysql_query($sa);
                //    $ta = mysql_fetch_array($da);
                //    echo output1($ta['bahagian']); 
                /*}*/
                /*else {*/ 
				
				echo output1($t['ksektor']); 
				
				/*}*/
                ?>
              </td>
            </tr>
            <tr>
              <td align="right" valign="middle" bgcolor="#CCCCCC">Tajuk Kursus :</td>
              <td align="left" valign="middle" bgcolor="#FFFFFF"><?php echo output2(nl2br($t['ktajuk'])); ?></td>
            </tr>
            <tr>
              <td align="right" valign="middle" bgcolor="#CCCCCC">Tarikh :</td>
              <td align="left" valign="middle" bgcolor="#FFFFFF"><?php echo output1($t['ktmula']) . " - " . output1($t['kttamat']) . " (" . output1($t['kjumlah']). " hari)"; ?></td>
            </tr>
            <tr>
              <td align="right" valign="middle" bgcolor="#CCCCCC">Lokasi :</td>
              <td align="left" valign="middle" bgcolor="#FFFFFF"><?php echo output1($t['klokasi']); ?></td>
            </tr>
          </table>
          <table width="900" border="1" cellspacing="0" cellpadding="3" style="border-collapse: collapse">
            <tr class="text2">
              <td colspan="5" align="center" bgcolor="#DE5302">SENARAI PEGAWAI</td>
            </tr>
            <tr class="text1">
              <td width="42" align="center" valign="middle" bgcolor="#CCCCCC">Bil</td>
              <td width="257" align="left" valign="middle" bgcolor="#CCCCCC">Nama Pegawai</td>
              <td width="120" align="center" valign="middle" bgcolor="#CCCCCC">Gred</td>
              <td width="226" align="left" valign="middle" bgcolor="#CCCCCC">Unit</td>
              <td width="213" align="center" valign="middle" bgcolor="#CCCCCC">Kumpulan Perkhidmatan</td>
            </tr>
            <?php
			$sa = "SELECT l.*, u.*, p.*, b.* 
				FROM latihan AS l, user AS u, kumpulan AS p, bahagian AS b
				WHERE l.unokp = u.unokp
				AND u.pids = p.pids
				AND u.bids = b.bids
				AND u.usah = 1
				AND u.udelete = 1 
				AND l.kids = '" . $t['kids'] . "'
				ORDER BY u.unama ASC
			";
			$da = mysql_query($sa);
			$n = 0;
			while ($ta = mysql_fetch_array($da)) {
				$n = $n + 1;
				?>
				<tr>
				  <td align="center" valign="middle"><?php echo $n; ?></td>
				  <td align="left" valign="middle"><?php echo output1($ta['unama']) . "<br><a href=\"index.php?modul=laporan&menu=kakitangan&status=".$status."&bulan=".$bulan."&tahun=".$tahun."&id=".$t['uids']."\">" . output1($t['unokp']) . "</a>"; ?></td>
				  <td align="center" valign="middle"><?php echo output1($ta['ugred']) . "<br><a href=\"index.php?modul=laporan&menu=kakitangan&status=".$status."&bulan=".$bulan."&tahun=".$tahun."&id=".$t['uids']."\">" . output1($t['unokp']) . "</a>"; ?></td>
				  <td align="left" valign="middle"><?php echo output1($ta['bahagian']); ?></td>
				  <td align="center" valign="middle"><?php echo output1($ta['kumpulan']); ?></td>
			    </tr>
            <?php
			}
			if (!$n) {
				?>
                <tr>
                  <td colspan="5" align="center" valign="middle">Tiada maklumat pegawai</td>
                </tr>
            <?php
			}
			?>
      </table><br /></td>
    </tr>
</table>