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
?>

<!DOCTYPE html>
<html>
<head>
	<title>Forums | StudentsLifeLine</title>
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
				<h2> <?php echo $row_forum_name['name'] ?></h2></div>
					<div class="box-list">
							<table>
								<tr>
									<th>Thread Name</th>
									<th>Posted By</th>
									<th>Posted on</th>
								</tr>
								<?php
								$sql = "SELECT * FROM `thread` WHERE `status` = 1 AND `forum_id` = '$id'";
								$result = $conn->query($sql);
								$resultCheck = mysqli_num_rows($result);
									while($row = $result->fetch_assoc()) {
								?>
				
								<tr>
									<td><a href = <?php echo "thread.php?id=".$row['id'].">" ?><p><?php echo $row['subject']?></p></a></td>
									<td><?php if($row['anonymous'] == 'Y') echo "anonymous";
										 	else {
										 		$uid = $row['started_by'];
										 		$query = "SELECT `user_uid` FROM `users` WHERE `id` = $uid";
										 		$result_uid = mysqli_query($conn, $query);
										 		$row_uid = mysqli_fetch_assoc($result_uid);
										 		$uname = $row_uid['user_uid'];
										 		echo $uname; } ?>
									</td>
									<td><?php echo $row['created_on'] ?></td> 			
								</tr>
								<?php } ?>
								</table>

</body>
</html>
