<?php global $con; ?>
<table width="995" cellspacing="0" cellpadding="2" border="0">
    <tr>
        <td align="center" valign="top" bgcolor="#E2E2E2">
          <br />
          <table width="742" border="0" cellpadding="3" style="border-collapse: collapse">
            <tr class="text2">
              <td colspan="5" align="center" bgcolor="#DE5302">SENARAI PENTADBIR SISTEM</td>
            </tr>
            <tr class="text1">
              <td width="33" align="center" bgcolor="#CCCCCC">Bil</td>
              <td width="130" align="center" bgcolor="#CCCCCC">No. Kad Pengenalan</td>
              <td width="268" align="left" bgcolor="#CCCCCC">Nama Penuh</td>
              <td width="200" align="left" bgcolor="#CCCCCC">E-Mel</td>
              <td width="82" align="center" bgcolor="#CCCCCC">Tindakan</td>
            </tr>
            <?php

			$s = "SELECT * FROM user WHERE udelete = 1 AND ulevel = 2 ORDER BY unama ASC";
			$d = mysqli_query($con,$s);
			while ($t = mysqli_fetch_array($d)) {
				$n = 0;
                $n = $n + 1;
				?>
                <tr>
                  <td align="center"><?php echo $n; ?></td>
                  <td align="center"><?php echo output1($t['unokp']); ?></td>
                  <td align="left"><?php echo output1($t['unama']); ?></td>
                  <td align="left"><?php echo output1($t['uemail'])?></td>
                  <td align="center" bgcolor="#66CCFF"><a href="index.php?modul=pentadbir&menu=kemaskini&id=<?php echo $t['uids']; ?>">Kemaskini</a></td>
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
            <?php

			if (!empty($_GET['id']) && strlen($_GET['id']) == 32) {
				$s = "SELECT * FROM user WHERE uids = '" . input2($_GET['id']) . "' ORDER BY uids ASC";
				$d = mysqli_query($con,$s);
				$t = mysqli_fetch_array($d);
			}
			?>
            <table width="414" border="0" cellpadding="3" style="border-collapse: collapse">
          	<form id="kumpulan" name="kumpulan" method="post" action="index.php?modul=pentadbir&amp;menu=kemaskini">
              <tr>
                <td colspan="3" align="center" bgcolor="#De5302" class="text2">
				HAPUS PENTADBIR SISTEM</td>
              </tr>
              <tr>
                <td width="150" align="center" bgcolor="#CCCCCC">No. Kad Pengenalan <span class="text8">*</span> :</td>
                <td width="152" align="center"><input name="pentadbir" value="<?php echo $t['unokp']; ?>" type="text" id="pentadbir" size="20" maxlength="12" class="input1" /></td>
                <td width="90" align="center"><input name="id" type="hidden" id="id" value="<?php echo $t['uids']; ?>" />                  
				<input type="submit" name="Submit" id="Submit" value="Hapus" class="button" style="float: left" /></td>
              </tr>
          	</form>
            </table>
       <br /></td>
    </tr>
</table>