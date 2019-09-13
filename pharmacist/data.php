<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		body{
			background: url("../assets/img/slider/pharmabg.jpg");
			height: 100%;
			background-repeat: no-repeat;
    		background-size: cover;
		}

		.button {
		    background-color: #4CAF50;
		    border: none;
		    color: white;
		    padding: 10px 10px;
		    text-align: center;
		    text-decoration: none;
		    display: inline-block;
		    font-size: 16px;
		    margin: 4px 2px;
		    cursor: pointer;
		}



		/*table css*/
		#customers {
		    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
		    border-collapse: collapse;
		    width: 100%;
		}

		#customers td, #customers th {
		    border: 1px solid #ddd;
		    padding: 8px;

		}

		#customers tr:nth-child(even){background-color: #f2f2f2;}

		#customers tr:hover {background-color: #ddd;}

		#customers th {
		    padding-top: 12px;
		    padding-bottom: 12px;
		    text-align: left;
		    background-color: #4CAF50;
		    color: white;
		}
	</style>
</head>
<body>




	<table id="customers">

 <?php 

 	
	$username = "root";
	$password = "sagar";
	$servername = "localhost";
	$dbname = "test";
	
	$con = mysqli_connect($servername,$username,$password,$dbname) or die("\n Connection Failed ! " . $con->connect_error);
	$sql = "SELECT * FROM cart";
	$result = $con->query($sql);

	
   
  if ($result->num_rows > 0) {
	  echo "<tr>"; 
    
    echo "<th>Product</th>";
    echo "<th>Quantity</th>";
    echo "<th>Buyer</th>";
  echo"</tr>";	
		while ($row = $result->fetch_assoc()) {
      echo '<tr>';
      echo '<td align="center">'.$row["prodname"].'</td>';
      echo '<td align="center">'.$row["quantity"].'</td>';
      echo '<td align="center">'.$row["username"].'</td>';
      echo '</tr>';		
}
	}
	else{
}

?>
</table>
</body>
</html>