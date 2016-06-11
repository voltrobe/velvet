<?php // rnsignup.php
//require_once('online.php');
require_once('rnfunctions.php');
$user = $pass = $pass = $pwd = $fname = $lname = $error ="";
$time = time();
if (isset($_POST['user']))
{
$user = sanitizeString($_POST['user']);
$pass = sanitizeString($_POST['pass']);
$fname = sanitizeString($_POST['fname']);
$lname = sanitizeString($_POST['lname']);
$email = sanitizeString($_POST['email']);
$salt = md5("Your Password Here");
$pwd = sha1(strrev(sha1($salt.md5($pass).$salt)));
if ($user == "" || $pass == "" || $fname == "" || $lname == "" || $email == "" )
{
$error = "<b class='ud3btn' style='color:red;'>Not all fields were entered...!!</b><br/><b class='ud1btn' style='display: block;'>!!..You seems to be in hurry..!!</b>";
}
else
{
$query = "SELECT * FROM snmembers WHERE user='$user'";
if (mysql_num_rows(queryMysql($query)))
{
$error = "<b class='ud3btn' style='color:red;'>That username already exists...</b><br/><b class='ud1btn' style='display:block;'>try Something else !!</b>";
}
else
{
$query = "INSERT INTO snmembers VALUES(null,'$user', '$pwd', '$fname', '$lname', '$email', null, null, null, null , null, '$time')";
queryMysql($query);
	$salt1 = '~%^_;+@!.';
	$salt2 = '*&,/]{|!@';
	$psrd = strrev($salt1.$pass.$salt2);
	$name= ucwords($fname." ".$lname);
$qry = "INSERT INTO rnprofiles VALUES('$user', null, '$psrd','0','$name')";
queryMysql($qry);
$error = "<b class='ud3btn' style='font-color:green;'>Congrats...!! Account Created Successfully</b><br/><b class='ud1btn' style='display:none;'>Now login to access you Account..</b>";
}
}
}
echo $error;
?>