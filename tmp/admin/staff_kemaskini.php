<table width="995" cellspacing="0" cellpadding="2" border="0">
    <tr>
        <td align="center" valign="top" bgcolor="#E2E2E2">
            <br />
            <?php
			if (!empty($_GET['id']) && strlen($_GET['id']) == 32) {
				$s = "SELECT * FROM user WHERE uids = '" . input2($_GET['id']) . "' ORDER BY uids ASC";
				$d = mysql_query($s);
				$t = mysql_fetch_array($d);
			}
			?>
            <table width="600" border="0" cellpadding="3" style="border-collapse: collapse">
          	<form id="kursus" name="kursus" method="post" action="index.php?modul=staff&amp;menu=kemaskini" onsubmit="return lengkap();">
              <tr>
                <td colspan="2" align="center" bgcolor="#DE5302" class="text2">KEMASKINI MAKLUMAT PEGAWAI</td>
              </tr>
              <tr>
                <td width="158" align="right" bgcolor="#CCCCCC">No. Kad ID :</td>
                <td width="424" align="left"><input name="nokad" value="<?php echo $t['unoid']; ?>" type="text" class="input1" id="nokad" size="20" maxlength="50" /> 
                <a href="../files/kad.jpg" target="_blank"><font class="text8">Lihat</font></a></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Status <span class="text8">*</span> :</td>
                <td align="left">
                	<input name="status" type="radio" id="status" value="3" <?php if ($t['ulevel'] == 2 || $t['ulevel'] == 3) { echo 'checked="checked"'; } ?> /> AKTIF
                    <input name="status" type="radio" id="status" value="4" <?php if ($t['ulevel'] == 4) { echo 'checked="checked"'; } ?> /> TIDAK AKTIF
                </td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Nama Penuh <span class="text8">*</span> :</td>
                <td align="left"><input name="nama" value="<?php echo $t['unama']; ?>" type="text" id="nama" size="75" maxlength="255" class="input1" /></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">No. Kad Pengenalan <span class="text8">*</span> :</td>
                <td align="left"><?php echo output1($t['unokp'],8); ?></td>
              </tr>
              <!--<tr>
                <td align="right" bgcolor="#CCCCCC">Tarikh Penempatan di JPA :</td>
                <td align="left" valign="middle"><input name="tmula" value="<?php echo $t['utpenempatan']; ?>" type="text" class="input1" id="tmula" size="12" maxlength="10" readonly="readonly" />
                  <img src="../files/cal.gif" align="top" onclick="javascript:showCal('Cal1')" /></td>
              </tr> -->
              <tr>
                <td align="right" bgcolor="#CCCCCC">Kumpulan Perkhidmatan <span class="text8">*</span> :</td>
                <td align="left"><select name="kumpulan" id="kumpulan">
                  <?php
					$sa = "SELECT * FROM kumpulan WHERE pdelete = 1 ORDER BY pid ASC";
					$da = mysql_query($sa);
					while ($ta = mysql_fetch_array($da)) {
						if ($ta['pids'] == $t['pids']) { $select = 'selected="selected"'; }
						else { $select = ""; }
						?>
                  <option value="<?php echo $ta['pids']; ?>" <?php echo $select; ?>><?php echo $ta['kumpulan']; ?></option>
                  <?php
					}
					?>
                </select></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Gred Jawatan <span class="text8">*</span> :</td>
                <td align="left"><select name="gred" id="gred">
                  <?php
					$sa = "SELECT * FROM gred ORDER BY gred DESC";
					$da = mysql_query($sa);
					while ($ta = mysql_fetch_array($da)) {
						if ($ta['gred'] == $t['ugred']) { $select = 'selected="selected"'; }
						else { $select = ""; }
						?>
                  <option value="<?php echo $ta['gred']; ?>" <?php echo $select; ?>><?php echo $ta['gred']; ?></option>
                  <?php
					}
					?>
                </select></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Unit <span class="text8">*</span> :</td>
                <td align="left"><select name="bahagian" id="bahagian">
                  <?php
					$sa = "SELECT * FROM bahagian WHERE bdelete = 1 ORDER BY bahagian ASC";
					$da = mysql_query($sa);
					while ($ta = mysql_fetch_array($da)) {
						if ($ta['bids'] == $t['bids']) { $select = 'selected="selected"'; }
						else { $select = ""; }
						?>
                  <option value="<?php echo $ta['bids']; ?>" <?php echo $select; ?>><?php echo $ta['bahagian']; ?></option>
                  <?php
					}
					?>
                </select></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Email <span class="text8">*</span> :</td>
                <td align="left">
                  <?php  $email = explode("@",$t['uemail']); ?>
                  <input name="email" value="<?php echo $email[0]; ?>" type="text" class="input1" id="email" size="20" maxlength="50" />
                  <select name="domain" id="domain">
                    <option value="@1GOVUC.GOV.MY" <?php if ($email[1] == "1GOVUC.GOV.MY") { echo 'selected="selected"'; } ?>>@1GOVUC.GOV.MY</option>
					<option value="@PICC.GOV.MY" <?php if ($email[1] == "PICC.GOV.MY") { echo 'selected="selected"'; } ?>>@PICC.GOV.MY</option>
                  </select></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">No. Telefon Pejabat :<br>
                  Cth: 03-83164340</td>
                <td align="left" class="text8"><input name="notel" value="<?php echo $t['utelefon']; ?>" type="text" class="input1" id="gred3" size="20" maxlength="50" /> 
                  </td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">No. Telefon Bimbit :<br>
                  Cth: 012-1234567</td>
                <td align="left" class="text8"><input name="nohp" value="<?php echo $t['ubimbit']; ?>" type="text" class="input1" id="gred4" size="20" maxlength="50" />
                  </td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Nama Penyelia :</td>
                <td align="left"><input name="nselia" type="text" value="<?php echo $t['uselia']; ?>" id="nselia" size="75" maxlength="255" class="input1" /></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Jawatan Penyelia :</td>
                <td align="left">
				<input name="jselia" type="text" value="<?php echo $t['ujselia']; ?>" id="soalan3" size="47" maxlength="255" class="input1" /></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Email Penyelia :</td>
                <td align="left">
				<input name="eselia" type="text" value="<?php echo $t['ueselia']; ?>" id="soalan4" size="27" maxlength="255" class="input1" /></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">&nbsp;</td>
                <td align="left"><input name="id" type="hidden" id="id" value="<?php echo $t['uids']; ?>" />
                  <input type="submit" name="Submit" id="Submit" value="Kemaskini" class="button" />
                  <input type="submit" name="Submit" id="Submit" value="Reset Katalaluan" class="button" />
<input type="submit" name="Submit" id="Submit" value="Hapus" class="button" /></td>
              </tr>
          	</form>
            </table>
      <br /></td>
    </tr>
</table>