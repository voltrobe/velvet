<?php
require_once('online.php');
require_once('requirefn.php');
//			New Msgs Check			//
$msgs= $time =null;
$result=queryMysql("SELECT * FROM `rnmessages` WHERE(`recip`='$user' AND `read`=0) ORDER BY `id` DESC");
if(mysql_num_rows($result)){
 $msgs=mysql_fetch_row($result);
 $time = date('M \'jS', $msgs[4])."<br/>";
 $time.= date('g:sa', $msgs[4]);
 $pic=file_exists("pics/profile/$msgs[1]/thumbnail/$msgs[1]"."_thumb.jpg")? "pics/profile/$msgs[1]/thumbnail/$msgs[1]"."_thumb.jpg" : "pics/p-photo.png";
 queryMysql("UPDATE `rnmessages` SET `read`=1 WHERE((`recip`='$user' AND `auth`='$msgs[1]') AND (`message`='$msgs[5]' AND `id`=$msgs[0]))");
	if(isset($_GET['check']))
	echo $time;
 if(isset($_GET['refresh'])){
 echo ucwords($msgs[6])."|".$pic."|".$time."|".$msgs[5];
 }
 //echo $time;
}
?>