<?php
include("mysql.php");

$tbl_name="registered_members"; // Table name


// username and passw ord sent from form
$myusername=isset($_POST['loginemail'])?$_POST['loginemail']:null;
$mypassword=(isset($_POST['loginpasswd'])?$_POST['loginpasswd']:null);
$mypassword = md5($mypassword);


// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);
$sql="SELECT * FROM $tbl_name WHERE email='$myusername' and password='$mypassword'";
$result=mysql_query($sql);


// Mysql_num_row is counting table row
$count=mysql_num_rows($result);


// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){


// Redirect to file "profile.php"
header("location:profile.php");
}
else {
session_start();
$_SESSION['error'] = "The username or password you entered is incorrect.";
header("location:index.php");
//echo $mypassword;
}
?>