<?php 
session_start();
	$username = "root";
	$password = "sagar";
	$servername = "localhost";
	$dbname = "test";
	
	$con = mysqli_connect($servername,$username,$password,$dbname) or die("\n Connection Failed !" . $con->connect_error);

	date_default_timezone_set("Asia/Kolkata");

	$post_patient = $_POST['msg_patient'];
	$sender=$_SESSION['username'];
	$date=date("d-m-y");
	$time=date("h:i:s");

	if($post_patient){
		$query1="insert into `newsfeed_patient` (`name`,`msg`,`date`,`time`) values ('$sender','$post_patient','$date','$time')";
		$sql1=mysqli_query($con,$query1);
		//echo "inserted";
	}

	if($sql1){
		$query1="select * from `newsfeed_patient` where id=(select max(id) from `newsfeed_patient`)";
		$sql1=mysqli_query($con,$query1);

		$res = mysqli_fetch_assoc($sql1);
        $sender=$res['name'];
        $msg=$res['msg'];
        $date=$res['date'];
        $time=$res['time'];

        echo '<div class="well well-lg"><div class="media1">';
                    echo '<a class="pull-left" href="#"><img class="media-object img-circle" style="margin: 10px;" width="80px" src="../profilepic/'.$sender.'.jpg" alt=""></a>';
                    echo '<div class="media-body"><h3>'.$sender.'</h3><h5><small class="text-muted">'.$date.' '.$time.'</small></h5><hr><p>'.$msg.'</p>';
                    echo '<p class="text-primary">Comments:-</p>';
                    echo '
                    <form class="form-inline" action="comment.php" method="post" id="cmntshare">
                        <div class="form-group">
                            <a class="pull-left" href="#">
                                <img class="media-object img-circle" style="margin-right: 10px;" width="40px" src="../profilepic/'.$sender.'.jpg" alt="">
                            </a>
                            <input class="form-control" style="border-radius: 1rem; " type="text" name="cmnt" id="cmnt" placeholder="Comment">
                        </div>
                        <button class="btn btn-info pull-right" style="margin-top:10px" type="submit" id="cmntbtn">Comment</button>
                    </form>';
                    echo '</div></div></div>';

	}