<?php
session_start(); 

echo"<html><head>
<link href='new.css' rel='stylesheet' type='text/css'/>
</head><body>";
$_SESSION['error'] = "grace1004"; 
echo "<a href = 'session_test2.php'>Please Click</a>";
echo " 
<fieldset id='outer'>
<div class='div'>
<fieldset id='form'  >
<form action='crop.php'>
<input type='text'/>
<input type='email'/>
<input type='submit'/>
</form>
</fieldset>
</div>
</fieldset>
</body></html>";
?>