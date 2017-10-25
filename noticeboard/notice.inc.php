<?php

if (isset($_POST['submit'])) {

	include_once '../includes/dbh.inc.php';

	$did = mysqli_real_escape_string($conn, $_POST['notice_did']);
	$title = mysqli_real_escape_string($conn, $_POST['title']);
	$content = mysqli_real_escape_string ($conn,$_POST['content']);

		$sql = "INSERT INTO `noticeboard` (`notice_did`, `notice_title`, `notice_content`) VALUES ('$did', '$title', '$content')";

		if(mysqli_query($conn, $sql) == true) {

		header("Location: ../noticeboard/noticecreate.php?create=success");	
	}
//echo $conn -> error;
} else {
		header ("Location: ../noticeboard/noticecreate.php");
		exit();
}