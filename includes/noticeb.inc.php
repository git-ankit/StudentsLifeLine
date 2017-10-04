<?php

if (isset($_POST['submit'])) {

	include_once 'dbh.inc.php';

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