<?php
require_once('online.php');
require_once('requirefn.php');
//			New Msgs Check			//
$msgs= $var =null;
$result=queryMysql("SELECT id FROM `rnmessages` WHERE((`recip`='$user' OR `auth`='$user')  AND (`read`=0 OR`read`=1)) ORDER BY `id` DESC");
$rslt=queryMysql("SELECT id FROM `rnmessages` WHERE(`recip`='$user' AND`read`=0) ORDER BY `id` DESC");
$num=mysql_num_rows($result);
for($i =0 ;$i<$num ;$i++){
$msgs = mysql_fetch_array($result);
$var.= $msgs[0]." ";}
echo mysql_num_rows($rslt)."|".$var;
?>