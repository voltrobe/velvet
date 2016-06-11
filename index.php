<?php
require_once('online.php');
if($loggedin)
header('Location: rnmembers.php?view='.$user);?>
<html>
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<title>SocialNova ,a Social Networking Site</title>
	<meta name="description" content="Social Networking Media, conNnecting peoPle" />
	<meta name="keywords" content="css-only, Socialnetwork, Socialmedia, social, html5, creative, innovative, socialplateform, meet, people, join, world, connect" />
	<meta name="author" content="WaveCorp" />
	<link href="NOvaCube/css/style2.css" type="text/css" rel="stylesheet" media="screen" />
	<link href="NOvaCube/css/style1.css" type="text/css" rel="stylesheet" media="screen" />
	<link rel="stylesheet" href="NOvaCube/css/themes/default/default.css" type="text/css" media="screen" />
	<link rel="prefetch" href="script.css"  />  <!--moz-->
	<link rel="prerender" href="script.css"  /> <!--Chrome-->
	<!-- <link rel="stylesheet" href="NOvaCube/css/nivo-slider.css" type="text/css" media="screen" />

	<!-- Css Loading Animation  -->
	<link rel="stylesheet" type="text/css" href='css/pose.css' />
	<!-- Css+Jquery 3D Loading Animation  -->
	<link rel="stylesheet" type="text/css" href='css/3dloadcomponent.css' />
	<script type="text/javascript" src="js/modernizr.custom.3dload.js"></script>
</head>
<body onload='shoanim()'>

<div style='display:none;' id='slideshow' class='slideshow'>
<center >
<img id='logo' src='images/logo.png' />
<br/><br/><br/><br/><br/>
<div></div>

</center>
<div class="la-anim-5"></div>
</div>
	<ul class="bokeh">
		<li></li>
		<li></li>
		<li></li>
		<li></li>
	</ul>
<font class='f1'>S0cial NoVa</font>
<div class='div1'></div>
<div class='div2'></div>
<div class='div2'></div>
<div class='div3'></div>
<div class='div4'></div>
<div class='div4'></div>
<div class='div4'></div>

<div class='logsign'>
<div style='margin-left:120px;'>
<!-- <input id='chk' value='1' type='checkbox' checked='checked' /> -->
<p align='center'><input id='button1'  style='width:90%;display:block;font-size:18;' value='SIgN Up..!!'  type='button'  /></p>

<div id='signup' class='hide'>
<form method='post' id='Signup-Form' action='signup.php'>
<p align='center'>		<input type='text' name='user' placeholder='Username' required='required'/>
		<input type='email' name='email'  placeholder='Your Email ID' ><br>
	<input type='text' name='fname'  placeholder='Your First Name' required='required'/>
	<input type='text' name='lname'  placeholder='Your Last Name' required='required'/><br/>
		<input type='password' name='pass' id='pass' placeholder='Choose a Password' required='required'/>
		<input type='password' name='passchk' id='passchk' placeholder='RETYPE It..!!' required='required'/><br>

	<br/>
	<input type='submit' id='submitsign' style='width:60%;display:block;font-size:15;' value='submit' />
	<span id='sign-error' style='margin-left:0px;'></span>
</p>
</form>
</div>	<!-- SignUp Form-->
<div id='login' ><br/>
	<div id='divpass' class='hide'>
		<form method='post' id='Forgot-Form' action='passforgot.php'>
			<table><tr><td >
				<b class='ud1btn'>Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
				<input type='email' id='emailfgt' name='emailfgt' style='width:250;height:50px;' placeholder='Your Registered Email' ><br/><br/>
				</td></tr><tr><td>
				<b class='ud1btn'>Username</b>
				<input type='text' id='userfgt' name='userfgt' style='width:250;height:50px;' placeholder='Your unique Username' required><br/>
				</td></tr>
			</table>
			<p align='center'>
				<input type='submit' id='submitfgt' style='width:60%;display:block;font-size:15;' value='submit'/>
				<span id='fgt-error'  style='margin-left:0px;'><a href='#' class='ud1btn' id="forgot"><small><br/>Got to know The password...?</a></span>
			</p>
		</form>
	</div>
	<div id='divlog'>
		<form method='post' id='Login-Form' action='login.php'>
		<b class='ud1btn'>UserName</b>
		<input type='text' id='userlg' name='userlg' style='width:250;height:50px;' placeholder='Your unique Username' ><br/><br/>
		<b class='ud1btn'>PassWord</b>
		<input type='password' id='passlg' name='passlg' style='width:250;height:50px;' placeholder='Your unique Password' required>
		<a href="#" class='ud1btn' id="forgot"><small>Forgot..?</small></a><br/>
		<p align='center'>
		<input type='submit' id='submitlog' style='width:60%;display:block;font-size:15;' value='submit'/>
		<span id='log-error' style='margin-left:0px;'>  </span>
		</p>
		</form><br/>
	</div>
</div> <!-- Login Form-->

</div>
</div>

<script >
function shoanim(){
var anim = $('#slideshow');
//var inProgress = false;
var animEl = document.querySelector('.la-anim-5');
anim.show();
classie.add( animEl, 'la-animate' );
}
</script>

<script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>

<script type="text/javascript" src="js/classie.js"></script>
<script type="text/javascript">
$.ajaxSetup({ cache: true });
function loadjs(){ 
/*		$.getScript('NOvaCube/js/jquery.nivo.slider.min.js',function(data1){console.log('data1');
	*/
	$.getScript('js/modernizr.custom.63321.loading.js',function(data3){console.log('data3');
		//$('#slider').nivoSlider();
	});
$('.slideshow').hide();
}
</script>
<script type="text/javascript">
$(document).ready(function(){
window.setTimeout('loadjs()',3000);
function new2site(){
document.getElementById('button1').value='New To this Site...??';
}
//.......................Sliding MEthod -I for login/signup..................//
var j=0;
$('#button1').click(function(){
if((j%2)==0){
//$('#text').value=text;
$('#signup').slideDown('slow');
$('#login').slideUp('slow');
document.getElementById('button1').value='Already Had An account...!!';
++j;
}
else{
//$('#textarea').value=txtarea;
$('#login').slideDown('slow');
$('#signup').slideUp('slow');
new2site();
++j;
}
});
//.......................Sliding MEthod -II for Pass-Forgot..................//
	var i=0;
	$('a#forgot').click(function(){
		if((i%2)==0){
				//intially i=0
			$('#divpass').slideDown('slow');
			$('#divlog').slideUp('slow');
			document.getElementById('button1').value='!!..Password Recovery..!!';
			//document.getElementById('button1').attr('disabled')='disabled';
			++i;
		}
		else{		//2-step becomes i=1
			$('#divlog').slideDown('slow');
			$('#divpass').slideUp('slow');
			document.getElementById('button1').value='Still Confused ,What to do..??';
			window.setTimeout('new2site()',2000);
			++i;
			}
		});

});			// document.ready Close
</script>

<!-- ................Dont modify These Codes..,Meant for PhP-AJaX Log-In ..........-->
<script type='text/javascript'>
function replace(){
window.location.replace('rnprofile.php');
}
function blank(){
	document.getElementById('log-error').innerHTML = "";
	document.getElementById('submitlog').innerHTML = "submit";
}
	var frm1 = $('#Login-Form');
	frm1.submit(function (){
	//if( ($('#userlg').value !=0) || ($('#passlg').value != 0) ){
	document.getElementById('log-error').innerHTML = "<b class='ud3btn'><img src='images/image_482926.gif' height='10px'/>!!......Logging-In.....!!<img src='images/image_482926.gif' height='10px'/></b>";
		
		$.ajax({
			type: frm1.attr('method'),
			url: frm1.attr('action'),
			data: frm1.serialize(),
			success: function (data) 
			{
		if(data == 1)
			{
	document.getElementById('log-error').innerHTML = '<br/><b class="ud3btn" style="display:block;color:green;">Logged In successfully.....!!</b>';
		document.getElementById('submitlog').innerHTML = "submit";
			window.setTimeout('replace()',3000);
			}
		else
		document.getElementById('log-error').innerHTML = data;
		document.getElementById('submitlog').innerHTML = "submit";
			}
		});
	//}
	setTimeout("blank()",5000);
	return false;
});
</script>
	
	<!-- ................Dont modify These Codes..,Meant for PhP-AJaX PassForgot ..........-->
<script type='text/javascript'>
		function blankfgt(){
			document.getElementById('fgt-error').innerHTML = "<a href='#' class='ud1btn' id='forgot'><small><br/>Got to know The password...?</small></a>";
			document.getElementById('submitfgt').innerHTML = "submit";
		}
	var frm2 = $('#Forgot-Form');
		frm2.submit(function (){
			if( ($('#userfgt').value !=0) || ($('#passfgt').value != 0) ){
				document.getElementById('fgt-error').innerHTML = "<b class='ud3btn'><img src='images/image_482926.gif' height='10px'/>!!......Evaluating.....!!<img src='images/image_482926.gif' height='10px'/></b>";
				
				$.ajax({
					type: frm2.attr('method'),
					url: frm2.attr('action'),
					data: frm2.serialize(),
					success: function (data) 
					{
						if(data == 1)
						{
							document.getElementById('fgt-error').innerHTML = '<b class="ud3btn" style="display:block;color:green;">Email has been sent, containing your password..!!</b>';
							document.getElementById('submitfgt').innerHTML = "submit";
						}
						else
						document.getElementById('fgt-error').innerHTML = data;
						document.getElementById('submitfgt').innerHTML = "submit";
					}
				});
			}
			setTimeout("blankfgt()",5000);
			return false;
		});
</script>
<!-- ................Dont modify These Codes..,Meant for PhP-AJaX Sign-up ..........-->
<script>
	function empty(){
		document.getElementById('sign-error').innerHTML = "";
		document.getElementById('submitsign').innerHTML = "submit";
	}
var frm3 = $('#Signup-Form');
	frm3.submit(function (){
var pass=document.getElementById('pass').value;
var pass2=document.getElementById('passchk').value;
		if(pass!=pass2)
document.getElementById('sign-error').innerHTML = "<b style='color:red;' class='ud3btn'>Password Do Not Match</b>";
else{
	document.getElementById('sign-error').innerHTML = "<b class='ud3btn'><img src='images/image_482926.gif' height='10px'/>!!......Signing-In......!!<img src='images/image_482926.gif' height='10px'/></b>";
	
		$.ajax({
			type: frm3.attr('method'),
			url: frm3.attr('action'),
			data: frm3.serialize(),
			success: function (data1) {
			document.getElementById('sign-error').innerHTML = data1;
			document.getElementById('submitsign').innerHTML = "submit";
			}
		});
	}
	setTimeout("empty()",5000);
	return false;
}); 
</script>
<!-- ................Dont modify These Codes..,Meant for PhP-AJaX Sign-up ..........-->
</body>
</html>