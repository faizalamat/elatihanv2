<?php global $con; ?>
<table width="995" cellspacing="0" cellpadding="2" border="0">
    <tr>
        <td align="center" valign="top" bgcolor="#E2E2E2">
            <br />
            <?php
			if (!empty($_POST['kategori'])) { $kategori = $_POST['kategori']; }
			else { $kategori = "ALL"; }
			?>
            <table width="700" border="0" cellspacing="0" cellpadding="3">
          	<form id="epsa" name="epsa" method="post" action="index.php?modul=epsa&amp;menu=senarai">
              <tr bgcolor="#E2E2E2">
                <td width="637" align="right">Pilihan :</td>
                <td width="46" align="right"><select name="kategori" id="kategori">
                  <option value="">- SEMUA -</option>
                  <?php
				  $sa = "SELECT * FROM kategori ORDER BY kategori ASC";
				  $da = mysqli_query($con,$sa);
				  while ($ta = mysqli_fetch_array($da)) {
					  if ($ta['tids'] == $_POST['kategori']) { $select = 'selected="selected"'; }
					  else { $select = ""; }
					  ?>
                  	  <option value="<?php echo $ta['tids']; ?>" <?php echo $select; ?>><?php echo $ta['kategori']; ?></option>
                  <?php
				  }
				  ?>
                </select></td>
                <td width="58" align="center"><input type="submit" name="Submit" id="Submit" value=" Papar " class="button" /></td>
              </tr>
          	</form>
            </table>
          <br />
          <table width="700" border="0" cellspacing="0" cellpadding="3">
            <tr class="text2">
              <td colspan="5" align="center" bgcolor="#DE5302">SENARAI EPSA</td>
            </tr>
            <tr class="text1">
              <td width="39" align="center" bgcolor="#CCCCCC">Bil</td>
              <td width="300" align="left" bgcolor="#CCCCCC">Tajuk EPSA</td>
              <td width="109" align="center" bgcolor="#CCCCCC">Kod EPSA</td>
              <td width="107" align="center" bgcolor="#CCCCCC">Jumlah Jam</td>
              <td width="103" align="center" bgcolor="#CCCCCC">Tindakan</td>
            </tr>
            <?php
			if ($kategori != "ALL") {
				$s = "SELECT * FROM kategori WHERE tids = '" . input2($kategori) . "' ORDER BY kategori ASC";
			}
			else {
				$s = "SELECT * FROM kategori ORDER BY kategori ASC";
			}
			$d = mysqli_query($con,$s);
			while ($t = mysqli_fetch_array($d)) {
				$n = $n + 1;
				?>
                <tr bgcolor="#FFFF00">
                  <td align="center">#</td>
                  <td colspan="3" align="left"><?php echo output1($t['kategori']); ?></td>
                  <td align="center"><a href="index.php?modul=epsa&amp;menu=kemaskinik&amp;id=<?php echo $t['tids']; ?>">Kemaskini</a></td>
                </tr>
				<?php
				$sa = "SELECT * FROM epsa WHERE edelete = 1 AND tids = '" . $t['tids'] . "' ORDER BY epsa ASC";
				$da = mysqli_query($con,$sa);
				$b = 0;
				while ($ta = mysqli_fetch_array($da)) {
					$b = $b + 1;
					?>
					<tr>
					  <td align="center"><?php echo $b; ?></td>
					  <td align="left"><?php echo output1($ta['epsa']); ?></td>
					  <td align="center"><?php echo output1($ta['ekod']); ?></td>
					  <td align="center"><?php echo output1($ta['ejam']); ?></td>
					  <td align="center"><a href="index.php?modul=epsa&menu=kemaskini&id=<?php echo $ta['eids']; ?>">Kemaskini</a></td>
					</tr>
				<?php
				}
			}
			if (!$n) {
				?>
                <tr>
                  <td colspan="5" align="center">Tiada maklumat EPSA</td>
                </tr>
            <?php
			}
			?>
          </table>
      <br />
            <?php
			if (!empty($_GET['id']) && strlen($_GET['id']) == 32) {
			$s = "SELECT * FROM epsa WHERE eids = '" . input2($_GET['id']) . "' ORDER BY eids ASC";
				$d = mysqli_query($con,$s);
				$t = mysqli_fetch_array($d);
			}
			?>
            <table width="500" border="0" cellspacing="0" cellpadding="3">
          	<form id="epsa" name="epsa" method="post" action="index.php?modul=epsa&amp;menu=kemaskini">
              <tr>
                <td colspan="2" align="center" bgcolor="#DE5302" class="text2">KEMASKINI  EPSA</td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Kategori EPSA <span class="text8">*</span> :</td>
                <td align="left"><select name="kategori" id="kategori">
                  <?php
					$sa = "SELECT * FROM kategori ORDER BY kategori ASC";
					$da = mysqli_query($con,$sa);
					while ($ta = mysqli_fetch_array($da)) {
						if ($ta['tids'] == $t['tids']) { $select = 'selected="selected"'; }
						else { $select = ""; }
						?>
                  <option value="<?php echo $ta['tids']; ?>" <?php echo $select; ?>><?php echo $ta['kategori']; ?></option>
                  <?php
					}
					?>
                </select></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Kod EPSA <span class="text8">*</span> :</td>
                <td align="left"><input name="kod" value="<?php echo $t['ekod']; ?>" type="text" id="kod" size="20" maxlength="255" class="input1" /></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Jumlah Jam <span class="text8">*</span> :</td>
                <td align="left"><input name="jam" value="<?php echo $t['ejam']; ?>" type="text" id="jam" size="5" maxlength="255" class="input1" /> 
                  JAM</td>
              </tr>
              <tr>
                <td width="96" align="right" bgcolor="#CCCCCC">Tajuk EPSA <span class="text8">*</span> :</td>
                <td width="386" align="left"><input name="epsa" value="<?php echo $t['epsa']; ?>" type="text" id="epsa" size="55" maxlength="255" class="input1" /></td>
              </tr>
              <tr>
                <td align="center" bgcolor="#CCCCCC">&nbsp;</td>
                <td align="left"><input name="id" type="hidden" id="id" value="<?php echo $t['eids']; ?>" />
                  <input type="submit" name="Submit" id="Submit" value="Kemaskini" class="button" />
                <input type="submit" name="Submit" id="Submit" value="Hapus" class="button" /></td>
              </tr>
          	</form>
            </table>
      <br /></td>
    </tr>
</table>