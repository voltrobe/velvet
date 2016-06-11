<?php
require_once('online.php');
require_once('requirefn.php');
$tab=$br= null;
 $query = "SELECT * FROM snmembers WHERE user='$user'";
 $result = queryMysql($query);
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

echo"<span id='smallthumb'>";
if(file_exists("pics/profile/$user/thumbnail/$user"."_thumb.jpg"))
{
echo "<div class='drop-shadow raised' style='min-width:120px;height:auto;position:fixed;margin:-180px auto -20px 88px;z-index:1000;'> ";
echo"<table><img height='85' width='95' style='margin:35px -12px -10px -7px;border:ridge;' src='pics/profile/$user/thumbnail/$user"."_thumb.jpg' alt='images/slick_image/gif2/image_482924.gif'/> ";
echo "<br/><b id='thumbgif' class='footerfont' style='z-index:1000;font-size:18px;font-weight:bold;align:left;margin:-10px auto 10px 10px;'>".$username."</b></div>";
//.$br.$tab.ucfirst($lname)
}
else
{
echo "<div class='drop-shadow raised' style='width:auto;height:auto;position:fixed;margin:-150px auto auto 90px;z-index:1000;'>

<img  height='120' width='120' style='margin:0px -7px -7px -7px;border:ridge;' src='pics/p-photo.png' alt='images/slick_image/image_475247.gif'/> </div>";
}
echo"</span>";
/* 
$thumbval ="document.getElementById('thumbgif')";
$keel="<img src='images/slick_image/gif2/image_482911.gif' style='width:50px;height:20px;margin-top:5px;'/>";
$thmbgif="
document.getElementById('thumbgif').innerHTML={$keel}; ";
*/
?>