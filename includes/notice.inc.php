<?php

if (isset($_POST['submit'])) {

	include_once 'dbh.inc.php';

	$did = mysqli_real_escape_string($conn, $_POST['notice_did']);
	$title = mysqli_real_escape_string($conn, $_POST['title']);
	$content = mysqli_real_escape_string ($conn,$_POST['content']);
	$fileName = $_FILES['Filename']['name'];
	$target = "files/";		
	$fileTarget = $target.$fileName;	
	$tempFileName = $_FILES["Filename"]["tmp_name"];
	$fileDescription = $_POST['Description'];	
	$result = move_uploaded_file($tempFileName,$fileTarget);

		$sql = "INSERT INTO `noticeboard` (`notice_did`, `notice_title`, `notice_content`, `notice_attachment`) VALUES ('$did', '$title', '$content', '$fileName')";
		if(mysqli_query($conn, $sql) == true) {
		header("Location: ../noticecreate.php?create=success");	
	}

} else {
		header ("Location: ../noticecreate.php");
		exit();
}