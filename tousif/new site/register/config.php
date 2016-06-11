<?php
$host="localhost"; // Host name
$username="root"; // Mysql username
$password="badminton786"; // Mysql passw ord
$db_name="novaprofile"; // Database name
//Connect to server and select database.
mysql_connect("$host", "$username", "$password")or die("cannot connect to sql server");
mysql_select_db("$db_name")or die("cannot select DB");
?>