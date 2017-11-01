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
				<li><a href="/StudentsLifeLine/about.php">About us</a></li>
				<li><a href="/StudentsLifeLine/noticeboard/noticeb.php">Noticeboard</a></li>
				<li><a href="/StudentsLifeLine/forum/showforums.php">Forum</a></li>
				<li><a href="/StudentsLifeLine/contact.php">Contact us</a></li>
				<li><a href="/StudentsLifeLine/needhelp.php">Need Help?</a></li>
			</ul>
			<div class="nav-login">
				<form action="includes/login.inc.php" method="POST">
					<?php
						if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true)  {?>
					<div id = 'logout'>
						<a href='/StudentsLifeLine/logout.php'>Logout</a>
					</div>					
					<?php } else {?>
					<div id = 'login'>
						<input type="text" name="uid" placeholder="Username">
						<input type="password" name="pwd" placeholder="Password">
						<button type="submit" name="submit">Login</button>
						<a href='/StudentsLifeLine/signup.php'>Sign up</a>
					</div>
					<?php } ?>
				</form>

			</div>
		</div>
	</nav>
</header>
</body>
</html>
