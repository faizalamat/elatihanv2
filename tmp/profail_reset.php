<table width="995" cellspacing="0" cellpadding="2" border="0">
    <tr>
        <td align="center" valign="top" bgcolor="#E2E2E2">
            <br />
            <?php
			if (isset($_POST['Submit2']) && !empty($_POST['nokp1']) && !empty($_POST['nokp2']) && !empty($_POST['nokp3'])) {
				$s = "SELECT * FROM user 
					WHERE unokp = '" . input1($_POST['nokp1']) . input1($_POST['nokp2']) . input1($_POST['nokp3']) . "'
					ORDER BY unokp ASC
				";
				$d = mysql_query($s);
				$t = mysql_fetch_array($d);
			}
			?>
            <table width="554" border="0" cellpadding="3" style="border-collapse: collapse">
          	<form id="kursus" name="kursus" method="post" action="index.php?modul=profail&amp;menu=reset">
              <tr>
                <td colspan="2" align="center" bgcolor="#DE5302" class="text2">
				LUPA KATALALUAN</td>
              </tr>
              <tr>
                <td width="253" align="right" bgcolor="#CCCCCC">Masukkan No. Kad Pengenalan 
				anda <span class="text8">*</span> :</td>
                <td width="289" align="left">
                	<input name="nokp1" value="<?php echo isset($_POST['nokp1']);?>" class="input1" size="6" maxlength="6" onkeyup="autokp(this,document.kursus.nokp2)" /> -
                    <input name="nokp2" value="<?php echo isset($_POST['nokp2']);?>" class="input1" size="2" maxlength="2" onkeyup="autokp(this,document.kursus.nokp3)" /> -
                    <input name="nokp3" value="<?php echo isset($_POST['nokp3']);?>" class="input1" size="4" maxlength="4" />
                    <input type="submit" name="Submit2" id="Submit" value="Cari" class="button" />
                </td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Soalan Keselamatan anda 
				ialah :</td>
                <td align="left"><?php echo isset($t['usoalan']); ?> &nbsp;</td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">Masukkan Jawapan anda<span class="text8"> *</span> :</td>
                <td align="left">
				<input name="jawapan" type="text" id="jawapan" size="40" maxlength="255" class="input2" /></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#CCCCCC">&nbsp;</td>
                <td align="left"><input type="submit" name="Submit" id="Submit" value="Hantar" class="button" />
                <input type="reset" name="Submit" id="Submit" value="Padam" class="button" /></td>
              </tr>
          	</form>
            </table>
      <br /></td>
    </tr>
</table>