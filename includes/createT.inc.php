<?php

if (isset($_POST['submit'])) {

	include_once 'dbh.inc.php';
	include_once 'session_manager.inc.php';
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$description = mysqli_real_escape_string($conn, $_POST['description']);
	$created_by = mysqli_real_escape_string($conn, $_SESSION['u_id']);
	$forum_id = mysqli_real_escape_string($conn, $_POST['forum_id']);
	$anon = mysqli_real_escape_string($conn, $_POST['anon']);
	// Error Handlers
	// Check for empty fields

	if (empty($name) || empty($description)) {
		$url = "Location: ../forum/createthread.php?createthread=empty&id=$forum_id";
		header ($url);
		exit();	
	} else {
		// Check if input characters are valid
		if ((!preg_match("/^[a-zA-Z]*$/", $first)) || (!preg_match("/^[a-zA-Z]*$/", $last))) {
			header ("Location: ../forum/createthread.php?createthread=invalid&id=$forum_id");
			exit();
		} else {
			// Check for thread name is available or not
			$sql = "SELECT * FROM `thread` WHERE `subject` = '$name'";
			$result = mysqli_query ($conn, $sql);
			$resulCheck = mysqli_num_rows($result);

			if ($resulCheck > 0) {
				header ("Location: ../forum/createthread.php?createthread=forum_name_taken&id=$forum_id");
				exit();
			} else {
				
				// Insert the thread into the database
				//start transaction
				mysqli_query($conn,"start transaction");
				//insert into table `thread`
				$sql = "INSERT INTO `thread` (`subject`, `description`, `anonymous`, `started_by`, `forum_id`) 
						VALUES ('$name', '$description', '$anon', '$created_by', '$forum_id')";
				if(mysqli_query($conn, $sql) == true) $flag1 = 1;
				else $flag1 =0;
				
				//get id of inserted thread
				$sql_id = "SELECT `id` FROM `thread` WHERE `subject` = '$name' AND `description` = '$description' AND `anonymous` = '$anon' AND
						  `started_by` = '$created_by' AND `forum_id` = '$forum_id' ";
				$result_id = mysqli_query ($conn, $sql_id);
				$row_id = mysqli_fetch_assoc($result_id);
				$thread_id = $row_id['id']; 

				//insert into `user_thread` table
				$query = "INSERT INTO `user_thread` VALUES('$created_by','$thread_id')";
				if(mysqli_query($conn, $query) == true) $flag2 = 1;
				else $flag2 =0;
				
				if($flag1 == 1 && $flag2 == 1) {
					mysqli_query($conn, "commit");
					header("Location: ../forum/createthread.php?createthread=success&id=$forum_id");	
		 		}
		 		else {
		 			mysqli_query($conn, "rollback");		 			
		 			header("Location: ../forum/createthread.php?createthread=DBerror&id=$forum_id");
		 		}
		 		
			}
			
		}
	}

} else {
		header ("Location: ../forum/create.php");
		exit();
}