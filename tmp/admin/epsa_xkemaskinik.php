<table width="995" cellspacing="0" cellpadding="2" border="0">
    <tr>
        <td align="center" valign="top" bgcolor="#E2E2E2">
			<table width="981" cellspacing="0" cellpadding="2" border="0"><tr><td align="center" valign="top" bgcolor="#E2E2E2">
          	<form id="kursus" name="kursus" method="post" action="index.php?modul=epsa&amp;menu=kemaskinik">
			<p>&nbsp;</p>
			<table width="450" cellspacing="0" cellpadding="10" border="1" align="center" bgcolor="#FFFFFF">
            <tr><td align="center" bgcolor="#DE5302" class="text2">MAKLUMAT EPSA</td></tr>
			<tr><td align="center" valign="middle"><p>&nbsp;</p><font color="red"><b>
            	<?php
				$s = "SELECT * FROM epsa WHERE tids = '" . input2($_POST['id']) . "' ORDER BY tids ASC";
				$d = mysql_query($s);
				if (mysql_num_rows($d) >= 1) { echo "Kategori ini mempunyai " . mysql_num_rows($d) . " tajuk EPSA<br>"; }
				?>
				Andakah anda pasti untuk menghapuskan rekod ini?<br /><br />
                <input name="id" type="hidden" id="id" value="<?php echo $_POST['id']; ?>" />
                <input type="submit" name="Submit" id="Submit" value="   Ya   " class="button" />
                <input type="submit" name="Submit" id="Submit" value="Tidak" class="button" />
			</b></font><p>&nbsp;</p></td></tr></table>
            </form>
            </td></tr></table>
      <br /></td>
    </tr>
</table>