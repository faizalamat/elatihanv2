<style type="text/css">
<!--
body,td,th {
	color: #000;
}
-->
</style><body text="#000000"><table width="995" cellspacing="0" cellpadding="0" border="0">
    <tr>
        <td width="676" align="left" valign="top" bgcolor="#E2E2E2">
            <table width="673" cellpadding="0" border="0" style="border-collapse: collapse" bordercolorlight="#F0F0F0" bordercolordark="#F0F0F0">
                <tr>
                    <td align="justify" bgcolor="#0978F4" class="text5">
                      <blockquote>
                        <p><b><br>
						e-LATIHAN</b> 
						adalah sistem online bagi merekod 3 jenis kursus 
						yang <u><b>TELAH</b></u> dihadiri oleh para pegawai BIUPA iaitu:<br /><br />1) <b>Kursus/Latihan</b><br />
						2) 
						<b>Sesi Pembelajaran </b><br />3) <b>Pembelajaran Kendiri</b><br />
						<br />Setiap pegawai yang telah menghadiri kursus 
						DIKEHENDAKI memaklumkan secara online kehadiran mereka 
						ke setiap jenis kursus tersebut kepada Unit Modal Insan dan Inovasi.</p>
						<p>Untuk mula menggunakan sistem ini, anda perlu mendaftar terlebih dahulu dengan 
						klik link <b>Daftar Baru</b> di sebelah 
						kanan muka laman ini (di bawah login form).
                          </p>
						<p>Selepas membuat pengesahan pendaftaran, anda boleh menghantar 
						makluman kursus yang telah dihadiri melalui 
						Login ke dalam sistem dan membuat Hantar Makluman. Semua 
						makluman kursus akan diterima oleh 
						Unit Latihan untuk disahkan.                    </p>
                        <p>Anda boleh melihat laporan <u> <b>JUMLAH HARI</b></u> dan
						<b><u>JAM</u> </b>bagi setiap jenis kursus yang dihadiri 
						yang DISAHKAN oleh Unit Latihan. Status lain juga boleh 
						dilihat di laporan yang disediakan.<br /><br />
                          Silalah lakukan pendaftaran e-LATIHAN sekarang kerana 
						ianya mudah &amp; 
						menyenangkan.<br /><br />
                          <!--<b>&quot;JPA PENERAJU PERUBAHAN PERKHIDMATAN AWAM&quot;</b></p>
						<p align="left" style="margin-top: 0; margin-bottom: 0">Sektor Pembangunan Sumber Manusia, Bahagian Khidmat Pengurusan<br>                         
					  Aras 8, Blok C1, Kompleks C, Pusat Pentadbiran Kerajaan Persekutuan<br>                       
					  62510 PUTRAJAYA, Malaysia.</p> -->
						<p align="left" style="margin-top: 0; margin-bottom: 0">Pertanyaan dan Bantuan:&nbsp; 
						<b>03-88726667&nbsp; |&nbsp; 03-88726646 </b>
                        </p>
                      </blockquote>                    </td>
                </tr>
            </table>
        </td>
        <td width="319" align="left" valign="top" bgcolor="#E2E2E2">
            <div align="center">
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
                                    <td colspan="2" align="center" class="text1">
                                       <a href="index.php?modul=profail&menu=daftar">Daftar Baru</a> | <a href="index.php?modul=profail&menu=reset">Lupa Katalaluan</a>
                                    </td>
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