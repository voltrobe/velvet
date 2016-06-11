<?php
require_once('online.php');
//include_once('file_links.php');
require_once('requirefn.php');
echo"<div id='sharediv'>";
//				view theorem			//
if(isset($_GET['view']))
{
$view = sanitizeString($_GET['view']);
if ($view == $user) $name = "Your Home";
else $name = "$view's";
}
//				view theorem			//
//				posting to mysql database			//
$pix = (isset($_FILES['sharepix']['name']) || isset($_POST['sharepix'])) ? $_FILES['sharepix']['name'] :null ;


if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
{
  $text =isset($_POST['shareboxtxt']) ? sanitizeString($_POST['shareboxtxt']) : null;
  $recipent = $view;
  $time = time();
	$authname=flname($user);
	$recipname=flname($recipent);
   $pm = substr(sanitizeString($_POST['pm']),0,1);
   
  if(($text !=null  || $text !="") && $pix == null)
   {
    queryMysql("INSERT INTO rnwalls VALUES(NULL,
    '$user', '$recipent', '$pm', NULL, NULL, NULL, '$text', $time, '$authname', '$recipname')");
   }
	elseif($pix && $text){
	$picdir = "pics/sharepix/$user/".$pix;
	$picthumbshare = "pics/sharepix/$user/thumbnail/thumb_".$pix;
	include_once('sharepix.php');
	queryMysql("INSERT INTO rnwalls VALUES(NULL,
    '$user', '$recipent', '$pm', '$picdir', '$picthumbshare', NULL, '$text', $time ,'$authname' ,'$recipname')");
	}
	elseif($pix!= null && ($text == null || $text == "")){
	$picdir = "pics/sharepix/$user/".$pix;
	$picthumbshare = "pics/sharepix/$user/thumbnail/thumb_".$pix;
	include_once('sharepix.php');
	queryMysql("INSERT INTO rnwalls VALUES(NULL,
    '$user', '$recipent', '$pm',  '$picdir', '$picthumbshare', NULL, NULL, $time ,'$authname', '$recipname')");
	}
}

//			Erasing The post From database		//

if (isset($_GET['erase']) || isset($_GET['erase_u']))
{
$erase = isset($_GET['erase'])?sanitizeString($_GET['erase']) :sanitizeString($_GET['erase_u']);
$er=(isset($_GET['erase']))?"recip='$user'" :"auth='$user'";
$picquery = queryMysql("SELECT * FROM rnwalls WHERE id=$erase");
$piclink = mysql_fetch_row($picquery);
if(file_exists($piclink[4])){
unlink($piclink[4]);
unlink($piclink[5]);}
queryMysql("DELETE FROM rnwalls WHERE id=$erase
AND $er");

}

////					for ShareFeed				////
//$query = "SELECT * FROM rnwalls WHERE (recip='$view' OR auth='$view' or auth<>'$view')

$query = "SELECT * FROM rnwalls 
ORDER BY time DESC";
$result = queryMysql($query);
$num = mysql_num_rows($result);
for ($j = 0 ; $j < $num ; ++$j)
{
$row = mysql_fetch_row($result);
if ($row[3] == 1 ||
$row[1] == $user ||
$row[2] == $user)
{
echo"<fieldset class='iner'  id='txtslidy-$row[0]' style='margin-left:20px;margin-right:100px;margin-top:5px;background-image:url(sn.png);'>";
echo"<div class='md-modal  md-effect-9' id='modal-$row[0]'>
			<div style='width:900px;' class='md-content'>
				<h3>Modal Dialog</h3>
				<div  id='imgmodal'>
					<img height='380px'  src='$row[4]'/>
					<button class='md-close'>Close me!</button>
				</div>
			</div>
</div>";
echo"<table><tr><td>";

	//			Thumbnail Show and Thumb Algorithm			//
$picthumb =picthere($row[1]);
echo"<table><tr><td>";
echo"<img src='$picthumb' style='border:groove;' height='40' width='42'/></td>";
echo"<td><small style='font-size:8px;' class='ud3btn'>";
echo date('M jS \'y g:sa:', $row[8]);
echo "</small><br/>";
//			Thumbnail Show and Thumb Algorithm			//
	//				for erasing if you are the recipent but not auth			//
	if ((($row[2]==$user) && ($row[1]!=$user)) || (($row[1]==$user) && ($row[2]!=$user)) || (($row[1] == $user) && ($row[2]==$user)))
	{
	$erase=($row[1] == $user)? '&erase_u':'&erase';
		echo"<b class='button black'><---:</b> ";
echo<<<_END
[<a onclick="erasemsg('$row[0]'); return false;" id='erase-$row[0]' class='button red'  id='erase'  href='shareform.php?view=$view$erase=$row[0]'>erase</a>]
_END;
	}
echo"</td></tr></table>";
	
//			Writng Condition Algorithm			//
//		PART-I
if(($row[1] == $user)&&( $row[2] == $user))
if($row[7]=="" && $row[4]!=NULL)
$wrote="Posted a Pic";
elseif($row[7]!=NULL && $row[4]=="")
$wrote="Wrote";
else
$wrote="Posted";
//		PART-II
if((($row[1]==$user)&&($row[2]!=$user)) || (($row[1] != $user ) && ($row[2] == $user )))
{
if($row[7]=="" && $row[4]!=NULL)
$wrote="Posted a Pic To ";
elseif($row[7]!=NULL && $row[4]=="")
	{
	if(($row[1] != $user ) && ($row[2] == $user ))
	{$wrote="Writes to";}
	else $wrote="Wrote to";
	}
else
$wrote="Posted a Pic and Writes to";
}
//		PART-III
if(($row[1]!=$user) && ($row[2]!=$user ))
{
if($row[7]=="" && $row[4]!=NULL)
{
$wrote="Posted a Pic";
if($row[1]!=$row[2])
$wrote="Posted a Pic to <b class='button blue'>$row[2]</b>";
}
elseif($row[7]!=NULL && $row[4]=="")
{
$wrote="Says..";
if($row[1]!=$row[2])
$wrote="Says to <b class='button blue'>$row[2]</b>";
}
else{
$wrote="Posted a Pic and Says..";
if($row[1]!=$row[2])
$wrote="Posted a Pic and says to <b class='button blue'>$row[2]</b>";
}
}
//			Writng Condition Algorithm			//
echo"<hr width='420px' style='margin-bottom:0px;' align='left'>";
	$qry1 = "SELECT * FROM rnprofiles WHERE user='$row[1]'";
	$rslt1 = queryMysql($qry1);
	$rp = mysql_fetch_row($rslt1);
if(($row[1] == $user)&&($row[2] == $user))
{
echo"<a class='button grey' style='margin-bottom:20px;' href='rnmembers.php?";
echo"view=$row[1]'><b>You....</b></a><b class='defbtn' style='font-size:14px !important;'> $wrote:->></b> ";
}
elseif(($row[1]==$user)&&($row[2]!=$user))
{
//				for profileinfo
	$qry = "SELECT * FROM snmembers WHERE user='$row[2]'";
	$rslt = queryMysql($qry);
	$rw = mysql_fetch_row($rslt);
  
	//				Pop-up users-Division..........
	echo "  <div class='user' style='width:350px;z-index:999;position:absolute;'> <b class='defbtn' style='font-size:14px;'> <b class='button grey'>You..</b> $wrote->> </b>
	<a class='button blue' href='rnmembers.php?view=$row[2]'><strong>$row[2]</strong></a><ul>";
	echo"<li> <a href='rnmembers.php?view=$row[2]'> $row[2]'s Profile </a> </li>";
	echo"<li> <a href='rnmessages.php?view=$row[2]'> $row[2]'s Inbox </a> </li>";
	echo"<li> <a href='rnfriends.php?view=$row[2]'> $row[2]'s Friends </a> </li>";

	$picy=picthere($row[2]);
	
	echo"<li class='sep'> <img height=' 40' width='40' style='border:ridge;' src='$picy'/>";
	echo"Joined on:-><br/>";
	echo" <small class='ud3btn'>";
	echo date('M jS \'y g:sa:', $rw[10]);
	echo"</small>";
	echo"</li>";
	echo "</ul></div><br/>";
}
elseif ( ($row[1] != $user ) && ($row[2] == $user ) )
{
	//				for profileinfo................
	$qry = "SELECT * FROM snmembers WHERE user='$row[1]'";
	$rslt = queryMysql($qry);
	$rw = mysql_fetch_row($rslt);

	//				Pop-up users-Division..........
echo"<div class='user' style='width:350px;z-index:999;position:absolute;'><a class='button blue' href='rnmembers.php?view=$row[1]'>$row[1]</a><b class='defbtn' style='font-size:12px;'>$wrote->> <b class='button grey' >You..!</b></b>";
	pseudomsg($row[1],$rw[10],$picthumb,$rp[1]);
	echo"</div><br/>";
}
elseif(($row[1]!=$user) && ($row[2]!=$user ))
{
	//			for profile info			//
	$qry = "SELECT * FROM snmembers WHERE user='$row[1]'";
	$rslt = queryMysql($qry);
	$rw = mysql_fetch_row($rslt);
	//			for profile pop-up			//
	echo"<div class='user' style='width:350px;z-index:999;position:absolute;'> <a class='button blue' href='rnmembers.php?view=$row[1]'>$row[1]</a><b class='defbtn' style='font-size:12px;'>$wrote.!!</b>  ";
	pseudomsg($row[1],$rw[10],$picthumb,$rp[1]);
	echo"</div><br/>";
}
//					Posting starts					///
if (($row[3] == 0 && $row[7]!=null) || ($row[3] == 1 && $row[7]!=null) || (($row[2] != $user) && ($row[1] == $user) && $row[7]!=null))
{
echo"<br/><textarea  style='width:420px;margin-top:-10px; ' class='txtshw' name='txt' rel='textarea' disabled>&quot;$row[7]&quot; </textarea>";
}
//		'		posting ends...					//


echo"<br/></td>";
//				Img gallery...			//
//$imgquery= queryMysql("SELECT * FROM rnwalls WHERE recip='$view'");
//$rw = mysql_fetch_row($imgquery);  id='example2'
//$picheck = mysql_num_rows($imgquery);    
if($row[4]!=null && $row[5]!=null)
{

echo"
<td><hr id='sharebox'/><a class='md-trigger'  data-modal='modal-$row[0]'  ><img src='$row[5]'  id='sharebox' width='280px'/></a>
</td>
";
}
//rel='facybox' href='./$row[4]'
// onclick="picreplace('<?php echo $row[4] ')"
echo"</tr></table>";
echo"</fieldset>";
}
}
echo"</div>";
?>