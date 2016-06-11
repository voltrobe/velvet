<?php
require_once('online.php');
require_once('requirefn.php');

//................For displaying Members................//

//$result = queryMysql("SELECT * FROM snmembers ORDER BY user");
//$num = mysql_num_rows($result);
if (isset($_GET['add']) || isset($_GET['follow'])){
$rslt = queryMysql("SELECT fname,lname FROM snmembers where user='$user'");
$sdk=mysql_fetch_row($rslt);
$sdk=ucwords($sdk[0]." ".$sdk[1]);  	// Complete Name of the Follower

	$view = sanitizeString($_GET['view']); 		// The username of user to be followed
	$name = ucwords(sanitizeString($_GET['name'])); // Complete name to be followed
	$time=time();
}
if (isset($_GET['add']))
{
	$add = sanitizeString($_GET['add']);
	if($add=='remove'){
		$query = "DELETE FROM rnfriends WHERE (user='$user' OR friend='$user')
		AND (friend='$view' OR user='$view')";
	queryMysql($query);
	}
	else{
		$query= "SELECT * FROM rnfriends WHERE (user='$user' OR  friend='$user') AND (user='$view' OR  friend='$view')";
		if(!mysql_num_rows(queryMysql($query)))
		{
		$query = "INSERT INTO rnfriends VALUES(null,'$user','$sdk','$view','$name',0,'$time')";
		queryMysql($query);
		}
		else
		{
		if(isset($_GET['accept'])){
		$query = "UPDATE rnfriends SET accepted='1' ,relationtime='$time' WHERE  (user='$view' AND friend='$user') ";
		queryMysql($query);}
		}
	}
}
if (isset($_GET['follow']))
{
	$follow = sanitizeString($_GET['follow']);
	if($follow=='unfollow'){
	$query = "DELETE FROM follow WHERE follower='$user'
	AND following='$view'";
	queryMysql($query);
	}
	else{
		$query= "SELECT * FROM follow WHERE follower='$user' AND following='$view'";
		if(!mysql_num_rows(queryMysql($query)))
		{
		$query = "INSERT INTO follow VALUES(null,'$user','$sdk','$view','$name')";
		queryMysql($query);
		}
	}
}
$rslt = queryMysql("SELECT * FROM snmembers ORDER BY user");
$num = mysql_num_rows($rslt);
if($num != null)
{
	for ($j = 0 ; $j < $num ; ++$j)
	{
		$row = mysql_fetch_row($rslt);
		if($row[1]==$user) continue;
		$query = "SELECT * FROM follow WHERE (follower='$user' OR following='$user') AND (follower='$row[1]' 
		OR following='$row[1]')";
		$t2 = mysql_num_rows(queryMysql($query));
		if($t2==0) continue;
		$t2row = mysql_fetch_row(queryMysql($query));
		$query = "SELECT * FROM rnfriends WHERE (user='$user' OR friend='$user') AND (user='$row[1]' 
		OR friend='$row[1]')";
		$t1row = mysql_fetch_row(queryMysql($query));
		$t1 = mysql_num_rows(queryMysql($query));

		if($t2row[1]==$user){
		$usern=$t2row[3];
		$name=$t2row[4];
		$flw="YOur Are Following This User";
		}
		else{
		$usern=$t2row[1];
		$name=$t2row[2];
		$flw="This user is Following You";
		}
		$picexist=picthere($usern);
		echo "<li><table><tr><td><img  src='$picexist'/></td><td><a class='defbtn' href='rnmembers.php?view=$usern'>$name</a><br/>";
		//..........For Showing Relationship Status B/n Friends.......//
			// Existing friend
			// UnFollow the Existing friend
		if($t1row[5]==0 && $t1row[3]==$user){
			 $adding="Accept FriendShip ?";
			 $accept="add&accept=1";
			 }
			 elseif($t1row[5]==1 && ($t1row[3]==$user) || ($t1row[1]==$user)){
			 $adding="Unfriend This User!!";
			 $accept="remove";
			 }
			 if($t1row[5]==0 && $t1row[1]==$user){
			 $adding="Cancel the Request !!";
			 $accept="remove";
			 }
			 if(!$t1)
			 {
			 $adding="Send A Friend Request!!";
			 $accept="add&name=$name";
			 }
			 // FriendS algorithm
			 // Follow algorithm
			 if($t2row[1]==$user){
			$follow = "UnFollow..!!";
			$flw="follow=unfollow&name=$name";
			}
			 else {
			$follow = "This user is Following You";
			$flw="";
			}
			
echo<<<_END
		[<a id='followfl' rel='$usern' onclick="clickyfollow('followfl','$usern'); return false;" class='button green' href='followfollow.php?view=$usern&$flw'>$follow</a>] <a onclick="clickyfollow('addfl','$usern'); return false;" id='addfl' rel='$usern' href='followfollow.php?view=$usern&add=$accept' class='button black' style='font-size:16px;'> &harr; $adding </a>
_END;

		echo"</td></tr></table></li>";
	}
}
else
{
	echo "
	<div align='center' style='backround-image:url(sn.png);'>
	<ul>
	<li class='defbtn'>Sorry You Don't Have any Friends...</li>
	<li class='defbtn'>Or there Could be someone technical problem...</li>
	<li class='defbtn'>Try to refresh the page ...it May help sometimes...!!</li></ul></div>";
}
?>