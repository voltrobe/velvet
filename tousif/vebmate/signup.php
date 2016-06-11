<!DOCTYPE html>
<style type="text/css">
.style1 {
	font-family: Arial;
}
.style2 {
	font-family: Arial;
	font-size: 80%;
}
</style>
<!--[if lt IE 8 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 8)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>


   <!--- Basic Page Needs
   ================================================== -->
	<meta charset="utf-8">
	<title>Vebmate</title>
	<meta name="description" content="">
	<meta name="author" content="">

   <!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS
   ================================================== -->
   <link rel="stylesheet" href="css/base.css">
	<link rel="stylesheet" href="css/layout.css">

	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

   <!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="favicon.ico" >


</head>

<body data-spy="scroll" data-target="#nav-wrap">


   <!-- Header
   ================================================== -->
   <header class="mobile">

      <div class="row">

         <div class="col full">

            <div class="logo">
               <a href="#"><img alt="" src="images/logo.png"></a>
            </div>

            <nav id="nav-wrap">

               <a class="mobile-btn" href="#nav-wrap" title="Show navigation">Show navigation</a>
	            <a class="mobile-btn" href="#" title="Hide navigation">Hide navigation</a>

               <ul id="nav" class="nav">
	               <li><a href="index.php">Home</a></li>
	               <li><a href="#">Login</a></li>
	               <li class="active"><a href="signup.php">Register</a></li>
	                <li><a href="#">Contact Us</a></li>
                  <li><a href="about.php">About Us</a></li>
               </ul>

            </nav>

         </div>

      </div>

   </header> <!-- Header End -->


   
   <!-- About Section
   ================================================== -->
   <section id="about">

      <div class="row section-head">

         <div class="col one-fourth">
            <h2>Sign up</h2>
            <p class="desc">Register and stay connected.</p>
		
		<div style="vertical-align:bottom"><br>
            <h5><a href="#">Already had an account</a></h5>
        </div><br>


         <div style="vertical-align:bottom"><br>
            <h4>Need Help?</h4>
            <p class="desc"><a href="#">Click here for help.</a></p>
        </div>
       		 <p class="desc"><a href="#">Report a problem.</a></p>
         </div>

         <div class="col three-fourths">
             	    <!-- Login Popup
	   =========================================================== -->

      <!-- Login -->
	   <div id="Register">

		       <!-- Login Section
   ============================================================= -->
   <section id="register">

      
      <div>

         <div >

            <!-- form -->
            <form style="margin:-20px 20px 20px 10px" id="reg" name="reg" method="post" onsubmit="return submit();" action="register.php">
					<fieldset>
					 <legend><p class="desc">Fields with * mark are required.</p></legend><hr>
						<span id="validationresult"></span>
					 <div>
						   <label >Name <span class="required">*</span></label>
						   <input name="name"  type="text" placeholder="First Name" required>
						   <input name="name" placeholder="Last Name" type="text">
   
                  </div>


                  <div>
						   <label>Email <span class="required">*</span></label>
						   <input id="email" name="email" size="55px" type="email" placeholder="Email Address" required/><span class="email_avail_result" id="email_avail_result"></span><br>

                  </div>

                  <div>
						   <label>Password <span class="required">*</span></label>
						   <input id="password" name="password" size="55px" type="password" placeholder="Password"  required/><span size="55px" class="password_strength" id="password_strength"></span>
                  </div>
                  <div>
						   <label>Confirm Password <span class="required">*</span></label>
						   <input id="passchk" name="password" size="55px" type="password" placeholder="Confirm Password"  required/><span id="passcheck"></span>
                  </div>
                  
                  <div>
						   <label>USN <span class="required">*</span></label>
						   <input name="usn" id="usn" size="55px" type="text" placeholder="Enter your usn"  required/><span id="usncheck"></span>
                  </div>
				  <div>
						   <label>Date of Birth  <span class="required">*</span></label>
						   <select class="select" id="day" name="Day" style="width: 55px; height: 30px" onchange="checkdob(this.value)">
			      <option value="">Day</option>
			      <?php
for($i=1; $i<= 31; $i++)
{
echo "<option value='$i'>$i</option>";
}
?>
			      </select>
			    <select class="select" id="month" name="month" style="width: 90px; height: 30px" onchange="checkdob(this.value)">
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
			    <select class="select" id="year" name="Year" style="height: 30px; width: 60px" onchange="checkdob(this.value)">
			      <option value="">Year</option>
			      <?php
for($i=1960; $i< 2011; $i++)
{
echo "<option value='$i'>$i</option>";
}
?>
		        </select>
					<span id="result"></span>
                  </div>
<label>Gender  <span class="required">*</span></label>
					<select class="select" id="gender" name="gender" style="width: 90px; height: 30px" onblur="checkgen(this.value)">
			      		<option value="">-- Select --</option>
			      		<option value="male">Male</option>
			      		<option value="female">Female</option>
			      		</select><span id="gencheck"></span>

                  <div style="margin:20px 0 0 0">
                     <input id="submit" type="submit" style="width:300px;" value="Register" onclick="validation()"></div>
					</fieldset>
				</form> <!-- Form End -->
<p style="margin-left:10px">By clicking register, you confirm that you have read and you agree our 
<a href="terms.php">terms and conditions</a>.</p>


         </div>

      </div>

   </section> <!-- Register Section End-->

	   </div><!-- Register End -->
         </div>

      </div>
      
   </section> <!-- About Section End-->

    
   <!-- footer
   ================================================== -->
   <footer>
<hr>
      <div class="row">

         <div class="col g-7">
            <ul class="copyright">
               <li>leafdust<span class="style2">®</span></li>
               <li><a>vebskool copyright<span class="style2"></span><span class="style1"> 
				2014.</span></a></li>
            </ul>
         </div>

         <div class="col g-5 pull-right">
            <ul class="social-links">
               <li><a href="#"><i class="icon-facebook"></i></a></li>
               <li><a href="#"><i class="icon-twitter"></i></a></li>
               <li><a href="#"><i class="icon-google-plus-sign"></i></a></li>
               <li><a href="#"><i class="icon-linkedin"></i></a></li>
               <li><a href="#"><i class="icon-skype"></i></a></li>
               <li><a href="#"><i class="icon-rss-sign"></i></a></li>
            </ul>
         </div>

      </div>

   </footer> <!-- Footer End-->

   <!-- Java Script
   ================================================== -->
   <script src="js/smoothscrolling.js"></script>
   <script src="js/jquery-1.9.0.min.js"></script>
   
<script type="text/javascript">
var ret3 = true;
$(document).ready(function(){
var ret = true;
var ret1 = true;
var ret2 = true;
var gen = document.getElementById('gender').value;
$('#reg').submit(function(e){
if (ret == false){
e.preventDefault();
document.getElementById('validationresult').innerHTML = "<b class='errorbox'>There are errors in the form submitted by you. Please correct them.</b>";
}
else if (ret1 == false){
e.preventDefault();
document.getElementById('validationresult').innerHTML = "<b class='errorbox'>There are errors in the form submitted by you. Please correct them.</b>";
}
else if (ret2 == false){
e.preventDefault();
document.getElementById('validationresult').innerHTML = "<b class='errorbox'>There are errors in the form submitted by you. Please correct them.</b>";
}
else if (ret3 == false){
e.preventDefault();
document.getElementById('validationresult').innerHTML = "<b class='errorbox'>There are errors in the form submitted by you. Please correct them.</b>";
}
//else if (gen == "none"){
//e.preventDefault();
//document.getElementById('validationresult').innerHTML = "<b class='errorbox'>There are errors in the form submitted by you. Please correct them.</b>";
//document.getElementById("gencheck").innerHTML = '<span class="error">Please select your gender.</span>';
//alert(gen+'Gender Value');
//}
else{
alert('submitted');
}
});

$('#passchk').keyup(function() { // As same using keyup function for get user action in input
var pass=document.getElementById('password').value;
var pass2=document.getElementById('passchk').value;
if(pass!==pass2){
document.getElementById('passcheck').innerHTML = "<b class='error'>Passwords do not Match</b>";
ret = false;
alert(ret+'Problem with sql query');
}
else{
document.getElementById('passcheck').innerHTML = "<b class='success'><img src='images/available.png'></b>";
ret = true;
}
});

$('#usn').blur(function()
		{
			var usn = document.getElementById("usn");
			var pos = usn.value.match(/^[1-4][a-zA-Z][a-zA-Z]\d{2}[a-zA-Z][a-zA-Z]\d{3}$/);
			 if(pos){
				document.getElementById('usncheck').innerHTML = "<b class='success'><img src='images/available.png'></b>";
				ret1 = true;
				}
			else
			{
				document.getElementById('usncheck').innerHTML = "<b class='error'>Please enter a valid USN.</b>";
				ret1 = false;

			}			
});



$('#email').keyup(function(){
var EmailAvailResult = $('#email_avail_result');
EmailAvailResult.html('<img style="margin:10px;" src="images/ajax-loader.gif" />');
});

	$('#email').blur(function(){ // Keyup function for check the user action in input
	var pattern = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/

		var Username = $(this).val(); // Get the username textbox using $(this) or you can use directly $('#username')
		var EmailAvailResult = $('#email_avail_result'); // Get the ID of the result where we gonna display the results                          
	
		if(pattern.test(Username)) { // check if greater than 2 (minimum 3)
			EmailAvailResult.html('<img style="margin:10px;" src="images/ajax-loader.gif" />'); // Preloader, use can use loading animation here
			var UrlToPass = 'username='+Username;
			$.ajax({ // Send the username val to another checker.php using Ajax in POST menthod
			type : 'POST',
			data : UrlToPass,
			url  : 'checker.php',
			success: function(responseText){ // Get the result and asign to each cases
				if(responseText == 0){
					EmailAvailResult.html('<span class="success"><img src="images/available.png" /></span>');
					ret2 = true;
				}
				else if(responseText == 1){
					EmailAvailResult.html('<span class="error">Email already exists.</span>');
					ret2 = false;
				}
				else{
					alert(responseText+'Problem with sql query');
				}
			}
			});
		}else{
			EmailAvailResult.html('<span class="error">Please Enter a Valid Email address.</span>');
			ret2 = false;
		}
		if(Username.length == 0) {
			EmailAvailResult.html('<span class="error">Please Enter an Email address</span>');
			ret2 = false;
		}
	});
	
	$('#password, #email').keydown(function(e) { // Dont allow users to enter spaces for their username and passwords
		if (e.which == 32) {
			return false;
  		}
	});
	$('#password').keyup(function() { // As same using keyup function for get user action in input
		var PasswordLength = $(this).val().length; // Get the password input using $(this)
		var PasswordStrength = $('#password_strength'); // Get the id of the password indicator display area
		
		if(PasswordLength <= 0) { // Check is less than 0
			PasswordStrength.html(''); // Empty the HTML
			PasswordStrength.removeClass('normal weak strong verystrong'); //Remove all the indicator classes
		}
		if(PasswordLength > 0 && PasswordLength < 4) { // If string length less than 4 add 'weak' class
			PasswordStrength.html('weak');
			PasswordStrength.removeClass('normal strong verystrong').addClass('weak');
		}
		if(PasswordLength > 4 && PasswordLength < 8) { // If string length greater than 4 and less than 8 add 'normal' class
			PasswordStrength.html('Normal');
			PasswordStrength.removeClass('weak strong verystrong').addClass('normal');			
		}	
		if(PasswordLength >= 8 && PasswordLength < 12) { // If string length greater than 8 and less than 12 add 'strong' class
			PasswordStrength.html('Strong');
			PasswordStrength.removeClass('weak normal verystrong').addClass('strong');
		}
		if(PasswordLength >= 12) { // If string length greater than 12 add 'verystrong' class
			PasswordStrength.html('Very Strong');
			PasswordStrength.removeClass('weak normal strong').addClass('verystrong');
		}

	});
	
});

function checkgen() {
                        var gender = document.getElementById('gender').value;

							
                        if (gender == "") 
                        {
                            document.getElementById("gencheck").innerHTML = '<span class="error">Please select your gender.</span>';
                            document.getElementById('validationresult').innerHTML = "<b class='errorbox'>There are errors in the form submitted by you. Please correct them.</b>";
                            ret3 = false;
                        } 
                        else {

                            document.getElementById("gencheck").innerHTML = '<span class="success"><img src="images/available.png" /></span>';
                        	ret3 = true;
                        }

                    }
function validation() {
	checkgen();
	}
</script>
</body>

</html>