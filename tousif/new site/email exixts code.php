<?php

include_once '../rnfunctions.php';

/* RECEIVE VALUE */
$validateValue=$_REQUEST['email'];
$validateId=$_REQUEST['email'];

$query = "SELECT user FROM registered_members WHERE email='$validateValue'";
$result = mysql_num_rows(queryMysql($query));


$validateError= "This username is already taken";
$validateSuccess= "This username is available";



	/* RETURN VALUE */
	$arrayToJs = array();
	$arrayToJs[0] = $validateId;

if($validateValue ==$result){		// validate??
	$arrayToJs[1] = true;			// RETURN TRUE
	echo json_encode($arrayToJs);			// RETURN ARRAY WITH success
}else{
	for($x=0;$x<1000000;$x++){
		if($x == 990000){
			$arrayToJs[1] = false;
			echo json_encode($arrayToJs);		// RETURN ARRAY WITH ERROR
		}
	}
	
}

?>