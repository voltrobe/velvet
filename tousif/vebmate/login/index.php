<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="jquery.js"></script>
<link rel="stylesheet" href="styles.css" type="text/css" />
<title>Popup Login</title>
<script type="text/javascript">
$(document).ready(function(){
	$("#login_a").click(function(){
        $("#shadow").fadeIn("normal");
         $("#login_form").fadeIn("normal");
         $("#user_name").focus();
    });
	$("#cancel_hide").click(function(){
        $("#login_form").fadeOut("normal");
        $("#shadow").fadeOut();
   });
   $("#login").click(function(){
    
        username=$("#user_name").val();
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
</head>
<body>
<?php session_start(); ?>
	<div id="profile">
    	<?php if(isset($_SESSION['user_name'])){
			?>
			<a href='logout.php' id='logout'>Logout</a>
		<?php }else {?>
		<a id="login_a" href="#">login</a>
        <?php } ?>
	</div>
    <div id="login_form">
        <div class="err" id="add_err"></div>
    	<form action="login.php">
			<label>User Name:</label>
			<input type="text" id="user_name" name="user_name" />
			<label>Password:</label>
			<input type="password" id="password" name="password" />
			<label></label><br/>
			<input type="submit" id="login" value="Login" />
			<input type="button" id="cancel_hide" value="Cancel" />
		</form>
    </div>
	<div id="shadow" class="popup"></div>
</body>
</html>