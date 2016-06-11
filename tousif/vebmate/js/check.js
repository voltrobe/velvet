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
		     		 alert(data+'Success');
		      	}
		     	 else
		     	 {
		     		 alert(data+'Failed');
		     		 class="form-error"
		     	 }

                }
       });
	
});
