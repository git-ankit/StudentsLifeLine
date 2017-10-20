<?php
	include_once '../includes/header.inc.php';
?>
<html>
<head>
</head>
<body>
<section class="main-container">
	<div class="main-wrapper">
		<h2>Create A New Thread</h2>
		<form class="input-form" action="../includes/createF.inc.php" method="POST">
			<input type="text" name="name" placeholder="Title"/><br/>
			<textarea name = "description" placeholder = "Please tell a bit more in details"></textarea><br/>
			<input type="file" name="threadfile">
			<button type="submit" name="submit">Post</button>
		</form>
	</div>
</section>

</body>
</html>