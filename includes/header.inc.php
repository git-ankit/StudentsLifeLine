<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Students Life Line System | KJSIEIT Online Portal</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<header>
	<nav>
		<div class="main-wrapper">
			<ul>
				<li><a href="index.php">Home</a></li>
			</ul>
			<div class="nav-login"">
				<form action="includes/login.inc.php" method="POST">
					<input type="text" name="uid" placeholder="Username/E-mail">
					<input type="password" name="pwd" placeholder="Password">
					<button type="submit" name="submit">Login</button>
					<button><a href="signup.php">Sign up</a></button>
				</form>
			</div>
		</div>
	</nav>
</header>
</body>
