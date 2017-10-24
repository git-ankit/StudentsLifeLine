<?php
	include_once '../includes/header.inc.php';
	include_once '../includes/dbh.inc.php';

	//get forum id
	$id = $_GET['id'];

	//get forum name
	$ask_for_forum_name = "SELECT `name` from `forum` where `status` = 1 AND `id` = '$id'";
	$result_forum_name = $conn->query($ask_for_forum_name);
	$resultCheck_forum_name = mysqli_num_rows($result_forum_name);
	if ($resultCheck_forum_name != 1) {
		echo "No such forum. Please try again!";
		exit();
	}
	$row_forum_name = $result_forum_name-> fetch_assoc();
	$forum_name = $row_forum_name['name'];
?>
<html>
<head>
</head>
<body>
<section class="main-container">
	<div class="main-wrapper">
		<h2>Create A New Thread for forum - <?php echo $forum_name; ?></h2>
		<form class="input-form" action="../includes/createT.inc.php" method="POST">
			<input type="text" name="name" placeholder="Title"/><br/>
			<textarea name = "description" placeholder = "Please tell a bit more in details"></textarea><br/>
			Create thread anonymously?<br/>Yes<input type = "radio" name = "anon" value = 'Y'/>No<input type = "radio" name = "anon" value = 'N'/>
			<input type="hidden" name = "forum_id" value = "<?php echo $id; ?>"/>
			
			<button type="submit" name="submit">Post</button>
		</form>
	</div>
</section>

</body>
</html>