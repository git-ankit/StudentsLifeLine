<?php

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "StudentsLifeline";


$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
echo 'Connected';