<?php 
include('../connect.php');
session_start();
if(!isset($_SESSION['username'])){
    header("location: ../index.php");
}
$user=$_SESSION['username'];
 ?>
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
        <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="../assets/css/style.css">
        <link rel="stylesheet" href="../assets/css/animate.min.css">
        <link rel="stylesheet" type="text/css" media="all" href="../assets/css/style-projects.css">
        

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="../assets/ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
        
        <style type="text/css">
            .animated {
                -webkit-transition: height 0.2s;
                -moz-transition: height 0.2s;
                transition: height 0.2s;
            }
        </style>

        <script src='https://code.jquery.com/jquery-2.1.3.min.js'></script>
    </head>


    <body>
<?php
    $username = "root";
    $password = "sagar";
    $servername = "localhost";
    $dbname = "test";
    
    $con = mysqli_connect($servername,$username,$password,$dbname) or die("\n Connection Failed !" . $con->connect_error);

include('../sosf.php');
?>
<a href="../messaging/message.php"><img src="../chat.png" style="float: right; z-index: 20; position: fixed; bottom: 75px; right: 30px; width: 7%;"></a>
    <!-- Header -->
        <div style="margin: 0px; width: 100px;"><?php include('../language_support.php');?></div>
    <nav id="navbar-section" class="navbar navbar-default navbar-static-top navbar-sticky" role="navigation">
        <div class="container">
        
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand wow fadeInDownBig" href="index.php"><img src="../assets/img/slider/Office.png" width="100" alt="Office"></a>      
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
                        <a href="newsfeed.php">Prescribe</a>
                    </li>
                    <li>
                        <a href="indexsearch.php">Search Medicine</a>
                    </li>
                    <li>
                        <a href="contact.php"><span>Contact</span></a>
                    </li>
                    <li>
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <?php echo $user; ?> </a>

                          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="padding: 10px; line-height: 45px;">
                            <a class="dropdown-item" href="../docprofile.php?user=<?php echo $user; ?>">View Profile</a><br>
                            <a class="dropdown-item" href="../logout.php">Log Out</a>
                          </div>
                    </li>
                </ul>         
            </div>
        </div>
    </nav>
          
    <div class="row container-kamn">
        <img src="../assets/img/slider/slide5.jpg" class="blog-post" alt="Feature-img" align="right" width="100%"> 
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
        <div class="well well-lg">
            <div class="media1">
                <a class="pull-left" href="#">
                  <img class="media-object img-circle" width="80px" src="../profilepic/person1.jpg" alt="">
                </a>
            <div class="media-body">                                    
                <div class="form-group" style="padding:12px;">
                    <form action="feed.php" method="post" id="blogshare">
                        <input class="form-control" type="text" name="title" id="title" placeholder="Title"><br>
                        <textarea class="form-control animated" name="msg" id="msg" placeholder="Update your status"></textarea>
                        <button class="btn btn-info pull-right" style="margin-top:10px" type="submit" id="share">Share</button>
                        <span class="success" id="result"></span>
                        <script src="insert.js"></script>
                    </form>
                </div>
            </div>
            </div>
        </div>  <!-- well-sm -->
    </div>
    </div>

    <div class="row">
    <div class="col-lg-2"></div>    
    <div class="col-lg-8" id="blog-view">
        
    </div>    
    </div>
<!--
    <div class="row">
    <div class="col-lg-2"></div>    
    <div class="col-lg-8">
        <div class="well well-lg">
            <div class="media1">
                <a class="pull-left" href="#">
                  <img class="media-object img-circle" width="80px" src="../profilepic/person1.jpg" alt="">
                </a>
            <div class="media-body">                                    
                <h3>MESSAGE TITLE</h3>
                <h5><small class="text-muted">16-1-18 12:23:15</small></h5>
                <hr>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
            </div>
        </div>  
    </div>    
    </div>-->

    <div class="row">
    <div class="col-lg-2"></div>    
    <div class="col-lg-8">

            <?php
                $query="select * from newsfeed order by id desc";
                $sql=mysqli_query($con,$query);

                while($res = mysqli_fetch_assoc($sql))
                {
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
    </div>    
    </div>
    </div>
<!--
    <div class="row">
    <div class="col-lg-2"></div>    
    <div class="col-lg-8" id="blog-view">

    </div>    
    </div>

    <script type="text/javascript">
        alert("here");
        $(document).ready(function() {
            setInterval(function () {
                $('#blog-view').load('blog-view.php')
            }, 1000);
        });
        alert("here as well");
    </script>-->
        
       
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
                    <p> <a href="blog.php"> Blog</a></p>
                    <p> <a href="newsfeed.php"> Prescribe </a></p>
                    <p> <a href="indexsearch.php"> Search Medicine ( Find a generic )</a></p>
                    <p> <a href="contact.php"> Contact ( Feel free to contact )</a></p> 
                </div>
        </div>
      </div>
    </footer>

    
    <div class="copyright text center">
        <p>&copy; Copyright 2018, <a href="#">CuraTech</a></p>
    </div>

        
    <script type="text/javascript" src="../js/jquery-1.10.2.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../js/wow.min.js"></script>
    <script src="../js/textexpand.js"></script>
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
