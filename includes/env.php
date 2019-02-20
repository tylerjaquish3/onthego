<?php
	//local connection
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "onthego";
	$dbport = "3307";

	//ipage connection
	// $servername = "didier83643499.ipagemysql.com";
	// $username = "didier836";
	// $password = "Baseball22!";
	// $dbname = "onthego";
	// $dbport = "3306";
		
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname, $dbport);
	
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 

	if (!defined('IS_DEV')) {
		define('IS_DEV', true);
	}

	if (!defined('URL')) {
		// define('URL', 'http://onthegowithjando.com');
		define('URL', 'http://onthego.local');
	}
?>