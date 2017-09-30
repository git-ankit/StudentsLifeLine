<?php
	include_once 'includes/header.inc.php';
?>

<section class="main-container">
	<div class="main-wrapper">
		<h2>Noticeboard</h2>
	</div>
	<form action="includes/noticeb.inc.php" method="GET">
	<select id="notice_did">
	  <option value="1">Computer</option>
	  <option value="2">I.T.</option>
	  <option value="3">EXTC</option>
	  <option value="4">ETRX</option>
	</select>
	<button type="submit" name="submit">View</button>
	</form>
</section>


</body>
</html>