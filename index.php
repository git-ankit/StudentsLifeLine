<?php
	include_once 'includes/header.inc.php';
?>

<section class="main-container">
	<div class="main-wrapper">
		<h2>Home</h2>
		<?php
			if(isset($_SESSION['logged_in']) && $_SESSION == true) {
				echo "Welcome User";
			}

			?>
	</div>
</section>

</body>
</html>