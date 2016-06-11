<?php
include('config.php');

// Passkey that got from link
$passkey=$_GET['passkey'];
$email=$_GET['email'];
$tbl_name1="temp_members_db";


// Retrieve data from table where row that match this passkey
$sql1="SELECT * FROM $tbl_name1 WHERE confirm_code = '$passkey' and email = '$email' ";
$result1=mysql_query($sql1);

// If successfully queried
if($result1){

// Count how many row has this passkey
$count=mysql_num_rows($result1);

// if found this passkey in our database, retrieve data from table "temp_members_db"
if($count==1){
$rows=mysql_fetch_array($result1);
$unique_id=$rows['unique_id'];
$name=$rows['name'];
$lname=$rows['lname'];
$email=$rows['email'];
$password=$rows['password'];
$dob=$rows['dob'];
$gender=$rows['gender'];
$tbl_name2="registered_members";

// Insert data that retrieves from "temp_members_db" into table "registered_members"
$sql2="INSERT INTO $tbl_name2(unique_id, name, lname, email, password, dob, gender)VALUES('$unique_id', '$name', '$lname', '$email', '$password', '$dob', '$gender')";
$res=mysql_query($sql2);
}

// if not found passkey, display message "Wrong Confirmation code"
else {
echo "Wrong Email and Confirmation code : ";
}

// if successfully moved data from table"temp_members_db" to table "registered_members" 
//displays message "Your account has been activated" and
//don't forget to delete confirmation code from table "temp_members_db"
if($res){
//echo "Your account has been activated";
header("location:http://localhost/new%20site/thankyou.php?id=activated");

// Delete information of this user from table "temp_members_db" that has this passkey
$sql3="DELETE FROM $tbl_name1 WHERE confirm_code = '$passkey'";
$result3=mysql_query($sql3);
}
}
?>