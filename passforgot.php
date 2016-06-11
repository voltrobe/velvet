<?php
require_once ('online.php');
$error = "";
//if($loggedin || !$loggedin)
//{	header('location: index.php');}
require_once ('rnfunctions.php');
if (isset($_POST['userfgt']))
{
$user = sanitizeString($_POST['userfgt']);
$email = sanitizeString($_POST['emailfgt']);

if ($user=='' || $email=='')
{
$error ="<b  class='ud1btn' style='font-size:15px;display:block' >!!..Not all fields were entered..!!</b>";
}
else
{
$userchk = "SELECT user FROM snmembers WHERE user='$user'";

$query = "SELECT user,email FROM snmembers
WHERE user='$user' AND email='$email'";

if((mysql_num_rows(queryMysql($userchk)) == 0))
{
$error ="<b  class='ud1btn' style='font-size:15px;display:block'>U seems Not registered, <br/>Signup first, to access your Profile Page</b>";
}
elseif ( mysql_num_rows(queryMysql($query)) == 0)
{
$error ="<small class='ud3btn' style='color:red;display:block;'>!!...Email and Username not Matching...!!</small><small class='ud1btn' style='font-size:15px;display:block'>Hope you have Registered your Email..!!</small>";
}
//				FOR accessing database from SNMEMBERS				//

elseif( mysql_num_rows(queryMysql($query)))
{
	//			For rnprofiles Table			//
	$query = "SELECT * FROM rnprofiles WHERE user='$user'";
	$result = queryMysql($query);
	if (mysql_num_rows($result))
	{
		$row = mysql_fetch_row($result);
		$pd = stripslashes($row[2]);	//contain the reversed string
		$lpasshow = strlen($pd) ;  // takes the length of pass from sql
		$psd_rev = strrev($pd);    // reverse the string
		$psd_select = substr($psd_rev,9,$lpasshow);  // substract left-handed   ciphertext
		$lpasshow2 = strlen($psd_select);  // counts the length of substracted ciphertext
		$psd_rev1 = strrev($psd_select); // reverses it agains
		$lpsd2 = substr($psd_rev1,9,$lpasshow2);  // substract the remaining right-handed ciphertext
		// $lpsd2 = strlen($lpasshow3) ; // passess the exact pass length...That's IT
		$pass = strrev($lpsd2); // Finally reverses the string in normal form & shows to users
	}
	//			For Sending An Email		//
	$to = "$email";
	$subject = "Here is pAssWord..!!";
	$txt.= "\n\n\tHope you will not forget Your pass word next time...Happy SocialNetworking..!!\n\n";
	$txt.= "\n\n\tHere are Your Confidential Details\n\n";
	$txt.= "\t Username : $user\n\t Password : $pass\n\t Email :$email\n";
	$headers = "From: SocialWave Corp&trade;<support@socialnova.in>"; //. "\r\n" . "CC: developers@socialnova.in";
	
	mail($to,$subject,$txt,$headers);
$error = $pass;
		}
	}
}
//echo getdata($error,$user);
echo $error;
?>