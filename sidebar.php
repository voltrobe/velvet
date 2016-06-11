<?php // sidebar.php
require_once 'rnfunctions.php';

session_start();
if (isset($_SESSION['user']))
{
$user = $_SESSION['user'];

$loggedin = TRUE;
}
else $loggedin = FALSE;

echo "<html><head>
<meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'/>
<link rel='stylesheet' type='text/css' href='css/style.css'>
 <meta http-equiv='Refresh' content='10;url=sidebar.php'/>
<link type='text/css' rel='stylesheet' href='script.css' media='screen'/>
 <!--[if lt IE 9]><script src='//html5shim.googlecode.com/svn/trunk/html5.js'></script><![endif]-->

</head>";
echo "<body style='background:url(s.png) ;'>
 <meta http-equiv='Refresh' content='10;url=sidebar.php'/>";

if ($loggedin)
{

$query = "SELECT * FROM snmembers WHERE user='$user'";
$result = queryMysql($query);


if (mysql_num_rows($result)) 
{
$row = mysql_fetch_row($result);
$fname = stripslashes($row[2]);
$lname = stripslashes($row[3]);

echo "

<br/><div class='sidebar' align='left'> ";
if(file_exists("pics/profile/$user.jpg"))
echo "<img align='left' height='88' width='80'  style='margin-left:0px;border:ridge;' src='pics/profile/$user.jpg'/>  ";
else
echo "<img align='left'  height='88' width='80' style='margin-left:0px;border:ridge;' src='pics/p-photo.png'/> ";
echo "<h2 class='h2' style='text-align:left;font-size:18px;'> 
<small style='font-size:15px;'><b>";
echo ucwords(" $fname ");
echo "</b></small><big style='font-size:28px;'>";
echo ucwords("$lname</big></h2>");
}

else
{
echo "

<br/>
<h2 class='h2' style='margin-left:0px;text-align:left;font-size:18px;' > ";
if(file_exists("pics/profile/$user.jpg"))
echo "<img align='left' height='88' width='80' style='margin-left:0px;border:ridge;' src='pics/profile/$user.jpg'/> ";
else
echo "<img align='left'  height='88' width='80' style='margin-left:0px;border:ridge;' src='pics/p-photo.png'/> ";

echo " Hello $user</h2><br/> ";
}

echo " <hr />
<p class='p1' ><b>
<nav class='side-nav'  style='width:90%;'>
<br/>
<a href='rnmembers.php?view=$user' class='side-nav-button'  target='main'> Home </a>
<a href='rnmembers.php' class='side-nav-button' target='main'>Members</a>
<a href='rnfriends.php' class='side-nav-button' target='main'>friends</a>
<a href='rnmessages.php' class='side-nav-button' target='main' >Messages</a>
<a href='rnprofile.php' class='side-nav-button' target='main'>Profile</a>
<a href='rnlogout.php' class='side-nav-button' target='main'>Logout</a>
</nav>
</b></p> 
</div>";
}

else
{
echo "

<br/><div class='sidebar'  align='left'>
<h2  class='h2' style='margin-left:0px;text-align:center;font-size:28px;'>Welcome !..Guest..!</h2>
<hr />
<p class='p1' ><b>
<nav class='side-nav' style='width:90%;'>
<br/>
<a href='index.php' class='side-nav-button'  target='main'>Home</a> <br/>
<a href='rnsignup.php' class='side-nav-button' target='main'>Sign up</a> <br/>
<a href='rnlogin.php' class='side-nav-button' target='main'>Log in</a><br/>
</nav >
</b></p>
</div>";
}
echo "</body></html>"

?>

