<?php global $con; ?>
<table width="995" cellspacing="0" cellpadding="2" border="0">
    <tr>
        <td align="center" valign="top" bgcolor="#E2E2E2">
          <br />
          <table width="502" border="1" cellspacing="0" cellpadding="3" style="border-collapse: collapse">
            <tr class="text2">
              <td colspan="3" align="center" bgcolor="#DE5302">SENARAI GRED JAWATAN</td>
            </tr>
            <tr class="text1">
              <td width="41" align="center" bgcolor="#CCCCCC">Bil</td>
              <td width="324" align="left" bgcolor="#CCCCCC">Gred Jawatan</td>
              <td width="114" align="center" bgcolor="#CCCCCC">Tindakan</td>
            </tr>
            <?php
			$s = "SELECT * FROM gred ORDER BY gred DESC";
			$d = mysqli_query($con,$s);
            $n = 0;
			while ($t = mysqli_fetch_array($d)) {
				$n = $n + 1;
				?>
                <tr>
                  <td align="center"><?php echo $n; ?></td>
                  <td align="left"><?php echo output1($t['gred']); ?></td>
                  <td align="center" bgcolor="#33CCFF"><a href="index.php?modul=gred&menu=kemaskini&id=<?php echo $t['gids']; ?>">Kemaskini</a></td>
                </tr>
            <?php
			}
			if (!$n) {
				?>
                <tr>
                  <td colspan="3" align="center">Tiada maklumat gred jawatan</td>
                </tr>
            <?php
			}
			?>
          </table>
            <br />
            <?php
			if (!empty($_GET['id']) && strlen($_GET['id']) == 32) {
				$s = "SELECT * FROM gred WHERE gids = '" . input2($_GET['id']) . "' ORDER BY gids ASC";
				$d = mysqli_query($con,$s);
				$t = mysqli_fetch_array($d);
			}
			?>
            <table width="423" border="0" cellpadding="3" style="border-collapse: collapse">
          	<form id="gred" name="gred" method="post" action="index.php?modul=gred&amp;menu=kemaskini">
              <tr>
                <td colspan="3" align="center" bgcolor="#De5302" class="text2">KEMASKINI GRED JAWATAN</td>
              </tr>
              <tr>
                <td width="79" align="center" bgcolor="#CCCCCC">Gred <span class="text8">*</span> :</td>
                <td width="202" align="center">
				<input name="gred" value="<?php echo $t['gred']; ?>" id="gred" size="27" maxlength="255" class="input1" style="float: left" /></td>
                <td width="124" align="center"><input name="id" type="hidden" id="id" value="<?php echo $t['gids']; ?>" />
                  <input type="submit" name="Submit" id="Submit" value="Kemaskini" class="button" />
                <input type="submit" name="Submit" id="Submit" value="Hapus" class="button" /></td>
              </tr>
          	</form>
            </table>
       <br /></td>
    </tr>
</table>