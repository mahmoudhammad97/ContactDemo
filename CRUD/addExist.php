<?php
	require('connection.php');
	require('validation.php'); // to use check_number() function
	$row = [];
	$input_value_S = file_get_contents('php://input');  // get [ id , new number of contact] as string 
	$input_value_A = explode("," , $input_value_S);		// now [number that search about id by it, new number of contact] as array
	$id = $input_value_A[0];				// id
	$new_number = strval($input_value_A[1]);// new_number
	if(check_number($new_number)){
		$query = "INSERT INTO `number_contact`(`id`, `number`) VALUES ('".$id."','".$new_number."')";
		$result = $conn->query($query);
		if($result == true){
			echo "Success";
		}
	}
	else echo "Invalid number";
?>