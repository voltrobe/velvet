<?php
$dbhost = 'localhost'; // Unlikely to require changing
$dbname = 'novaprofile'; // Modify these...
$dbuser = 'root'; // ...variables according
$dbpass = 'tavor007'; // ...to your installation
//$appname = "SocioNova"; // ...and preference
$con = mysql_connect($dbhost, $dbuser, $dbpass) or die(mysql_error());
$dbcon= mysql_select_db($dbname,$con) or die(mysql_error());
function createTable($name, $query)
{
if (tableExists($name))
{
echo "Table '$name' already exists ,updating table...!!<br />";
//  queryMysql("ALTER TABLE $name MODIFY $query");
//  echo "Congrats Table '$name' successfully Updated !@!";
}
else
{
queryMysql("CREATE TABLE $name($query)");
echo "Table '$name' created<br/>";
}
}
function footer()
{
require_once('file_js.php');
$foot = "<br/><h1 class='footerfont' style='margin-left:30px;' align='center'>
<b>&copy; SocialNova.in All rights reserved, LEafDust Corp&trade; </b>
</h1>";
echo $foot;
}
function tableExists($name)
{
$result = queryMysql("SHOW TABLES LIKE '$name'");
return mysql_num_rows($result);
}
function queryMysql($query)
{
$result = mysql_query($query) or die(mysql_error());
return $result;
}
function destroySession($user)
{
$_SESSION=array();
if (session_id() != "" || isset($_COOKIE[session_name()])){
setcookie(session_name(), '', time()-2592000, '/');
//session_destroy();
queryMysql("UPDATE rnprofiles SET online=0 WHERE user='$user'");
}
}
function sanitizeString($var)
{
$var = strip_tags($var); 
$var = htmlentities($var);
$var = stripslashes($var);
return mysql_real_escape_string($var);
}
function getdata($error,$user)
{
$getdata = array();
$getdata[] = $error;
$getdata[] = $user;
echo $getdata[0];//$getdata[1];
}
function pseudomsg($usera,$timea,$picthumb,$rp){
	echo"<ul>";
	echo"<li> <a href='rnmembers.php?view=$usera'> $usera's Profile </a> </li>";
	echo"<li> <a href='rnmessages.php?view=$usera'> $usera's Inbox </a> </li>";
	echo"<li> <a href='rnfriends.php?view=$usera'> $usera's Friends </a> </li>";
	
	echo"<li class='sep'> <img height=' 60' width='60' style='border:ridge;' src='$picthumb'/>";
	echo "Joined on:-><br/>";
	echo"<b class='ud3btn'>";
	echo date('M jS \'y g:sa:', $timea);
	echo"</b><br/><small>$rp</small>
	</li></ul>";
}
function picthere($user){
$pic=file_exists("pics/profile/$user/thumbnail/$user"."_thumb.jpg" ) ? "pics/profile/$user/thumbnail/$user"."_thumb.jpg" : "pics/p-photo.png" ;
return $pic;
}
function flname($user){
$uflname=mysql_fetch_row(queryMysql("SELECT fname,lname from snmembers where user='$user'"));
return ucwords($uflname[0]." ".$uflname[1]);
}

function tooly($nameabc,$userx,$area){
$txtblock="<div rel='$userx' id='paneloader' class='ud3btn' style='font-size:12px !important;position:relative;margin:-5px auto -30px auto;overflow:auto;height:150px;width:320px;overflow-x:hidden;'></div><br/>";
echo<<<_END
<script>
//onShow: function(){alert('I fired OnShow')},
//onHide: function(){alert('I fired OnHide')}
$(function(){
$('$area').aToolTip({
		clickIt: true,
		fixed : true,
		tipContent: "<span id='fullnamespan' rel='$userx'/ class='defbtn' style='font-size:10px;'>$nameabc</span><br/>$txtblock"
				});
			});
</script>
_END;
}
?>