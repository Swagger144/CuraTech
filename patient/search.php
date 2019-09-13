<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>  
    
</head>
<body>
	<?php
		$username = "root";
	$password = "sagar";
	$servername = "localhost";
	$dbname = "curatech";
	
	$con = mysqli_connect($servername,$username,$password,$dbname) or die("\n Connection Failed !" . $con->connect_error);

		$product_name=$_POST['str'];
		$sql="select * from `medicine` where `product_name`='$product_name'";
		$result = $con->query($sql);
		
		if ($result->num_rows > 0) {
			?>
			<table class="table table-bordered">
			<tr>
				<th> Product</th>
			<tr>
			<?php
			while ($row = $result->fetch_assoc()) {
				$name1=$row["product_name"];
				$prodid=$row["id"];
				echo "<tr>";
				echo "<td><h3>".$row["product_name"]."</h3><br>BY ".$row["company"]."<br>Content: ".$row["component"]."<br><strong>Price: ".$row['price']."</strong></td> ";
				echo "</tr>";
				echo "<tr>";
				echo "<td><a href='cart.php?id=$prodid' role='button' class='btn btn-primary'>Buy Now!</a></td>";
				// echo '<td><button type="button" class="btn btn-primary" onclick=addToCart($name1)>Buy Now</button></td>';
				echo "</tr>";
				$comp=$row["component"];
			}
			?>
			</table>
				
			<?php
		}
		else
		{
			?>
			<div class="text-danger"> No Results Found !</div>
			<?php
		}

		$alt="select * from `medicine` where `component`='$comp' and `product_name` != '$product_name'";
		$res = $con->query($alt);

		if ($res->num_rows > 0) {
			?>
			<table class="table table-bordered">
			<tr>
				<th> Alternatives Available</th>
			<tr>
			<?php
			while ($row = $res->fetch_assoc()) {
				$name=$row["product_name"];
				$prodid=$row["id"];
				echo "<tr>";
				echo "<td><h3>".$row["product_name"]."</h3><br>BY ".$row["company"]."<br>Content: <strong>".$row["component"]."</strong><br><strong>Price: ".$row['price']."</strong></td> ";
				echo "</tr>";
				echo "<tr>";
				echo "<td><a href='cart.php?id=$prodid' role='button' class='btn btn-primary'>Buy Now!</a></td>";
				echo "</tr>";
			}
			?>
			</table>
				
			<?php
		}
		else
		{
			?>
			<div class="text-danger"> No Alternatives Found !</div>
			<?php
		}
		
	?>
</body>
</html>