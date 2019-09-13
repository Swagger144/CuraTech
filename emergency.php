<?php 

	list($lat,$lag) = explode(":",$_POST['str']);

	
	if ($result){
		echo "SOS alert activated";
	}
	else{
		echo "failed";
	}
?>