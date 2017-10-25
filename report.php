<?php
	include_once 'includes/session_manager.inc.php';
	include_once 'includes/dbh.inc.php';
	include_once 'includes/header.inc.php';
	if($_SESSION['admin'] == 'Y'){
		$entity = $_GET['entity'];
		$id = $_GET['id'];
		
?>
		<div id = 'ask'>
			<div class="box-nav">
				<br/>
				<h2>Do you want to delete this <?php echo $entity ?>?</h2>
			</div>

			<form class = 'input-form' action = '' method = 'POST'>
				<button name="submit" value = "Yes"/>Yes</button><br/>
				<button name="submit" value = "Nope"/>Nope</button>
			</form>
		</div>
		
<?php
		if(isset($_POST['submit']) && $_POST['submit'] == "Yes"){
			echo "<script> document.getElementById('ask').style.display = 'none' </script> ";
			$sql = "UPDATE `".$entity."` SET `STATUS` = 0 where `id` = '$id'";
			if ($conn->query($sql) == true){
?>				<div class="box-nav">
					<br/>
					<h2>Entity is deleted. You are free to leave this page.</h2>
				</div>
<?php
			}
			else {
?>
				<div class="box-nav">
					<br/>
					<h2>OOPS! Somethings happened and action not taken. Try again! You are free to leave this page.</h2>
				</div>
<?php
			}
		
		}
		if(isset($_POST['submit']) && $_POST['submit'] == "Nope") {
			echo "<script> document.getElementById('ask').style.display = 'none' </script> ";
?>
			<div class="box-nav">
					<br/>
					<h2>You're free to leave this page!</h2>
			</div>
<?php
		}
	}		
	else {
?>
			<div class="box-nav">
					<br/>
					<h2>Your response has been noted. Mandatory action will be taken. Right now, you're free to leave the page!</h2>
			</div>
<?php
	}
?>
