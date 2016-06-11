<?php
require_once('online.php');
require_once('requirefn.php');
if(isset($_GET['view']))
{
$view=sanitizeString($_GET['view']);
//$id=sanitizeString($_GET['id']);
$qry=queryMysql("SELECT `id` FROM `rnmessages` WHERE((`recip`='$user' OR `auth`='$user') AND (`auth`='$view' OR `recip`='$view')) ORDER BY `id` DESC");
$num=mysql_num_rows($qry);
for($i =0 ;$i<$num ;$i++){
  $rslt=mysql_fetch_row($qry);
  $var.=$rslt[0]." ";
 }
 echo $var;
}
if(isset($_GET['status']))
{
$view=sanitizeString($_GET['status']);
$qry=queryMysql("SELECT `read` FROM `rnmessages` WHERE `auth`='$user' AND `recip`='$view' ORDER BY `id` DESC");
// $num=mysql_num_rows($qry);
//for($i =0 ;$i<$num ;$i++){
  $rslt=mysql_fetch_row($qry);
  $var.=$rslt[0]." ";
// }
 echo $var;
}
?>