<?php // rnheader.php
require_once('online.php');

header("Cache-Control: cache");
header("Pragma: cache");
header("Vary: Accept-Encoding");
header("Content-Type: text/html");
header("Accept-Charset: ANSI");
header("Accept-Encoding: gzip");
echo "<html><head>";
require_once('rnfunctions.php');
require_once('lexionicon.php');
//				FOr basic Graphics-button,popover,tabnav,nav,		,etc//
require_once('file_links.php');
echo"</head>";
echo "<body  ><font face='segoe script' size='3'>
";
//					Fixed Header				//
require_once('novahead.php');
//					Fixed toolbar				//
if ($loggedin)
{
 $tab=$br= $username =null;
 $query = "SELECT * FROM snmembers WHERE user='$user'";
 $result = queryMysql($query);

$queryheader = "SELECT * FROM snmembers ";
$resultheader = queryMysql($queryheader);
$numheader=mysql_num_rows($resultheader);

if (mysql_num_rows($result)) 
{
 $row = mysql_fetch_row($result);
 $fname = stripslashes($row[2]);
 $lname = stripslashes($row[3]);
 if(strlen($fname)>=8)
 {
	if(strlen($lname)<=8)
	$username=ucfirst(substr($fname,0,1)).". ".ucfirst($lname);
	else
	$username=ucfirst(substr($fname,0,1)).". ".ucfirst(substr($lname,0,1)).".";
 }
 else{
 $username =ucfirst($fname)." ".ucfirst(substr($lname,0,1)).".";
	}
 }
}
 /*
echo"<span id='smallthumb'>";
if(file_exists("pics/profile/$user/thumbnail/$user"."_thumb.jpg"))
{
echo "<div class='drop-shadow raised' style='max-width:120px;height:auto;position:fixed;margin:-180px auto -20px 88px;z-index:2010;'> 
<table><tr><td>";
echo"<img height='75' width='95' style='margin:35px auto -10px -2px;border:ridge;' data-src='pics/profile/$user/thumbnail/$user"."_thumb.jpg' src='images/slick_image/gif2/image_482924.gif'/> ";
echo "</td></tr><tr><td><small class='footerfont' style='z-index:1000;font-size:15px;font-weight:bold;align:left;margin:5px auto -10px auto;'>".$username."</small></td></tr></table></div>";
}
else
{
echo "<div class='drop-shadow raised' style='width:auto;height:auto;position:fixed;margin:-150px auto auto 90px;z-index:2010;'>

<img  height='120' width='120' style='margin:0px -7px -7px -7px;border:ridge;' data-src='pics/p-photo.png' src='images/slick_image/image_475247.gif'/> </div>";
}
echo"</span>";*/

$smallthumb="
function smallthumb(){
$('#smallthumb').load('smallthumb.php #smallthumb');
}";
?>