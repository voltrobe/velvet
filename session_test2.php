<?php 
session_start();
if($_SESSION['user']) { 
echo $_SESSION['user']; 
} 
?>