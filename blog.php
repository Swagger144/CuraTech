<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>CuraTech</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300">
        <link href='http://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>
        <link href="http://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/animate.min.css">
        <link rel="stylesheet" type="text/css" media="all" href="assets/css/style-projects.css">
        

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
        
        <style type="text/css">
            .animated {
                -webkit-transition: height 0.2s;
                -moz-transition: height 0.2s;
                transition: height 0.2s;
            }
        </style>
    </head>


    <body>
<?php
include('connect.php');
    $username = "root";
    $password = "sagar";
    $servername = "localhost";
    $dbname = "test";
    
    $conn = mysqli_connect($servername,$username,$password,$dbname) or die("\n Connection Failed !" . $con->connect_error);


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
                <a class="navbar-brand wow fadeInDownBig" href="index.php"><img src="assets/img/slider/Office.png" width="100" alt="Office"></a>      
            </div>
        
            <div id="navbar-spy" class="collapse navbar-collapse navbar-responsive-collapse">
                <ul class="nav navbar-nav pull-right">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="about.php">About</a>
                    </li>
                    <li class="active">
                        <a href="blog.php">Blog</a>
                    </li>
                    
                    <li>
                        <a href="contact.php"><span>Contact</span></a>
                    </li>
                    <li>
                        <a href="#" data-toggle="modal" data-target="#basicModal0"><span>Log-In</span></a>
                    </li>
                </ul>         
            </div>
        </div>
    </nav>
<div class="modal fade" id="basicModal0" tabindex="-1" role="dialog" aria-labelledby="basicModal0" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel" style="text-align: center;"><b>Log-In</b></h4>
            </div>
            <div class="modal-body">
                
                <div class="container">
                    <div class="row">
                        <div class="col-md-4" style="">    
                            <div class="panel panel-default">
                                <div class="panel body">
                                    <?php 
                                        if (isset($_POST['username']) && isset($_POST['password'])) {
                                            $username=$_POST['username'];
                                            $password=$_POST['password'];
                                            $query = "SELECT * FROM login WHERE username='$username' AND password='$password'";
                                            $sql = mysqli_query($con, $query);
                                            if (mysqli_num_rows($sql) == 1){
                                                session_start();
                                                while($rs = mysqli_fetch_assoc($sql)){
                                                    $user =  $rs['username'];
                                                    $type =  $rs['type'];
                                                }
                                                $_SESSION['username']=$user;
                                                $_SESSION['type']=$type;
                                                if($type == 'patient'){
                                                ?>
                                                    <script>window.location.href='patient/index.php'</script>
                                                <?php
                                                }else if($type == 'doctor'){
                                                ?>
                                                    <script>window.location.href='doctor/index.php'</script>
                                                <?php
                                                }else if($type == 'admin'){
                                                ?>
                                                    <script>window.location.href='admin/index.php'</script>
                                                <?php
                                                }else if($type == 'pharmacist'){
                                                ?>
                                                    <script>window.location.href='pharmacist/index.php'</script>
                                                <?php
                                                }
                                            }
                                        }
                                     ?>
                                    <form method="post">
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" name="username" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" name="password" class="form-control">
                                        </div>
                                        <input type="submit" name="login" value="Log-In" class="btn btn-primary">
                                    </form>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel body">
                                    <form>
                                        <label>Don't have an account!</label>
                                        <input type="submit" name="login" value="Register" class="btn btn-success">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

        </div>
    </div>
  </div>
</div>
          
    <div class="row container-kamn">
        <img src="assets/img/slider/slide5.jpg" class="blog-post" alt="Feature-img" align="right" width="100%"> 
    </div>

    <!-- End Header -->


    <!-- Main Container -->
    <!--
    <div id="banners"></div>
        <div class="container">
            <div class="row">
                <div class="col-xs-3"></div>        
                <div class="col-xs-6">
                    <img src="images/img1.jpg" class="profile-img">
                    <textarea class="form-control" placeholder="Enter Text here..."></textarea>
                </div>
            </div>
        </div>
    -->

    <div class="container">
    <div class="row">
    <div class="col-lg-2"></div>    
    <div class="col-lg-8">

            <?php

                $query1="select * from newsfeed order by `id` DESC";
                $sql1=mysqli_query($conn,$query1);

                while($res = mysqli_fetch_assoc($sql1))
                {
                    $sender=$res['name'];
                    $title=$res['title'];
                    $msg=$res['msg'];
                    $date=$res['date'];
                    $time=$res['time'];

                    echo '<div class="well well-lg"><div class="media1">';
                    echo '<a class="pull-left" href="#"><img class="media-object img-circle" style="margin: 10px;" width="80px" src="profilepic/'.$sender.'.jpg" alt=""></a>';
                    echo '<div class="media-body"><h3>'.$title.'</h3><h5><small class="text-muted">'.$date.' '.$time.'</small></h5><hr><p>'.$msg.'</p></div>';
                    echo '</div></div>';
                }
            ?>
    </div>    
    </div>
    </div>

        
       
        <!--End Main Container -->


        <!-- Footer -->
    <footer> 
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h3><i class="fa fa-map-marker"></i> Contact:</h3>
                    <p class="footer-contact">
                        495/497, Collector Colony, Chembur East, Mumbai, Maharashtra 400074<br>
                        Phone: +91-8411011058 / +91-8149459354<br>
                        Email: hello@curatech.org<br>
                    </p>
                </div>
                <div class="col-md-4">
                    <h3><i class="fa fa-external-link"></i> Links</h3>
                    <p> <a href="about.php"> About ( Who we are )</a></p>
                    <p> <a href="contact.php"> Contact ( Feel free to contact )</a></p>
                    <p> <a href="blog.php"> Blog ( Write to us )</a></p> 
                </div>   
        </div>
      </div>
    </footer>

    
    <div class="copyright text center">
        <p>&copy; Copyright 2018, <a href="#">CuraTech</a></p>
    </div>

        
    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/textexpand.js"></script>
    <script>
      new WOW().init();
    </script>
    <script>
            $(function(){
                $('.normal').autosize();
                $('.animated').autosize({append: "\n"});
            });
        </script>

  </body>
</html>
