<?php // rncheckuser.php
include_once 'rnfunctions.php';
if (isset($_POST['user']) )
{
$user = sanitizeString($_POST['user']);

$query = "SELECT user FROM snmembers WHERE user='$user' ";

if(mysql_num_rows(queryMysql($query)))
$error "<font color=red><b>&nbsp;&larr;~ Sorry, UserName Already Exists</b></font>";
else $error "<font color=green><b>&nbsp;&larr;~ Hurray..!! You Got the Name!@!</b></font>";
}
echo $error;
?>