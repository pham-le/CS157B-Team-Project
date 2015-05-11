<?php
	$servername = "localhost";
	$username = "root";
	$password = "rootpass";
	$dbname = "grocery";

	//echo "Test <br/><br/>";

	// Create connection
	global $conn;
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) 
	{
		echo "Nope";
	    die("Connection failed: " . $conn->connect_error);
	} 
	//else echo "Success<br/><br/>";
?>