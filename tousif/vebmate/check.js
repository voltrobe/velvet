$('#loginForm').submit(function(e){
$.post('process.php',function(){
});
e.preventDefault();
});

$( "#loginForm" ).on( "submit", function( event ) {
  event.preventDefault();
  $.ajax({
                type: 'post',
                url: 'process.php',
                data: $(this).serialize(),
      			success: function(data)
      			{ 
				if(data =='yes')
				{
		     		 document.getElementById("result").innerHTML = "Login Success.";
		     		 document.getElementById("result").className = "login-success";
		     		 document.getElementById("email").className = "";
                     document.getElementById("password").className = "";
		      	}
		     	 else
		     	 {
		     		 document.getElementById("result").innerHTML = "Incorrect username or password.";
		     		 document.getElementById("result").className = "login-error";
                     document.getElementById("email").className = "form-error";
                     document.getElementById("password").className = "form-error";
		     	 }

                }
       });
	
});
