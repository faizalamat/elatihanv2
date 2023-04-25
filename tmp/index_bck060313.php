<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<style type="text/css">
<!--
body,td,th {
	color: #000;
}
-->
</style><body text="#000000"><table width="995" height ="550" cellspacing="0" cellpadding="0" border="0">
    <tr>
        <!--<td width="676" align="right" valign="top" bgcolor="#E2E2E2">
            <table width="673" cellpadding="0" border="0" style="border-collapse: collapse" bordercolorlight="#F0F0F0" bordercolordark="#F0F0F0">
                <tr>
                    <td align="justify" bgcolor="#0978F4" class="text5">
                      <blockquote>
                        
                      </blockquote>                    
					  </td>
                </tr>
            </table>
        </td> -->
        <td width="319" align="middle" valign="top" bgcolor="#E2E2E2">
            <div align="center" valign="middle">
            <table width="314" cellpadding="5" border="1" style="border-collapse: collapse" bordercolor="#000000">
                <tr>
                    <td align="left" bgcolor="#DE5302" class="text2">
                        <?php
                            if (!empty($_SESSION['staff'])) { echo ":: Info"; }
                            else { echo ":: Login "; }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td align="center">
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
                                    <!--<td colspan="2" align="center" class="text1">
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
</html>