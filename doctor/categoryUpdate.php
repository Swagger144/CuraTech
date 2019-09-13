<?php 
	session_start();
	$username = "root";
	$password = "sagar";
	$servername = "localhost";
	$dbname = "test";
	
	$con = mysqli_connect($servername,$username,$password,$dbname) or die("\n Connection Failed !" . $con->connect_error);

	$id=$_POST["cat-id"];
	$category=$_POST["categorylist"];
	
	
	$query="insert into category values ('$id', '$category')";
	$sql=mysqli_query($con,$query);
 ?>