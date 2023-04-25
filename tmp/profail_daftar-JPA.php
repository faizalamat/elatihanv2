<table width="995" cellspacing="0" cellpadding="2" border="0">
    <tr>
        <td align="center" valign="top" bgcolor="#E2E2E2">
            <br />
            <table width="688" border="0" cellspacing="0" cellpadding="3">
          	<form id="kursus" name="kursus" method="post" action="index.php?modul=profail&amp;menu=daftar" onsubmit="return lengkap();">
              <tr>
                <td colspan="2" align="center" bgcolor="#DE5302" class="text2">PENDAFTARAN 
				PENGGUNA &amp; MAKLUMAT PEGAWAI</td>
              </tr>
              <tr>
                <td width="196" align="right" bgcolor="#CCCCCC">
				<p align="left"><font size="1">
				Ruangan bertanda </font><u> <span class="text8">
				<span style="background-color: #FFFF00">*</span></span><font size="1"><span style="background-color: #FFFF00">
				MESTI diisi.</span></font></u></td>
                <td width="480" align="left" class="text8">&nbsp;</td>
              </tr>
              <tr>
                <td width="196" align="right" bgcolor="#CCCCCC">No. Kad ID :</td>
                <td width="480" align="left" class="text8"><input name="nokad" type="text" class="input1" id="nokad" size="20" maxlength="50" /> 
                <a target="_blank" href="files/kad.jpg">No. Kad?</a></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Nama Penuh <span class="text8">*</span> :<br>
				(seperti dalam kad pengenalan)</td>
                <td align="left">
				<input name="nama" type="text" id="nama" size="66" maxlength="255" class="input1" /></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">No. Kad Pengenalan <span class="text8">*</span> :</td>
                <td align="left">
                	<input name="nokp1" class="input1" size="6" maxlength="6" onkeyup="autokp(this,document.kursus.nokp2)" /> -
                    <input name="nokp2" class="input1" size="2" maxlength="2" onkeyup="autokp(this,document.kursus.nokp3)" /> -
                    <input name="nokp3" class="input1" size="4" maxlength="4" />
                </td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Tarikh Penempatan di JPA :</td>
                <td align="left" valign="middle"><input name="tmula" type="text" class="input1" id="tmula" size="12" maxlength="10" readonly="readonly" />
                  <img src="files/cal.gif" align="top" onclick="javascript:showCal('Cal1')" /></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Kumpulan Perkhidmatan <span class="text8">*</span> :</td>
                <td align="left"><select name="kumpulan" id="kumpulan">
                  <?php
					$sa = "SELECT * FROM kumpulan WHERE pdelete = 1 ORDER BY pid ASC";
					$da = mysql_query($sa);
					while ($ta = mysql_fetch_array($da)) {
						?>
                  <option value="<?php echo $ta['pids']; ?>"><?php echo $ta['kumpulan']; ?></option>
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
						?>
                  <option value="<?php echo $ta['gred']; ?>"><?php echo $ta['gred']; ?></option>
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
						?>
                  <option value="<?php echo $ta['bids']; ?>"><?php echo $ta['bahagian']; ?></option>
                  <?php
					}
					?>
                </select></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">E-Mel <span class="text8">*</span> :</td>
                <td align="left" bgcolor="#FFA56F"><input name="email" type="text" class="input1" id="email" size="20" maxlength="50" />
                  <select name="domain" id="domain">
                    <option value="@JPA.GOV.MY">@JPA.GOV.MY</option>
                    <option value="@INTANBK.INTAN.MY">@INTANBK.INTAN.MY</option>
                    </select></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">No. Telefon Pejabat :<br>
				<font size="1">(cth: 03-83164340) </font></td>
                <td align="left" class="text8"><input name="notel" type="text" class="input1" id="gred3" size="20" maxlength="50" /> 
                  </td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">No. Telefon Bimbit :<br>
				<font size="1">(cth: 012-1234567)</font></td>
                <td align="left" class="text8"><input name="nohp" type="text" class="input1" id="gred4" size="20" maxlength="50" />
                  </td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Nama Penyelia :</td>
                <td align="left">
				<input name="nselia" type="text" id="nselia" size="66" maxlength="255" class="input1" /></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Jawatan Penyelia :</td>
                <td align="left">
				<input name="jselia" type="text" id="soalan3" size="66" maxlength="255" class="input1" /></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">E-Mel Penyelia :</td>
                <td align="left">
				<input name="eselia" type="text" id="soalan4" size="42" maxlength="255" class="input1" /></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Katalaluan @ Password <span class="text8">*</span> :</td>
                <td align="left"><input name="pass" type="password" class="input1" id="gred5" size="20" maxlength="50" /></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Soalan Keselamatan <span class="text8">*</span> :<br>
				(taipkan soalan anda sendiri)</td>
                <td align="left">
				<input name="soalan" type="text" id="soalan" size="66" maxlength="255" class="input2" /></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Jawapan <span class="text8">* </span>:<br>
				(tuliskan jawapan anda sendiri)</td>
                <td align="left">
				<input name="jawapan" type="text" id="jawapan" size="66" maxlength="255" class="input2" /></td>
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
                <td align="left"><input type="submit" name="Submit" id="Submit" value="Daftar" class="button" />
                <input type="reset" name="Submit" id="Submit" value="Padam" class="button" /></td>
              </tr>
          	</form>
            </table>
      <br /></td>
    </tr>
</table>