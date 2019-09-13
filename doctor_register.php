<?php  
$name=$_POST['name'];
$email=$_POST['email'];
$regnum=$_POST['unum'];
$con_num=$_POST['phnum'];
$dob=$_POST['dob'];
$qualification=$_POST['qualification'];
$especialization=$_POST['field'];
$clinic=$_POST['address'];
$pwd=$_POST['pwd'];



 $username = "root";
    $password = "sagar";
    $servername = "localhost";
    $dbname = "test";
    
    $connect = mysqli_connect($servername,$username,$password,$dbname) or die("\n Connection Failed !" . $con->connect_error);
    $query= mysqli_query($connect,"INSERT INTO `doctor_login`(`name`, `email`, `registrationnum`, `contact_num`, `dob`, `qualification`, `especialization`, `clinic`, `pwd`) VALUES ('$name','$email','$regnum','$con_num','$dob','$qualification','$especialization','$clinic','$pwd')");
    if ($query) {
    	echo "successfull";
    	echo "<script>location.href = 'index.php';</script>";
    	# code...
    }
?>