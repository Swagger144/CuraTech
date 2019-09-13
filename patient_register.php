<?php  
echo $_POST['pt_num'];
$name=$_POST['pt_name'];
$email=$_POST['pt_email'];
$num=$_POST['pt_num'];
$dob=$_POST['pt_dob'];
$pwd=$_POST['pt_pwd'];



 $username = "root";
    $password = "sagar";
    $servername = "localhost";
    $dbname = "test";
    
    $connect = mysqli_connect($servername,$username,$password,$dbname) or die("\n Connection Failed !" . $con->connect_error);
    $query= mysqli_query($connect,"INSERT INTO `patient_login`(`name`,`email` ,`phnum`, `dob`, `pwd`) VALUES ('$name','$email','$num','$dob','$pwd')");
    if ($query) {
    	echo "successfull";
    	echo "<script>location.href = 'index.php';</script>";
    	# code...
    }
?>