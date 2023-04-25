<table width="995" cellspacing="0" cellpadding="2" border="0">
    <tr>
        <td align="center" valign="top" bgcolor="#E2E2E2">
            <br />
            <table width="600" border="0" cellpadding="3" style="border-collapse: collapse">
          	<form id="kursus" name="kursus" method="post" action="index.php?modul=profail&amp;menu=kemaskini" onsubmit="return lengkap();">
              <tr>
                <td colspan="2" align="center" bgcolor="#DE5302" class="text2">
				KEMASKINI MAKLUMAT PEGAWAI</td>
              </tr>
              <tr>
                <td width="158" align="right" bgcolor="#CCCCCC">No. Kad ID :</td>
                <td width="424" align="left" class="text8"><input name="nokad" value="<?php echo $tm['unoid']; ?>" type="text" class="input1" id="nokad" size="20" maxlength="50" /> 
                <a href="files/kad.jpg" target="_blank">
				<font class="text8" color="#000000">No. Kad?</font></a></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Nama Penuh Pegawai <span class="text8">*</span> :</td>
                <td align="left"><input name="nama" value="<?php echo $tm['unama']; ?>" type="text" id="nama" size="75" maxlength="255" class="input1" /></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">No. Kad Pengenalan <span class="text8">*</span> :</td>
                <td align="left"><?php echo output1($tm['unokp']); ?></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Tarikh Penempatan di JPA :</td>
                <td align="left" valign="middle"><input name="tmula" value="<?php echo $tm['utpenempatan']; ?>" type="text" class="input1" id="tmula" size="12" maxlength="10" readonly="readonly" />
                  <img src="files/cal.gif" align="top" onclick="javascript:showCal('Cal1')" /></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Kumpulan Perkhidmatan <span class="text8">*</span> :</td>
                <td align="left"><select name="kumpulan" id="kumpulan">
                  <?php
					$sa = "SELECT * FROM kumpulan WHERE pdelete = 1 ORDER BY pid ASC";
					$da = mysql_query($sa);
					while ($ta = mysql_fetch_array($da)) {
						if ($ta['pids'] == $tm['pids']) { $select = 'selected="selected"'; }
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
						if ($ta['gred'] == $tm['ugred']) { $select = 'selected="selected"'; }
						else { $select = ""; }
						?>
                  <option value="<?php echo $ta['gred']; ?>" <?php echo $select; ?>><?php echo $ta['gred']; ?></option>
                  <?php
					}
					?>
                </select></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Bahagian <span class="text8">*</span> :</td>
                <td align="left"><select name="bahagian" id="bahagian">
                  <?php
					$sa = "SELECT * FROM bahagian WHERE bdelete = 1 ORDER BY bahagian ASC";
					$da = mysql_query($sa);
					while ($ta = mysql_fetch_array($da)) {
						if ($ta['bids'] == $tm['bids']) { $select = 'selected="selected"'; }
						else { $select = ""; }
						?>
                  <option value="<?php echo $ta['bids']; ?>" <?php echo $select; ?>><?php echo $ta['bahagian']; ?></option>
                  <?php
					}
					?>
                </select></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">E-Mel <span class="text8">*</span> :</td>
                <td align="left">
                	<?php $email = explode("@",$tm['uemail']);?>
                	<input name="email" type="text" class="input1" id="email" value="<?php echo $email[0]; ?>" size="20" maxlength="50" />
                  <select name="domain" id="domain" size="1">
                    <option value="@JPA.GOV.MY" <?php if ($email[1] == "JPA.GOV.MY") { echo 'selected="selected"'; } ?>>@JPA.GOV.MY</option>
                    <option value="@INTANBK.INTAN.MY" <?php if ($email[1] == "INTANBK.INTAN.MY") { echo 'selected="selected"'; } ?>>@INTANBK.INTAN.MY</option>
					</select></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">No. Telefon Pejabat :<br>
                  cth: 03-83164340</td>
                <td align="left" class="text8"><input name="notel" type="text" class="input1" id="gred3" value="<?php echo $tm['utelefon']; ?>" size="20" maxlength="50" /> 
                  </td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">No. Telefon Bimbit :<br>
                  cth: 012-1234567</td>
                <td align="left" class="text8"><input name="nohp" type="text" class="input1" id="gred4" value="<?php echo $tm['ubimbit']; ?>" size="20" maxlength="50" />
                  </td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Nama Penyelia :</td>
                <td align="left"><input name="nselia" type="text" value="<?php echo $tm['uselia']; ?>" id="nselia" size="75" maxlength="255" class="input1" /></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Jawatan Penyelia :</td>
                <td align="left"><input name="jselia" type="text" value="<?php echo $tm['ujselia']; ?>" id="soalan3" size="75" maxlength="255" class="input1" /></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">E-Mel Penyelia :</td>
                <td align="left">
				<input name="eselia" type="text" value="<?php echo $tm['ueselia']; ?>" id="soalan4" size="42" maxlength="255" class="input1" /></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">&nbsp;</td>
                <td align="left"><table width="100%" border="0" cellspacing="0" cellpadding="2">
                  <tr>
                    <td width="20"><input name="akuan" type="checkbox" id="akuan" value="1" /></td>
                    <td width="421">Saya mengakui maklumat yang diberikan di atas adalah benar.</td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">&nbsp;</td>
                <td align="left">
				<input type="submit" name="Submit" id="Submit" value="Kemaskini" class="button" />
                <input type="reset" name="Submit" id="Submit" value="Padam" class="button" /></td>
              </tr>
          	</form>
            </table>
      <br /></td>
    </tr>
</table>