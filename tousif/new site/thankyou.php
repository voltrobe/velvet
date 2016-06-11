<!DOCTYPE html>
<html lang="en">
<head>
	<title>SocialNova</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/grid.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
<style type="text/css">
.style1 {
padding-top:50px; 
font-size:36px;
line-height:30px;
color:#f24c15;
font-weight:normal;
font-family:'ColaborateRegular';
font-weight:normal;
}
.link {
padding-top:30px; 
font-size:16px;
line-height:30px;
color:#f24c15;
font-weight:normal;
font-family:'ColaborateRegular';
font-weight:normal;
}

.style4 {
	color: #97BC4A;
	background:url(images/tick_icon.gif) no-repeat;
	padding :0 0 0 35px;
}

.style5 {
	font-size: 20px;
	color: #4f4f4f;
	line-height: 30px;
	font-family: 'Open Sans', arial;
	font-weight: normal;
	margin-bottom: 25px;
	padding-left: 40px;
	padding-top: 10px;
	text-align: center;
	margin-left: 5px;
	margin-right: 5px;
	margin-top: 5px;
}
.style7 {
	margin: 5px;
	font-size: 20px;
	color: #4f4f4f;
	line-height: 30px;
	font-family: 'Open Sans', arial;
	font-weight: bold;
	padding-top: 20px;
	text-align: center;
}


.style8 {
	padding-top: 30px;
	font-size: 16px;
	line-height: 30px;
	color: #f24c15;
	font-weight: normal;
	font-family: 'ColaborateRegular';
	font-weight: normal;
	text-align: center;
}
.style9 {
	margin: 5px;
	font-size: 20px;
	color: #4f4f4f;
	line-height: 30px;
	font-family: 'Open Sans', arial;
	font-weight: normal;
	padding-left: 40px;
	padding-top: 20px;
	text-align: center;
}
.style10 {
	color: #FF0000;
	background:url(images/error_icon.png) no-repeat;
	padding :10px 0 0 40px;

}


</style>
</head>

<body>
	<header>
		<nav>
			<div class="container" style="left: 0px; top: 0px; height: 46px">
				<div class="wrapper">
					<a href="index.php">
					<span class="logo"></span></a>
					
				</div>
			</div>
		</nav>
		<section class="adv-content">
			<div class="container">
			<form method="post" action="validatelogin.php" id="login-form" style="left: -20px; top: 0px">
<div role="alert" class="error-msg" id="error-msg">
<?php 
session_start();
if(isset($_SESSION['error'])) { 
echo $_SESSION['error'];
unset($_SESSION['error']); 
}
?>
</div>
<input id="loginemail" name="loginemail" type="email" placeholder="Email" spellcheck="false" required>
<input id="loginpasswd" name="loginpasswd" type="password" placeholder="Password" class="form-error" required>&nbsp;<input id="signIn" name="signIn" type="submit" value="Login"><br />
&nbsp;<input type="checkbox" value="yes" checked="checked"> <span>Remember me.</span><span class="forgot"><a href="forgot.php">Forgot your password?</a></span>
</form>
<span class="stay_connected"></span>
</div>
		
		</section>
	</header>
	<?php
	$id=$_GET['id'];
	if($id=='verification'){
	echo"<style type='text/css'>#activated{display:none;}></style>";
	echo"<style type='text/css'>#failed{display:none;}></style>";
	}
	else if($id=='activated'){
	echo"<style type='text/css'>#verification{display:none;}></style>";
	echo"<style type='text/css'>#failed{display:none;}></style>";
	}
	else{
	echo"<style type='text/css'>#activated{display:none;}></style>";
	echo"<style type='text/css'>#verification{display:none;}></style>";
	}
	?>
	
	<section id="content">
		<div class="top">
		<span id="verification">
			<div class="container">
			<span class="style1">&nbsp;&nbsp; Thank you for Your Registration</span>
			<span><hr></span>
			<div class="style9"><b>Thank you for registering with socialnova. </b></div>
				<div class="style5" style="width: 920px; height: 90px;">
Your account has been created and a verification email
has been sent to your registered email address. Please click on the verification link included in the
email to activate your account.
Your account will not be activated until you verify your email address.

<div class="style8"><hr>Having trouble accessing your account? 
	<a href="support.php">Please contact Online Customer Support.</a></div>
			</div>		
		</div>
	</span>
	
	

		<span id="activated">
			<div class="container">
			<span class="style1">&nbsp;&nbsp; Thank you for Your Registration</span>
			<span><hr></span>
			<div class="style7">Thank you for registering with socialnova. </div>
				<div class="style5" style="width: 920px; height: 90px;">
<span class="style4">Your account has been successfully activated.</span><br>
<br>
<a href="../site/index.php">Click Here</a> to login to your account. <br>


<div class="link"><hr>Having trouble accessing your account? 
	<a href="support.php">Please contact Online Customer Support.</a></div>
			</div>		
		</div>
	</span>
	
	
	<span id="failed">
			<div class="container">
			<span class="style1">&nbsp;&nbsp; oops something went worng!!!</span>
			<span><hr></span>
			<div class="style9"><b><br>
				There was an error while activating your account. </b></div>
				<div class="style5" style="width: 920px; height: 90px;">
<div class="aligncenter">
	<span class="style10">You seemed to be have registered with wrong email.
	<br>
	<br>
	Sorry no users found with that email address.</span> </div>
<br /><br /><hr>If you are new to this site then <a href="../site/index.php">Click Here</a> to register. <br>
<div class="style8">Having trouble accessing your account? 
	<a href="support.php">Please contact Online Customer Support.</a></div>
			</div>		
		</div>
	</span>

	  </div>
	</section>
					
<?php
include("footer.php");
include("style.php");
?>
</body>
</html>