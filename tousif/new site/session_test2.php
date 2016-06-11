<?php 
session_start();
if(isset($_SESSION['error'])) { 
echo $_SESSION['error']; 
} 
?>