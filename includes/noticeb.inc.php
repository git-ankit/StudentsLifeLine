<?php

	include_once 'dbh.inc.php';
	include_once 'header.inc.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>View Noiceboard</title>
</head>
<body>
<section class="main-container">
	<div class="main-wrapper">
		<div class="noticeboard">
		<?php

if (isset($_POST['submit'])) {


	$notice_did = $_POST['notice_did'];
	$sql = "SELECT * FROM noticeboard WHERE notice_did = $notice_did";
	$result = mysqli_query ($conn, $sql);
	$resultCheck = mysqli_num_rows ($result);
	if ($resultCheck >= 1) {
		while ($row = mysqli_fetch_assoc($result)) {
			echo $row['notice_title'] . "<br>";
			echo $row['notice_content'] . "<br>";
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



