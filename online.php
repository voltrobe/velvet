<?php
session_start();
if (isset($_SESSION['user']))
{
global $user ;
$user= $_SESSION['user'];
$loggedin = TRUE;
function useronline($user)
{ return($user);
}
}
else $loggedin = FALSE;
?>
