<?php // rnfunctions.php


$dbhost = 'localhost'; // Unlikely to require changing
$dbname = 'socialnova_zxq_novians'; // Modify these...
$dbuser = '814886_novians'; // ...variables according
$dbpass = 'tavor007'; // ...to your installation
$appname = "SocioNova"; // ...and preference
mysql_connect($dbhost, $dbuser, $dbpass) or die(mysql_error());
mysql_select_db($dbname) or die(mysql_error());
function createTable($name, $query)
{
if (tableExists($name))
{
echo "Table '$name' already exists<br />";
}
else
{
queryMysql("CREATE TABLE $name($query)");
echo "Table '$name' created<br />";
}
}
function usernodes($gender ,$age ,$fname ,$lname ,$city ,$country)
{
$gender = queryMysql("SELECT gender FROM snmmembers");
$age = queryMysql("SELECT age FROM snmmembers");
$fname =  queryMysql("SELECT fname FROM snmmembers");
$lname =  queryMysql("SELECT lname FROM snmmembers");
$city = queryMysql("SELECT city FROM snmmembers");
$country = queryMysql("SELECT country FROM snmmembers");
}
function tableExists($name)
{
$result = queryMysql("SHOW TABLES LIKE '$name'");
return mysql_num_rows($result);
}
function queryMysql($query)
{
$result = mysql_query($query) or die(mysql_error());
return $result;
}
function destroySession()
{
$_SESSION=array();
if (session_id() != "" || isset($_COOKIE[session_name()]))
setcookie(session_name(), '', time()-2592000, '/');
session_destroy();
}
function sanitizeString($var)
{
$var = strip_tags($var);
$var = htmlentities($var);
$var = stripslashes($var);
return mysql_real_escape_string($var);
}
function showProfile($user)
{
if((file_exists("pics/cover/$user.jpg" ) == null ) && (file_exists("pics/profile/$user.jpg" ) == null ))
{
  echo "<br/><br/><div align='left'  style='background-image:url(bg2.png) ;border:thick ridge rgba(78, 154, 163, 0.7);margin-right:40%;width:75%;height:480px;'";
  echo "<p><h2 style='margin-left:12%;margin-top:50px;color:white;font-family:segoe print;'>Upload Your's  & a Cover Photo To give a look to Your Profile ";
  echo "<br/><br/>Access to Your <a class='button grey' href='rnprofile.php'>Profile Page</a> And Edit Your Info....!!</h2></p><br/><br/><br/> ";
  echo " <img src='pics/p-photo.png'   style='margin-left:20%;margin-top:55px;width:180px;height:200px;border:thin ridge;'/></div><br/>";
 
}

elseif((file_exists("pics/cover/$user.jpg" ) == null ) || (file_exists("pics/profile/$user.jpg" ) == null ))
{
 if (file_exists("pics/cover/$user.jpg" ) == null )
 {
 
  echo "<br/><br/><div align='left'  style='background-image:url(bg2.png)  ;border:thick ridge rgba(78, 154, 163, 0.7);margin-right:40%;width:75%;'";
  echo "<p><h2 style='margin-left:12%;margin-top:50px;color:white;font-family:segoe print;'>Upload a Cover Photo To give a look to Your Profile ";
  echo " <br/><br/>Access to Your <a class='button grey' href='rnprofile.php'>Profile Page</a> And Edit Your Info....!!</h2></p>";
  echo "<img src='pics/profile/$user.jpg'   style='margin-left:20%;margin-top:120px;width:180;height:228;border:thin ridge;'/> ";
  echo " </div><br/>";
  
 }

 elseif (file_exists("pics/profile/$user.jpg" ) == null )
 { 
 
  echo "<br/><br/><div align='left'  style='background-image:url(pics/cover/$user.jpg)  ;border:thick ridge rgba(78, 154, 163, 0.7);margin-right:40%;width:75%;'";
  echo "<p><h2 style='margin-left:12%;margin-top:50px;color:white;font-family:segoe print;'>Upload Your Photo To give a look to Your Profile ";
  echo "<br/><br/>Access to Your <a class='button grey' href='rnprofile.php'>Profile Page</a> And Edit Your Info....!!</h2></p><br/><br/><br/> ";
  echo " <img src='pics/p-photo.png'   style='margin-left:20%;margin-top:120px;width:180;height:228;border:thin ridge;'/></div><br/>";
  
 }
}


else
{
echo "<div align='left'  ><img align='left' src='pics/cover/$user.jpg' style='width:900;height:500;border:thick ridge rgba(78, 154, 163, 0.7);'/>  ";
echo "<img src='pics/profile/$user.jpg' align='left'  style='margin-left:20%;margin-top:-217px;width:190;height:210;border:thin ridge;'/> ";
echo " </div><hr style='margin-top: 0.5px;margin-left:0px;width:75%;'/><br/> ";
}

echo "<fieldset class='outer' style='background-image:url(son.png);'><em style='margin-left:1%;'><b class='button black'> ";
echo ucwords(" $user </b></em><b class='ud3btn'>Said : </b><font style='font-size:28px;color:rgb(66, 123, 140);'><b style='font-size:24px;height:40px;' class='button black'>");

$result = queryMysql("SELECT * FROM rnprofiles WHERE user='$user'");
if (mysql_num_rows($result))
{
$row = mysql_fetch_row($result);
echo stripslashes($row[1]) . "</b></font></fieldset><br clear=left /><br/><hr />";
}

}
?>