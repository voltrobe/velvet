<?php
require_once('online.php');
require_once('requirefn.php');
//require_once('file_links.php');
//				view Theorem				//
$msgsetrecentn = $msgsetrecentname = $msgsetrecent= "";

$text="";
if (isset($_GET['view']))
{
	//if(sanitizeString($_GET['view'])!=$user)
	$viewmsg = sanitizeString($_GET['view']);
}

//				view Theorem				//
//				Posting Message Code				//
   $time = time();
if (isset($_POST['recipent']) && isset($_POST['lefttextarea']))
{
  $text = sanitizeString($_POST['lefttextarea']);
   $recipent = sanitizeString($_POST['recipent']);
 if ($text != "")
 {
  if($text !=null)
   {
	$uflname=mysql_fetch_row(queryMysql("SELECT fname,lname from snmembers where user='$user'"));
	$hflname=mysql_fetch_row(queryMysql("SELECT fname,lname from snmembers where user='$recipent'"));
    queryMysql("INSERT INTO rnmessages VALUES(NULL,
    '$user', '$recipent', 0, $time, '$text' , '$uflname[0] $uflname[1]' ,'$hflname[0] $hflname[1]')");
   }
 }
}
if(isset($_GET['read']))
{
	$pm = sanitizeString($_GET['read']);
	queryMysql("UPDATE `rnmessages` SET `read`=1 WHERE `auth`='$viewmsg' AND `recip`='$user'");
}

//				Posting Message Code				//

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
	echo"<div id='leftpanemsgdiv' class='$row[0]' rel='$row[1]'>";
$align=($row[1] == $user)?'right':'left';		// left for other user ,right for you

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
//		// for calculating the message Read Status //		//

if(($row[2] != $user) && ($row[1] == $user))		// which i send
{
	if($row[3]==0)
	$imgcheck="<img style='height:20px;' src='images/msgsicons/delete.png'/>";	// Message sent but not read
	else
	$imgcheck="<img style='height:20px;' src='images/msgsicons/tick.png'/>";	
	//	 Message sent and  read
}
if(($row[2] == $user) && ($row[1] != $user))		// which i recieve
	$imgcheck="<img style='height:20px;' src='images/msgsicons/tick.png'/>";

	echo "<span rel='tickpng' id='$row[0]' class='tick-$row[1]'>$imgcheck</span> <small style='font-size:10px;color:black;margin-bottom:-5px;' class='ud3btn'>";
	//echo date('M jS \'y g:sa:', $row[4]);
	echo date('M jS  g:sa:', $row[4]);
	echo "</small>";		/// time of messaging ??

 
//...................SAYING STARTED			//

if (  (($row[2] == $user) && ($row[1] != $user)) || (($row[2] != $user) && ($row[1] == $user))  ) 
{		// 		her/him messages
echo <<<_END
<p  align='$align'><div style='font-size:14px;' id='$j' class='txtshw' rel='txtarea' disabled> &quot;$row[5] &quot;</div></p>
_END;

}
//..................SAYING COMPLETE			//
echo"</div>";

}		// if statement ends
}		// for loop ends

if($nummsgqry==null || $nummsgqry==0)
echo"<br/><br/><div align='center' style='color:black;' class='ud3btn'>
You have not shared a single message with him/her , Give it a try..!!</div><br/>";
}

?>