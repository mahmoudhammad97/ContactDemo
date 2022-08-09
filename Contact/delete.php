<?php
	require('connection.php');
	$id_and_num_S = file_get_contents('php://input');  // get [new number that will be deleted] as string 
	$id_and_num_A = explode("," , $id_and_num_S);	
	$id = $id_and_num_A[0];
	$number = $id_and_num_A[1];
	$query = "DELETE FROM `number_contact` WHERE `number`=".$number ;
	$result = $conn->query($query);
	$query = "SELECT `number` FROM `number_contact` WHERE `id`=".$id;
	$result = $conn->query($query);
	if($result->num_rows == 0){
		$query = "DELETE FROM `name_contact` WHERE `id`=".$id;
		$result = $conn->query($query);
		echo "remove person";
	}
	else echo "Number is deleted successfully";
?>