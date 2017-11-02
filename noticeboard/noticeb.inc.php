<?php
	include_once '../includes/session_manager.inc.php';
	include_once '../includes/dbh.inc.php';
	include_once '../includes/header.inc.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>View Noiceboard</title>
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
<section class="main-container">
	<div class="main-wrapper">
		<div class="box" style="background: url(noticeboard.jpg); border: 20px solid brown">
			<div class="box-nav">
				<h2>Notice</h2>
			</div>
			<div class="box-list">
				
		<?php

if (isset($_POST['submit'])) {


	$notice_did = $_POST['notice_did'];
	$sql = "SELECT * FROM noticeboard WHERE notice_did = $notice_did";
	$result = mysqli_query ($conn, $sql);
	$resultCheck = mysqli_num_rows ($result);
	if ($resultCheck >= 1) {
		while ($row = mysqli_fetch_assoc($result)) {
			echo "<b>Name:</b> ".$row['notice_title'] . "<br>";
			echo "<b>Description:</b> ".$row['notice_content'] . "<br>";
			echo "<b>File:</b> <a href = '/StudentsLifeLine/Uploads/files/".$row['path']."'>Click Here!</a><br>";
			echo "<hr/>";
			}
		}
	else {
		echo "No Results found";
	}
}
else {
	header ("Location: ../noticeb.php?error");
				exit();
}

?>
</div>

