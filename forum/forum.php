<?php
	include_once '../includes/dbh.inc.php';
	include_once '../includes/header.inc.php';
	include_once '../includes/session_manager.inc.php';
	
	//Get forum id from previous page
	$id = $_GET['id'];


	//Get forum name
	$ask_for_forum_name = "SELECT `name` from `forum` where `status` = 1 AND `id` = '$id'";
	$result_forum_name = $conn->query($ask_for_forum_name);
	$resultCheck_forum_name = mysqli_num_rows($result_forum_name);
	if ($resultCheck_forum_name != 1) {
		echo "No such forum. Please try again!";
		exit();
	}
	$row_forum_name = $result_forum_name-> fetch_assoc();
	echo "<center><h3>".$row_forum_name['name']."</h3></center>";
	
	$sql = "SELECT * FROM `thread` WHERE `status` = 1 AND `forum_id` = '$id'";
	$result = $conn->query($sql);
	$resultCheck = mysqli_num_rows($result);
	// check if there are any active forums
	?>
	
	<?php  
	if ($resultCheck == 0) {
		echo "<center>It seems like there are no more active threads for this forum.<Volar Morghulis></center>";
	} else {
		//echo "<br/><b><h2>These are the active forums:</b><br/><br/>";
		while($row = $result->fetch_assoc()) {
			
		 	echo "Thread Name: ".$row['subject']."<br/>Description: ".$row['description']."<br/>Created On(IST):".$row['created_on']."<br/>";
		 	if($row['anonymous'] == 'Y') echo "Started By: anonymous";
		 	else {
		 		$uid = $row['started_by'];
		 		$query = "SELECT `user_uid` FROM `users` WHERE `id` = $uid";
		 		$result_uid = mysqli_query($conn, $query);
		 		$row_uid = mysqli_fetch_assoc($result_uid);
		 		$uname = $row_uid['user_uid'];
		 		echo "Started By: ".$uname;
		 	}
		 	echo "<br/><a href = thread.php?id=".$row['id'].">Take me to this thread</a><br/>";
		 	echo "<br/><br/>";	
		 } 		
	}
	echo "<a href = createthread.php?id=".$id.">Want to create a thread for this forum?</a>";
	
	?>