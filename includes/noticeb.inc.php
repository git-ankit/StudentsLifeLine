<?php

if (isset($_POST['submit'])) {

	include_once 'dbh.inc.php';

	$notice_did = $_POST['notice_did'];
	echo 'Selected value is' . $notice_did;

	$sql = "SELECT * FROM 'noticeboard' WHERE notice_did = $notice_did";
	$result = mysqli_query ($conn, $sql);
	$resultCheck = mysqli_num_rows ($result);

	if ($resultCheck > 0) {
		while ($row = mysqli_fetch_assoc($resutlt)) {
			echo $row['notice_did'] . "<br>";
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