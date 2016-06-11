$(document).ready(function() {
	$("#email").keyup(function (e) {
	
		//removes spaces from username
		$(this).val($(this).val().replace(/\s/g, ''));
		
		var username = $(this).val();
		if(username.length < 4){$("#user-result").html('');return;}
		
		if(username.length >= 4){
			$("#user-result").html('<img src="images/ajax-loader.gif" />');
			$.post('check_email.php', {'email':email}, function(data) {
			  $("#user-result").html(data);
			  alert(data+'Failed');
			});
		}
	});	
});
