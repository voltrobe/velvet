<?php
require_once('online.php');
require_once('requirefn.php');
//require_once('file_links.php');
//				view Theorem				//
$msgsetrecentn = $msgsetrecentname = $msgsetrecent= "";
//echo"<div id='phpmsgpost'>";
echo "<fieldset  id='slidy'  style='background-image:url(images/grunge.png);margin-bottom:0px;min-height:330px;' class='iner'>";
$text="";
$msgsetqry="SELECT recent FROM msgsettings where auth='$user'";
$msgsetrecent=mysql_fetch_row(queryMysql($msgsetqry));
$qry="select fname, lname  from snmembers where user='$msgsetrecent[0]'";
	$msgsetrecentn=mysql_fetch_row(queryMysql($qry));
	$msgsetrecentname=ucwords($msgsetrecentn[0]." ".$msgsetrecentn[1]);
$viewmsg=$msgsetrecent[0];
if (isset($_GET['view']))
{
	if(sanitizeString($_GET['view'])!=$user)
	$viewmsg = sanitizeString($_GET['view']);
}

//				view Theorem				//
//				Posting Message Code				//
   $time = time();
if (isset($_POST['text']) || isset($_POST['textarea']))
{
  $text = ($_POST['textarea'])?sanitizeString($_POST['textarea']):sanitizeString($_POST['text']);
   $recipent = $_POST['recipent'];
 if ($text != "")
 {
  if($text !=null)
   {
	$uflname=flname($user);
	$hflname=flname($recipent);
    queryMysql("INSERT INTO rnmessages VALUES(NULL,
    '$user', '$recipent', 0, $time, '$text' , '$uflname' ,'$hflname')");
   }
 }
}
if(isset($_GET['read']))
{
	$pm = sanitizeString($_GET['read']);
	queryMysql("UPDATE `rnmessages` SET `read`=1 WHERE `auth`='$viewmsg' AND `recip`='$user'");
}

//				Posting Message Code				//
//.......erase from recipent if it is user .........//
if (isset($_GET['erase']))
{
  $erase = sanitizeString($_GET['erase']);
  queryMysql("DELETE FROM rnmessages WHERE id=$erase
  AND recip='$user'");
}
///.......erase from auth if it is user........//
elseif (isset($_GET['erase_u']))
{
  $erase = sanitizeString($_GET['erase_u']);
  queryMysql("DELETE FROM rnmessages WHERE id=$erase
  AND auth='$user'");
}

 if($viewmsg==$user)
$recipmsgpost="";
else
$recipmsgpost="AND (recip='$viewmsg' or auth='$viewmsg')";

if (isset($_GET['view']))
{
//..for counting numbers of messages, passed..//
$common="SELECT COUNT(*) FROM rnmessages WHERE";
$xy="$common auth='$user' AND recip='$viewmsg'";
$ab="$common auth='$viewmsg' AND recip='$user'";
$total1=mysql_fetch_row(queryMysql($xy));	
$total2=mysql_fetch_row(queryMysql($ab));
$total=$total1[0]+$total2[0];

$query = "SELECT * FROM rnmessages WHERE (recip='$user' or auth='$user')  ".$recipmsgpost." 
ORDER BY time DESC";
$result = queryMysql($query);
$nummsgqry = mysql_num_rows($result);
for ($j = 0 ; $j < $nummsgqry ; ++$j)
{
$row = mysql_fetch_row($result);
if ($row[1] == $user ||
$row[2] == $user)
{
if($_POST['createle']){
echo"He,iofkgckf";
}
	echo"<div id='specific' class='$row[0]' rel='$row[1]'>";
$align=($row[1] == $user)?'right':'left';		// left fro user ,right for you

$userpicexist=picthere($row[1]);//			to check user's pic >??

	//.............for snmembersinfo
	$qry = "SELECT * FROM snmembers WHERE user='$row[1]'";
	$rslt = queryMysql($qry);
	$rw = mysql_fetch_row($rslt);
	//.............for rnprofileinfo
	$qry1 = "SELECT * FROM rnprofiles WHERE user='$row[1]'";
	$rslt1 = queryMysql($qry1);
	$rp = mysql_fetch_row($rslt1);

if($viewmsg!=$user)
{

	$msgsetqry="SELECT * FROM msgsettings where auth='$user' AND recip='$viewmsg'";
	$msgsetrslt=queryMysql($msgsetqry);
	if(mysql_num_rows($msgsetrslt)==0)
	queryMysql("INSERT INTO msgsettings(auth,recip,total,recent,lastime) VALUES('$user','$viewmsg',$total,'$viewmsg',$time)");
	else {
	queryMysql("UPDATE msgsettings SET total=$total, lastime=$time WHERE(auth='$user' AND recip='$viewmsg') "); 
	queryMysql("UPDATE msgsettings SET  recent='$viewmsg' WHERE auth='$user'"); 
	}
}

echo"<div align='$align'>";
echo"<table><tr><td>";
	if ( ($row[1] != $user ) || ($row[1] == $user ) )
	{//		when your the recipent		//

		//................Pop-up users-Division........//
		echo"<div class='user' ><a  href='rnmembers.php?view=$row[1]'>";
	echo " <img style='border:ridge;height:50 !important;width:50 !important;' src='$userpicexist'/>";

		echo"</a><ul style='width:240 !important;'>";
		echo "<li> <a href='rnmembers.php?view=$row[1]'> $row[1]'s Profile </a> </li>";
		echo "<li> <a href='rnfriends.php?view=$row[1]'> $row[1]'s Friends </a> </li>";
			echo "<li class='sep'> <img  style='border:ridge;' src='$userpicexist'/>";
			echo "Joined on:-><br/>";
			echo " <b class='ud3btn'>";
			echo date('M jS \'y g:sa:', $rw[10]);
			echo "</b>";
			echo"<br/><small>$rp[1]</small>";
		echo "</li>";
		echo "</ul>
		</div>";
	}echo"</td><td>";
	//			// for Erase the messages //			//

	if (($row[2] == $user && $row[1] != $user) || ($row[1] == $user && $row[2] != $user))
{
		$erase_u=($row[1]==$user)?"&erase_u":"&erase";
		echo"<b class='button black'><--:- ";
echo<<<_END
 [<a class='button red' onclick="erasemsg('$row[0]'); return false;" id='erase-$row[0]' href='messagepost.php?view=$viewmsg$erase_u=$row[0]'>erase</a>]
_END;
}

	echo " <small style='color:grey;' class='ud3btn'>";
	//echo date('M jS \'y g:sa:', $row[4]);
	echo date('M jS \'y g:sa:', $row[4]);
	echo "</small></b>";		/// time of messaging ??
echo"</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr></table>";
echo "<hr width='420' style='margin-bottom:0px;' align='$align'/>";
echo"</div>";

//		// for calculating the message Read Status //		//

if(($row[2] != $user) && ($row[1] == $user))		// which i send
{
	if($row[3]==0)
	$imgcheck="<img id='txtimg' src='images/msgsicons/delete.png'/>";	// Message sent but not read
	else
	$imgcheck="<img id='txtimg' src='images/msgsicons/tick.png'/>";	
	//	 Message sent and  read
}
if(($row[2] == $user) && ($row[1] != $user))		// which i recieve
{
	if($row[3]==1){
	$it=$row[4]+2;	// New incoming message
	if($it>$time)
	$imgcheck="<img id='txtimg' src='images/msgsicons/chati.png'/>";	// Incoming Read Message
	else
	$imgcheck="<img id='txtimg' src='images/msgsicons/tick.png'/>";
	}
}
 
//...................SAYING STARTED			//

if (  (($row[2] == $user) && ($row[1] != $user)) || (($row[2] != $user) && ($row[1] == $user))  ) 
{		// 		her/him messages

echo <<<_END
<p  align='$align'><strong ><textarea id='$j' class='txtshw' rel='txtarea' disabled> &quot;$row[5] &quot;</textarea><span id='$row[0]'>$imgcheck</span></strong></p><br/> 
_END;

}
//..................SAYING COMPLETE			//
echo"</div>";

}		// if statement ends
}		// for loop ends

if($nummsgqry==null || $nummsgqry==0)
echo"<br/><br/><div align='center' class='ud3btn'>
You have not shared a single message with him/her , Give it a try..!!</div><br/>";
}

echo "</fieldset>";
//echo"</div>";
?>