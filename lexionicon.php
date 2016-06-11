<?php
if(!$loggedin)
{
echo "
<link rel='shortcut icon' href='Sticker/Dinosaur.ico'/>
<title>SocialNova-Noviya CORP.</title> ";
}
else
{
 $fname = $query = $result = $lname = $br ="";
 $query = "SELECT * FROM snmembers WHERE user='$user'";
 $result = queryMysql($query);
 if (mysql_num_rows($result)) 
 {
 $row = mysql_fetch_row($result);
 $fname = stripslashes($row[3]);
 $lname = stripslashes($row[4]);
 }
if(file_exists("pics/profile/$user/thumbnail/$user"."_thumb.jpg"))
echo"<link rel='shortcut icon' href='pics/profile/$user/thumbnail/$user"."_thumb.jpg'/> ";
else
echo "<link rel='shortcut icon' href='pics/p-photo.png'/> ";
echo "<title>".ucwords($fname)." ".ucwords(substr($lname,0,1))." -Noviya CORP.</title> ";
}
?>