<?php

if (isset($_POST['submit'])) {

	include_once 'dbh.inc.php';

	$did = mysqli_real_escape_string($conn, $_POST['notice_did']);
	$title = mysqli_real_escape_string($conn, $_POST['title']);
	$content = ($conn, $_POST['content']);
	$file = ($conn, $_POST['file']);
	$timestamp = date('Y-m-d G:i:s');
		
		$sql = "INSERT INTO `noticeboard` (`notice_did`, `notice_title`, `notice_content`, `notice_attachment`, `notice_time`) VALUES ('$did', '$title', '$content', '$file', '$timestamp')";
		if(mysqli_query($conn, $sql) == true) {
		header("Location: ../noticecreate.php?create=success");	
	}

} else {
		header ("Location: ../noticecreate.php");
		exit();
}