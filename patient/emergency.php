<?php 
	$username = "root";
	$password = "sagar";
	$servername = "localhost";
	$dbname = "test";
	
	$con = mysqli_connect($servername,$username,$password,$dbname) or die("\n Connection Failed !" . $con->connect_error);

	list($lat,$lag) = explode(":",$_POST['str']);

	$sql = "INSERT INTO `sagar`(`fname`, `sname`) VALUES ('$lat','$lag')";
	$sql1 = "INSERT INTO `sos_hospital`(`lat`, `lag`) VALUES ('$lat','$lag')";
	$result = $con->query($sql);
	$result1 = $con->query($sql1);

	if ($result){
		echo "SOS alert activated";
	}
	else{
		echo "failed";
	}
?>