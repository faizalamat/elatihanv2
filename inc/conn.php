 <?php
 
 $con = mysqli_connect("localhost",'root',"P@ssword.123");

	if (!$con)
  	{
  	die('Sambungan gagal: ' . mysqli_error($con));
  	}
	mysqli_select_db($con,"latihandb");

 ?>