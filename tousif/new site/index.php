<!DOCTYPE html>
<html lang="en">
<head>
	<title>SocialNova</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/grid.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all">



</head>
<link rel="shortcut icon" href="images/icon.gif">
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
	<section id="content">
		<div class="top">
			<div class="container">
				<div class="clearfix">
					<section id="gallery">
						<div class="pics">

							<?php include("slide.php");?>	
						</div>
						<?php include("style.php");?>
						
					</section>
					<section id="intro">
						<div class="inner">
							<h2>Create an account<hr></h2>
<div class='signup-form' >
<span id='sign-error'></span>
<div role="alert" class="error-msg" id="error-msg-email">
<?php 
if(isset($_SESSION['emailtaken'])) { 
echo $_SESSION['emailtaken'];
unset($_SESSION['emailtaken']); 
}
?>
</div>
<form method='POST' id='signup-form' action='register/signup_ac.php'>
		<input type='text' id="name" name='name' style='width:205;height:50px;' placeholder='Your First Name' required onblur="check(this.value)"/><span id="check"></span>
		<input type='text' id="lname" name='lname' style='width:205;height:50px;' placeholder='Your Last Name' required onblur="check1(this.value)"/><span id="check1"></span>
		
		<input id="email" type='email' name='email' style='width:205;height:50px;' placeholder='Your Email ID' onkeyup="reload(this.value)" onblur="checkfields(this.value)" required><span id="reload"></span><span id="emailerror"></span>
		
		
		<input type='password' name='password' id='pass' style='width:205;height:50px;' placeholder='Password' required onkeyup="passwordStrength(this.value)"/><span id="passwordDescription"></span> 
			

		<input type='password' name='passchk' id='passchk' style='width:205;height:50px;' placeholder='Retype Password' required onkeyup="passwordcheck(this.value)"/><span id="error"></span>
			    
		<div>
		<label class="label">Date Of Birth</label> <br />
			    &nbsp;
			    <select class="select" id="day" name="Day" style="width: 55px; height: 30px" onchange="checkdob(this.value)">
			      <option value="">Day</option>
			      <?php
for($i=1; $i<= 31; $i++)
{
echo "<option value='$i'>$i</option>";
}
?>
			      </select>
			    <select class="select" id="month" name="month" style="width: 110px; height: 30px" onchange="checkdob(this.value)">
			      <option value="">Month</option>
			      <option value="01">January</option>
			      <option value="02">February</option>
			      <option value="03">March</option>
			      <option value="04">April</option>
			      <option value="05">May</option>
			      <option value="06">June</option>
			      <option value="07">July</option>
			      <option value="08">August</option>
			      <option value="09">September</option>
			      <option value="10">October</option>
			      <option value="11">November</option>
			      <option value="12">December</option>
			      </select>
			    <select class="select" id="year" name="Year" style="height: 30px; width: 65px" onchange="checkdob(this.value)">
			      <option value="">Year</option>
			      <?php
for($i=1970; $i< 2011; $i++)
{
echo "<option value='$i'>$i</option>";
}
?>
		        </select>
		        <span id="doberror"></span>
		        </div>

		<div><br/>
		<label class="label">Gender:</label> 
		<span class="radio">
		<input id="radio1" name="gender" class="select" type="radio" value="male" checked="checked">
		<label class="radiolabel">Male</label></span>
		&nbsp;<span class="radio"><input name="gender" id="radio2" type="radio" value="female"><label class="radiolabel">Female</label>
		</span></div>
<br />
&nbsp;&nbsp;<input type="submit" name="submit" value="Register" onclick="checkdob('day');checkall();"><br />
	<span id='log-error' style='margin-left:0px;'></span>
	</form>
<hr>
<div class="terms">
By clicking register, you confirm that you have read and agree our 
<a href="terms.php">terms and conditions</a>.
</div>


</div>
					
						</div>
					</section>
				</div>
			</div>
		</div>
				
<?php
include("formvalidator.php");
include("footer.php");
?>

</body>
</html>
