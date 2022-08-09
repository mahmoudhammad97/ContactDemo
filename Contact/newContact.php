<?php
	require('connection.php');
	require('validation.php'); // to use check_number() function
	$row = [];
	$connect = $GLOBALS['conn'];
	$input_value_S = file_get_contents('php://input');  // now [name,number] as string
	$input_value_A = explode("," , $input_value_S);		// now [name,number] as array
	$name = $input_value_A[0];		//name contact from array
	$number = $input_value_A[1];	//number contact from array
	if(checkName_is_founed($name)==false && check_number($number)==true)  //check if same name is found in database
	{
		//insert name for first time and id is set by default in table name
		$query  = "INSERT INTO `name_contact`(`Name`) VALUES ('".$name."')";
		//insert id.number from id.name 
		$query1 = "INSERT INTO `number_contact`(`id`) SELECT `id` FROM `name_contact` WHERE `Name`= '".$name."'";
		//select id of name that require to insert number phone 
		$query2 = "SELECT `id` FROM `name_contact` WHERE `Name` = '".$name."'";
		$conn->query($query);					 /////////////////////////////////////////////////////
		$conn->query($query1);					////////////////// implement query //////////////////
		$result2 = ($conn->query($query2));	   /////////////////////////////////////////////////////
		$row = mysqli_fetch_array($result2);  //get id that name is created it to store number in same id
		//insert number phone based on id from name
		$query3 = "UPDATE `number_contact` SET `number`='".$number."' WHERE `id` = '".$row['id']."'";
		$conn->query($query3);
		echo "Contact successfully added";	//response if number is inserted
	}
	else
	{
		if(checkName_is_founed($name)==true)
			echo "Same name is exist in contacts";	//response if name is existed later
		else if (check_number($number)==false)
			echo "Please enter valid number";	//response if number is not valid

	}
?>