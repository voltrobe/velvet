<?php
include('config.php');

// table name
//$tbl_name=temp_members_db;

// Random confirmation code
$confirm_code=md5(uniqid(rand()));

// values sent from form
//$name=$_POST['name'];
//$lname=$_POST['lname'];
//$email=$_POST['email'];
//$password=$_POST['password'];

$email=(isset($_POST['email'])?$_POST['email']:null);

//check if the fields are empty
$email = mysql_real_escape_string($_POST['email']);


$check="SELECT * FROM registered_members WHERE email='$email'";
$result=mysql_query($check);


// Mysql_num_row is counting table row
$count=mysql_num_rows($result);


// If result matched $email, table row must be 1 row
if($count==1){


// Redirect to file "profile.php"
$_SESSION['emailtaken'] = "The email is already taken.";
header("location:index.php");
}
?>
