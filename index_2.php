<?php // index.php
ob_start();
require_once('rnheader.php');
//			Redirects to profile page if already logged in			//
if($loggedin)
{
die("<script>location.replace('rnmembers.php?view=$user')</script>");
}
echo <<<_END
<script>
function checkUser(user)
{
if (user.value == '')
{
document.getElementById('info').innerHTML = ''
return
}
params = "user=" + user.value
request = new ajaxRequest()
request.open("POST", "rncheckuser.php", true)
request.setRequestHeader("Content-type",
"application/x-www-form-urlencoded")
request.setRequestHeader("Content-length", params.length)
request.setRequestHeader("Connection", "close")
request.onreadystatechange = function()
{
if (this.readyState == 4)
{
if (this.status == 200)
{
if (this.responseText != null)
{
document.getElementById('info').innerHTML =
this.responseText
}
else alert("Ajax error: No data received")
}
else alert( "Ajax error: " + this.statusText)
}
}
request.send(params)
}
function ajaxRequest()
{
try
{
var request = new XMLHttpRequest()
}
catch(e1)
{
try
{
request = new ActiveXObject("Msxml2.XMLHTTP")
}
catch(e2)
{
try
{
request = new ActiveXObject("Microsoft.XMLHTTP")
}
catch(e3)
{
request = false
}
}
}
return request
}
</script>

  <script>
	$(function() {
		var name = $( '#name' ),
			email = $( '#email' ),
			password = $( '#password' ),
			allFields = $( [] ).add( name ).add( email ).add( password ),
			tips = $( '.validateTips' );
		function updateTips( t ) {
			tips
				.text( t )
				.addClass( 'ui-state-highlight' );
			setTimeout(function() {
				tips.removeClass( 'ui-state-highlight', 1500 );
			}, 500 );
		}
		function checkLength( o, n, min, max ) {
			if ( o.val().length > max || o.val().length < min ) {
				o.addClass( 'ui-state-error' );
				updateTips( 'Length of ' + n + ' must be between ' +
					min + ' and ' + max + '.' );
				return false;
			} else {
				return true;
			}
		}
		function checkRegexp( o, regexp, n ) {
			if ( !( regexp.test( o.val() ) ) ) {
				o.addClass( 'ui-state-error' );
				updateTips( n );
				return false;
			} else {
				return true;
			}
		}
		$( '#dialog-form' ).dialog({
			autoOpen: false,
			height: 300,
			width: 350,
			modal: true,
			buttons: {
				'Create an account': function() {
					var bValid = true;
					allFields.removeClass( 'ui-state-error' );
					bValid = bValid && checkLength( name, 'username', 3, 16 );
					bValid = bValid && checkLength( email, 'email', 6, 80 );
					bValid = bValid && checkLength( password, 'password', 5, 16 );
					bValid = bValid && checkRegexp( name, /^[a-z]([0-9a-z_])+$/i, 'Username may consist of a-z, 0-9, underscores, begin with a letter.' );
					// From jquery.validate.js (by joern), contributed by Scott Gonzalez: http://projects.scottsplayground.com/email_address_validation/
					bValid = bValid && checkRegexp( email, /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i, 'eg. ui@jquery.com' );
					bValid = bValid && checkRegexp( password, /^([0-9a-zA-Z])+$/, 'Password field only allow : a-z 0-9' );
					if ( bValid ) {
						$( '#users tbody' ).append( '<tr>' +
							'<td>' + name.val() + '</td>' +
							'<td>' + email.val() + '</td>' +
							'<td>' + password.val() + '</td>' +
						'</tr>' );
						$( this ).dialog( 'close' );
					}
				},
				Cancel: function() {
					$( this ).dialog( 'close' );
				}
			},
			close: function() {
				allFields.val( '' ).removeClass( 'ui-state-error' );
			}
		});
		$( '#create-user' )
			.button()
			.click(function() {
				$( '#dialog-form' ).dialog( 'open' );
			});
	});
	</script>
	<script>
		jQuery(document).ready(function(){
			jQuery('#Signup-Form').validationEngine();
			$('#Signup-Form').bind('jqv.field.result', function(event, field, errorFound, prompText){ console.log(errorFound) })
		});
  </script>
_END;
$error = $user = $pass = $pwd = $pass1 = $fname = $lname = $salt = "";
echo "<div id='container'> ";
	
//						for login logarithm						//
require_once('login.php');
$uname = isset($_GET['userlg'])?$_GET['userlg']:null;
//						FOr sign-up logarithm					//
require_once('signup.php');

//					Box_shadowed				//

echo "  <div class='drop-shadow curved curved-vt-2'
style='height:auto;width:97%;padding:-50px;top:-40px;margin-bottom:15px;'> ";

//					Main Green-outer division				//

echo "<div class='div4' ><br/><br/>
<h3 class='pg' style='margin-left:60px;'>
<font class='ft3'>
<b class='ud1btn' style='width:82%;line-height:35px;height:40px;position:absolute;margin:-50px 10% auto 4%;font-size:24;'>
!! Welcome Guest !!
<a id='example3' class='defbtn' href='#login' style='margin:2px auto;position:relative;float:right;' >LogIn<img src='PNG-icons/Downloads_32x32-32.png'/></a>
<a id='various4' class='defbtn' href='#signup' style='margin:2px auto;position:relative;float:right;'>
   Signup<img height='32' width='32' src='PNG-icons/Media Drive_48x48-32.png'/></a>
</b>
</font></h3>
<hr style='margin-bottom:0;'/>
<div class='divpg' >
 <br/> ";
 
echo "<table    style='margin-right:25px;margin-left:25px;'><tr><td style='width:100%;' align='middle'  >
<fieldset class='outer' style='margin-top:-25px;' ><p align='center'>
<b><div style='background-image:url(sn.png);'>
<strong>
<fieldset class='iner' style='margin:-7px 0px auto 0px;height:auto;line-height:43px;'>
<h2 class='pg' style='margin-top:2px;'>
<font class='ft3' style='font-size:28px;text-shadow: 0 1.1px 1.1px rgba(255,255,255,0.9);color: rgba(62,122,137,0.9);'>We help,...Connecting Peoples !! Across the planet</font></h2>
</fieldset></strong>
</div></b>
<br/><div style='background-image:url(son.png);'>
<fieldset class='iner' style='margin:-15px 0px auto -1px;' ><br/>
<!--
<font class='ft3' style='font-size:20px;text-shadow: 1px 1px 1px rgba(0,0,0,1);'> please <a class='button grey'  href='rnsignup.php' >Sign up</a> or
		<a id='example2' href='#login'>
<button onclick='javascript:openDialog();' class='button grey'  >Log in</button></a>
 to join This Social Community<br/><br/><b>Be a part of this community to gain access to all features that will connect you to your friends,foes...relatives and even more</b>
</font >
-->
<div id='da-slider' class='da-slider'>
				<div class='da-slide'>
					<h2>Easy management</h2>
					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
					<a href='#' class='da-link'>Read more</a>
					<div class='da-img'><img data-src='images/2.png' src='images/loading45.gif' alt='image01' /></div>
				</div>
				<div class='da-slide'>
					<h2>Revolution</h2>
					<p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
					<a href='#' class='da-link'>Read more</a>
					<div class='da-img'><img data-src='images/3.png' src='images/loading45.gif' alt='image01' /></div>
				</div>
				<div class='da-slide'>
					<h2>Warm welcome</h2>
					<p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane.</p>
					<a href='#' class='da-link'>Read more</a>
					<div class='da-img'><img data-src='images/1.png' src='images/loading45.gif' alt='image01' /></div>
				</div>
				<div class='da-slide'>
					<h2 >Quality Control</h2>
					<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
					<a href='#' class='da-link'>Read more</a>
					<div class='da-img'><img data-src='images/4.png' src='images/loading45.gif' alt='image01' /></div>
				</div>
				<nav class='da-arrows'>
					<span class='da-arrows-prev'></span>
					<span class='da-arrows-next'></span>
				</nav>
			</div>
		<script type='text/javascript' src='js/jquery.cslider.js'></script>
		<script type='text/javascript'>
			$(function() {
				$('#da-slider').cslider({
					autoplay	: true,
					bgincrement	: 450
				});
			});
		</script>
</fieldset>
</div><br/></p>
</fieldset></td>
<td  align='center' style='margin-left:20px;'> <div style='height:80px;'  border='ridge'>
<div id='shadow' class='drop-shadow curved curved-hz-2' style='height:auto;width:auto;margin-top:-28px;display:none;'>
<br/><br/>

<!--				LOgin HTML Structure				-->

<div  class='login' id='login' style='width:350px;margin-left:0px;' align='center' >
<fieldset style='margin-right:0px;'><br/>

<form method='post' id='Login-Form' action='login.php' >
Username....<input title='Write the username you Entered during signup' type='text' maxlength='50' class='validate[required,custom[onlyLetterNumber]] text-input' id='userlg' name='userlg'
value='$user' /><hr />
Password....<input type='password' title='Write the password you Entered during signup' maxlength='50' class='validate[required,custom[onlyLetterNumber],ajax[ajaxNameCallPhp]] text-input' name='passlg' id='passlg'  
value='$pass' />
<input align='right' type='submit'  id='logbtn'  class='defb' value='Login..'/>
<span id='log-error' style='margin-left:-30px;'></span>
</form>

</fieldset>

</div>
</div>
</div></td>
</tr></table>";

echo<<<_END
<script>

$('#logbtn').click(function() {
document.getElementById('log-error').innerHTML='<b class="ud3btn" style="display:block;"><img src="images/slick_image/image_475247.gif" height="22px"/>Signing In......!!<img src="images/slick_image/image_475247.gif" height="22px"/></b>';
});
</script>
_END;
//image_475258.gif
////"document.profile.submit_status.value = 'submitting...';"
//					sign-up HTML structure					//
	echo "
	<div id='shadow' class='drop-shadow curved curved-hz-2' style='height:100%;width:auto;padding:40px;display:none;'>
<fieldset id='signup' class='iner' style='margin:-1.5px;'>
	<div class='logform' id='logform' align='center'>
		<h1>Signup to <b class='ud3btn'> Socio-Nova</b></h1>

	<form method='post' action='signup.php' id='Signup-Form'>
		<span><h3><fieldset class='iner' style='margin:-5px;text-align:center !important;'>Welcome..TO..SocialNova</fieldset></span></h3>
	<p align='left'>
		<div class='user' align='left' ><input title='Choose a Username for your Account'  type='text' maxlength='30' name='user' value='$user' class='validate[required,custom[onlyLetterNumber],maxSize[20],ajax[ajaxUserCallPhp],maxSize[20]] text-input' id='user' placeholder='Username' onBlur='checkUser(this)'/><ul><li><span id='info'>
		<b style='color:rgb(67,123,138);'>Choose a unique username..<br/>to distinguish your profile..!!</b></span></li></ul></div>
	</p>
		<p >
	<label><span></span>	 <input title='Choose a password to protect your Account' type='password' maxlength='30' name='pass' id='password'
value='$pass' class='validate[required,maxSize[15]] text-input' placeholder=' Password' onblur='passwordStrength(this.value) text-input'/>
		</label><label>
		 <input placeholder='Retype the password' title='Retype the password to Verify ' type='password' maxlength='30' name='pass1' class='validate[required,equals[password]] text-input' id='password2'
value='$pass1'/></label>
		 </p>
		 <p>
		 <input placeholder='John'  class='validate[required,custom[onlyLetterSp]] text-input' title='Enter Your First Name' type='text' maxlength='20' name='fname'
value='$fname' />  <input placeholder='Carter' class='validate[required,custom[onlyLetterSp2]] text-input' title='Enter Your Last Name' type='text' maxlength='20' name='lname'
value='$lname' />
		</p>
	<p class='remember_me'>
		<label>
			<input type='checkbox' name='remember_me' id='remember_me'>
	Remember me on this computer
		</label>
	</p>
		<p class='submit'><input type='Submit' alter='Submit' name='Submit' value='Sign-up'/></p>
	&nbsp; &nbsp; &nbsp; &nbsp;<span id='sign-error'></span>
	 </form>
	</div>
	</fieldset>
	</div>";
	//					footer InFO					//

echo <<<_END
<script type='text/javascript'>

function replace(){

window.location.replace('rnprofile.php');
}
function datahandler(){
		if(data == 1)
		{
			document.getElementById('log-error').innerHTML = 'logged in';
			window.setTimeout('replace()',3000);
		}
		else
		document.getElementById('log-error').innerHTML = data;
}
	var frm = $('#Login-Form');
	frm.submit(function (){
		$.ajax({
			type: frm.attr('method'),
			url: frm.attr('action'),
			data: frm.serialize(),
			success: function (data) 
		{ 
		if(data == 1)
			{
	document.getElementById('log-error').innerHTML = '<b class="ud3btn" style="display:block;color:green;">Logged In successfully.....!!</b>';
	document.getElementById('passlg').innerHTML='';

	document.getElementById('userlg').innerHTML='';
			window.setTimeout('replace()',2000);
			}
		else
		document.getElementById('log-error').innerHTML = data;
		}
	});
	return false;
});
</script>

<script>
var frm1 = $('#Signup-Form');
	frm1.submit(function (){
		$.ajax({
			type: frm1.attr('method'),
			url: frm1.attr('action'),
			data: frm1.serialize(),
			success: function (data1) {
			document.getElementById('sign-error').innerHTML = data1;
			}
		});
	return false;
});
</script>
_END;
echo "</div><hr style='margin-top:0px;'/><br/><br/> ";
echo "</div></div>";
footer();
echo "</div> ";  
ob_end_flush();
?>