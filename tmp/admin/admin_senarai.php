<?php global $con; ?>
<table width="995" cellspacing="0" cellpadding="2" border="0">
    <tr>
        <td align="center" valign="top" bgcolor="#E2E2E2">
          <br />
          <table width="761" border="0" cellpadding="3" style="border-collapse: collapse">
            <tr class="text2">
              <td colspan="5" align="center" bgcolor="#DE5302">SENARAI PENTADBIR SISTEM</td>
            </tr>
            <tr class="text1">
              <td width="28" align="center" bgcolor="#CCCCCC">Bil</td>
              <td width="129" align="center" bgcolor="#CCCCCC">No. Kad Pengenalan</td>
              <td width="287" align="left" bgcolor="#CCCCCC">Nama Penuh</td>
              <td width="203" align="left" bgcolor="#CCCCCC">E-Mel</td>
              <td width="83" align="center" bgcolor="#CCCCCC">Tindakan</td>
            </tr>
            <?php
			$s = "SELECT * FROM user WHERE udelete = 1 AND ulevel = 2 ORDER BY unama ASC";
			$d = mysqli_query($con,$s);
      $n = 0;
			while ($t = mysqli_fetch_array($d)) {
				$n = $n + 1;
				?>
                <tr>
                  <td align="center"><?php echo $n; ?></td>
                  <td align="center"><?php echo output1($t['unokp']); ?></td>
                  <td align="left"><?php echo output1($t['unama']); ?></td>
                  <td align="left"><?php echo output1($t['uemail']); ?></td>
                  <td align="center" bgcolor="#33CCFF">
					<a href="index.php?modul=pentadbir&menu=kemaskini&id=<?php echo $t['uids']; ?>">
					Kemaskini</a></td>
                </tr>
            <?php
			}
			if (!$n) {
				?>
                <tr>
                  <td colspan="5" align="center">Tiada maklumat pentadbir sistem</td>
                </tr>
            <?php
			}
			?>
      	  </table>
            <br />
            <table width="573" border="0" cellpadding="3" style="border-collapse: collapse">
          	<form id="kumpulan" name="kumpulan" method="post" action="index.php?modul=pentadbir&amp;menu=tambah">
              <tr>
                <td colspan="3" align="center" bgcolor="#De5302" class="text2">TAMBAH PENTADBIR SISTEM</td>
              </tr>
              <tr>
                <td width="247" align="center" bgcolor="#CCCCCC">Masukkan No. Kad Pengenalan 
				Pegawai Untuk Menambah Pentadbir<span class="text8"> *</span> :</td>
                <td width="199" align="center">
				<input name="pentadbir" type="text" id="pentadbir" size="26" maxlength="12" class="input1" /></td>
                <td width="109" align="center">
				<input type="submit" name="Submit" id="Submit" value="Tambah" class="button" style="float: left" /></td>
              </tr>
          	</form>
            </table>
          <br />
       </td>
    </tr>
</table>