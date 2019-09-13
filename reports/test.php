<?php 

	session_start();
	$username_patient=$_SESSION['username'];
	$username = "root";
	 $password = "sagar";
	 $servername = "localhost";
	 $dbname = "test";
	 $con = mysqli_connect($servername,$username,$password,$dbname) or die("\n Connection Failed !" . $con->connect_error);
	
	$url =$_GET['ur'];
	$url1 =$_POST['url'];
	echo $url1;

	$query1 = "INSERT INTO `reportFirebase`(`username`,`img_name`) VALUES ('$username_patient','$url')";
	$sql1 = $con->query($query1);

	if ($sql1){
		$count=0;
		$query2="Select * from `reportFirebase` where username='$username_patient'";
		$sql2=mysqli_query($con,$query2);
		while($res2=mysqli_fetch_assoc($sql2)){?>
			<img src=<?php echo $res2['url']; ?>>

		<?php

		}
	}
	else{
		echo "failed";
	}
?>