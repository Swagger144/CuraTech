<?php

	$username = "root";
	$password = "sagar";
	$servername = "localhost";
	$dbname = "test";
	
	$con = mysqli_connect($servername,$username,$password,$dbname) or die("\n Connection Failed !" . $con->connect_error);

	date_default_timezone_set("Asia/Kolkata");

	$msg=$_POST['msg'];
	$msg_title=$_POST['title'];
	$sender="person1";
	$date=date("d-m-y");
	$time=date("h:i:s");

	$query="insert into newsfeed values ('$sender','$msg_title','$msg','$date','$time')";
	$sql=mysqli_query($con,$query);
?>
