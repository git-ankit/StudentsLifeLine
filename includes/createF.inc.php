<?php

if (isset($_POST['submit'])) {

	include_once 'dbh.inc.php';
	include_once 'session_manager.inc.php';
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$description = mysqli_real_escape_string($conn, $_POST['description']);
	$created_by = mysqli_real_escape_string($conn, $_SESSION['u_id']);
	
	// Error Handlers
	// Check for empty fields

	if (empty($name) || empty($description)) {
		$url = "Location: ../forum/create.php?create=empty";
		header ($url);
		exit();	
	} else {
		// Check if input characters are valid
		if ((!preg_match("/^[a-zA-Z]*$/", $first)) || (!preg_match("/^[a-zA-Z]*$/", $last))) {
			header ("Location: ../forum/create.php?create=invalid");
			exit();
		} else {
			// Check for forum name is available or not
			$sql = "SELECT * FROM `forum` WHERE `name` = '$name'";
			$result = mysqli_query ($conn, $sql);
			$resulCheck = mysqli_num_rows($result);

			if ($resulCheck > 0) {
				header ("Location: ../forum/create.php?create=forum_name_taken");
				exit();
			} else {
				
				// Insert the forum into the database
					
				$sql = "INSERT INTO `forum` (`name`, `description`, `created_by`) VALUES ('$name', '$description', '$created_by')";
				if(mysqli_query($conn, $sql) == true) {
					header("Location: ../forum/create.php?create=success");	
		 		}
		 		
			}
			
		}
	}

} else {
		header ("Location: ../forum/create.php");
		exit();
}
