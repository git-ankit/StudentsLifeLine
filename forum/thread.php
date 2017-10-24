<?php
	include_once '../includes/dbh.inc.php';
	include_once '../includes/header.inc.php';
	include_once '../includes/session_manager.inc.php';
	//getting present user from session
	$user_post = $_SESSION['u_id'];
	//some function. Pretty self explanatory
	function getName($uid, $conn) {
		$query = "SELECT `user_uid`, `is_staff` FROM `users` WHERE `id` = $uid";
		$result_uid = mysqli_query($conn, $query);
		$row_uid = mysqli_fetch_assoc($result_uid);
		if($row_uid['is_staff'] == 'N'){
			return $row_uid['user_uid'].", a student,";
		}
		else return $row_uid['user_uid'].", a staff,";
	}

	//Get thread id from previous page
	$id = $_GET['id'];
	//get all details of the thread
	$thread_str = "SELECT * FROM `thread` where `id` = '$id' AND `status` = 1";
	$thread_result = $conn->query($thread_str);
	if(mysqli_num_rows($thread_result) != 1) {
		echo "No such thread or thread deleted";
		exit();
	}
	$thread = $thread_result->fetch_assoc();
	//Get forum name
	$fid = $thread['forum_id'];
	$ask_for_forum_name = "SELECT `name` from `forum` where `status` = 1 AND `id` = '$fid'";
	$result_forum_name = $conn->query($ask_for_forum_name);
	$resultCheck_forum_name = mysqli_num_rows($result_forum_name);
	if ($resultCheck_forum_name != 1) {
		echo "No such forum or forum deleted. Please try again!";
		exit();
	}
	$row_forum_name = $result_forum_name-> fetch_assoc();
	echo "<center><h3>".$row_forum_name['name']." -> ".$thread['subject']."</h3>";//forum name -> thread name
	echo "<h4>".$thread['description']."</h4></center>";//description
	$sql = "SELECT * FROM `post` WHERE `status` = 1 AND `thread_id` = '$id'";
	$result = $conn->query($sql);
	$resultCheck = mysqli_num_rows($result);
	// check if there are any active forums
	?>
	
	<?php  
	if ($resultCheck == 0) {
		echo "<center>It seems like there are no more active post for this thread.<Volar Doheris></center>";
	} else {
		echo "<center>";
		while($row = $result->fetch_assoc()) {
			$user_name = getName($row['user_id'],$conn);	
		 	echo $user_name." says ".$row['post']."<br/>Created On(IST):".$row['date_created']."<br/><br/><br/>";
		}
		echo "</center>"; 		
	}
	?>
	<form action="../includes/postDB.inc.php" method = "POST">
		<center>
			<textarea name = "post" placeholder="Say something you sexy thing"></textarea><br/>
			<input type = "hidden" name = "thread_id" value = "<?php echo $id; ?>" />
			<input type = "hidden" name = "user_id" value = "<?php echo $user_post; ?>" />
			<input type="submit" name="submit" value = "Post my post."/>
		</center>	
	</form>