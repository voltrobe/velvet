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
	               <li><a href="signup.php">Register</a></li>
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
						   <a href="signup.php"><button class="register">Register</button></a></h2>
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
      <h2>Login</h2><span id="close" class="close-reveal-modal">x</span><hr>

         <div class="col g-7">

            <!-- form -->
            <form style="margin:-20px 20px 20px 15px" name="login" id="loginForm" method="post" action="process.php">
					<fieldset>

                  <div>
						   <label>Email <span class="required">*</span></label>
						   <input id="email" name="email" type="text" required/>

						   
                  </div>

                  <div>
						   <label>Password <span class="required">*</span></label>
						   <input id="password" name="password" type="password" required/>
                  </div><span id="result"></span><br>

                  <div class="scale-with-grid">
                     <input type="submit" name="submit" id="submit" value="Login">&nbsp; <input style="margin-left:20px" type="reset" value="Clear"></div>
					</fieldset>
				</form> <!-- Form End -->
         </div>

      </div>

   </section> <!-- Contact Section End-->

	   </div><!-- Login End -->
	   
	    <!-- Login Popup
	   =========================================================== -->

   
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
   <script src="check.js"></script>
   <script type='text/javascript' src='js/jquery.min.js'></script>
   </body>

</html>