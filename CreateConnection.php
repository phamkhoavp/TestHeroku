<?php 
	$servername = "db4free.net";
	$port = "8889";
	$username = "phamkhoavp";
	$password = "phamkhoa391999";
	$dbname = "gwcourse";

	
	$conn = new mysqli($servername, $username, 
		$password, $dbname);
	
	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	}	 

	echo "done";

 ?>