<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.:: Sistem Rekod Kehadiran Berkursus::.</title>
<link rel="shortcut icon" href="../files/favicon.ico">
<link rel="stylesheet" type="text/css" href="../files/latihan.css">
<script type="text/javascript" src="../files/latihan.js"></script>
</head>

<body topmargin="0" leftmargin="0" marginwidth="0" marginheight="0">
<table width="1000" align="center" cellspacing="0" cellpadding="0" border="1">
	<tr>
    	<td align="right" valign="top">
			<table width="996" cellspacing="0" cellpadding="5" border="0">
			  	<tr>
					<td colspan="2" align="right" bgcolor="#F5B10E" class="text1">
						<a href="../index.php">Utama</a> 
                        | <a href="index.php">Pentadbir</a>
                        | <a href="index.php?modul=profail&menu=logout">Logout</a>
					</td>
			  	</tr>
			  	<tr>
				  	<td height="120" align="center" background="../files/logo.png" class="text1"></td>
			  	</tr>
			  	<tr>
					<td align="left" bgcolor="#F5B10E">
                    <?php
					if (isset($tm['ulevel']) == 1) {
						?>
                        <table width="985" border="0" cellspacing="0" cellpadding="3">
                          <tr>
                            <td width="603" align="left" bgcolor="#F5B10E" class="text1">
                                <span class="text7"><?php echo date("d/m/Y"); ?></span> |
                                <a href="index.php?modul=pentadbir&amp;menu=senarai">Pentadbir</a> |
                                <a href="index.php?modul=staff&amp;menu=senarai">Senarai Pegawai</a> |
                                <a href="index.php?modul=kumpulan&amp;menu=senarai">Kumpulan Perkhidmatan</a> |
                                <a href="index.php?modul=gred&amp;menu=senarai">Gred Jawatan</a> |
                                <a href="index.php?modul=bahagian&amp;menu=senarai">Unit</a> |
                                <a href="index.php?modul=epsa&amp;menu=senarai">EPSA</a> |
                            </td>
                            <td width="101" align="left" bgcolor="#F5B10E" class="text1">
                                <div id="ibu">Kursus/ Latihan |</div>
                                <div id="anak">
                                <a class="dropdown" href="index.php?modul=kursus&menu=daftar">&raquo; Daftar Baru</a>
                                <a class="dropdown" href="index.php?modul=kursus&menu=senarai">&raquo; Senarai</a>
                                </div>
                                <script type="text/javascript">at_attach("ibu", "anak", "hover", "y", "pointer");</script>
                            </td>
                            <td width="100" align="left" bgcolor="#F5B10E" class="text1">
                                <div id="ibu2"><b><font color="#00FFFF">Untuk Tindakan</font></b> |</div>
                                <div id="anak2">
                                <a class="dropdown2" href="index.php?modul=kelulusan&menu=kursus">&raquo; Kursus/Latihan</a> 
                                <a class="dropdown2" href="index.php?modul=kelulusan&menu=sesi">&raquo; Sesi Pembelajaran</a>
                                <a class="dropdown2" href="index.php?modul=kelulusan&menu=kendiri">&raquo; Pembelajaran Kendiri</a>
                                </div>
                                <script type="text/javascript">at_attach("ibu2", "anak2", "hover", "y", "pointer");</script>
                            </td>
                            <td width="58" align="left" bgcolor="#F5B10E" class="text1">
                                <div id="ibu3"><b><font color="#00FFFF">Laporan</font></b> |</div>
                                <div id="anak3">
                                <a class="dropdown4" href="index.php?modul=laporan&menu=bahagian">&raquo; Unit</a>
                                <a class="dropdown4" href="index.php?modul=laporan&menu=kumpulan">&raquo; Kumpulan Perkhidmatan</a>
                                <a class="dropdown4" href="index.php?modul=laporan&menu=kursus">&raquo; 
								3 Jenis Kursus</a>
								<a class="dropdown4" href="index.php?modul=laporan&menu=jumlah">&raquo; Jumlah Hari 
								Kursus</a>
                                <a class="dropdown4" href="index.php?modul=laporan&menu=pasif">&raquo; Pegawai Tidak Aktif</a>
                                <a class="dropdown4" href="index.php?modul=laporan&menu=epsa">
								» EPSA</a>
                                </div>
                                <script type="text/javascript">at_attach("ibu3", "anak3", "hover", "y", "pointer");</script>
                            </td>
                            <td width="59" align="left" bgcolor="#F5B10E" class="text1">
                                <div id="ibu4"><b><font color="#00FFFF">Statistik</font></b></div>
                                <div id="anak4">
                                <a class="dropdown4" href="index.php?modul=statistik&menu=tempoh">&raquo; Tempoh Penempatan</a>
                                <a class="dropdown4" href="index.php?modul=statistik&menu=hari">&raquo; Jumlah Hari Berkursus</a>
                                <a class="dropdown4" href="index.php?modul=statistik&menu=semua">&raquo; Keseluruhan Pegawai</a>
                                </div>
                                <script type="text/javascript">at_attach("ibu4", "anak4", "hover", "y", "pointer");</script>
                            </td>
                            <td width="28" align="left" bgcolor="#F5B10E" class="text1">&nbsp;</td>
                          </tr>
                        </table>
                    <?php
					}
					else {
						?>
                        <table width="985" border="0" cellspacing="0" cellpadding="3">
                          <tr>
                            <td width="533" align="left" bgcolor="#F5B10E" class="text1">
                                <span class="text7"><?php echo date("d/m/Y"); ?></span> |
                                <a href="index.php?modul=staff&amp;menu=senarai">Senarai Pegawai</a> |
                                <a href="index.php?modul=kumpulan&amp;menu=senarai">Kumpulan Perkhidmatan</a> |
                                <a href="index.php?modul=gred&amp;menu=senarai">Gred Jawatan</a> |
                                <a href="index.php?modul=bahagian&amp;menu=senarai">Unit</a> |
                                <a href="index.php?modul=epsa&amp;menu=senarai">EPSA</a> |
                            </td>
                            <td width="101" align="left" bgcolor="#F5B10E" class="text1">
                                <div id="ibu">Kursus/ Latihan |</div>
                                <div id="anak">
                                <a class="dropdown" href="index.php?modul=kursus&menu=daftar">&raquo; Daftar Baru</a>
                                <a class="dropdown" href="index.php?modul=kursus&menu=senarai">&raquo; Senarai</a>
                                </div>
                                <script type="text/javascript">at_attach("ibu", "anak", "hover", "y", "pointer");</script>
                            </td>
                            <td width="100" align="left" bgcolor="#F5B10E" class="text1">
                                <div id="ibu2"><b><font color="#00FFFF">Untuk Tindakan</font></b> |</div>
                                <div id="anak2">
                                <a class="dropdown2" href="index.php?modul=kelulusan&menu=kursus">&raquo; Kursus/Latihan</a> 
                                <a class="dropdown2" href="index.php?modul=kelulusan&menu=sesi">&raquo; Sesi Pembelajaran</a>
                                <a class="dropdown2" href="index.php?modul=kelulusan&menu=kendiri">&raquo; Pembelajaran Kendiri</a>
                                </div>
                                <script type="text/javascript">at_attach("ibu2", "anak2", "hover", "y", "pointer");</script>
                            </td>
                            <td width="58" align="left" bgcolor="#F5B10E" class="text1">
                                <div id="ibu3"><b><font color="#00FFFF">Laporan</font></b> |</div>
                                <div id="anak3">
                                <a class="dropdown4" href="index.php?modul=laporan&menu=bahagian">&raquo; Unit</a>
                                <a class="dropdown4" href="index.php?modul=laporan&menu=kumpulan">&raquo; Kumpulan Perkhidmatan</a>
                                <a class="dropdown4" href="index.php?modul=laporan&menu=kursus">&raquo; 3 Jenis Kursus</a>
                                <a class="dropdown4" href="index.php?modul=laporan&menu=jumlah">&raquo; Jumlah Hari Kursus</a>
                                <a class="dropdown4" href="index.php?modul=laporan&menu=pasif">&raquo; Pegawai Tidak Aktif</a>
                                <a class="dropdown4" href="index.php?modul=laporan&menu=epsa">&raquo; EPSA</a>
                          </div>
                                <script type="text/javascript">at_attach("ibu3", "anak3", "hover", "y", "pointer");</script>
                            </td>
                            <td width="59" align="left" bgcolor="#F5B10E" class="text1">
                                <div id="ibu4"><font color="#00FFFF"><b>Statistik</b></font></div>
                                <div id="anak4">
                                <a class="dropdown4" href="index.php?modul=statistik&menu=tempoh">&raquo; Tempoh Penempatan</a>
                                <a class="dropdown4" href="index.php?modul=statistik&menu=hari">&raquo; Jumlah Hari Berkursus</a>
                                <a class="dropdown4" href="index.php?modul=statistik&menu=semua">&raquo; Keseluruhan Pegawai</a>
                                </div>
                                <script type="text/javascript">at_attach("ibu4", "anak4", "hover", "y", "pointer");</script>
                            </td>
                            <td width="98" align="left" bgcolor="#F5B10E" class="text1">&nbsp;</td>
                          </tr>
                        </table>
                        <?php
					}
					?>
			  	  </td>
			  	</tr>
			</table>