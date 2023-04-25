<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.:: Sistem Rekod Kehadiran Berkursus ::.</title>
<link rel="shortcut icon" href="files/favicon.ico">
<link rel="stylesheet" type="text/css" href="files/latihan.css">
<script type="text/javascript" src="files/latihan.js"></script>
</head>

<body topmargin="0" leftmargin="0" marginwidth="0" marginheight="0">
<table width="1000" align="center" cellspacing="0" cellpadding="0" border="1">
	<tr>
    	<td align="right" valign="top">
			<table width="996" cellpadding="5" border="0" style="border-collapse: collapse" bordercolor="#F0F0F0" bordercolorlight="#C0C0C0" bordercolordark="#C0C0C0">
			  	<tr>
					<td align="right" bgcolor="#CCCCCC" class="text1">
						<a href="index.php">Utama</a> 
                        <?php
                        //$tm = 0;
						if (isset($tm['ulevel']) == 1 || isset($tm['ulevel']) == 2) {
							?>
	                        | <a href="admin/index.php">Pentadbir</a>
                        <?php
						}
						if (isset($_SESSION['staff'])) {
							?>
							| <a href="index.php?modul=profail&menu=logout">Logout</a>
                        <?php
						}
						?>
					</td>
			  	</tr>
			  	<tr>
				  	<td height="130" align="center" background="files/logo.png" class="text1"></td>
			  	</tr>
			  	<tr>
					<td align="left" bgcolor="#CCCCCC" class="text1">
                    <?php
					if (isset($_SESSION['staff'])) {
						?>
                        <table width="985" border="0" cellspacing="0" cellpadding="3">
                          <tr>
                            <td width="117" align="center" bgcolor="#CCCCCC" class="text1"><span class="text7"><?php echo date("d/m/Y"); ?></span> |</td>
                            <td width="117" align="left" bgcolor="#CCCCCC" class="text1">
                          <div id="ibu">Profil Kakitangan |</div>
                                <div id="anak">
                                <a class="dropdown3" href="index.php?modul=profail&menu=kemaskini">&raquo; Kemaskini</a>
                                <a class="dropdown3" href="index.php?modul=profail&menu=katalaluan">&raquo; Tukar Katalaluan</a>
                                </div>
                                <script type="text/javascript">at_attach("ibu", "anak", "hover", "y", "pointer");</script>
                            </td>
                            <td width="117" align="left" bgcolor="#CCCCCC" class="text1">
                                <div id="ibu2">Hantar Makluman |</div>
                                <div id="anak2">
                                <a class="dropdown2" href="index.php?modul=pendaftaran&menu=kursus">&raquo; Kursus/Latihan</a>
                                <a class="dropdown2" href="index.php?modul=pendaftaran&menu=sesi">&raquo; Sesi Pembelajaran</a>
                                <a class="dropdown2" href="index.php?modul=pendaftaran&menu=kendiri">&raquo; Pembelajaran Kendiri</a>
                                </div>
                                <script type="text/javascript">at_attach("ibu2", "anak2", "hover", "y", "pointer");</script>
                            </td>
                            <td width="117" align="left" bgcolor="#CCCCCC" class="text1">
                                <div id="ibu3">Status Makluman |</div>
                                <div id="anak3">
                                <a class="dropdown2" href="index.php?modul=status&menu=kursus">&raquo; Kursus/Latihan</a>
                                <a class="dropdown2" href="index.php?modul=status&menu=sesi">&raquo; Sesi Pembelajaran</a>
                                <a class="dropdown2" href="index.php?modul=status&menu=kendiri">&raquo; Pembelajaran Kendiri</a>
                                </div>
                                <script type="text/javascript">at_attach("ibu3", "anak3", "hover", "y", "pointer");</script>
                            </td>
                            <td width="502" align="left" bgcolor="#CCCCCC" class="text1"><a href="index.php?modul=laporan&menu=kursus">Laporan Jumlah Hari</a></td>
                          </tr>
                        </table>
                    <?php
					}
					else {
						?>
                        <table width="985" border="0" cellspacing="0" cellpadding="3">
                          <tr>
                            <td align="left" bgcolor="#CCCCCC" class="text7"><?php echo date("d/m/Y"); ?></span></td>
                          </tr>
                      </table>
                    <?php
					}
					?>
				  </td>
			  	</tr>
</table>