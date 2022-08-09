<?php
require('../connection.php');
	$row = [];
	$input_value_S = file_get_contents('php://input');  // get id of contact from xmlhttp request
	$query = "SELECT `number` FROM `number_contact` WHERE `id`=".$input_value_S; //query get all number of this id contact
	$result = $conn->query($query);
	if($result->num_rows > 0)
	{
		$row = $result->fetch_all(MYSQLI_ASSOC);
	}
	echo json_encode($row);
?>