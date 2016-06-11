<?php
require_once('online.php');
require_once('requirefn.php');

//................For displaying Members................//
if(isset($_GET['limit']))
$limit=sanitizeString($_GET['limit']);
else
$limit= 10;

$result = queryMysql("SELECT * FROM snmembers ORDER BY user LIMIT $limit");
$num = mysql_num_rows($result);
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

if($num != null)
{
	for ($j = 0 ; $j < $num ; ++$j)
	{
		$row = mysql_fetch_row($result);
		if ($row[1] == $user) continue;
		$picexist=picthere($row[1]);
		$name=ucwords($row[3]." ".$row[4]);
		echo "<li><table><tr><td>
		<img  src='$picexist'/></td><td><a class='defbtn' href='rnmembers.php?view=$row[1]'>$name</a><br/>";
		$query = "SELECT * FROM rnfriends WHERE (user='$row[1]' OR friend='$row[1]') AND (user='$user' OR friend='$user')";
		$t1 = mysql_num_rows(queryMysql($query));
		$t1row = mysql_fetch_row(queryMysql($query));
		$query = "SELECT * FROM follow WHERE follower='$user'
		AND following='$row[1]'";
		$t2 = mysql_num_rows(queryMysql($query));
		$follow = "Follow..!!";
		$adding= "Send A Friend Request" ;
		//...........................For Showing Relationship Status B/n Friends.........................//
		
		//$drping = "Dropping..!!";
		//$addng = "Following...";
		if ($t1==0 && $t2==0) // Follow and Add the user if not
		{
echo<<<_END
			 [<a class='button green' id='follow' rel='$row[1]' onclick="clicky('follow','$row[1]'); return false;" href='follow.php?view=$row[1]&follow=follow&name=$name'>$follow</a>] <a  onclick="clicky('add','$row[1]'); return false;" href='follow.php?view=$row[1]&add=add&name=$name' id='add' rel='$row[1]' class='button black' style='font-size:16px;'> &harr; $adding </a>
_END;
		}
		elseif ($t1) // Existing  friend Field Entry ,accepted=0
		{
			if($t2==0){ // Follow the Existing friend
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
echo<<<_END
		[<a id='follow' rel='$row[1]' onclick="clicky('follow','$row[1]'); return false;" class='button green' href='follow.php?view=$row[1]&follow=follow&name=$name'>$follow</a>] <a onclick="clicky('add','$row[1]'); return false;" id='add' rel='$row[1]' href='follow.php?view=$row[1]&name=$name&add=$accept' class='button black' style='font-size:16px;'> &harr; $adding </a>
_END;
			}
			else {  	// unFollow The  Friend  Entry
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
				$follow="UnFollow..!!";
echo<<<_END
		[<a  id='follow' rel='$row[1]' onclick="clicky('follow','$row[1]'); return false;" class='button green' href='follow.php?view=$row[1]&follow=unfollow'>$follow</a>] <a onclick="clicky('add','$row[1]'); return false;" id='add' rel='$row[1]' href='follow.php?view=$row[1]&name=$name&add=$accept' class='button black' style='font-size:16px;'> &harr; $adding </a>
_END;
			}
		}
		else  // NoN-Existing friend
		{
			if($t2==0){ // Follow the NoN-Existing friend
				$adding="Send A Friend Request";
				//$follow="Unfriend This User";
echo<<<_END
		[<a id='follow' rel='$row[1]' onclick="clicky('follow','$row[1]'); return false;" class='button green' href='follow.php?view=$row[1]&follow=follow&name=$name'>$follow</a>] <a id='add' rel='$row[1]' onclick="clicky('add','$row[1]'); return false;" href='follow.php?view=$row[1]&add=add&name=$name' class='button black' style='font-size:16px;'> &harr; $adding </a>
_END;
				
			}
			else {  	// UnFollow The NoN-Friend 
				$adding="Send A Friend Request";
				$follow="UnFollow..!!";
				//$follow="Unfriend This User";
echo<<<_END
		[<a  id='follow' rel='$row[1]' onclick="clicky('follow','$row[1]'); return false;" class='button green' href='follow.php?view=$row[1]&follow=unfollow'>$follow</a>] <a  id='add' rel='$row[1]' onclick="clicky('add','$row[1]'); return false;" href='follow.php?view=$row[1]&add=add&name=$name' class='button black' style='font-size:16px;'> &harr; $adding </a>
_END;
			}
		}
		
		echo"</td></tr></table></li>";
	}
}
else
{
	echo "
	<div align='center' style='backround-image:url(sn.png);'>
	<ul>
	<li class='defbtn'>Sorry You Don't Have any Members...</li>
	<li class='defbtn'>Or there Could be someone technical problem...</li>
	<li class='defbtn'>Try to refresh the page ...it May help sometimes...</li></ul></div>";
}
?>