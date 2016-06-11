<html>
<head>
<style>
body
{
	/*ie needs this*/
	margin:0px;
	padding:0px;
	/*set global font settings*/
	font-size:10px;
	font-family:Tahoma,Verdana,Arial;
}
a:hover
{
	color:#fff;
}

#user_registration
{
	border:1px solid #cccccc;
	margin:auto auto;
	margin-top:100px;
	width:400px;
}


#user_registration label
{
        display: block;  /* block float the labels to left column, set a width */
	float: left; 
	width: 70px;
	margin: 0px 10px 0px 5px; 
	text-align: right; 
	line-height:1em;
	font-weight:bold;
}

#user_registration input
{
	width:250px;
}

#user_registration p
{
	clear:both;
}

#submit
{
	border:1px solid #cccccc;
	width:100px !important;
	margin:10px;
}

h1
{
	text-align:center;
}

#passwordStrength
{
	height:10px;
	display:block;
	float:left;
}

.strength0
{
	width:250px;
	background:#cccccc;
}

.strength1
{
	width:50px;
	background:#ff0000;
}

.strength2
{
	width:100px;	
	background:#ff5f5f;
}

.strength3
{
	width:150px;
	background:#56e500;
}

.strength4
{
	background:#4dcd00;
	width:200px;
}

.strength5
{
	background:#399800;
	width:250px;
}


</style>
</style>

<script>
function passwordStrength(password)
{
	var desc = new Array();
	desc[0] = "Very Weak";
	desc[1] = "Weak";
	desc[2] = "Better";
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
	 document.getElementById("passwordStrength").className = "strength" + score;
}
</script>
</head>
<body>

<form method="post" action="" id="user_registration" name="user_registration">
		<p><h1>Password strength metter</h1></p>
		<p>	
		<label for="user">Username</label><input type="text" name="user" id="user"/>
		</p>
		<p>	
		<label for="name">Name</label><input type="text" name="name" id="name"/>
		</p>
		<p>	
		<label for="surname">Surname</label><input type="text" name="surname" id="surname"/>
		</p>
		<p>	
		<label for="email">E-mail</label><input type="text" name="email" id="email"/>
		</p>
		<p>	
			<label for="pass">Password</label><input type="password" name="pass" id="pass" onkeyup="passwordStrength(this.value)"/>
			 
		</p>
		<p>	
		<label for="pass2">Confirm Password</label><input type="password" name="pass2" id="pass2"/>
		</p>
		<p>
			<label for="passwordStrength">Password strength</label>
			<div id="passwordDescription">Password not entered</div>
			<div id="passwordStrength" class="strength0"></div>
		</p>
		<p>	
		<input type="submit" name="submit" id="submit" value="Register">
		</p>
</form>	

</body>
</html>
