<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Report</title>
	<style type="text/css" media="screen">
		body{
			display: flex;
			min-height: 100vh;
			width: 100%;
			padding: 0;
			margin:0;
			align-items: center;
			justify-content: center;
			flex-direction: column;
		}	

		#uploader{
			-webkit-appearance:none;
			appearance:none;
			width: 50%;
			margin-bottom: 10px;
		}

	</style>
</head>
<body>
	<form method="POST" style="margin-bottom: 10px;">
		<input type="text" name="img_name" id="img_name">
		<input type="submit" name="imgsubmit">		
	</form>
 <?php 
 	if (isset($_POST['imgsubmit'])) {
			# code...
			$img_name=$_POST['img_name'];
			echo "Just click the button below, select the file and wait until it is completed";
		}
		session_start();
	$username_patient=$_SESSION['username'];

	 $username = "root";
	 $password = "sagar";
	 $servername = "localhost";
	 $dbname = "test";
	 $con = mysqli_connect($servername,$username,$password,$dbname) or die("\n Connection Failed !" . $con->connect_error);
	 $query="select * from `reportFirebase` where username='patient'" ;
	 $sql=mysqli_query($con,$query);
	 $count=0;
	 $count=mysqli_num_rows($sql);
	 $_SESSION["report_count"]=$count;
	 $res = mysqli_fetch_assoc($sql);
		
	 // $count=0;
	 // while ($res) {
	 // 	# code...
	 // 	$count=$count+1;
	 // }
	 
 ?>

<progress value="0" max="100" id="uploader">0%</progress>
	<input type="file" value="upload" id="fileButton"/>


	<script src="https://www.gstatic.com/firebasejs/4.10.1/firebase.js"></script>
	<script>
	  // Initialize Firebase
	  var config = {
	    apiKey: "AIzaSyDfPx-j-x2Ona9x2E-BmL6TsYfBfPWNNw4",
	    authDomain: "upload-file-49b87.firebaseapp.com",
	    databaseURL: "https://upload-file-49b87.firebaseio.com",
	    projectId: "upload-file-49b87",
	    storageBucket: "upload-file-49b87.appspot.com",
	    messagingSenderId: "831543497537"
	  };
	  

	  firebase.initializeApp(config);

	  //get elements
	  var uploader=document.getElementById('uploader');
	  var file=document.getElementById('fileButton');

	  //Listen to the file selection
	  fileButton.addEventListener('change',function(e){
	  	//get file
	  	var file=e.target.files[0];
	  	// create a storage ref
	  	var storageRef = firebase.storage().ref('report/'+ '<?php echo $img_name; ?>');
	  	// Upload a file 
	  	var task= storageRef.put(file);
	  	//Update the progress bar
	  	task.on('state_changed',
	  		function progress(snapshot){
	  			var percentage= (snapshot.bytesTransferred / snapshot.totalBytes)*100;
	  			uploader.value=percentage;
	  		},

	  		function error(err){

	  		},
	  		function complete(){
	  			 window.location.href="retrievereports.php?img_name='<?php echo $img_name; ?>'";
	  		}

	  		);
	  });


	  
	</script>

<!-- 
	
 -->

</body>
</html>