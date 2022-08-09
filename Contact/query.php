<?php
	require('connection.php');
	/*---------------------------fetch Name---------------------------*/
	$query = "SELECT * FROM `name_contact`";
	$result = ($conn->query($query));
	$row = [];
	//check if found any row
	if ($result->num_rows > 0) 
    {
        // fetch all names from db into array
		$row = $result->fetch_all(MYSQLI_ASSOC);
	}
?>