<?php
require_once'requirefn.php';
require_once'online.php';
if (isset($_GET['view']))
{
$view = sanitizeString($_GET['view']);
}
else $view = $user;
echo "<em style='margin-left:1%;'><b class='button black'> ";
echo ucwords($view)."</b></em><font class='ud3btn' >Quotes : </font><font   style='font-size:auto;color:rgb(66, 123, 140);'><b id='quotes' style='font-size:24px;height:40px;' class='button black'>";

$result = queryMysql("SELECT * FROM rnprofiles WHERE user='$user'");
if (mysql_num_rows($result))
{
 $row = mysql_fetch_row($result);
 if($row[1])
 echo stripslashes($row[1])."</b></font>";
 else
 echo "~_^....Write Your Status....@.0</b></font>";
}
else
{
 echo "Write Something!! YOu Seems New to this Site...</b></font>";
}
?>