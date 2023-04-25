<?php

require_once('conn.php');

if (isset($_SESSION['ahli'])) {
	?>
	<meta http-equiv="Refresh" content="2;url=index.php">
	<table width="995" cellspacing="0" cellpadding="2" border="0"><tr><td align="center" valign="top" bgcolor="#E2E2E2">
    <p>&nbsp;</p>
    <div align="center">
    <table width="600" cellpadding="10" border="0" bgcolor="#FFFFFF" style="border-collapse: collapse">
    <tr><td align="center" valign="middle">
		<font color="#008000" style="font-size: 12pt"><b>
        Anda telah daftar masuk.<br />Anda akan dibawa ke laman utama sebentar lagi.
    </b></font></td></tr></table>
    </div>
    <p>&nbsp;</p>
    </td></tr></table>
<?php
}
else {
	if (empty($_POST['nokp']) || empty($_POST['pass'])) {
		?>
		<meta http-equiv="Refresh" content="2;url=index.php">
		<table width="995" cellspacing="0" cellpadding="2" border="0"><tr><td align="center" valign="top" bgcolor="#E2E2E2">
        <p>&nbsp;</p>
        <div align="center">
        <table width="600" cellpadding="10" border="0" bgcolor="#FFFFFF" style="border-collapse: collapse">
        <tr><td align="center" valign="middle">
			<font color="red" style="font-size: 13pt"><b>
            Sila masukkan <u>No. Kad Pengenalan</u> dan <u>Katalaluan</u> yang betul.
        </b></font></td></tr></table>
        </div>
        <p>&nbsp;</p>
	    </td></tr></table>
	<?php
	}
	else {

        global $con;

		$s = "SELECT * FROM user 
			WHERE unokp = '" . input1($_POST['nokp']) . "' 
			AND upass = '" . md5(input2($_POST['pass'])."p4Kc@") . "'
			AND ulevel <> 4 
		";
		$d = mysqli_query($con,$s);

		if (mysqli_num_rows($d) == 1) {
			$t = mysqli_fetch_array($d);
			if ($t['usah'] == 1) {
				$_SESSION['staff'] = $t['unokp'];

				?>
				<meta http-equiv="Refresh" content="2;url=index.php">
				<table width="995" cellspacing="0" cellpadding="2" border="0"><tr><td align="center" valign="top" bgcolor="#E2E2E2">
				<p>&nbsp;</p>
				<div align="center">
				<table width="600" cellspacing="0" cellpadding="10" border="0" bgcolor="#FFFFFF">
				<tr><td align="center" valign="middle">
					<font color="#008000" style="font-size: 12pt"><b>
					Selamat datang <?php echo ucwords(strtolower(output1($t['unama']))); ?> 
					!<br />Anda akan dibawa ke laman utama sebentar lagi.
				</b></font></td></tr></table>
				</div>
				<p>&nbsp;</p>
				</td></tr></table>
			<?php
			}
			else {
				?>
				<table width="995" cellspacing="0" cellpadding="2" border="0"><tr><td align="center" valign="top" bgcolor="#E2E2E2">
				<p>&nbsp;</p>
				<div align="center">
				<table width="650" cellspacing="0" cellpadding="10" border="0" bgcolor="#FFFFFF">
				<tr><td align="center" valign="middle">
					<font color="red" style="font-size: 13pt"><b>
					Maklumat pendaftaran anda BELUM disahkan.<br />Sila semak 
					e-mel anda 
					sekarang untuk membuat pengesahan.
				</b></font></td></tr></table>
				</div>
				<p>&nbsp;</p>
				</td></tr></table>
			<?php
			}
		}
		else {
			?>
			<meta http-equiv="Refresh" content="2;url=index.php">
			<table width="995" cellspacing="0" cellpadding="2" border="0"><tr><td align="center" valign="top" bgcolor="#E2E2E2">
            <p>&nbsp;</p>
            <div align="center">
            <table width="450" cellspacing="0" cellpadding="10" border="0" bgcolor="#FF0000">
            <tr><td align="center" bgcolor="#FF0000">
				<font color="#FFFFFF" style="font-size: 13pt"><b>
                Katalaluan anda salah!<br />Sila cuba lagi.
            </b></font></td></tr></table>
            </div>
            <p>&nbsp;</p>
		    </td></tr></table>
		<?php
		}
	}
}
?>