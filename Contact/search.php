<?php
	require('connection.php');
	//----------------------search contact----------------------
	$row = []; 		//input rows in array
	$input_value = file_get_contents('php://input');    //get string from user
	
	if($input_value == "def") //onload page default	
	{		//query to find all contacts
		$query = "SELECT * FROM `name_contact` ORDER BY `name`";
		check_rows($query);
	}
	elseif(isset($input_value))		//query to find all contacts that's start with $search_name variable
	{
		$query = "SELECT `id`, `Name` FROM `name_contact` WHERE `Name` LIKE \"".$input_value."%\" ORDER BY `name`";		
		check_rows($query);
	}
	function check_rows($get_query)
	{
		$conn = $GLOBALS['conn'];
		$result = ($conn->query($get_query));
		//check if found any row
		if ($result->num_rows > 0) 
		{
			// fetch all names from db into array
			$GLOBALS['row'] = $result->fetch_all(MYSQLI_ASSOC);
		}
		echo json_encode($GLOBALS['row']);
	}
?>