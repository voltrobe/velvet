<?php // rnmessages.php
include_once 'rnheader.php';
if (!isset($_SESSION['user']))
die("<br /><br /><br/><br/><br/><meta http-equiv='Refresh' content='5;url=index.php'/><div align='center'  class='div4'><hr/><br/><br/><b><big><font class='ftmsg'>!...Oppss Wrong place...!<br/>You need to login to view this page...!<br/>Wait for 5 seconds, you'll be redirected</font></big></b><br/><br/><hr/></div>");
$user = $_SESSION['user'];
if (isset($_GET['view'])) $view = sanitizeString($_GET['view']);
else $view = $user;

if (isset($_POST['text']))
{
$text = sanitizeString($_POST['text']);
if ($text != "")
{
$pm = substr(sanitizeString($_POST['pm']),0,1);
$time = time();
queryMysql("INSERT INTO rnmessages VALUES(NULL,
'$user', '$view', '$pm', $time, '$text')");

}
}
if ($view != "")
{
if ($view == $user)
{
$name1 = "Your";
$name2 = "Your";
$name3 = "You";
}
else
{
$name1 = ucwords("<a href='rnmembers.php?view=$view'><font color='lightgrey' >$view</font></a>'s");
$name2 = ucwords("$view's");
}



//....................................................Shadowed Box................................//
echo "  <div class='drop-shadow curved curved-vt-2' 
style='height:auto;width:90%;margin:0px 50px auto 50px;padding:-60px;top:0px;'> ";

//..................................................Division Green.................................//

echo "<div class='div4'><br/><h3 class='pg'><font class='ft3'> ";
echo ucwords("$name1 Messages</font> ");
echo "</h3>
<hr style='margin-bottom:0px;'/><div class='divpg'>";
echo "<br><br><div style='margin-left:10px'>";
showProfile($view);
echo <<<_END
<table ><tr align='center'><td width='10%'>
<fieldset class='outer'>
<form method='post' action='rnmessages.php?view=$view'>
<p style='margin-left:5px;'><b class='defb'>Type here to leave a wALL Message: </b><br /><br/>
<textarea name='text' cols='70' rows='8'></textarea><br />
Public<input type='radio' name='pm' value='0' checked='checked' />
Private<input type='radio'  name='pm' value='1' />
<input type='submit' class='button green' value='Post Message' /></p></form>
</fieldset>
</td>
<td width='100%' align='left' ><div style='margin-left:10%;'>
<a  href='inbox.php' class='defb'> Compose a Private Message ->></a></div>

</td></tr></table>
_END;
if (isset($_GET['erase']))
{
$erase = sanitizeString($_GET['erase']);
queryMysql("DELETE FROM rnmessages WHERE id=$erase
AND recip='$user'");
}
$query = "SELECT * FROM rnmessages WHERE recip='$view'
ORDER BY time DESC";
$result = queryMysql($query);
$num = mysql_num_rows($result);
for ($j = 0 ; $j < $num ; ++$j)
{
$row = mysql_fetch_row($result);
if ($row[3] == 0 ||
$row[1] == $user ||
$row[2] == $user)
{
echo "<fieldset style='background-image:url(css1/images/beige_paper.png);margin-bottom:0px;' class='iner'>";

echo date('M jS \'y g:sa:', $row[4]);
if (file_exists("pics/profile/$row[1].jpg"))
echo " <img height=' 60' width='50' src='pics/profile/$row[1].jpg'/>";
else
echo " <img height=' 60' width='50' src='pics/p-photo.png'/>";
echo "<hr width='420' style='margin-bottom:0px;' align='left'>";

if( ($row[1] == $user))
{
echo " <br><a class='button grey' href='rnmessages.php?";
echo "view=$row[1]'>You..</a> ";
}
else
echo " <br><a class='defb' style='width:300px;' href='rnmembers.php?view=$row[1]'>$row[1]</a>";

if ($row[3] == 0)
{
echo "wrote:-> <em> &quot;$row[5]&quot; </em>";
}
else
{
echo " whispered:-> <i><em><font
color='#006600'><b>&quot;$row[5]&quot;</b></font></em></i> ";
}
if ($row[2] == $user && $row[1]!= $user)
{
echo "<------[<a class='button green' href='rnmessages.php?view=$row[1]'>Reply</a>] ";
echo" [<a class='button red' href='rnmessages.php?view=$view";
echo "&erase=$row[0]'>erase</a>]";
}
else
{
echo "<------[<a class='button red' href='rnmessages.php?view=$view";
echo "&erase=$row[0]'>erase</a>]";
}

echo "</fieldset>";
}
echo "<br/>";
}

}

if (!$num) echo "<br/>
<fieldset class='outer' align='center' style='background-image:url(sn.png);'>
<li class='defb'>You don't owe any  Messages yet</li>
<li class='defb'>Try to write something..!!</li>
</fieldset>
<br />";
echo "<br/></div>
</div><hr style='margin-top:0px;'/>
<p  style='margin-left:50;text-shadow:20px;'><strong>|<a class='button grey' href='rnmessages.php?view=$view'><font color='black' face='segoe print'> Refresh messages</font></a>";
echo " | <a class='button grey' href='rnfriends.php?view=$view'><font color='black' face='segoe print'>View $name2 friends </font></strong></a>|</p><br/></div></div><br/>
<font class='ftft'><b><p align='center'>&copy SocioNova.com copyright by Noviya Corp.</p></b></font>";
?>