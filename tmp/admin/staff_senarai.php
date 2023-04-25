<?php global $con; ?>
<table width="995" cellspacing="0" cellpadding="2" border="0">
    <tr>
        <td align="center" valign="top" bgcolor="#E2E2E2">
            <br />
            <?php
            if (!empty($_POST['kumpulan'])) { $kumpulan = $_POST['kumpulan']; }
			else { $kumpulan = "ALL"; }
			if (!empty($_POST['bahagian'])) { $bahagian = $_POST['bahagian']; }
			else { $bahagian = "ALL"; }
			if (!empty($_POST['pilihan'])) { $pilihan = $_POST['pilihan']; }
			else { $pilihan = "1"; }
			if (!empty($_POST['carian'])) { $carian = $_POST['carian']; }
			else { $carian = "ALL"; }
			?>
            <table width="990" border="0" cellspacing="0" cellpadding="3">
          	<form id="staff" name="staff" method="post" action="index.php?modul=staff&amp;menu=senarai">
              <tr bgcolor="#E2E2E2">
                <td width="681" align="right" class="text1">Carian :
                  <select name="kumpulan" id="kumpulan">
                    <option value="" selected="selected">- SEMUA -</option>
                    <?php
                    
				  $sa = "SELECT * FROM kumpulan WHERE pdelete = 1 ORDER BY kumpulan ASC";
				  $da = mysqli_query($con,$sa);
				  while ($ta = mysqli_fetch_array($da)) {
					  if ($ta['pids'] == isset($_POST['kumpulan'])) { $select = 'selected="selected"'; }
					  else { $select = ""; }
					  ?>
                    <option value="<?php echo $ta['pids']; ?>" <?php echo $select; ?>><?php echo $ta['kumpulan']; ?></option>
                    <?php
				  }
				  ?>
                </select></td>
                <td width="58" align="right" class="text1"><select name="bahagian" id="bahagian">
                  <option value="">- SEMUA -</option>
                  <?php
				  $sa = "SELECT * FROM bahagian WHERE bdelete = 1 ORDER BY bahagian ASC";
				  $da = mysqli_query($con,$sa);
				  while ($ta = mysqli_fetch_array($da)) {
					  if ($ta['bids'] == isset($_POST['bahagian'])) { $select = 'selected="selected"'; }
					  else { $select = ""; }
					  ?>
                  <option value="<?php echo $ta['bids']; ?>" <?php echo $select; ?>><?php echo $ta['bahagian']; ?></option>
                  <?php
				  }
				  ?>
                </select></td>
                <td width="41" align="right"><select name="pilihan" id="pilihan">
                  <option value="1" <?php if (isset($_POST['pilihan']) == 1) { echo 'selected="selected"'; } ?>>NAMA</option>
                  <option value="2" <?php if (isset($_POST['pilihan']) == 2) { echo 'selected="selected"'; } ?>>NO. KAD PENGENALAN</option>
                </select></td>
                <td width="120" align="right"><input name="carian" value="<?php echo isset($_POST['carian']); ?>" type="text" class="input1" id="carian" size="20" maxlength="255" /></td>
                <td width="60" align="left"><input type="submit" name="Submit" id="Submit" value="  Cari  " class="button" /></td>
              </tr>
          	</form>
            </table>
          <br />
          <div align="right" class="text1">
          	 <?php
			 if (isset($_POST['Submit'])) {
				 ?>
	             [ 
				<a target="_blank" href="export.php?menu=staff<?php if ($bahagian != "ALL") { echo "&bahagian=".$bahagian; } ?>&pilihan=<?php echo $pilihan; ?>&carian=<?php echo $carian; ?>">Export</a> ] 
             <?php
			 }
			 else {
				 ?>
	             [ <a target="_blank" href="export.php?menu=staff">Export </a>] 
             <?php
			 }
			 ?>
          </div>
          <br />
          <table width="990" border="1" cellspacing="0" cellpadding="3" style="border-collapse: collapse">
            <tr class="text2">
              <td colspan="8" align="center" bgcolor="#DE5302">SENARAI PEGAWAI</td>
            </tr>
            <tr class="text1">
              <td width="40" align="center" bgcolor="#CCCCCC">Bil</td>
              <td width="96" align="center" bgcolor="#CCCCCC">Tarikh &amp; Masa Mendaftar</td>
              <td width="221" align="left" bgcolor="#CCCCCC">Nama Pegawai</td>
              <td width="89" align="center" bgcolor="#CCCCCC">No. Kad Pengenalan</td>
              <td width="124" align="center" bgcolor="#CCCCCC">Kumpulan Perkhidmatan</td>
              <td width="122" align="center" bgcolor="#CCCCCC">Unit</td>
              <td width="159" align="center" bgcolor="#CCCCCC">Email</td>
              <td width="78" align="center" bgcolor="#CCCCCC">Status</td>
            </tr>
            <?php
			if (!empty($_POST['carian'])) {
				if ($_POST['pilihan'] == 1) {
					$s = "SELECT u.*, b.*, p.*
						FROM user AS u, bahagian AS b, kumpulan AS p
						WHERE u.bids = b.bids
						AND u.pids = p.pids
						AND u.udelete = 1 
						AND u.usah = 1 
						AND u.ulevel > 1 
						AND u.unama RLIKE '" . input1($_POST['carian']) . "'
					";
					if ($bahagian != "ALL") {
						$s .= "AND u.bids = '" . input2($bahagian) . "' ";
						
					}
									
					if ($kumpulan != "ALL") {
						$s .= "AND u.pids = '" . input2($kumpulan) . "' ";

					}
					
					$s .= "ORDER BY u.utsah DESC";
				}
				else {
					$s = "SELECT u.*, b.*, p.*
						FROM user AS u, bahagian AS b, kumpulan AS p
						WHERE u.bids = b.bids
						AND u.pids = p.pids
						AND u.udelete = 1 
						AND u.usah = 1 
						AND u.ulevel > 1 
						AND u.unokp RLIKE '" . input1($_POST['carian']) . "'
					";
					if ($bahagian != "ALL") {
						$s .= "AND u.bids = '" . input2($bahagian) . "' ";
					}
					
					if ($kumpulan != "ALL") {
						$s .= "AND u.pids = '" . input2($kumpulan) . "' ";

					}
					$s .= "ORDER BY u.utsah DESC";
				}
			}
			else {
				$s = "SELECT u.*, b.*, p.*
					FROM user AS u, bahagian AS b, kumpulan AS p
					WHERE u.bids = b.bids
					AND u.pids = p.pids
					AND u.udelete = 1 
					AND u.usah = 1 
					AND u.ulevel > 1 
				";
				if ($bahagian != "ALL") {
					$s .= "AND u.bids = '" . input2($bahagian) . "' ";
					
				}
				
				if ($kumpulan != "ALL") {
					$s .= "AND u.pids = '" . input2($kumpulan) . "' ";

					}
				$s .= "ORDER BY u.utsah DESC";
			}
			$d = mysqli_query($con,$s);
			$n = 0;
			while ($t = mysqli_fetch_array($d)) {
				$n = $n + 1;
				?>
				<tr>
				  <td align="center" valign="middle"><?php echo $n; ?></td>
				  <td align="center" valign="middle"><?php echo date("d/m/Y h:iA",output1($t['utsah'])); ?></td>
				  <td align="left" valign="middle"><?php echo output1($t['unama']); ?></td>
				  <td align="center" valign="middle"><?php echo output1($t['unokp']); ?></td>
				  <td align="center" valign="middle"><?php echo output1($t['kumpulan']); ?></td>
				  <td align="center" valign="middle"><?php echo output1($t['bahagian']); ?></td>
				  <td align="center" valign="middle"><?php echo output1($t['uemail']); ?></td>
				  <td align="center" bgcolor="#CCCCFF">
				  	<?php 
					if ($tm['ulevel'] == 1) { echo '<a href="index.php?modul=staff&amp;menu=kemaskini&id=' . $t['uids'] . '">'; }
					if ($t['ulevel'] == 2) { echo "PENTADBIR"; }
					elseif ($t['ulevel'] == 3) { echo "AKTIF"; }
					elseif ($t['ulevel'] == 4) { echo "PASIF"; }
					else { echo "&nbsp;"; }
					if ($tm['ulevel'] == 1) { echo '</a>'; }
					?>
                  </td>
				</tr>
			<?php
			}
			if (!$n) {
				?>
                <tr>
                  <td colspan="8" align="center">Tiada maklumat pegawai</td>
                </tr>
            <?php
			}
			?>
      </table><br /></td>
    </tr>
</table>