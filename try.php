<!DOCTYPE html>
<html>
<head>
	
</head>
<body>
<?php

	$username = "root";
	$password = "sagar";
	$servername = "localhost";
	$dbname = "test";
	
	$con = mysqli_connect($servername,$username,$password,$dbname) or die("\n Connection Failed !" . $con->connect_error);


	$query = "select * from imagetest where name=? and name2=?";
	$sql = mysqli_query($con,$query);

	$i=0;
	while($rs = mysqli_fetch_assoc($sql))
	{
		$name=$rs['name'];
		$name2=$rs['name2'];

		$i++;
	}

	//print_r($name[0]);
	echo "<img src='".$name.".jpg' style='width: 100px;'>";

	echo date("d-m-y");
?>

</body>
</html>
