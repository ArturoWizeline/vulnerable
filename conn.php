<?php
	$servername = "127.0.0.1:3306";
	$username = "root";
	$password = "root";
	$dbname = "database";

	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
?>