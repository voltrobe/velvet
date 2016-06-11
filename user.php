<?php
require_once'online.php';
$query = "SELECT * FROM snmembers 
ORDER BY user DESC";
$result = queryMysql($query);
$num = mysql_num_rows($result);
for ($j = 0 ; $j < $num ; $j++)
{
$row = mysql_fetch_row($result);
$name = $row[2]." ".$row[3];

echo '{"name":'.$name.'}';
 }
 ?>