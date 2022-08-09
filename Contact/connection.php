<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "contacts";
	// connect the database with the server
    $conn = new mysqli($servername,$username,$password,$dbname);
    // if error occurs 
    if ($conn -> connect_error)
    {
       echo "Failed to connect to MySQL: " . $conn -> connect_error;
       exit();
    }
?>