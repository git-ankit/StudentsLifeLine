<?php

if (isset($_POST['submit'])) {
	include_once '../includes/session_manager.inc.php';
	include_once '../includes/dbh.inc.php';

	$did = mysqli_real_escape_string($conn, $_POST['notice_did']);
	$title = mysqli_real_escape_string($conn, $_POST['title']);
	$content = mysqli_real_escape_string ($conn,$_POST['content']);
	$name= $_FILES['file']['name'];
	$tmp_name= $_FILES['file']['tmp_name'];
	$submitbutton= $_POST['submit'];
	$position= strpos($name, "."); 
	$fileextension= substr($name, $position + 1);
	$fileextension= strtolower($fileextension);
	$path= 'C:/wamp64/www/StudentsLifeline/Uploads/files/';
	if (isset($name) && move_uploaded_file($tmp_name, $path.$name)) {



		$sql = "INSERT INTO `noticeboard` (`notice_did`, `notice_title`, `notice_content`, `path`) VALUES ('$did', '$title', '$content', '$name')";

		if(mysqli_query($conn, $sql) == true) {
		header("Location: noticecreate.php?create=success");
		}
	}	
	
//echo $conn -> error;
} else {
		header ("Location: noticecreate.php?create=fail");
		exit();
}