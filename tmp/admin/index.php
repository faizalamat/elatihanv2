<?php global $con; ?>
<table width="995" cellspacing="0" cellpadding="2" border="0">
    <tr>
        <td align="center" valign="top" bgcolor="#E2E2E2">
        <br />
          <table width="500" cellspacing="0" cellpadding="5" border="1" bordercolorlight="#F0F0F0" bordercolordark="#F0F0F0" style="border-collapse: collapse">
            <tr>
              <td align="center" class="text1" bgcolor="#00FFFF">
	          	<p>&nbsp;</p>
                <b>
                <span class="menu">Selamat Datang Pentadbir!</span></b><br /><br />
                <font size="+1"><?php
                    if (!empty($_SESSION['staff'])) {
                        $qpentadbir = "SELECT * FROM user
		                        WHERE unokp = '" . input1($_SESSION['staff']) . "'
	                           ";
                        $qresult = mysqli_query($con,$qpentadbir);
                        $tm = mysqli_fetch_array($qresult);
                        echo $tm['unama'];
                    }
                    ?></font>
                <br />
	          	<p>&nbsp;</p>
                </td>
              </tr>
           </table>
           <br />
        </td>
    </tr>
</table>