$(document).ready(function() {
	$("#reg").keyup(function (e) {
	
		//removes spaces from email
		$(this).val($(this).val().replace(/\s/g, ''));
		
		var email = $(this).val();
		if(email.length < 4){$("#user-result").html('');return;}
		
		if(email.length >= 4){
			$("#user-result").html('<img src="images/ajax-loader.gif" />');
			$.post('check_email.php', {'email':email}, function(data) {
			if(data =='yes')
				{
		     		 alert(data+'Success');
		      	}
		     	 else
		     	 {
		     		 alert(data+'Failed');
		     		 class="form-error"
		     	 }

                }

			});
		}
	});	
});
