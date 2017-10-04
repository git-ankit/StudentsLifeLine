<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Students Life Line System | KJSIEIT Online Portal</title>
	<link rel="stylesheet" type="text/css" href="/StudentsLifeLine/style.css">
</head>	
<body>
<header>
	<nav>
		<div class="main-wrapper">
			<ul>
				<li><a href="/StudentsLifeLine/index.php">Home</a></li>
				<li><a href="/StudentsLifeLine/noticeb.php">Noticeboard</a></li>
			</ul>
			<div class="nav-login">
				<form action="includes/login.inc.php" method="POST">
					<input type="text" name="uid" placeholder="Username">
					<input type="password" name="pwd" placeholder="Password">
					<button type="submit" name="submit">Login</button>
					<a href='/StudentsLifeLine/signup.php'>Sign up</a>
				</form>

			</div>
		</div>
	</nav>
</header>
</body>
</html>
