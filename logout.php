<?php	
	session_start();
	unset($_SESSION['u_id']);
	unset($_SESSION['u_first']);
	unset($_SESSION['u_last']);
	unset($_SESSION['u_email']);
	unset($_SESSION['u_uid']);
	unset($_SESSION['is_superadmin']);
	unset($_SESSION['logged_in']);
	session_unset(); 
	session_destroy();
	header('Location: /StudentsLifeline/index.php');
?>
