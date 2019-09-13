<?php
    //connect to the database
    require_once("connect.php");
    session_start();
    //shop not login  users from entering 
    if(!isset($_SESSION['username'])){
        header("location: ../index.php");
    }
    $user=$_SESSION['username'];
    $user_id = $_SESSION['id'];
    $user_type = $_SESSION['type'];
?>
<!DOCTYPE html>
<html>
<head>
        <!-- meta data & title -->
        <meta charset="utf-8">
        <title>CuraTech</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300">
        <link href='http://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>
        <link href="http://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/animate.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

        <style type="text/css">

        body {
          background: #F1F3FA;
        }

        /* Profile container */
        .profile {
          margin: 20px 0;
        }

        /* Profile sidebar */
        .profile-sidebar {
          padding: 20px 0 10px 0;
          background: #fff;
        }

        .profile-userpic img {
          float: none;
          margin: 0 auto;
          width: 50%;
          height: 50%;
          -webkit-border-radius: 50% !important;
          -moz-border-radius: 50% !important;
          border-radius: 50% !important;
        }

        .profile-usertitle {
          text-align: center;
          margin-top: 20px;
        }

        .profile-usertitle-name {
          color: #5a7391;
          font-size: 16px;
          font-weight: 600;
          margin-bottom: 7px;
        }

        .profile-usertitle-job {
          text-transform: uppercase;
          color: #5b9bd1;
          font-size: 12px;
          font-weight: 600;
          margin-bottom: 15px;
        }

        .profile-userbuttons {
          text-align: center;
          margin-top: 10px;
        }

        .profile-userbuttons .btn {
          text-transform: uppercase;
          font-size: 11px;
          font-weight: 600;
          padding: 6px 15px;
          margin-right: 5px;
        }

        .profile-userbuttons .btn:last-child {
          margin-right: 0px;
        }
            
        .profile-usermenu {
          margin-top: 30px;
        }

        .profile-usermenu ul li {
          border-bottom: 1px solid #f0f4f7;
        }

        .profile-usermenu ul li:last-child {
          border-bottom: none;
        }

        .profile-usermenu ul li a {
          color: #93a3b5;
          font-size: 14px;
          font-weight: 400;
        }

        .profile-usermenu ul li a i {
          margin-right: 8px;
          font-size: 14px;
        }

        .profile-usermenu ul li a:hover {
          background-color: #fafcfd;
          color: #5b9bd1;
        }

        .profile-usermenu ul li.active {
          border-bottom: none;
        }

        .profile-usermenu ul li.active a {
          color: #5b9bd1;
          background-color: #f6f9fb;
          border-left: 2px solid #5b9bd1;
          margin-left: -2px;
        }

        /* Profile Content */
        .profile-content {
          padding: 20px;
          background: #fff;
          min-height: 460px;
        }

        .user-row {
            margin-bottom: 14px;
        }

        .user-row:last-child {
            margin-bottom: 0;
        }

        .dropdown-user {
            margin: 13px 0;
            padding: 5px;
            height: 100%;
        }

        .dropdown-user:hover {
            cursor: pointer;
        }

        .table-user-information > tbody > tr {
            border-top: 1px solid rgb(221, 221, 221);
        }

        .table-user-information > tbody > tr:first-child {
            border-top: 0;
        }


        .table-user-information > tbody > tr > td {
            border-top: 0;
        }

        </style>
        <script type="text/javascript" src="js/profile.js"></script>
</head>
<body>
<?php 
    $user_profile=$_GET["user"];

    $username = "root";
  $password = "sagar";
  $servername = "localhost";
  $dbname = "curatech";
  $dbname2 = "test";
  
  $connect = mysqli_connect($servername,$username,$password,$dbname) or die("\n Connection Failed !" . $con->connect_error);
  $con = mysqli_connect($servername,$username,$password,$dbname2) or die("\n Connection Failed !" . $con->connect_error);

  $query="select * from login where username='$user_profile'";
  $sql = mysqli_query($connect,$query);

  $res = mysqli_fetch_assoc($sql);
    $profile_name=$res['name'];
    $email=$res['email'];
    $type=$res['type'];

    
 ?>

    <!-- Header -->
        <div style="margin: 0px; width: 100px;"><?php include('language_support.php');?></div>
    <nav id="navbar-section" class="navbar navbar-default navbar-static-top navbar-sticky" role="navigation">
        <div class="container">
        
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a class="navbar-brand wow fadeInDownBig" href="index.php"><img class="office-logo" src="assets/img/slider/Office.png" alt="Office"></a>      
            </div>
        
            <div id="navbar-spy" class="collapse navbar-collapse navbar-responsive-collapse">
                <ul class="nav navbar-nav pull-right">
                    <li>
                        <a href="<?php echo $user_type; ?>/index.php">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo $user_type; ?>/about.php">About</a>
                    </li>
                    <?php 
                        if($user_type=="patient"){
                     ?>
                    <li>
                        <a href="<?php echo $user_type; ?>/blog.php">Blog</a>
                    </li>
                    <?php 
                        }else{
                     ?>
                    <li>
                        <a href="<?php echo $user_type; ?>/blog.php">Blog</a>
                    </li>
                    <?php } ?>
                    <?php 
                        if($user_type=="patient"){
                     ?>
                    <li>
                        <a href="<?php echo $user_type; ?>/newsfeed.php">Consult a Doctor</a>
                    </li>
                    <?php 
                        }else{
                     ?>
                    <li>
                        <a href="<?php echo $user_type; ?>/newsfeed.php">Prescribe</a>
                    </li>
                    <?php } ?>
                    <li>
                        <a href="<?php echo $user_type; ?>/indexsearch.php">Search Medicine</a>
                    </li>
                    <li>
                        <a href="<?php echo $user_type; ?>/contact.php"><span>Contact</span></a>
                    </li>
                    <li class="active">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $user; ?></a>

                          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="padding: 10px; line-height: 45px;">
                            <a class="dropdown-item" href="#">View Profile</a><br>
                            <a class="dropdown-item" href="#">Messages</a><br>
                            <a class="dropdown-item" href="reports.php">Report upload</a><br>
                            <a class="dropdown-item" href="logout.php">Log Out</a>
                          </div>
                    </li>
                </ul>         
            </div>
        </div>
    </nav>

    <!-- End Header -->
<br><br><br><br>
    <div class="container">
        <div class="row profile">
            <div class="col-md-3">
                <div class="profile-sidebar">
                    <!-- SIDEBAR USERPIC -->
                    <div class="profile-userpic">
                        <img src="profilepic/patient.jpg" class="img-responsive" alt="">
                    </div>
                    <!-- END SIDEBAR USERPIC -->
                    <!-- SIDEBAR USER TITLE -->
                    <div class="profile-usertitle">
                        <div class="profile-usertitle-name">
                            <?php 
                                echo $profile_name;
                             ?>
                        </div>
                        <div class="profile-usertitle-job">
                            <?php echo $type; ?>
                        </div>
                    </div>
                    <!-- END SIDEBAR USER TITLE -->
                    
                    <!-- SIDEBAR MENU -->
                    <div class="profile-usermenu">
                        <ul class="nav">
                            <li>
                                <a href="#overview">
                                <i class="glyphicon glyphicon-home"></i>
                                Overview </a>
                            </li>
                            <li>
                                <a href="#reports">
                                <i class="glyphicon glyphicon-list-alt"></i>
                                Reports </a>
                            </li>
                            <li>
                                <a href="#history">
                                <i class="glyphicon glyphicon-time"></i>
                                History </a>
                            </li>
                        </ul>
                    </div>
                    <!-- END MENU -->
                </div>
            </div>
            <div class="col-md-9">
                <div class="profile-content">
                   <div id="overview">
                       <h3 class="lead">Overview:</h3><hr>
                       <?php 
                          $query6 = "select * from curatech_users where username='$user_profile'";
                          $sql6 = mysqli_query($con,$query6);
                          $res6=mysqli_fetch_assoc($sql6);
                          
                            if($res6['diabetes']=="" || $res6['cardiac']=="" || $res6['thyroid']=="" || $res6['bloodgroup']=="" || $res6['phnum']=="" || $res6['address']=="" || $res6['dob']=="")
                              echo '<div class="alert alert-danger">
                                      <span class="glyphicon glyphicon-remove"></span><strong>Incomplete Profile!</strong> Please update your profile
                                    </div><br>';
                          
                        ?>
                        <span class="text-primary">Name: </span><?php echo $res6['name']; ?><br>
                        <span class="text-primary">Email-id: </span><?php echo $res6['email']; ?><br>
                        <span class="text-primary">Contact number: </span><?php echo $res6['phnum']; ?><br>
                        <span class="text-primary">Address: </span><?php echo $res6['address']; ?><br>
                        <span class="text-primary">Blood group: </span><?php echo $res6['bloodgroup']; ?><br>
                        <span class="text-primary">Throid: </span><?php echo $res6['thyroid']; ?><br>
                        <span class="text-primary">Diabetes: </span><?php echo $res6['diabetes']; ?><br>
                        <span class="text-primary">Cardiac: </span><?php echo $res6['cardiac']; ?><br>
                        <?php 
                          if($user==$user_profile){
                         ?>
                        <a href="#" data-toggle="modal" data-target="#basicModal0" role="button" class="btn btn-success pull-right"><span>Update Profile</span></a>
                        <?php } ?>
                   </div>
<div class="modal fade" id="basicModal0" tabindex="-1" role="dialog" aria-labelledby="basicModal0" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel" style="text-align: center;"><b>Update Profile</b></h4>
            </div>
            <div class="modal-body">
                <div class="container">
                    <input type="text" class="form-control" style="width: 400px;" placeholder="Name"><br>
                    <input type="email" class="form-control" style="width: 400px;" placeholder="Email-id"><br>
                    <input type="text" class="form-control" style="width: 400px;" placeholder="Address"><br>
                    <input type="text" class="form-control" style="width: 400px;" placeholder="Contact number"><br>
                    <input type="date" class="form-control" style="width: 400px;" placeholder="Date of birth"><br>
                    <label>Blood Group:</label><select style="width: 400px;" class="form-control">
                        <option>A B+</option>
                        <option>A B-</option>
                        <option>A+</option>
                        <option>A-</option>
                        <option>B+</option>
                        <option>B-</option>
                        <option>0 +</option>
                        <option>0-</option>
                    </select>
                    <label>Thyroid:</label>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                      <label class="form-check-label" for="inlineRadio1">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                      <label class="form-check-label" for="inlineRadio2">No</label>
                    </div>
                    <label>Diabetes:</label>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                      <label class="form-check-label" for="inlineRadio1">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                      <label class="form-check-label" for="inlineRadio2">No</label>
                    </div>
                    <label>Cardiac:</label>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                      <label class="form-check-label" for="inlineRadio1">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                      <label class="form-check-label" for="inlineRadio2">No</label>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <a role="button" type="button" class="btn btn-default" data-dismiss="modal">Close</a>

        </div>
    </div>
  </div>
</div>
                   <div id="reports">
                       <h3 class="lead">Reports:</h3><hr>

                       <a href="reportupload.php" role="button" class="btn btn-success">Upload Reports</a>
                       <?php 
                          $var=1;
                          $query5 = "select * from report";
                          $sql5=mysqli_query($con,$query5);

                          while($res5=mysqli_fetch_assoc($sql5)){
                            ?>
                              <div class="row user-row">
                                <div class="col-xs-8 col-sm-9 col-md-10 col-lg-10">
                                  <strong><?php echo $res5['description']; ?></strong>
                                </div>
                                  <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 dropdown-user" data-for=".report-<?php echo $res5['id']; ?>">
                                  <i class="glyphicon glyphicon-chevron-down text-muted"></i>
                              </div>
                              </div>
                              <div class="row user-infos report-<?php echo $res5['id']; ?>">
                                <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-xs-offset-0 col-sm-offset-0 col-md-offset-1 col-lg-offset-1">
                                  <?php if($var==3){$var=$var+1; ?>
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <h3 class="panel-title"><?php echo $res5['description']; ?><br><small class="text-warning">2018-08-08 12:54:35</small></h3>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <?php 
                                                    echo '<img src="assets/img/urine.jpg" height="100%" width="100%" class="img-thumnail">';
                                                 ?>
                                            </div>
                                        </div>
                                    </div>
                                  <?php }?>
                                  <?php if($var==2){$var=$var+1;} ?>
                                  <?php if($var==1){ $var=$var+1; ?>
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <h3 class="panel-title"><?php echo $res5['description']; ?><br><small class="text-warning">2018-08-08 12:54:35</small></h3>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <?php 
                                                    echo '<img src="assets/img/blood.jpg" height="100%" width="100%" class="img-thumnail">';
                                                 ?>
                                            </div>
                                        </div>
                                    </div>
                                  <?php } ?>
                                  
                                  
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <h3 class="panel-title"><?php echo $res5['description']; ?><br><small class="text-warning">2018-23-07 17:00:25</small></h3>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <?php 
                                                    echo '<img src="data:image/jpeg;base64,'.base64_encode($res5['img'] ).'" height="100%" width="100%" class="img-thumnail">';
                                                 ?>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <?php
                          }
                        ?>
                   </div>
                   <div id="history">
                       <h3 class="lead">History:</h3><hr>
                       <?php 
                            $query2="SELECT * FROM `newsfeed_patient` where name='$user_profile'";
                            $sql2=mysqli_query($con,$query2);

                            while($res2=mysqli_fetch_assoc($sql2)){
                                $catid=$res2['id'];
                                $query4="select category from category where id='$catid'";
                                $sql4=mysqli_query($con,$query4);
                                $res4=mysqli_fetch_assoc($sql4);
                                $cat=$res4['category'];

                                //if($cat=="deficiency"){
                        ?>        
                        <!-- <strong class="text-primary">Deficiency:</strong> -->
                       <div class="row user-row">
                           <div class="col-xs-8 col-sm-9 col-md-10 col-lg-10">
                                <strong><?php echo $res2['date']; ?></strong><br>
                                <?php 
                                    $cmntid=$res2['id'];
                                    $query3="select count(*) as count from comment where id='$cmntid'";
                                    $sql3=mysqli_query($con,$query3);
                                    $res3=mysqli_fetch_assoc($sql3);
                                 ?>
                                <span class="text-muted">Comments: <?php echo $res3['count']."<br>"; ?></span>
                                <span>Category : <?php echo $cat; ?></span>
                            </div>
                            <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 dropdown-user" data-for=".res-<?php echo $res2['id']; ?>">
                                <i class="glyphicon glyphicon-chevron-down text-muted"></i>
                            </div>
                        </div>
                        <div class="row user-infos res-<?php echo $res2['id']; ?>">
                            <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-xs-offset-0 col-sm-offset-0 col-md-offset-1 col-lg-offset-1">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><?php echo $res2['msg']; ?></h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <?php 
                                                $cmntquery="select * from comment where id = '$cmntid'";
                                                    $cmntsql=mysqli_query($con,$cmntquery);
                                                    if($cmntsql){
                                                        echo '<p class="text-primary">Comments:-</p>';
                                                        while($cmntres = mysqli_fetch_assoc($cmntsql)){
                                                            $cmnt=$cmntres['comment'];
                                                            $cmntuser=$cmntres['user'];

                                                            echo'<a class="pull-left" href="#"><img class="media-object img-circle" style="margin-right: 10px;" width="40px" src="profilepic/'.$cmntuser.'.jpg" alt=""></a><h6>'.$cmntuser.'</h6><p>'.$cmnt.'</p>';
                                                        }    
                                                    }
                                             ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php    }//}
                        ?>
                   </div>
                </div>
            </div>
        </div>
    </div>

    
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script> 
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script>
          new WOW().init();
        </script>
         <script type="text/javascript">$(function() {
      $('a[href*=#]:not([href=#])').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
          var target = $(this.hash);
          target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
          if (target.length) {
            $('html,body').animate({
              scrollTop: target.offset().top
            }, 1000);
            return false;
          }
        }
      });
    });
    </script>
</body>
</html>