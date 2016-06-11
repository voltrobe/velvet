<?php // rnlogin.php
include_once 'rnheader.php';
echo "<div class='div4'><br/><h3 class='pg'><font class='ft3'>Members Log in</font></h3><br/>";
$error = $user = $pass = "";
if (isset($_POST['user']))
{
$user = sanitizeString($_POST['user']);
$pass = sanitizeString($_POST['pass']);
$pwd = md5($pass);
if ($user == "" || $pass == "")
{
$error = "<p align='center' ><b ><font color='red'>!!..Not all fields were entered..!!</font></b><br><meta http-equiv='Refresh' content='2;url=rnlogin.php'></p><br />";
}
else
{
$query = "SELECT user,pass FROM snmembers
WHERE user='$user' AND pass='$pwd'";
if (mysql_num_rows(queryMysql($query)) == 0)
{
$error = "<p align='center' ><b>!!...Oppss you typed too fast...!!<br><font color='red'>Username or Password is Invalid...try again!!</font></b><br><br></p><meta http-equiv='Refresh' content='3;url=rnlogin.php'/>";
}
else
{
$_SESSION['user'] = $user;
$_SESSION['pass'] = $pwd;
die("<meta http-equiv='Refresh' content=';url=rnmembers.php?view=$user'/><hr style='margin-bottom:0px;'/><div class='divpg' ><hr style='margin-top:0;'/><p align='center'><br/><br/><fieldset style='background-image:url(son.png);margin-left:10%;margin-right:10%;' class='iner'><br/><b>!!.. WELCOME $user ..!! <br/><br/>You are now logged in. <br/><big> Have patience  ,You'll be redirected within 3 seconds<br/>OR if it doesn't work</big><br/><br/>Please
<a class='button grey' href='rnmembers.php?view=$user'>click here</a><br/>To proceed to your Profile page.<br/><br/></fieldset></b><br/><br/></p></div><hr style='margin-top:0;'><p align='center'><font  class='ftft'><b>@SocioNova.com copyright by Noviya Corp. </b></font></p>");
}
}
}
echo <<<_END
<hr style='margin-bottom:0;'>
<div class='divpg' style='height:420px;'>
<br/><br/><div  class='login'>
<fieldset style='margin-right:0px;'><br/>
<form method='post' action='rnlogin.php'>$error
Username...<input title='Write the username you Entered during signup' type='text' maxlength='16' name='user'
value='$user' /><br /><hr />
Password....<input type='password' title='Write the password you Entered during signup' maxlength='16' name='pass'
value='$pass' /><br />
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
<input type='image' class='phbutt' src='login.ico' height='110' width='120' value='Login' />
</form>
</fieldset></div><br/>


</div><hr style='margin-top:0%;'/><br/></div><br/>
<p align='center'><font  class='ftft'><b>@SocioNova.com copyright by Noviya Corp. </b></font></p> 
_END;
?>