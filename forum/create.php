<?php
	include_once '../includes/session_manager.inc.php';
	include_once '../includes/header.inc.php';
?>
<html>
<head>
</head>
<body>
<section class="main-container">
	<div class="main-wrapper">
		<h2>Create A Forum</h2>
		<form class="input-form" action="../includes/createF.inc.php" method="POST">
			<input type="text" name="name" placeholder="Give this forum some descriptive name."/><br/>
			<textarea name = "description" placeholder = "Give a detailed explanation of this forum. You can specify some rules if you want!"></textarea><br/>
			<button type="submit" name="submit">Create this forum!</button>
		</form>
	</div>
</section>

</body>
</html>