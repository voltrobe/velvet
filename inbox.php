<?php // rnprofile.php
include_once 'rnheader.php';
if (!isset($_SESSION['user']))
die("<br /><br /><br/><br/><br/><meta http-equiv='Refresh' content='5;url=index.php'/><div align='center'  class='div4'><hr/><br/><br/><b><big><font class='ftmsg'>!...Oppss Wrong place...!<br/>You need to login to view this page...!<br/>Wait for 5 seconds, you'll be redirected</font></big></b><br/><br/><hr/></div>");
if (isset($_GET['view']))
$view = sanitizeString($_GET['view']);
else 
$view = $user ; 
 
echo "<div class='div4'><br/><h3 class='pg'><font class='ft3' >Your Inbox</font></h3><br/><hr style='margin-bottom:0px;' /><div class='divpg'>";
echo "
<table style='margin:2%;'>
<tr align='center'>
<br />
<td width='80%' > <fieldset align='center' width='75%' class='iner'>
<font style='color:rgb(66, 123, 140);'><b class='defb'> Compose a Message </b></font><br /> 
<table ><tr ><td align='center' >
<div class='user'>
<b class='defbtn'>To a Friend :-></b><br />
<ul>
 ";
//...............From Friends..................//
$query = "SELECT * FROM rnfriends WHERE user='$user'";
$result = queryMysql($query);
$num = mysql_num_rows($result);
for($j = 0 ;$j < $num; ++$j)
{
 $row = mysql_fetch_row($result);
 echo "  <li> <img src='pics/profile/$row[1].jpg' width='25' height='25' /><a href='rnmembers.php?view=$row[1]'> $row[1] </a></li>";
  
}
echo "</ul></div></td><br />";
// ................From Members.............//
$qry = "SELECT * FROM snmembers ";
$rslt = queryMysql($qry);
$num = mysql_num_rows($rslt);
echo "<td style='margin-left:5px;'>";
echo "<div class='user'>
       <b class='defbtn'>To a Member :-></b><br />
      <ul>
        
        <li><a href='index.html'>View Profile</a></li>
        <li><a href='index.html'>Direct Message</a></li>
        <li class='sep'>Joined: March 9, 2012</li>
      
	";
	
for ($i = 0; $i < $num; ++$i)
{
 $row = mysql_fetch_row($rslt);
 echo "  <li> <img src='pics/profile/$row[0].jpg' width='25' height='25' /> $row[2] $row[3] </li>";
 
}
echo "
</ul>
    </div>
</td>	
<form method='post'  action='#'>
<textarea rows='10' cols='55' placeholder='Write a Private Message to an individual...!@!' ></textarea>
<input type ='submit' class='button black' value='Send'>
</form> 
</tr>
</table>
<br />
</fieldset>
</td>
";
echo "
<td align='right' style='text-align:center;width:30%;'>
<div  align='center' style='margin-left:130%;width:180px;border:thick ridge;background-image:url(css1/images/beige_paper.png);'>
<br /><br/>
<a href='rnmembers.php' class='button grey' > People  </a><br /><br/>
<a href='inbox.php' class='button grey'> Groups </a><br /><br/>
<a href='inbox.php' class='button grey'> Events </a> <br /><br/>
<br /><br />
</div>
</td>
</tr>
</table>
<hr />
<hr style='margin-top:-7px;'/>
</div><br /><br /></div>
";
?>