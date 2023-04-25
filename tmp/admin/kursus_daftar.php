<?php global $con; ?>
<table width="995" cellspacing="0" cellpadding="2" border="0">
    <tr>
        <td align="center" valign="top" bgcolor="#E2E2E2">
            <br />
            <table width="673" border="0" cellpadding="3" style="border-collapse: collapse">
          	<form id="kursus" name="kursus" method="post" action="index.php?modul=kursus&amp;menu=daftar" onsubmit="return lengkap3();">
              <tr>
                <td colspan="2" align="center" bgcolor="#DE5302" class="text2">TAMBAH KURSUS/LATIHAN</td>
              </tr>
              <tr>
                <td width="173" align="right" bgcolor="#CCCCCC">Jenis Kursus <span class="text8">*</span> :</td>
                <td width="486" align="left">
                    <input name="jenis" type="radio" id="jenis" value="1" checked="checked" /> DALAM NEGARA 
                    <input name="jenis" type="radio" id="jenis" value="2" /> 
                    LUAR NEGARA
                </td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Anjuran <span class="text8">*</span> :</td>
                <td align="left"><select name="anjuran" id="anjuran" onchange="papar(this.value);">
                  <option value="1">JABATAN</option>
                  <!--<option value="2">BAHAGIAN</option> -->
                  <option value="3">SWASTA</option>
                  <option value="4">AGENSI LUAR</option>
                </select></td>
              </tr>
             
              <tr id="Row2">
                <td align="right" bgcolor="#CCCCCC">Nama Penganjur <span class="text8">*</span> :</td>
                <td align="left">
				<input name="sektor" type="text" id="sektor" size="66" maxlength="255" class="input1" /></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC" valign="top">Tajuk Kursus <span class="text8">*</span> :</td>
                <td align="left">
				<textarea name="tajuk" id="tajuk" cols="56" rows="5" class="input2"></textarea></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Bidang :</td>
                <td align="left">
				<input name="bidang" type="text" id="bidang" size="66" maxlength="255" class="input1" /></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Tarikh Mula <span class="text8">*</span> :</td>
                <td align="left" valign="middle"><input name="tmula" type="text" class="input1" id="tmula" size="12" maxlength="10" readonly="readonly" onfocus="hari();" /> <img src="../files/cal.gif" align="top" onclick="javascript:showCal('Cal1')" /></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Tarikh Tamat <span class="text8">*</span> :</td>
                <td align="left" valign="middle"><input name="ttamat" type="text" class="input1" id="ttamat" size="12" maxlength="10" readonly="readonly" onfocus="hari();" />
                  <img src="../files/cal.gif" align="top" onclick="javascript:showCal('Cal2')" /></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Termasuk Sabtu/Ahad <span class="text8">*</span> :</td>
                <td align="left">
                	<input name="cuti" type="radio" id="cuti" value="1"/> YA
                    <input name="cuti" type="radio" id="cuti" value="2" checked="checked" /> TIDAK
                </td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Jumlah Hari Berkursus :</td>
                <td align="left" valign="middle">
                	<input name="jumlah" type="text" class="input1" id="jumlah" size="12" maxlength="10" readonly="readonly" /> 
					(Hari)</td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Lokasi Kursus <span class="text8">*</span> :</td>
                <td align="left">
				<input name="lokasi" type="text" id="lokasi" size="65" maxlength="255" class="input1" /></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Penyedia Latihan :</td>
                <td align="left">
				<input name="penyedia" type="text" id="penyedia" size="65" maxlength="255" class="input1" /></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Kos (RM) :</td>
                <td align="left">
				<input name="kos" type="text" id="kos" size="12" maxlength="20" class="input1" /></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">&nbsp;</td>
                <td align="left">
				<input type="submit" name="Submit" id="Submit" value="Simpan" class="button" />
                <input type="reset" name="Submit" id="Submit" value="Padam" class="button" /></td>
              </tr>
          	</form>
            </table>
      <br /></td>
    </tr>
</table>