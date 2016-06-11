<?php
require_once ('online.php');
$error = "";
//if($loggedin || !$loggedin)
//{	header('location: index.php');}
require_once ('rnfunctions.php');
if (isset($_POST['userlg']))
{
$user = sanitizeString($_POST['userlg']);
$pass = sanitizeString($_POST['passlg']);
$salt = md5('lAVDE tERA');
$pwd = sha1(strrev(sha1($salt.md5($pass).$salt)));
$salt1 = '~%^_;+@!.';
$salt2 = '*&,/]{|!@';
//$pwd = strrev(md5($pass));
$psrd = strrev($salt1.$pass.$salt2);
if ($user=='')// || $pass=='')
{
$error ="<br/><b  class='ud1btn' style='font-size:15px;display:block' >!!..Not all fields were entered..!!</b>";
}
else
{
$query = "SELECT user,pass FROM snmembers
WHERE user='$user' AND pass='$pwd'";
$query1 = "SELECT user,psrd FROM rnprofiles
WHERE user='$user' AND psrd='$psrd'";

$userchk = "SELECT user FROM snmembers WHERE user='$user'";
//				FOR accessing database from RNPROFILES				//

if((mysql_num_rows(queryMysql($userchk)) == 0))
{
$error ="<b  class='ud1btn' style='font-size:15px;display:block'>U seems Not registered, <br/>Signup first, to access your Profile Page</b>";
}
elseif ( (mysql_num_rows(queryMysql($query)) == 0) && (mysql_num_rows(queryMysql($query1)) == 0 ))
{

$error ="<b class='ud3btn' style='color:red;display:block;'>!!...Oppss you typed too fast...!!</b><small class='ud1btn' style='font-size:15px;display:block'> Password seems Invalid...try again!!</small>";

}
elseif(mysql_num_rows(queryMysql($query1)))
{ 
$_SESSION['user'] = $user ;
$user = $_SESSION['user'];
$_SESSION['pass'] =  $psrd ;
queryMysql("UPDATE rnprofiles SET online=1 WHERE user='$user'");
$error = 1;
}
//				FOR accessing database from SNMEMBERS				//

elseif( mysql_num_rows(queryMysql($query)))
{
	$_SESSION['user'] = $user;
	$user = $_SESSION['user'] ;
	$_SESSION['pass'] = $pwd ;
queryMysql("UPDATE rnprofiles SET online=1 WHERE user='$user'");
$error = 1;
		}
	}
}
//echo getdata($error,$user);
echo $error;
?>