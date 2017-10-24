<?php
	include_once '../includes/dbh.inc.php';
	include_once '../includes/header.inc.php';
	include_once '../includes/session_manager.inc.php';

?>

<!DOCTYPE html>
<html>
<head>
	<title>Show Forums | StudentsLifeLine </title>
</head>
<body>
	<div class="main-container">
		<div class="box">
			<div class="box-nav">
				<h2> Active Forums</h2>	
			</div>
				<div class="box-list">
				<?php
				$sql = "SELECT * FROM `forum` WHERE `status` = 1";
				$result = $conn->query($sql);
				$resultCheck = mysqli_num_rows($result);
					while($row = $result->fetch_assoc()) {
						?>
					 	<a href = <?php echo "forum.php?id=".$row['id'].">" ?><h2><?php echo $row['name']?></h2></a>
					 	<p><?php echo $row['description']."<br>"?></p><hr>
					<?php 
					} ?>
				</div>
		</div>
	</div>

</body>
</html>


