<?php

if (isset($_POST['submit'])) {

	include_once 'dbh.inc.php';
	echo "string";

	$first = mysqli_real_escape_string($conn, $_POST['first']);
	$last = mysqli_real_escape_string($conn, $_POST['last']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$uid = mysqli_real_escape_string($conn, $_POST['uid']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

}
else {
		header ("Location: ../signup.php");
	exit();
}

		 	// Hashing the password
		 	$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
		 	// Insert
		 	$sql = "INSERT INTO users (user_first, user_last, user_email, user_uid, user_pwd) VALUES ('$first', '$last', '$email', '$uid', '$hashedPwd';";
		 	mysqli_query($conn, $sql);
		 	header("Location: ../signup.php?signup=success");
		 


