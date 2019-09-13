<?php
//fetch.php
$username = "root";
  $password = "sagar";
  $servername = "localhost";
  $dbname = "curatech";
  
  $connect = mysqli_connect($servername,$username,$password,$dbname) or die("\n Connection Failed !" . $con->connect_error);

$request = mysqli_real_escape_string($connect, $_POST["query"]);
$query = "
 SELECT * FROM medicine WHERE product_name LIKE '%".$request."%'
";

$result = mysqli_query($connect, $query);

$data = array();

if(mysqli_num_rows($result) > 0)
{
 while($row = mysqli_fetch_assoc($result))
 {
  $data[] = $row["product_name"];
 }
 echo json_encode($data);
}

?>
