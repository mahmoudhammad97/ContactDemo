<?php
	require('connection.php');
	require('validation.php'); // to use check_number() function
	$input_value_S = file_get_contents('php://input');  // get [old number that will updated, new number] as string 
	$input_value_A = explode("," , $input_value_S);		// now [old number that will updated, new number] as array
	if(check_number($input_value_A[1])){
		$old_num = strval($input_value_A[0]); //convert to string
		$new_num = strval($input_value_A[1]); //convert to string
		$query = "UPDATE `number_contact` SET `number`='".$new_num."' WHERE `number`=".$old_num ;
		$result = $conn->query($query);
		if($result == true){
			echo "Number is updated successfully";
		}
	}
	else echo "Enter valid Number";
?>