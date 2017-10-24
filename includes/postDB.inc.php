<?php

if (isset($_POST['submit'])) {

	include_once 'dbh.inc.php';
	include_once 'session_manager.inc.php';
	$post = mysqli_real_escape_string($conn, $_POST['post']);
	
	$created_by = mysqli_real_escape_string($conn, $_POST['user_id']);
	$thread_id = mysqli_real_escape_string($conn, $_POST['thread_id']);
				//insert into `post` table
				$query = "INSERT INTO `post` (`post`, `user_id`, `thread_id`) VALUES('$post', '$created_by','$thread_id')";
				if(mysqli_query($conn, $query) == true) {
					header("Location: ../forum/thread.php?createpost=success&id=$thread_id");
				}
				else header("Location: ../forum/thread.php?createpost=fail&id=$thread_id"); 		 		
			

}
else "<center>Why you here dude.?";