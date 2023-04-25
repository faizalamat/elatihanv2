<table width="995" cellspacing="0" cellpadding="2" border="0">
    <tr>
        <td align="center" valign="top" bgcolor="#E2E2E2">
            <br />
            <table width="624" border="0" cellpadding="3" style="border-collapse: collapse">
          	<form id="kursus" name="kursus" method="post" action="index.php?modul=pendaftaran&amp;menu=sesi" onsubmit="return lengkap4();">
              <tr>
                <td colspan="2" align="center" bgcolor="#DE5302" class="text2">
				HANTAR MAKLUMAN SESI PEMBELAJARAN</td>
              </tr>
              <tr>
                <td colspan="2" align="center" bgcolor="#CCCCCC" class="text1">Maklumat Pegawai</td>
              </tr>
              <tr>
                <td width="180" align="right" bgcolor="#CCCCCC">Nama Penuh:</td>
                <td width="432" align="left" bgcolor="#F0F0F0"><?php echo output1($tm['unama']); ?></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">No. Kad Pengenalan :</td>
                <td align="left" bgcolor="#F0F0F0"><?php echo output1($tm['unokp']); ?></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">No. Kad ID :</td>
                <td align="left" bgcolor="#F0F0F0"><?php echo output1($tm['unoid']); ?></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Unit :</td>
                <td align="left" bgcolor="#F0F0F0">
					<?php 
					$sa = "SELECT * FROM bahagian WHERE bids = '" . $tm['bids'] . "' ORDER BY bids ASC";
					$da = mysql_query($sa);
					$ta = mysql_fetch_array($da);
					echo output1($ta['bahagian']); 
					?>
                </td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Kumpulan Perkhidmatan :</td>
                <td align="left" bgcolor="#F0F0F0">
					<?php 
					$sa = "SELECT * FROM kumpulan WHERE pids = '" . $tm['pids'] . "' ORDER BY pids ASC";
					$da = mysql_query($sa);
					$ta = mysql_fetch_array($da);
					echo output1($ta['kumpulan']); 
					?>
                </td>
              </tr>
              <tr>
                <td colspan="2" align="center" bgcolor="#C6E2FF" class="text1">
				Isikan Maklumat Sesi Pembelajaran Yang Telah Dihadiri</td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Jenis Sesi Pembelajaran <span class="text8">*</span> :</td>
                <td align="left" bgcolor="#FFFFFF"><select name="jenis" id="jenis" onchange="papar2(this.value);">
                  <option value="1">PROGRAM KE ARAH PERKHIDMATAN CEMERLANG DAN CINTAILAH NEGARA KITA</option>
                  <option value="2">PERHIMPUNAN BULANAN BERSAMA YBHG. DATUK TKSUK</option>
				  <option value="4">MAJLIS PERDANA PERKHIDMATAN AWAM KETIGA BELAS (MAPPA XIII)</option>
				  <option value="5">HARI INOVASI JABATAN PERDANA MENTERI</option>
                  <option value="7">LAIN-LAIN (SILA NYATAKAN)</option>
                </select></td>
              </tr>
              <tr style="display: none" id="Row1">
                <td align="right" bgcolor="#CCCCCC"><span class="text8">*</span> </td>
                <td align="left" bgcolor="#FFFFFF">
				<input name="lain" type="text" id="lain" size="55" maxlength="255" class="input1" /></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Tajuk <span class="text8">*</span> :</td>
                <td align="left" bgcolor="#FFFFFF">
				<textarea name="tajuk" id="tajuk" cols="48" rows="3" class="input2"></textarea></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Anjuran :</td>
                <td align="left" bgcolor="#FFFFFF">
				<textarea name="anjuran" id="anjuran" cols="48" rows="3" class="input1"></textarea></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Tarikh <span class="text8">*</span> :</td>
                <td align="left" valign="middle" bgcolor="#FFFFFF"><input name="tmula" type="text" class="input1" id="tmula" size="12" maxlength="10" readonly="readonly" />
                  <img src="files/cal.gif" align="top" onclick="javascript:showCal('Cal1')" /></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Tempat :</td>
                <td align="left" bgcolor="#FFFFFF">
				<input name="tempat" type="text" id="tempat" size="55" maxlength="255" class="input1" /></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Waktu Mula :</td>
                <td align="left" bgcolor="#FFFFFF"><select name="wmula" id="wmula">
                  <option value="8">08:00AM</option>
                  <option value="8.5">08:30AM</option>
                  <option value="9">09:00AM</option>
                  <option value="9.5">09:30AM</option>
                  <option value="10">10:00AM</option>
                  <option value="10.5">10:30AM</option>
                  <option value="11">11:00AM</option>
                  <option value="11.5">11:30AM</option>
                  <option value="12">12:00PM</option>
                  <option value="12.5">12:30PM</option>
                  <option value="13">01:00PM</option>
                  <option value="13.5">01:30PM</option>
                  <option value="14">02:00PM</option>
                  <option value="14.5">02:30PM</option>
                  <option value="15">03:00PM</option>
                  <option value="15.5">03:30PM</option>
                  <option value="16">04:00PM</option>
                  <option value="16.5">04:30PM</option>
                  <option value="17">05:00PM</option>
                </select></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Waktu Tamat :</td>
                <td align="left" bgcolor="#FFFFFF"><select name="wtamat" id="wtamat">
				  <option value="8.5">08:30AM</option>
                  <option value="9">09:00AM</option>
                  <option value="9.5">09:30AM</option>
                  <option value="10">10:00AM</option>
                  <option value="10.5">10:30AM</option>
                  <option value="11">11:00AM</option>
                  <option value="11.5">11:30AM</option>
                  <option value="12">12:00PM</option>
                  <option value="12.5">12:30PM</option>
                  <option value="13">01:00PM</option>
                  <option value="13.5">01:30PM</option>
                  <option value="14">02:00PM</option>
                  <option value="14.5">02:30PM</option>
                  <option value="15">03:00PM</option>
                  <option value="15.5">03:30PM</option>
                  <option value="16">04:00PM</option>
                  <option value="16.5">04:30PM</option>
                  <option value="17">05:00PM</option>
                  <option value="17.5">05:30PM</option>
                </select></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">&nbsp;</td>
                <td align="left" bgcolor="#FFFFFF"><input type="submit" name="Submit" id="Submit" value="Semak" class="button" />
                <input type="reset" name="Submit" id="Submit" value="Padam" class="button" /></td>
              </tr>
          	</form>
            </table>
      <br /></td>
    </tr>
</table>