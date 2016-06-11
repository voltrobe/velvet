<?php // rnlogout.php
ob_start();
include_once 'rnheader.php';
$div = "<div class='drop-shadow curved curved-vt-2' 
style='height:auto;width:90%;margin:0px 60px 20px 60px;padding:-60px;top:10px;'>";
if (isset($_SESSION['user']) && isset($_GET['hext']))
{

destroySession($_SESSION['user']);
//....................................................Shadowed Box................................//
echo $div ;
//..................................................Division Green.................................//
echo "
<div class='div4' >
<h3 class='pg'><font class='ft3'>Logged out</font></h3>
<hr style='margin-bottom:0;'/>
<div align='center'  class='divpg'>
<br/>
<fieldset class='outer' style='margin-left:30px;margin-right:30px;'>
<fieldset  style='background-image:url(son.png);margin-left:10%;margin-right:10%;' class='iner'>
<font class='ft3' style='font-size:20px;text-shadow: 1px 1px 1px rgba(0,0,0,1);color:white;'>
<b><big>You have been logged out.</big><br/>You'll be redirected within 3 seconds <br/>OR if it doesn't work <br/><br/> Please
<a class='button grey' href='index.php'>click here</a> to refresh the screen.</b><br/>
</font>
</fieldset><br/>
</fieldset><br/>
</div><hr style='margin-top:0px;'/><br/>
</div></div><br/>
<h1 class='footerfont' align='center'>
<b>&copy SocioNova.com copyright by Noviya Corp. </b>
</h1>";
echo "<meta http-equiv='Refresh' content='3;url=index.php'/>";
}
else if(!$loggedin) {
//			Shadowed Box			//
echo $div;
//			Division Green				//
echo "
<div class='div4' >
<h3 class='pg'><font class='ft3'>Logged out</font></h3>
<hr style='margin-bottom:0;'/>
<div align='center'  class='divpg'><br/>
<fieldset class='outer' style='margin-left:30px;margin-right:30px;'><br/>
<fieldset  style='background-image:url(son.png);margin-left:10%;margin-right:10%;' class='iner'>
<font class='ft3' style='font-size:20px;color:white;text-shadow: 1px 1px 1px rgba(0,0,0,1);'>
<b ><big>!@!..Sorry, Something went Wrong..!@!</big>
<br/>It seems You are not logged in. <br/>Kindly <a class='button grey' href='index.php' target=''> log in </a>to access your Account.<br/>
<br/>If you are New to this site ,<br/>Please <a class='button grey' href='index.php' target=''> Sign up </a> to join this Community.</b><br/>
</font>
</fieldset><br/>
</fieldset><br/>
</div><hr style='margin-top:0px;'/><br/>
</div></div><br/>
<h1 class='footerfont' align='center'>
<b>&copy SocioNova.com copyright by Noviya Corp. </b>
</h1>";
}
else
die(require_once('errorol.php'));
echo"</body></html>";
ob_end_flush();
?>