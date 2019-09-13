<?php 
	include('../connect.php');
	session_start();
	if(!isset($_SESSION['username'])){
	    header("location: ../index.php");
	}
	$user=$_SESSION['username'];
	$type=$_SESSION['type'];
	if($type=='doctor'){
		$q1 = "select `callsAttended` from `hangoutinfo` where username='$user'";
		$s1 = mysqli_query($con,$q1);
		$r1 = mysqli_fetch_assoc($s1);
		$c = $r1['callsAttended'];
		$c = $c+1;
		$query = "UPDATE `hangoutinfo` SET `onCall`=1,`callsAttended`='$c' WHERE username='$user'";
		$sql = mysqli_query($con,$query);
	}
	if($type=='patient'){
		$query = "UPDATE `hangoutinfo` SET `onCall`=1 WHERE username='$user'";	
		$sql = mysqli_query($con,$query);
	}


 ?>
 <html>
<head>
    <title>Hangout</title>
</head>
<body>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <g:hangout render="createhangout"
        invites="[{ id : 'https://hangouts.google.com/call/L7b5aW9SRQZUbk73Iv8cAAEM', invite_type : 'EMAIL' }]">
    </g:hangout>
</body>
</html>
