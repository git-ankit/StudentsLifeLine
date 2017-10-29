<?php
	session_start();
	include_once 'includes/header.inc.php';
?>

<section class="main-container">
	<div class="main-wrapper">
		<h2>Home</h2>
		<?php
			if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
				?>
				<h2 style="color: Red">Welcome to StudentsLifeLine</h2>
				</br>
				<center><img src="includes/aura.jpg" width="300px" height="212.2px"></center>
				<?php
							}

			?>
	</div>
</section>

</body>
</html>