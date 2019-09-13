<?php
	include('connect.php');
	session_start();
	$user=$_SESSION['username'];
	$query = "UPDATE `login` SET `online`=0 WHERE `username` = '$user'";
	$sql = mysqli_query($con, $query);
	session_destroy();
	header('location: index.php');
 ?>