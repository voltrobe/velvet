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
<meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'>
<meta charset='UTF-8' />
        
      
<link rel='stylesheet' type='text/css' href='css/style.css'>
 
<link type='text/css' rel='stylesheet' href='script.css' media='screen'/>
 <!--[if lt IE 9]><script src='//html5shim.googlecode.com/svn/trunk/html5.js'></script><![endif]-->
 <link rel='stylesheet' type='text/css' href='css1/demo.css' />
        <link rel='stylesheet' type='text/css' href='css1/style2.css' />
        <link href='http://fonts.googleapis.com/css?family=Terminal+Dosis' rel='stylesheet' type='text/css' />
 
 
</head>";
echo "<body style='background:url(css1/images/beige_paper.png) ;'>";

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

<br/><div class='sidebar' align='left'>
<h2 class='h2' style='margin-left:0px;text-align:left;font-size:18px;' > ";
if(file_exists("pics/profile/$user.jpg"))
echo "<img align='left' height='88' width='80' style='margin-left:0px;border:ridge;' src='pics/profile/$user.jpg'/> ";
else
echo "<img align='left'  height='88' width='80' style='margin-left:0px;border:ridge;' src='pics/p-photo.png'/> ";
echo "<small style='font-size:15px;'><b>";
echo ucwords(" $fname ");
echo "</b></small><big style='font-size:28px;'>";
echo ucwords("$lname</big> </h2>");
}
else
{
echo "

<br/><div class='sidebar' align='left'>
<h2 class='h2' style='margin-left:0px;text-align:left;font-size:18px;' > ";
if(file_exists("pics/profile/$user.jpg"))
echo "<img align='left' height='88' width='80' style='margin-left:0px;border:ridge;' src='pics/profile/$user.jpg'/> ";
else
echo "<img align='left'  height='88' width='80' style='margin-left:0px;border:ridge;' src='pics/p-photo.png'/> ";

echo " Hello $user</h2><br/> ";
}
/*

echo " <hr />
<p class='p1' ><b>
<nav class='side-nav'  style='width:90%;'>
<br/>
<a href='rnmembers.php?view=$user' class='side-nav-button'  target='main'> Home </a><br/>
<a href='rnmembers.php' class='side-nav-button' target='main'>Members</a><br/>
<a href='rnfriends.php' class='side-nav-button' target='main'>friends</a><br/>
<a href='rnmessages.php' class='side-nav-button' target='main' >Messages</a><br/>
<a href='rnprofile.php' class='side-nav-button' target='main'>Profile</a><br/>
<a href='rnlogout.php' class='side-nav-button' target='main'>Logout</a>
</nav>
</b></p> 
</div>";
}
        
		*/
		
echo " <hr />
<p class='p1' ><b>	
<div class='container'>
  <div class='content'>
    <ul class='ca-menu'>
                    <li >
                        <a href='#'>
                            <span class='ca-icon'>F</span>
                            <div class='ca-content'>
                                <h2 class='ca-main'>Your Wall</h2>
                                <h3 class='ca-sub'>Personalized to your needs</h3>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href='#'>
                            <span class='ca-icon'>H</span>
                            <div class='ca-content'>
                                <h2 class='ca-main'>Members</h2>
                                <h3 class='ca-sub'>Advanced use of technology</h3>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href='#'>
                            <span class='ca-icon'>N</span>
                            <div class='ca-content'>
                                <h2 class='ca-main'>Messages</h2>
                                <h3 class='ca-sub'>Understanding visually</h3>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href='#'>
                            <span class='ca-icon'>K</span>
                            <div class='ca-content'>
                                <h2 class='ca-main'>Profile</h2>
                                <h3 class='ca-sub'>Professionals in action</h3>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href='#'>
                            <span class='ca-icon'>L</span>
                            <div class='ca-content'>
                                <h2 class='ca-main'>Logout</h2>
                                <h3 class='ca-sub'>24/7 for you needs</h3>
                            </div>
                        </a>
                    </li>
                </ul>
          </div>
	</div>

 ";
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
<a href='home.php' class='side-nav-button'  target='main'>Home</a> <br/><br/>
<a href='rnsignup.php' class='side-nav-button' target='main'>Sign up</a> <br/><br/>
<a href='rnlogin.php' class='side-nav-button' target='main'>Log in</a><br/><br/>
</nav >
</b></p>
</div>";
}
echo "<meta http-equiv='Refresh' content='10;url=sidebar1.php'/>";
?>

