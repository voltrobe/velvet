<script>
function checkall()
{
	check();
	check1();
	passwordStrength();
	passwordcheck();
	reload();
}

</script>

<script>
function check(name) {
                    var ret = true;

/*-----------------name-------------------------------------*/
                    var name;
                    
                        name = document.getElementById('name').value;
						
                        if (name == null || name == '') {
                            document.getElementById("check").innerHTML = "<b style='color:red;' class='error'>Please Enter the name.</b>";
                            
                            ret = false;
                        }
                            else {
                                
                                document.getElementById("check").innerHTML = "<b style='color:green;' class='errorcorrect'></b>";
                            }
                        }
                  
                    


</script>
<script>
function check1(lname) {
                    var ret = true;

/*-----------------lname-------------------------------------*/
                    var lname;
                    
                        lname = document.getElementById('lname').value;
						
                        if (lname == null || lname == '') {
                            document.getElementById("check1").innerHTML = "<b style='color:red;' class='error'>Please Enter the name.</b>";
                            
                            ret = false;
                        }
                            else {
                                
                                document.getElementById("check1").innerHTML = "<b style='color:green;' class='errorcorrect'></b>";
                            }
                        }
                  
                    


</script>



<script>
function passwordStrength(password)
{
	var desc = new Array();
	desc[0] = "Very Weak";
	desc[1] = "Weak";
	desc[2] = "Medium";
	desc[3] = "Medium";
	desc[4] = "Strong";
	desc[5] = "Strongest";

	var score   = 0;

	//if password bigger than 6 give 1 point
	if (password.length > 6) score++;

	//if password has both lower and uppercase characters give 1 point	
	if ( ( password.match(/[a-z]/) ) && ( password.match(/[A-Z]/) ) ) score++;

	//if password has at least one number give 1 point
	if (password.match(/\d+/)) score++;

	//if password has at least one special caracther give 1 point
	if ( password.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/) )	score++;

	//if password bigger than 12 give another 1 point
	if (password.length > 12) score++;

	 document.getElementById("passwordDescription").innerHTML = desc[score];
	 document.getElementById("passwordDescription").className = "strength" + score;
}
function passwordcheck(password)
{
var pass=document.getElementById('pass').value;
var pass2=document.getElementById('passchk').value;
if(pass!==pass2)
document.getElementById('error').innerHTML = "<b style='color:red;' class='error'>Passwords do not Match</b>";
else{
document.getElementById('error').innerHTML = "<b style='color:green;' class='errorcorrect'>Passwords Match</b>";
}
}

</script>



<script>
function reload(email)
{
document.getElementById("reload").className = "reload";
}


/*-----------------checkfields(val) starts-------------------------------------*/

                function checkfields(email) {
                    var ret = true;

/*-----------------email-------------------------------------*/
                    var email;
                    
                        email = document.getElementById('email').value;
						document.getElementById("reload").className = "reload1";
						
                        if (email == null || email == '') {
                            document.getElementById("emailerror").innerHTML = "<b style='color:red;' class='error'>Please Enter the Email.</b>";
                            
                            ret = false;
                        }
                        else {
                            var pattern = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/

                            if (!pattern.test(email)) {
                                document.getElementById("emailerror").innerHTML = "<b style='color:red;' class='error'>Invalid Email Id</b>";
                                ret = false;
                            }
                            else {
                                
                                document.getElementById("emailerror").innerHTML = "<b style='color:green;' class='errorcorrect'>Your Email Is Valid</b>";
                            	checkemail();
                            }
                        }
                  
                    }
                    
</script>
<script>
function checkemail(email) {
                        	$.get("http://localhost/new%20site/checkemail.php?email=" + email, function(result) {
                            if (result == "0") {
                            document.getElementById("emailerror").innerHTML = "<b style='color:red;' class='error'>Email Already Exists</b>";
                            emailpopup();
                            }
                            else if (result == "1") {
                            varExistemail=email;
                            document.getElementById("errstrEmail").innerHTML = "&nbsp;";
                            
         }
 }
 }                   

</script>

<script>

/*----------------------Date of Birth--------------------------------*/
                    
function checkdob() {
					var ret = true;
                    var dob,dob1,dob2;
                     	 dob = document.getElementById('day').value;
                         dob1 = document.getElementById('month').value;
                         dob2 = document.getElementById('year').value;

							
                        if (dob == null ||  dob == "") {

                            document.getElementById("doberror").innerHTML = "<b style='color:red;' class='doberror'>Day is required</b>";
                            ret = false;
                        } else if (dob1 == null || dob1 == "") {

                            document.getElementById("doberror").innerHTML = "<b style='color:red;' class='doberror'>Month is required</b>";

                            ret = false;
                        } else if (dob2 == null || dob2 == "") {

                            document.getElementById("doberror").innerHTML = "<b style='color:red;' class='doberror'>Year is required</b>";

                            ret = false;
                        } else {

                            document.getElementById("doberror").innerHTML = "<b style='color:green;' class='doberrorcorrect'></b>";
                        }

                    }
                    
</script>
