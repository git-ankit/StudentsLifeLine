<?php
	include_once '../includes/session_manager.inc.php';
	include_once '../includes/dbh.inc.php';
	include_once '../includes/header.inc.php';
	
	//getting present user from session
	$user_post = $_SESSION['u_id'];
	//some function. Pretty self explanatory
	function getName($uid, $conn) {
		$query = "SELECT `user_uid`, `is_staff` FROM `users` WHERE `id` = $uid";
		$result_uid = mysqli_query($conn, $query);
		$row_uid = mysqli_fetch_assoc($result_uid);
		if($row_uid['is_staff'] == 'N'){
			return "<h2>".$row_uid['user_uid']."</h2> <br><h3>Student</h3></br>";
		}
		else return "<h2>".$row_uid['user_uid']."</h2> <br><h3>Staff</h3></br>";
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
	
	// check if there are any active forums
	?>

	<!DOCTYPE html>
	<html>
	<head>
		<title>Active Thread</title>
		<style>
			table, td, th {    
		    border: 1px solid #ddd;
		    text-align: left;
			}

			table {
		    border-collapse: collapse;
		    width: 100%;
			}

			th, td {
		    padding: 15px;
			}
			</style>
	</head>
	<body>
		<div class="main-container">
			<div class="box">
				<div class="box-nav">
					<?php 
					echo "<h2>".$thread['subject']."</h2>";//forum name -> thread name
					$sql = "SELECT * FROM `post` WHERE `status` = 1 AND `thread_id` = '$id'";
					$result = $conn->query($sql);
					$resultCheck = mysqli_num_rows($result); ?>
				</div>
					<div class="box-list">
						<table>
							<tr>
								<th style="width: 10%">Created By</th>
								<th style="width: 60%">Description</th>
								<th style="width: 10%">Time</th>
							</tr>

							<tr>
								<td>
									<?php 
										if($thread['anonymous'] == 'Y') echo "<h2>Anon</h2> <br><h3>A common man.</h3></br>";
										else echo getName($thread['started_by'], $conn); 
									?>
								</td>
								<td><?php echo $thread['description'] ?></td>
								<td><?php echo $thread['created_on'] ?></td>
							</tr>
						</table>

					</br>

						<table>
							<tr>
								<th style="width: 10%">User</th>
								<th style="width: 60%">Comment</th>
								<th style="width: 10%">Time</th>
							</tr>

							<?php  
									while($row = $result->fetch_assoc()) {
									$user_name = getName($row['user_id'],$conn); ?>
							<tr>
								<td><?php echo $user_name ?></td>
								<td>
									<?php echo $row['post'] ?>
									<br/>
									<a href = <?php echo "/StudentsLifeLine/report.php?id=".$row['id']."&entity=post>" ?><h5>Report?</h5></a>
									
								</td>
								<td><?php echo $row['date_created']?></td>
							</tr>

						<?php } ?>
						</table>
					</div>

	 		
	<form class="input-form" action="../includes/postDB.inc.php" method = "POST">
		<center>
			<textarea name = "post" placeholder="Click here to Reply" style="background-color: white; padding-top: 20px"></textarea><br/>
			<input type = "hidden" name = "thread_id" value = "<?php echo $id; ?>" />
			<input type = "hidden" name = "user_id" value = "<?php echo $user_post; ?>" />
		    </br>
			<button name="submit" value = "Post my post."/>Reply</button>
		</center>	
	</form>