
<?php

//include("mysql.php");

$tbl_name="registered_members"; // Table name
$mysqli=mysqli_connect('localhost','root','badminton786','novaprofile old');

$username = $_POST['username'];

$query = "SELECT * FROM $tbl_name WHERE email='$username'";
$result = mysqli_query($mysqli,$query)or die(mysqli_error());
$num_row = mysqli_num_rows($result);
		$row=mysqli_fetch_array($result);
		if( $num_row >=1 ) {
			echo '1';
			
		}
		else{
			echo '0';
		}



?>