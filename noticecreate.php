<?php
	include_once 'includes/header.inc.php';
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<section class="main-container">
	<div class="main-wrapper">
		<h2>Create A New Notice</h2>
		<form class="input-form" action="includes/notice.inc.php" method="POST">
			<select name="notice_did">
				<option value="1">Computer</option>
				<option value="2">I.T.</option>
				<option value="3">EXTC</option>
				<option value="4">ETRX</option>
			</select>
			<input type="text" name="title" placeholder="Title" required>
			<textarea name="content" placeholder="Notice Content" required></textarea>
			<input type="file" name="file" placeholder="Upload a File">
			<button type="submit" name="submit">Publish</button>
		</form>
	</div>
</section>

</body>
</html>