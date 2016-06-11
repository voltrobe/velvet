<?php 
$to = "support@socialnova.in";
$subject = "My subject";
 $txt = "Hello world!! what's up.....";
$headers = "From: admin@socialnova.in" . "\r\n" . "CC: developers@socialnova.in";

mail($to,$subject,$txt,$headers);
echo "\t \t \nMail has been successfully delieverd\n";
?>