<?php
	include_once 'includes/header.inc.php';
?>

<section class="main-container">
	<div class="main-wrapper">
		<h2>Noticeboard</h2>
	</div>
	<form action="includes/noticeb.inc.php" method="POST">
	<select name="notice_did">
	  <option value="1">Computer</option>
	  <option value="2">I.T.</option>
	  <option value="3">EXTC</option>
	  <option value="4">ETRX</option>
	</select>
	<input type="submit" name="submit">
	</form>
</section>


</body>
</html>