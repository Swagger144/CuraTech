<?php 
session_start();
	$username = "root";
	$password = "sagar";
	$servername = "localhost";
	$dbname = "test";
	
	$con = mysqli_connect($servername,$username,$password,$dbname) or die("\n Connection Failed !" . $con->connect_error);

	$cmnt = $_POST['cmnt'];
	$sender=$_SESSION['username'];
	$id=$_POST['id'];

	

	if($cmnt){
		$cmntquery="insert into `comment` (id,comment,user) values ('$id','$cmnt','$sender')";
		$cmntsql=mysqli_query($con,$cmntquery);
		echo "string";
	}

		$cmntquery1="select * from `comment` where comment='$cmnt'" ;
		$cmntsql1=mysqli_query($con,$cmntquery1);
		
		$cmntres = mysqli_fetch_assoc($cmntsql1);
		$cmntid=$cmntres['id'];
        $cmnt1=$cmntres['comment'];
        $cmntuser=$cmntres['user'];

        echo '<a class="pull-left" href="#"><img class="media-object img-circle" style="margin-right: 10px;" width="40px" src="../profilepic/'.$cmntuser.'.jpg" alt=""></a><h6>'.$cmntuser.'</h6><p>'.$cmnt1.'</p>';
        echo '<script>location.href = "newsfeed.php";</script>'
        ?>
	