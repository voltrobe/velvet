<?php

//echo "The username or password you entered is incorrect.";

 
session_start();
if(isset($_SESSION['error'])) { 
echo $_SESSION['error']; 
} 



?>