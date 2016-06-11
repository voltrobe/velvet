<?php // rnfriends.php
ob_start();
include_once 'rnheader.php';
if (!isset($_SESSION['user']))
die(require_once('error.php'));

if (isset($_GET['view'])) $view = sanitizeString($_GET['view']);
else $view = $user;
if ($view == $user)
{
$name1 = "Your";
$name2 = "Your";
$name3 = "You are";
}
else
{
$name1 = "<a href='rnmembers.php?view=".ucwords($view)."'><font class='ud1btn' style='font-size:24px;'>".ucwords($view)."</font></a>'s";
$name2 = ucwords($view)."'s";
$name3 = ucwords($view)."is";
}
echo"<style type='text/css'>

			#slider {
				width:600px;
				height:250px;
				
				/*IE bugfix*/
				padding:0;
				margin:0;
			}
			
			#slider li { list-style:none; }
			
			#page {
				width:600px;
				margin:50px auto;
			}
	</style>
		<link type='text/css' rel='stylesheet' href='css/rhinoslider-1.05.css' />";
//					Shadowed BOX				//
require_once('leftpane.php');
echo"<div id='wrapper'>";
echo "  <div class='drop-shadow curved curved-vt-2' 
style='height:auto;width:75%;margin:0px auto 80px 22%;padding:-60px;top:0px;'> ";
//					Greeen DIVISIONs				//
echo "<div class='div4'><h3 class='pg'><font class='ft3'>$name1 Friends</font></h3><hr style='margin-bottom:0px;'/><div class='divpg'>";
echo "<div  style='margin-left:10px;'>";
//showProfile($view);
echo<<<_END
<div id='sharebox' style='width:70%;'>
<div id="page">
			<ul id="slider">
				<li><img src="img/slider/01.jpg" alt="" /></li>
				<li><img src="img/slider/02.jpg" alt="" /></li>
				<li><img src="img/slider/03.jpg" alt="" /></li>
				<li><img src="img/slider/04.jpg" alt="" /></li>
				<li><img src="img/slider/05.jpg" alt="" /></li>
			</ul>
</div>
</div>
_END;
$followers = array(); $following = array();

//				for follower's fullname				//
$queryfollower = "SELECT snmembers.user,fname,lname,rnfriends.user  FROM snmembers JOIN rnfriends ON snmembers.user=rnfriends.friend 
WHERE rnfriends.user='$view'";


//				For following's Full name				//
$queryfollowing = "SELECT snmembers.user,fname,lname,rnfriends.friend  FROM snmembers JOIN rnfriends ON snmembers.user=rnfriends.user 
WHERE rnfriends.friend='$view'";

//					Friends Manupulations			//
//............Name Display
$mutual =array();

//$friends = FALSE;

//					MUTUAL fRIENDS					??

$rsltmutual1 = queryMysql($queryfollower);
$rsltmutual2 = queryMysql($queryfollowing);

$nummutual1 = mysql_num_rows($rsltmutual1);
$nummutual2 = mysql_num_rows($rsltmutual2);

echo "<fieldset  class='iner' style='margin-left:5%;margin-right:41%;background-image:url(sn.png);' align='center'><b class='button black'>$name2 mutual friends</b><hr  align='left'/><ul>";
	for($i = 0;$i < $nummutual1; $i++) 
	{
		for($j = 0;$j< $nummutual2; $j++)
		{
$rowfollower = mysql_fetch_row($rsltmutual1);
$rowfollowing = mysql_fetch_row($rsltmutual2);
$mutualfollowers = array( $rowfollower[0]/*link*/, $rowfollower[1]/*fname*/, $rowfollower[2]/*lname*/);
$mutualfollowing = array( $rowfollowing[0]/*link*/, $rowfollowing[1]/*fname*/, $rowfollowing[2]/*lname*/);
if(strcmp($mutualfollowers[0], $mutualfollowing[0])==1 )
{
$mutual[0] = $mutualfollowing[0];
$mutual[1] = $mutualfollowing[1];
$mutual[2] = $mutualfollowing[2];
$friends = TRUE;
echo "<li/><a class='side-nav-button' style='width:50%;' href='rnmembers.php?view=$mutual[0]'>$mutual[1] $mutual[2]</a>";
}
		}
	}

//if (sizeof($mutual))
//{
echo "</ul></fieldset>";

//}

 //					FOLLOWERS					??
if (sizeof($rsltmutual1))
{
echo "<fieldset class='iner' style='margin-left:5%;margin-right:20%;background-image:url(sn.png);' align='center'><b class='button black'>$name2 followers</b><hr  align='left'/><ul>";
 
 
$result = queryMysql($queryfollower);
$num = mysql_num_rows($result);
  for($i = 0;$i < $num; $i++) 
  {
$row = mysql_fetch_row($result);
$followers = array( $row[0]/*link*/, $row[1]/*fname*/, $row[2]/*lname*/);
if(file_exists("pics/profile/$followers[0]/thumbnail/$followers[0]"."_thumb.jpg"))
  echo "<li/><a class='side-nav-button' align='left' style='width:50%;' href='rnmembers.php?view=$followers[0]'><img src='pics/profile/$followers[0]/thumbnail/$followers[0]"."_thumb.jpg' width='32' height='32'>$followers[1] $followers[2]</a>";
else
echo "<li/><a class='side-nav-button' align='left' style='width:50%;' href='rnmembers.php?view=$followers[0]'><img src='pics/p-photo.png' width='32' height='32'>$followers[1] $followers[2]</a>";
  }
  

 echo "</ul></fieldset>";
$friends = TRUE;
}

//						FOLLOWING					.??
if ( sizeof($rsltmutual2) )
{
echo "<fieldset class='iner' style='margin-left:5%;margin-right:10%;background-image:url(sn.png);' align='center'><b class='button black'>$name3 following</b><hr  align='left'/><ul>";

$result = queryMysql($queryfollowing);
$num = mysql_num_rows($result);
  for($i = 0;$i < $num; $i++) 
  {
//if($following[0]==$user) continue;
  
$row = mysql_fetch_row($result);
$following = array( $row[0]/*link*/, $row[1]/*fname*/,$row[2]/*lname*/);

if(file_exists("pics/profile/$following[0]/thumbnail/$following[0]"."_thumb.jpg"))
   echo "<li/><a class='side-nav-button' align='left' style='width:50%;' href='rnmembers.php?view=$following[0]'><img src='pics/profile/$following[0]/thumbnail/$following[0]"."_thumb.jpg' width='32' height='32'>$following[1] $following[2]</a>";
  else
echo "<li/><a class='side-nav-button' align='left' style='width:50%;' href='rnmembers.php?view=$following[0]'><img src='pics/p-photo.png' width='32' height='32'>$following[1] $following[2]</a>";
  }


  echo "</ul></fieldset>";
$friends = TRUE;
}
if (!$friends) echo "<fieldset><ul><li/><b class='button grey'>None yet....Lets Start Making Some friends.!!<hr />";

echo "</ul></fieldset></div></div><hr style='margin-top:0%;'/>
<p style='margin-left:50;'><b>  <a class='button grey'  href='rnmessages.php?view=$view'><font color='black' face='segoe print'><strong>View $name2 messages</strong></font></a> </b></p>
</div></div> <br/>";

echo"</div>";
footer();

echo<<<_END
<script type="text/javascript" src="js/rhino/rhinoslider-1.05.min.js"></script>
		<script type="text/javascript" src="js/rhino/mousewheel.js"></script>
		<script type="text/javascript" src="js/rhino/easing.js"></script>

<script type='text/javascript'>
$(document).ready(function(){
				$('#slider').rhinoslider();
			});
</script>
_END;
ob_end_flush();
?>