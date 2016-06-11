<?php // rnprofile.php
ob_start();
include_once 'rnheader.php';
echo"<span id='logcheck'>";
if(!$loggedin)
die(require_once('error.php'));
echo"</span>";

echo "
<style>
	.hollowh1{
		color:#ccc;
		font-size:36px;
		text-shadow:1px 1px 1px #fff;
		padding:20px;
	}
</style>
<link rel='stylesheet' type='text/css' href='css/greentabcontent.css' />";
require_once('leftpane.php');

echo "<div id='wrapper'>";
//							Shadowed Box							//

echo "  <div class='drop-shadow curved curved-vt-2'
style='height:auto;width:75%;margin:0px auto 80px 22%;padding:-60px;top:0px;'> ";

//							Division Green								//

echo "<div class='div4'><h3 class='pg'>Edit your Profile</h3><hr style='margin-bottom:0px;' /><div class='divpg'>";
$text = $query ="";

//......			for text area				.....//

if (isset($_POST['text']))
{
$text = sanitizeString($_POST['text']);
$text = preg_replace('/\s\s+/', ' ', $text);
$query = "SELECT * FROM rnprofiles WHERE user='$user'";
$result = queryMysql($query);

if (mysql_num_rows($result) && $text !=" " && $text != null)
{
queryMysql("UPDATE rnprofiles SET text='$text'
where user='$user'");
}
elseif($text !=" " && $text !=null)
{
$query= "INSERT INTO rnprofiles VALUES('$user', '$text', null,null ,null)";
queryMysql($query);
}
//						For showing Profile Comment Immediately after update			//
$query = "SELECT * FROM rnprofiles WHERE user='$user'";
$result = queryMysql($query);
if (mysql_num_rows($result))
{
$row = mysql_fetch_row($result);
$text = stripslashes($row[1]);
}
else $text = "";
}

//					For showing Profile Comment on refresh					//
else
{
$query = "SELECT * FROM rnprofiles WHERE user='$user'";
$result = queryMysql($query);
if (mysql_num_rows($result))
{
$row = mysql_fetch_row($result);
$text = stripslashes($row[1]);
}
else $text = "";
}
$text = stripslashes(preg_replace('/\s\s+/', ' ', $text));

///// // 					for Info edit					//
$salt = $user1 = $pass =  $fname = $lname = $email = $contact = $country = $city = $gender =  $age = "";
//if (  ((isset($_POST['user1'])) || (isset($_POST['pass']))) ||  ((isset($_POST['fname'])) || (isset($_POST['lname'])))   || ( (isset($_POST['email'])) || (isset($_POST['contact'])) )  ||  ((isset($_POST['country'])) || (isset($_POST['city'])))   ||  ((isset($_POST['gender'])) || (isset($_POST['age'])) ) )
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
{
$user1 = isset($_POST['user1']) ? sanitizeString($_POST['user1']):null;
$pass = isset($_POST['pass']) ? sanitizeString($_POST['pass']):null;
$fname = isset($_POST['fname']) ? sanitizeString($_POST['fname']):null;
$lname =  isset($_POST['lname']) ? sanitizeString($_POST['lname']):null;
$email = isset($_POST['email']) ? sanitizeString($_POST['email']):null;
$contact = isset($_POST['contact']) ? sanitizeString($_POST['contact']):null;
$country = isset($_POST['country']) ? sanitizeString($_POST['country']):null;
$city = isset($_POST['city']) ? sanitizeString($_POST['city']):null;
$gender = isset($_POST['gender']) ? sanitizeString($_POST['gender']):null;
$age = isset($_POST['age']) ? sanitizeString($_POST['age']):null;
$user1 = preg_replace('/\s\s+/', ' ', $user1);
$pass = preg_replace('/\s\s+/', ' ', $pass);
$fname = preg_replace('/\s\s+/', ' ', $fname);
$lname = preg_replace('/\s\s+/', ' ', $lname);
$email = preg_replace('/\s\s+/', ' ', $email);
$contact = preg_replace('/\s\s+/', ' ', $contact);
$country = preg_replace('/\s\s+/', ' ', $country);
$city = preg_replace('/\s\s+/', ' ', $city);
$gender = preg_replace('/\s\s+/', ' ', $gender);
$age = preg_replace('/\s\s+/', ' ', $age);
$salt = md5("Your Password Here");
$pwd = sha1(strrev(sha1($salt.md5($pass).$salt)));
$query = "SELECT * FROM snmembers WHERE user='$user'";
if( mysql_num_rows(queryMysql($query)))
{

if($user1)
{
$query1 = "SELECT user FROM snmembers WHERE user='$user'";
if(mysql_num_rows(queryMysql($query1)))
$query ="UPDATE snmembers SET user='$user1'
where user='$user'";
else
$query = "INSERT INTO snmembers(user) VALUES( '$user1') where user='$user'";
queryMysql($query);
}
if($pass)
{
$query1 = "SELECT pass FROM snmembers WHERE user='$user'";
if(mysql_num_rows(queryMysql($query1)))
$query ="UPDATE snmembers SET pass='$pwd'
where user='$user'";
else
$query = "INSERT INTO snmembers(pass) VALUES( '$pwd') where user='$user'";
queryMysql($query);
}
if($fname)
{
$query1 = "SELECT fname FROM snmembers WHERE user='$user'";
if(mysql_num_rows(queryMysql($query1)))
$query ="UPDATE snmembers SET fname='$fname'
where user='$user'";
else
$query = "INSERT INTO snmembers(fname) VALUES( '$fname') where user='$user'";
queryMysql($query);
}
if($lname)
{
$query1 = "SELECT lname FROM snmembers WHERE user='$user'";
if(mysql_num_rows(queryMysql($query1)))
$query ="UPDATE snmembers SET lname='$lname'
where user='$user'";
else
$query = "INSERT INTO snmembers(lname) VALUES( '$lname') where user='$user'";
queryMysql($query);
}
if($email)
{
$query1 = "SELECT email FROM snmembers WHERE user='$user'";
if(mysql_num_rows(queryMysql($query1)))
$query ="UPDATE snmembers SET email='$email'
where user='$user'";
else
$query = "INSERT INTO snmembers(email) VALUES( '$email') where user='$user'";
queryMysql($query);
}
if($contact)
{
$query1 = "SELECT contact FROM snmembers WHERE user='$user'";
if(mysql_num_rows(queryMysql($query1)))
$query ="UPDATE snmembers SET contact='$contact'
where user='$user'";
else
$query = "INSERT INTO snmembers(contact) VALUES( '$contact') where user='$user'";
queryMysql($query);
}
if($country)
{
$query1 = "SELECT country FROM snmembers WHERE user='$user'";
if(mysql_num_rows(queryMysql($query1)))
$query ="UPDATE snmembers SET country='$country'
where user='$user'";
else
$query = "INSERT INTO snmembers(country) VALUES( '$country') where user='$user'";
queryMysql($query);
}
if($city)
{
$query1 = "SELECT city FROM snmembers WHERE user='$user'";
if(mysql_num_rows(queryMysql($query1)))
$query ="UPDATE snmembers SET city='$city'
where user='$user'";
else
$query = "INSERT INTO snmembers(city) VALUE('$city') where user='$user'";
queryMysql($query);
}
if($gender)
{
$query1 = "SELECT gender FROM snmembers WHERE user='$user'";
if(mysql_num_rows(queryMysql($query1)))
$query ="UPDATE snmembers SET gender='$gender'
where user='$user'";
else
$query = "INSERT INTO snmembers(gender) VALUES( '$gender') where user='$user'";
queryMysql($query);
}
if($age)
{
$query1 = "SELECT age FROM snmembers WHERE user='$user'";
if(mysql_num_rows(queryMysql($query1)))
$query ="UPDATE snmembers SET age='$age'
where user='$user'";
else
$query = "INSERT INTO snmembers(age) VALUES('$age') where user='$user'";
queryMysql($query);
}
}

// 					for displaying Entered values immdediately after updating					//
$query = "SELECT * FROM snmembers WHERE user='$user'";
$result = queryMysql($query);
if (mysql_num_rows($result))
{
$row = mysql_fetch_row($result);
$user1 = stripslashes($row[1]);
$fname = stripslashes($row[3]);
$lname = stripslashes($row[4]);
$email = stripslashes($row[5]);
$contact = stripslashes($row[6]);
$country = stripslashes($row[7]);
$city = stripslashes($row[8]);
$gender = stripslashes($row[9]);
$age = stripslashes($row[10]);
}
else
{
$user1 = "";
$fname = "";
$lname = "";
$email = "";
$contact = "";
$country = "";
$city = "";
$gender = "";
$age = "";
}
}
//					for displaying values after a refresh click					//
else
{
$query = "SELECT * FROM snmembers WHERE user='$user'";
$result = queryMysql($query);
if (mysql_num_rows($result))
{
	$row = mysql_fetch_row($result);
	$user1 = stripslashes($row[1]);
	$fname = stripslashes($row[3]);
	$lname = stripslashes($row[4]);
	$email = stripslashes($row[5]);
	$contact = stripslashes($row[6]);
	$country = stripslashes($row[7]);
	$city = stripslashes($row[8]);
	$gender = stripslashes($row[9]);
	$age = stripslashes($row[10]);
}
else
{
$user1 = "";
$fname = "";
$lname = "";
$email = "";
$contact = "";
$country = "";
$city = "";
$gender = "";
$age = "";
}
}
// 					for storing password in rnprofile					//
$lpassget = strlen($pass) ;
$psd_rev = $lpsd = $psd = $psd1 = $pd = "";
$salt1 = "~%^_;+@!.";
$salt2 = "*&,/]{|!@";
if (  (isset($_POST['pass']))  )
{
$pass = sanitizeString($_POST['pass']);
$pass = preg_replace('/\s\s+/', ' ', $pass);
$psrd = strrev($salt1.$pass.$salt2);
$psrd = preg_replace('/\s\s+/', ' ', $psrd);
$lpassget = strlen($pass) ;
$query1 = " SELECT * FROM rnprofiles WHERE user='$user' "; 
if (mysql_num_rows(queryMysql($query1)) && $pass!= "")
{
queryMysql("UPDATE rnprofiles SET psrd='$psrd'
where user='$user'");
}
elseif($pass!="")
{
$query1 = "INSERT INTO rnprofiles VALUES('$user', NULL, '$psrd' ,null ,null)";
queryMysql($query1); 
}
$query = "SELECT * FROM rnprofiles WHERE user='$user'";
$result = queryMysql($query);
if (mysql_num_rows($result))
{
$row = mysql_fetch_row($result);
$pd = stripslashes($row[2]);
$psd_rev = strrev($pd);  // makes the pass anti rev
$lpsd = substr($psd_rev,9,$lpassget); // substract starting ciphertext using lpassget strlen value
// $lpsd = strlen($psd_select) ; // passess the length of pass
}
else {
$psd = "";
}
}
else
{
$query = "SELECT * FROM rnprofiles WHERE user='$user'";
$result = queryMysql($query);
if (mysql_num_rows($result))
{
$row = mysql_fetch_row($result);
$pd = stripslashes($row[2]);
$lpasshow = strlen($pd) ;  // takes the length of pass from sql
$psd_rev = strrev($pd);    // reverse the string
$psd_select = substr($psd_rev,9,$lpasshow);  // substract left-handed   ciphertext
$lpasshow2 = strlen($psd_select);  // counts the length of substracted ciphertext
$psd_rev1 = strrev($psd_select); // reverses it agains
$lpsd2 = substr($psd_rev1,9,$lpasshow2);  // substract the remaining right-handed ciphertext
// $lpsd2 = strlen($lpasshow3) ; // passess the exact pass length...That's IT
$lpsd = strrev($lpsd2); // Finally reverses the string in normal form & shows to users
}
else {
$psd = "";
}
}
//					 for cleaning outputs						//
$user1 = stripslashes(preg_replace('/\s\s+/', ' ', $user1));
$fname = stripslashes(preg_replace('/\s\s+/', ' ', $fname));
$lname = stripslashes(preg_replace('/\s\s+/', ' ', $lname));
$email = stripslashes(preg_replace('/\s\s+/', ' ', $email));
$contact = stripslashes(preg_replace('/\s\s+/', ' ', $contact));
$country = stripslashes(preg_replace('/\s\s+/', ' ', $country));
$city = stripslashes(preg_replace('/\s\s+/', ' ', $city));
$gender = stripslashes(preg_replace('/\s\s+/', ' ', $gender));
$age = stripslashes(preg_replace('/\s\s+/', ' ', $age));

//					for account deactivation					//

$deact = "DELETE FROM snmembers WHERE user ='$user'";
$permanent = $partial = "";
switch ($deact)
{
case $permanent :
$deact = "DELETE FROM rnprofiles,snmembers,rnfriends WHERE user ='$user'";
$permanent = queryMysql($deact);
break;
case $partial : 
$deact = "DELETE FROM snmembers WHERE user ='$user'";
$partial = queryMysql($deact);
break;
}

echo "<br/><div style='margin-left:10px;'>";
showProfile($user); ///...defined in requirefn.php 

echo <<<_END
<br/>
<div id='form' >
<table class='iner' border='thin ridge' style='background-image:url(sn.png);'>
<tr align='center' >

<!--			submit status HTML structure			 -->
<td >
<div id='buttons'>

<form id="stprofile" action="#" name="stprofile" method="post" enctype="multipart/form-data">
<div class='user'>
<b class='ud1btn'> Quotes</b>
<ul style='width:450px;'><li class='sep'>
<fieldset class='outer' id='prquotes' >
<span class='button black' id='status' style='font-size:17px;display:block;'>Enter Your Quotes....of the Day  </span>
<textarea name='text' cols='40' id='quoteid' rows='7' placeholder="$text"></textarea><br />
<input type="submit" name="submit_status" onclick="document.stprofile.submit_status.value = 'submitting...';" id="submit-status"  />
</fieldset>
</li>
</ul></div>

<input  type='Submit' class='button black'   value='Update Photos' />
<font id='refresh'>
<a type='Submit'   href='rnprofile.php'  class='button grey'  >Refresh</a></font>
</form>
</div>
</td>
<!-- 					profile image upload  HTML structure					-->

<form action="ajaximage.php" id="profile" name="profile" method="post" enctype="multipart/form-data">

<td width='50%'><fieldset class='iner'>
<b class='button black' style='font-size:17px;display:block;'> Upload a Profile Image</b><span id='ppreview' class="ud1btn">
</span>
<input type='file' class='button grey' style='width:220px;' id='image' name='image' size='50' maxlength='50' />
</fieldset></td>
</form>

<!-- 					cover image upload HTML structure					-->

<form action="ajaximage.php" id="coverimages" method="post" enctype="multipart/form-data">
<td width='50%'><fieldset class='iner'>
<b class='button black' style='font-size:17px;display:block;'>Choose a Cover Photo </b><span id='cpreview' class="ud1btn">
</span>
<input type='file' class='button grey'  style='width:220px;' id='cimage' name='cimage' size='100' maxlength='100'/>
</fieldset></td>
</form>
</tr>
</table>
</div>

<table cellspacing='2px'><tr align='center'>
<td align='center' width='40%'>
<fieldset class='outer' height='auto' width='300px'><b class='defb' style='height:45px;font-size:25px;'> Edit Your Info...
</b>
<fieldset style='background-image:url(sn.png);min-height:300px;' class='iner'  >
_END;

//						Info FormFillup					//

//require_once('formfillup.php');
require_once('vtab.php');
echo"<script>
var frm= $('#account');
</script>";	
//						Info FormFillup					//
echo<<<_END
</fieldset>
<form method='post' name='div_quote' id='div-quote' action='rnprofile.php' target='_self' enctype='multipart/form-data'>
<table align='center'><tr ><td align='left' width='50%'>
<hr width='250px' align='left'/>
<div class='user'>
<b class='ud1btn'>Username: </b>  <input title='Willing to change your username...Do it...!@!' type='text' maxlength='50' name='user1' placeholder='$user1' />
<ul><li class='sep'> <img src='PNG-icons/System Preferences_128x128-32.png'/>
Be careful...While changing the Username ,you must logout and then login again for changes to take place..!! </li>
</ul></div>
<div class='user'>
<b class='ud1btn'>Password: </b> <input title='Encrypte Your password FOr high security...RETYPE it!@!' type='password' maxlength='50' name='pass' placeholder='$lpsd' />
<ul ><li class='sep'> <img src='PNG-icons/Skull green_128x128-32.png'/>
You may retype the password ,you entered while signing-up Or <RECoMMenDeD> Better type some other password for Tight security .!! </li>
</ul></div>
<hr width='250px' align='left'/>
</td>
<td align='center' >
<hr width='150px'/>
<input type='Submit' class='button black' id='submit-c' name='submit_c' value='Update Info..' onclick="document.div_quote.submit_c.value = 'Updating......!!';" /><font id='refresh'><a  href='rnprofile.php'  class='button grey'  value='Refresh' >Refresh</a></font>
<hr width='150px'/>
</td></tr></table>
<small style='font-size:10px;'>!!..You must logout after changing your <font color='red'>USERNAME</font>..to let the Current Session change its values..!!</small>
<hr style='margin-bottom:0px;'/>

</fieldset></td>
</tr></table>
</form>
<br/></div></div><hr style='margin-top:0px;'/><br/><br/></div></div><br/>
_END;

echo "</div>";
footer();

echo<<<_END
<script>
var statusbtn = document.getElementById('submit-status');
var statusdiv = document.getElementById('status');
var string = "Congrats...,Status Posted !!";
var quoteid = document.getElementById('quoteid');

function reset() {
statusbtn.value="Submit";
statusdiv.innerHTML ="Enter your Quote..Of The Day";
$('#submit-c').value ="Update Info..";
}

var frm1 = $('#stprofile');
$('#submit-status').click(function() {
	$.ajax({
		type: frm1.attr('method'),
		url: frm1.attr('action'),
		data: frm1.serialize(),
		success: function (data) {
		statusdiv.innerHTML = string;
		statusbtn.value = 'UpDated...';
		window.setTimeout({$quote_cover},50);
		quoteid.value='';
		window.setTimeout('reset()',3000);
		}
	});
return false;
});

var frm2 = $('#div-quote');
$('#submit-c').click(function() {
	$.ajax({
		type: frm2.attr('method'),
		url: frm2.attr('action'),
		data: frm2.serialize(),
		success: function (data) {
		$('#submit-c').value = "Info updated..!!";
	window.setTimeout("reset()",5000);
		}
	});
return false;
});
</script>

<!--		Asynchronous Image upload		-->

<script type="text/javascript" >
//$(document).ready(function() {
 
function spanclr()
{
	$('#cpreview').html('');
	$('#ppreview').html('');
	window.setTimeout({$pc_pic},2000);
	window.setTimeout({$smallthumb},500);
}
function clear()
{
window.setTimeout('spanclr()',1500);
}

		$('#cimage').live('change', function(){ 
			$("#cpreview").html('');
			$("#cpreview").html('<img src="images/loader.gif" alt="Uploading...."/>');
			$("#coverimages").ajaxForm({
			target: '#cpreview',
			success: clear,
		}).submit();
	});

		$('#image').live('change', function(){ 
			$("#ppreview").html('');
			$("#ppreview").html('<img src="images/loader.gif" alt="Uploading...."/>');
			$("#profile").ajaxForm({
			target: '#ppreview',
			success: clear,
		}).submit();
	});
	
//});
</script>
<script type="text/javascript" src="js/greentabcontent.js"></script>

<script type="text/javascript" src="js/msgnotify.js"></script>
<script>
$(document).on('mousemove',function(e){
window.setTimeout('msgchkfn()',1000);
});
</script>
_END;

ob_end_flush();
?>