<?php global $con; ?>
<table width="995" cellspacing="0" cellpadding="2" border="0">
    <tr>
        <td align="center" valign="top" bgcolor="#E2E2E2">
          <br />
          <table width="652" border="1" cellspacing="0" cellpadding="3" style="border-collapse: collapse">
            <tr class="text2">
              <td colspan="3" align="center" bgcolor="#DE5302">SENARAI UNIT</td>
            </tr>
            <tr class="text1">
              <td width="41" align="center" bgcolor="#CCCCCC">Bil</td>
              <td width="473" align="left" bgcolor="#CCCCCC">Unit</td>
              <td width="114" align="center" bgcolor="#CCCCCC">Tindakan</td>
            </tr>
            <?php
			$s = "SELECT * FROM bahagian WHERE bdelete = 1 ORDER BY bahagian ASC";
			$d = mysqli_query($con,$s);
			while ($t = mysqli_fetch_array($d)) {
				$n = 0;
                $n = $n + 1;
				?>
                <tr>
                  <td align="center"><?php echo $n; ?></td>
                  <td align="left"><?php echo output1($t['bahagian']); ?></td>
                  <td align="center" bgcolor="#33CCFF"><a href="index.php?modul=bahagian&menu=kemaskini&id=<?php echo $t['bids']; ?>">Kemaskini</a></td>
                </tr>
            <?php
			}
			if (!$n) {
				?>
                <tr>
                  <td colspan="3" align="center">Tiada maklumat unit</td>
                </tr>
            <?php
			}
			?>
          </table>
            <br />
            <?php
			if (!empty($_GET['id']) && strlen($_GET['id']) == 32) {
				$s = "SELECT * FROM bahagian WHERE bids = '" . input2($_GET['id']) . "' ORDER BY bids ASC";
				$d = mysqli_query($con,$s);
				$t = mysqli_fetch_array($d);
			}
			?>
            <table width="589" border="0" cellpadding="3" style="border-collapse: collapse">
          	<form id="bahagian" name="bahagian" method="post" action="index.php?modul=bahagian&amp;menu=kemaskini">
              <tr>
                <td colspan="3" align="center" bgcolor="#De5302" class="text2">KEMASKINI UNIT</td>
              </tr>
              <tr>
                <td width="79" align="center" bgcolor="#CCCCCC">Unit <span class="text8">*</span> :</td>
                <td width="330" align="center"><input name="bahagian" value="<?php echo $t['bahagian']; ?>" type="text" id="bahagian" size="55" maxlength="255" class="input1" /></td>
                <td width="154" align="center"><input name="id" type="hidden" id="id" value="<?php echo $t['bids']; ?>" />
                  <input type="submit" name="Submit" id="Submit" value="Kemaskini" class="button" />
                <input type="submit" name="Submit" id="Submit" value="Hapus" class="button" /></td>
              </tr>
          	</form>
            </table>
        <br /></td>
    </tr>
</table>