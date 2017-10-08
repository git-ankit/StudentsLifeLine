<?php
	include_once '../includes/dbh.inc.php';
	include_once '../includes/header.inc.php';
	include_once '../includes/session_manager.inc.php';
	
	$sql = "SELECT * FROM `forum` WHERE `status` = 1";
	$result = $conn->query($sql);
	$resulCheck = mysqli_num_rows($result);
	// check if there are any active forums
	if ($resulCheck == 0) {
		echo "It seems like there are no more active forums.<Volar Morghulis>";
	} else {
		echo "<br/><b>These are the active forums:</b><br/><br/>";
		while($row = $result->fetch_assoc()) {
			
		 	echo "Forum Name: ".$row['name']."<br/>Description: ".$row['description']."<br/>"."Created on: ".date('j M Y g:i A', strtotime($row['date_created']));
		 	echo "<br/><a href = forum.php?".$row['id'].">Take me to this forum</a><br/>";	
		 } 		
	}
		