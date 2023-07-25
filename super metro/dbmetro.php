<?php
	// Connect to MySQL server
	$servername = "localhost";
	$username = "root";
	$password = "";
	$databasename="dbmetro"
	$conn = mysqli_connect($servername, $username, $password,$databasename);

	// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}

	
