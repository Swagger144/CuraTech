<?php
session_start();
	$username = "root";
	$password = "sagar";
	$servername = "localhost";
	$dbname = "test";
	
	$con = mysqli_connect($servername,$username,$password,$dbname) or die("\n Connection Failed !" . $con->connect_error);

	date_default_timezone_set("Asia/Kolkata");

	$msg=$_POST['msg'];
	$msg_title=$_POST['title'];
	$sender=$_SESSION['username'];
	//echo $msg."<br>".$msg_title."<br>".$sender;
	$date=date("d-m-y");
	$time=date("h:i:s");
	if($msg){
	$query="insert into `newsfeed` (`name`,`title`,`msg`,`date`,`time`) values ('$sender','$msg_title','$msg','$date','$time')";
	$sql=mysqli_query($con,$query);
}
    if($sql){
    	$query="select * from newsfeed where id=(select max(id) from newsfeed)";
                $sql=mysqli_query($con,$query);

                $res = mysqli_fetch_assoc($sql);
                    $sender=$res['name'];
                    $title=$res['title'];
                    $msg=$res['msg'];
                    $date=$res['date'];
                    $time=$res['time'];

                    echo '<div class="well well-lg"><div class="media1">';
                    echo '<a class="pull-left" href="#"><img class="media-object img-circle" style="margin: 10px;" width="80px" src="../profilepic/'.$sender.'.jpg" alt=""></a>';
                    echo '<div class="media-body"><h3>'.$title.'</h3><h5><small class="text-muted">'.$date.' '.$time.'</small></h5><hr><p>'.$msg.'</p><div class="stats"><a href="#" class="btn btn-default stat-item"><i class="fa fa-thumbs-up icon"></i>2</a></div></div>';
                    echo '</div></div>';
    }
?>
