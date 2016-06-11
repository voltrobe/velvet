<?php
session_start();
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


//check if the fields are empty
$name=(isset($_POST['name'])?$_POST['name']:null);
$lname=(isset($_POST['lname'])?$_POST['lname']:null);
$password=(isset($_POST['password'])?$_POST['password']:null);
$email=(isset($_POST['email'])?$_POST['email']:null);
$gender=(isset($_POST['gender'])?$_POST['gender']:null);
$dob="$_POST[Year]/$_POST[month]/$_POST[Day]";

$name = mysql_real_escape_string($_POST['name']);
$lname = mysql_real_escape_string($_POST['lname']);
$password = mysql_real_escape_string($_POST['password']);
$email = mysql_real_escape_string($_POST['email']);
$gender = mysql_real_escape_string($_POST['gender']);
$id=SESSION_ID();

$unique = md5($email);

//secure password
$password = md5($password);

// Insert data into database
$sql="INSERT INTO temp_members_db(id, unique_id, confirm_code, name, lname, email, password, dob, gender)VALUES('$id', '$unique', '$confirm_code', '$name', '$lname', '$email', '$password', '$dob', '$gender')";
$result=mysql_query($sql);

// if suceesfully inserted data into database, send confirmation link to email
if($result){

// ---------------- SEND MAIL FORM ----------------
// send e-mail to ...
$to=$email;

// Your subject
$subject="Your confirmation link here";

// From
$header="from: socialnova.com <noreply@socialnova.com>";

// Your message
$message="Your Confirmation link \r\n";
$message.="Click on this link to activate your account \r\n";
$message.="http://www.socialnova.com/confirmation.php/?passkey=$confirm_code&email=$email";

// send email
$sentmail = mail($to,$subject,$message,$header);
}
// if not found
else {
echo "Not found your email in our database";
}
// if your email succesfully sent
if($sentmail){
//echo "Your Confirmation link Has Been Sent To Your Email Address.";
header("location:http://localhost/new%20site/thankyou.php?id=verification");
}else {
echo "Cannot send Confirmation link to your e-mail address";
}
session_destroy();
?>

