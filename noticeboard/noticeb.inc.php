<?php

	include_once '../includes/dbh.inc.php';
	include_once '../includes/header.inc.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>View Noiceboard</title>
		<style>
			table, td, th {    
		    border: 1px solid #ddd;
		    text-align: left;
			}

			table {
		    border-collapse: collapse;
		    width: 100%;
			}

			th, td {
		    padding: 15px;
			}
			</style>
</head>
<body>
<section class="main-container">
	<div class="main-wrapper">
		<div class="box">
			<div class="box-nav">
				<h2>Notice</h2>
			</div>
			<div class="box-list">
				<table>
							<tr>
								<th style="width: 80%">Notice</th>
								<th style="width: 10%">Time</th>
							</tr>
				</table>
		<?php

if (isset($_POST['submit'])) {


	$notice_did = $_POST['notice_did'];
	$sql = "SELECT * FROM noticeboard WHERE notice_did = $notice_did";
	$result = mysqli_query ($conn, $sql);
	$resultCheck = mysqli_num_rows ($result);
	if ($resultCheck >= 1) {
		while ($row = mysqli_fetch_assoc($result)) {
			echo $row['notice_title'] . "<br>";
			echo $row['notice_content'] . "<br>";
			}
		}
	else {
		echo "No Results found";
	}
}
else {
	header ("Location: ../noticeb.php?error");
				exit();
}

?>
</div>

