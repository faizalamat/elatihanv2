<style type="text/css">
<!--
body,td,th {
	color: #000;
}
-->
</style><body text="#000000"><table width="995" cellspacing="0" cellpadding="0" border="0">
    <tr>
        <td width="541" align="left" valign="top" bgcolor="#E2E2E2">
            <table width="541" height="400" border="0" cellpadding="0" bordercolorlight="#F0F0F0" bordercolordark="#F0F0F0" style="border-collapse: collapse">
                <tr>
                    <td width="625" align="justify" bgcolor="#0978F4">                      
                      <img src="files/frontpage4.png" width="680" height="405" align="center">
                      
                    </td>
                </tr>
            </table>
        </td>
        <td width="319" align="left" valign="top" bgcolor="#E2E2E2">
            <div align="center">
            <table width="314" height="156" border="1" cellpadding="5" bordercolor="#000000" style="border-collapse: collapse">
                <tr>
                    <td align="left" bgcolor="#DE5302" class="text2">
                        <?php
                            if (!empty($_SESSION['staff'])) { echo ":: Info"; }
                            else { echo ":: Login "; }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td height="146" align="center">
                        <table width="300" cellpadding="1" cellspacing="0" border="0">
                            <?php
                            if (!empty($_SESSION['staff'])) {
                                ?>
                                <tr>
                                    <td colspan="2" align="center">
                                        <?php 
										echo '<span class="text1">' . output1($tm['unama']) . "</span><br>" . output1($tm['unokp']) . "<br>" . output1($tm['uemail']); 
										if ($tm['ulevel'] == 1) { echo "<br>[ Super Admin ]"; }
										elseif ($tm['ulevel'] == 2) { echo "<br>[ Pentadbir ]"; }
										?>
                                    </td>
                                </tr>
                            <?php
                            }
                            
                            else {
                                ?>
                                <form id="login" name="login" method="post" action="index.php?modul=profail&menu=login">
                                <tr>
                                    <td width="169" align="right" valign="middle" class="menu2">No. Kad Pengenalan 
									(tanpa '-')&nbsp; </td>
                                    <td width="127" align="left" valign="middle">
									<input name="nokp" type="text" size="17" maxlength="12" class="input1" id="nokp" /></td>
                                </tr>
                                <tr>
                                    <td align="right" valign="middle" class="menu2">Katalaluan&nbsp; </td>
                                    <td align="left" valign="middle">
									<input name="pass" type="password" size="17" maxlength="50" class="input2" /></td>
                                </tr>
                                <tr>
                                    <td align="center" class="menu2">&nbsp;</td>
                                    <td align="left">
                                        <input name="submit" type="submit" value="Login" class="button" />
                                        <input name="submit" type="reset" value="Padam" class="button" />
                                    </td>
                                </tr>
                                </form>
                                <tr>
                                   <!-- <td colspan="2" align="center" class="text1">
                                       <a href="index.php?modul=profail&menu=daftar">Daftar Baru</a> | <a href="index.php?modul=profail&menu=reset">Lupa Katalaluan</a>
                                    </td> -->
                                </tr>
                            <?php
                            }
                            ?>
                        </table>
                    </td>
                </tr>
            </table>
        	</div>
        </td>
    </tr>
</table>