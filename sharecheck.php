<?php
require_once('online.php');
require_once('requirefn.php');
//			New post-share Check		//
$msgs= $var =null;
$result=queryMysql("SELECT id FROM rnwalls WHERE( recip='$user' OR auth='$user' OR auth<>'$user')  ORDER BY id DESC");
$num=mysql_num_rows($result);
for($i =0 ;$i<$num ;$i++){
$msgs = mysql_fetch_array($result);
$var.= $msgs[0]." ";
}
echo $var;
?>