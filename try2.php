<?php 
	$username = "root";
	$password = "sagar";

	$name="swagger";
	$name2="sunshine";
	$db = new PDO('mysql:host=localhost;dbname=test',$username,$password);
	$stmt = $db->prepare("Select * from imagetest");
	$stmt->bindParam(1,$name);
	$stmt->bindParam(2,$name2);
	$stmt->execute();
	$row = $stmt->fetch();
	$dbname=$row['name'];
	$dbname2=$row['name2']; 

	echo "name is ".$name."<br>";
	echo "name2 is ".$name2."<br>";
	echo "dbname is ".$dbname."<br>";
	echo "dbname is ".$dbname2."<br>";

  ?>