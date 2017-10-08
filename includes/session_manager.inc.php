<?php
	session_start();
	if(isset($_SESSION['logged_in']) && $_SESSION == true) {
		// the above conditon checks if the user is logged in.  
	}
	else {
		header("Location: /StudentsLifeline/index.php");
	}