<?php
	//local connection
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "onthego";
		
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname, '3307');
	
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 

	if (!defined('IS_DEV')) {
		define('IS_DEV', true);
	}
?>