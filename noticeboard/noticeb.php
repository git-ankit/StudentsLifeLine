<?php
	include_once '../includes/session_manager.inc.php';
	include_once '../includes/header.inc.php';
?>

<section class="main-container">
	<div class="main-wrapper">
		<h2>Noticeboard</h2>
	</div>
	<center>
	<form class="input-form" action="noticeb.inc.php" method="POST">
	<select name="notice_did">
	  <option value="1">Computer</option>
	  <option value="2">I.T.</option>
	  <option value="3">EXTC</option>
	  <option value="4">ETRX</option>
	</select>
	<br>
	<br>
	<button type="submit" name="submit">Submit</button>
	</form>
	<?php if(isset($_SESSION['logged_in']) && $_SESSION['admin'] == 'Y') {
	?>
	<form class="input-form" action="noticecreate.php" method="POST">
	<hr/>
	<br>
	<button type="submit" name="submit">Add a notice</button>
	</form>
	<?php	
	}
	?>
	</center>
</section>


</body>
</html>