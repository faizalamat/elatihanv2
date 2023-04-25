<?php global $con; ?>
<table width="995" cellspacing="0" cellpadding="2" border="0">
    <tr>
        <td align="center" valign="top" bgcolor="#E2E2E2">
            <br />
            <?php
			if (!empty($_GET['id']) && strlen($_GET['id']) == 32) {
				$s = "SELECT * FROM kursus WHERE kids = '" . input2($_GET['id']) . "' ORDER BY kids ASC";
				$d = mysqli_query($con,$s);
				$t = mysqli_fetch_array($d);
			}
			?>
            <table width="600" border="0" cellpadding="3" style="border-collapse: collapse">
          	<form id="kursus" name="kursus" method="post" action="index.php?modul=kursus&amp;menu=kemaskini" onsubmit="return lengkap3();">
              <tr>
                <td colspan="2" align="center" bgcolor="#DE5302" class="text2">KEMASKINI KURSUS/LATIHAN</td>
              </tr>
              <tr>
                <td width="158" align="right" bgcolor="#CCCCCC">Jenis Kursus <span class="text8">*</span> :</td>
                <td width="424" align="left">
                    <input name="jenis" type="radio" id="jenis" value="1" <?php if ($t['kjenis'] == 1) { echo 'checked="checked"'; } ?>/> DALAM NEGARA 
                    <input name="jenis" type="radio" id="jenis" value="2" <?php if ($t['kjenis'] == 2) { echo 'checked="checked"'; } ?>/> 
                    LUAR NEGARA
                </td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Anjuran <span class="text8">*</span> :</td>
                <td align="left"><select name="anjuran" id="anjuran" onchange="papar(this.value);">
                  <option value="1" <?php if ($t['kanjuran'] == 1) { echo 'selected="selected"'; } ?>>JABATAN</option>
                  <!--<option value="2" <?php if ($t['kanjuran'] == 2) { echo 'selected="selected"'; } ?>>BAHAGIAN</option> -->
                  <option value="3" <?php if ($t['kanjuran'] == 3) { echo 'selected="selected"'; } ?>>SWASTA</option>
                  <option value="4" <?php if ($t['kanjuran'] == 4) { echo 'selected="selected"'; } ?>>AGENSI LUAR</option>
                </select></td>
              </tr>
              <?php
			  if ($t['kanjuran'] == 2) {
				  ?>
				  <tr id="Row1">
					<td align="right" bgcolor="#CCCCCC">Bahagian <span class="text8">*</span> :</td>
					<td align="left"><select name="bahagian" id="bahagian">
					  <?php
						$sa = "SELECT * FROM bahagian WHERE bdelete = 1 ORDER BY bahagian ASC";
						$da = mysqli_query($con,$sa);
						while ($ta = mysqli_fetch_array($da)) {
							if ($ta['bids'] == $t['bids']) { $select = 'selected="selected"'; }
							else { $select = ""; }
							?>
					  <option value="<?php echo $ta['bids']; ?>" <?php echo $select; ?>><?php echo $ta['bahagian']; ?></option>
					  <?php
						}
						?>
					</select></td>
				  </tr> 
				  <tr style="display: none" id="Row2">
					<td align="right" bgcolor="#CCCCCC">Nama Penganjur <span class="text8">*</span> :</td>
					<td align="left"><input name="sektor" value="<?php echo $t['ksektor']; ?>" type="text" id="sektor" size="75" maxlength="255" class="input1" /></td>
				  </tr>
              <?php
			  }
			  else {
				  ?>
				  <tr style="display: none" id="Row1">
					<td align="right" bgcolor="#CCCCCC">Bahagian <span class="text8">*</span> :</td>
					<td align="left"><select name="bahagian" id="bahagian">
					  <?php
						$sa = "SELECT * FROM bahagian WHERE bdelete = 1 ORDER BY bahagian ASC";
						$da = mysqli_query($con,$sa);
						while ($ta = mysqli_fetch_array($da)) {
							if ($ta['bids'] == $t['bids']) { $select = 'selected="selected"'; }
							else { $select = ""; }
							?>
					  <option value="<?php echo $ta['bids']; ?>" <?php echo $select; ?>><?php echo $ta['bahagian']; ?></option>
					  <?php
						}
						?>
					</select></td>
				  </tr>
				  <tr id="Row2">
					<td align="right" bgcolor="#CCCCCC">Nama Penganjur <span class="text8">*</span> :</td>
					<td align="left"><input name="sektor" value="<?php echo $t['ksektor']; ?>" type="text" id="sektor" size="75" maxlength="255" class="input1" /></td>
				  </tr>
              <?php
			  }
			  ?>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Tajuk Kursus <span class="text8">*</span> :</td>
                <td align="left">
				<textarea name="tajuk" id="tajuk" cols="64" rows="3" class="input2"><?php echo $t['ktajuk']; ?></textarea></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Bidang :</td>
                <td align="left"><input name="bidang" value="<?php echo $t['kbidang']; ?>" type="text" id="bidang" size="75" maxlength="255" class="input1" /></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Tarikh Mula <span class="text8">*</span> :</td>
                <td align="left" valign="middle"><input name="tmula" value="<?php echo $t['ktmula']; ?>" type="text" class="input1" id="tmula" size="12" maxlength="10" readonly="readonly" onfocus="hari();" /> <img src="../files/cal.gif" align="top" onclick="javascript:showCal('Cal1')" /></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Tarikh Tamat <span class="text8">*</span> :</td>
                <td align="left" valign="middle"><input name="ttamat" value="<?php echo $t['kttamat']; ?>" type="text" class="input1" id="ttamat" size="12" maxlength="10" readonly="readonly" onfocus="hari();" />
                  <img src="../files/cal.gif" align="top" onclick="javascript:showCal('Cal2')" /></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Termasuk Sabtu/Ahad <span class="text8">*</span> :</td>
                <td align="left">
                	<input name="cuti" type="radio" id="cuti" value="1" <?php if ($t['kcuti'] == 1) { echo 'checked="checked"'; } ?>/> YA
                    <input name="cuti" type="radio" id="cuti" value="2" <?php if ($t['kcuti'] == 2) { echo 'checked="checked"'; } ?>/> TIDAK
                </td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Jumlah Hari Berkursus :</td>
                <td align="left" valign="middle">
                	<input name="jumlah" value="<?php echo $t['kjumlah']; ?>" type="text" class="input1" id="jumlah" size="12" maxlength="10" readonly="readonly" /></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Lokasi Kursus <span class="text8">*</span> :</td>
                <td align="left"><input name="lokasi" value="<?php echo $t['klokasi']; ?>" type="text" id="lokasi" size="75" maxlength="255" class="input1" /></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Penyedia Latihan :</td>
                <td align="left"><input name="penyedia" value="<?php echo $t['kpenyedia']; ?>" type="text" id="penyedia" size="75" maxlength="255" class="input1" /></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Kos (RM) :</td>
                <td align="left"><input name="kos" type="text" class="input1" id="kos" value="<?php echo $t['kkos']; ?>" size="20" maxlength="20" /></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">&nbsp;</td>
                <td align="left"><input name="id" type="hidden" id="id" value="<?php echo $t['kids']; ?>" />
                <input type="submit" name="Submit" id="Submit" value="Kemaskini" class="button" />
                <input type="submit" name="Submit" id="Submit" value="Hapus" class="button" /></td>
              </tr>
          	</form>
            </table>
      <br /></td>
    </tr>
</table>