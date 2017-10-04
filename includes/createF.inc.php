<?php

if (isset($_POST['submit'])) {

	include_once 'dbh.inc.php';

	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$description = mysqli_real_escape_string($conn, $_POST['description']);
	
	// Error Handlers
	// Check for empty fields

	if (empty($name) || empty($description)) {
		$url = "Location: ../forum/createF.inc.php?signup=empty";
		header ($url);
		exit();	
	} else {
		// Check if input characters are valid
		if ((!preg_match("/^[a-zA-Z]*$/", $first)) || (!preg_match("/^[a-zA-Z]*$/", $last))) {
			header ("Location: ../signup.php?signup=invalid");
			exit();
		} else {
			// Check if email is valid 
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				header ("Location: ../signup.php?signup=email");
				exit();
			} else {
				// Check for username available or not
				$sql = "SELECT * FROM users WHERE user_uid='$uid'";
				$result = mysqli_query ($conn, $sql);
				$resulCheck = mysqli_num_rows($result);

				if ($resulCheck > 0) {
					header ("Location: ../signup.php?signup=usertaken");
					exit();
				} else {
					// Hashing the password
					$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
					// Insert the user into the database
					
					$sql = "INSERT INTO `users` (`user_first`, `user_last`, `user_email`, `user_uid`, `user_pwd`) VALUES ('$first', '$last', '$email', '$uid', '$hashedPwd')";
		 			if(mysqli_query($conn, $sql) == true) {
		 				header("Location: ../signup.php?signup=success");	
		 			}
		 			
				}
			}
		}
	}

} else {
		header ("Location: ../signup.php");
		exit();
}












