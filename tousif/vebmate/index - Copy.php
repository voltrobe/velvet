<!DOCTYPE html>
<!--[if lt IE 8 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 8)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>


   <!--- Basic Page Needs
   ================================================== -->
	<meta charset="utf-8">
	<title>Vebmate.com</title>
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
		<script src="html5.js"></script>
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
	               <li class="active"><a href="index.php">Home</a></li>
	               <li><a href="#">Login</a></li>
	               <li><a href="#">Register</a></li>
	                <li><a href="#">Contact Us</a></li>
                  <li><a href="about.php">About Us</a></li>
               </ul>

            </nav>

         </div>

      </div>

   </header> <!-- Header End -->


   <!-- Intro Section
   ================================================== -->
   <section id="intro">

      <!-- Flexslider Start-->
	   <div id="intro-slider" class="flexslider">

		   <ul class="slides">

			   <!-- Slide -->
			   <li>
				   <div class="row">
					   <div class="col full">
						   <div class="slider-text">
						   <h2>Welcome to <a href="#portfolio" title="">Vebmate.</a></h2>
						   <h3>A social networking site created especially for students..</h3>
						   <h2><a href="#" data-reveal-id="Login"><button class="login">Login</button></a>
						   <a href="#" data-reveal-id="Register"><button class="register">Register</button></a></h2>
							   <h2>and stay connected always!!!</h2>
						   </div>
					   </div>
				   </div>
			   </li>

            <!-- Slide -->
			   <li>
				   <div class="row">
					   <div class="col full">
						   <div class="slider-text">   
                        

						   </div>
					   </div>
				   </div>
			   </li>

		   </ul>
	   </div>
	   <!-- Flexslider End-->

   </section> <!-- Intro Section End-->   
   
       <!-- Login Popup
	   =========================================================== -->

      <!-- Login -->
	   <div id="Login" class="reveal-modal">

		       <!-- Login Section
   ============================================================= -->
   <section id="login">

      
      <div class="row">
      <h2>Login</h2><hr>

         <div class="col g-7">

            <!-- form -->
            <form style="margin:-20px 20px 20px 20px" name="login" id="loginForm" method="post" action="validatelogin.php">
					<fieldset>

                  <div>
						   <label>Email <span class="required">*</span></label>
						   <input name="email" size="55px" type="text" required/>

						   
                  </div>

                  <div>
						   <label>Password <span class="required">*</span></label>
						   <input name="password" size="55px" type="password" required/>
                  </div>

                  <div class="scale-with-grid">
                     <input type="submit" value="Login">&nbsp; <input type="reset" value="Clear"></div>
                     <span id="image-loader">
                        <img src="images/loader.gif" alt="" />
                     </span>
					</fieldset>
				</form> <!-- Form End -->

            <!-- contact-warning -->
            <div id="message-warning"><span style="color:red"><?php 
											session_start();
											if(isset($_SESSION['error'])) { 
											echo $_SESSION['error'];
											unset($_SESSION['error']); 
											}
											?>
									</span>
</div>
            <!-- contact-success -->
				<div id="message-success">
               <i class="icon-ok"></i>Your message was sent, thank you!<br />
				</div>

         </div>

      </div>

   </section> <!-- Contact Section End-->

	   </div><!-- Login End -->
	   
	    <!-- Login Popup
	   =========================================================== -->

      <!-- Login -->
	   <div id="Register" class="reveal-modal">

		       <!-- Login Section
   ============================================================= -->
   <section id="Register">

      
      <div class="row">
      <h2>Register</h2><hr>

         <div class="col g-7">

            <!-- form -->
            <form style="margin:-20px 20px 20px 20px" name="Register" id="RegisterForm" method="post" action="Register.php">
					<fieldset>
					 
					 <div>
						   <label >Name <span class="required">*</span></label>
						   <input name="name" size="55px" type="text" required/>
						   
                  </div>


                  <div>
						   <label>Email <span class="required">*</span></label>
						   <input name="email" size="55px" type="text" required/>
                  </div>

                  <div>
						   <label>Password <span class="required">*</span></label>
						   <input name="password" size="55px" type="password" required/>
                  </div>
                  <div>
						   <label>Confirm Password <span class="required">*</span></label>
						   <input name="password" size="55px" type="password" required/>
                  </div>


                  <div class="scale-with-grid">
                     <input type="submit" value="Login">&nbsp; <input type="reset" value="Clear"></div>
                     <span id="image-loader">
                        <img src="images/loader.gif" alt="" />
                     </span>
					</fieldset>
				</form> <!-- Form End -->

            <!-- contact-warning -->
            <div id="message-warning"><span style="color:red"><?php 
											session_start();
											if(isset($_SESSION['error'])) { 
											echo $_SESSION['error'];
											unset($_SESSION['error']); 
											}
											?>
									</span>
</div>
            <!-- contact-success -->
				<div id="message-success">
               <i class="icon-ok"></i>Your message was sent, thank you!<br />
				</div>

         </div>

      </div>

   </section> <!-- Register Section End-->

	   </div><!-- Register End -->

<script type="text/javascript">
$(document).ready(function(){
	
   $("#login").click(function(){
    
        email=$("#email").val();
        password=$("#password").val();
         $.ajax({
            type: "POST",
            url: "login.php",
            data: "name="+username+"&pwd="+password,
            success: function(html){
              if(html=='true')
              {
                $("#login_form").fadeOut("normal");
				$("#shadow").fadeOut();
				$("#profile").html("<a href='logout.php' id='logout'>Logout</a>");
				
              }
              else
              {
                    $("#add_err").html("Wrong username or password");
              }
            },
            beforeSend:function()
			{
                 $("#add_err").html("Loading...")
            }
        });
         return false;
    });
});
</script>


   
   <!-- footer
   ================================================== -->
   <footer>
      <div class="row">

         <div class="col g-7">
            <ul class="copyright">
               <li>leafdust<span class="style2">®</span></li>
               <li><a>vebmate copyright<span class="style2"></span><span class="style1"> 
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
   <script src="js/jquery/1.10.2/jquery.min.js"></script>
   <script>window.jQuery || document.write('<script src="js/jquery-1.10.2.min.js"><\/script>')</script>
   <script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script>
   

   <script src="js/jquery.reveal.js"></script>
</body>

</html>