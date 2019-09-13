<!doctype html>
<html lang="en">
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

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>  
    </head>
  <body>
<?php 
include('connect.php');
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
                    <li class="active">
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="about.php">About</a>
                    </li>
                    <li>
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
                                                    $userid = $rs['userid'];
                                                }
                                                $_SESSION['username']=$user;
                                                $_SESSION['type']=$type;
                                                $_SESSION['id']=$userid;
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
                                    <form action="register.php" method="post">
                                        <label>Don't have an account!</label>
                                        <input type="submit" name="login" value="Register" class="btn btn-success" onclick="location.href='register.php'">
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
    <!-- End Header -->


    <!-- Begin #carousel-section -->
    <section id="carousel-section" class="section-global-wrapper"> 
        <div class="container-fluid-kamn">
            <div class="row">
                <div id="carousel-1" class="carousel slide" data-ride="carousel">

                    <!-- Indicators -->
                    <ol class="carousel-indicators visible-lg">
                        <li data-target="#carousel-1" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-1" data-slide-to="1"></li>
                        <li data-target="#carousel-1" data-slide-to="2"></li>
                    </ol>
        
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <!-- Begin Slide 1 -->
                        <div class="item active">
                            <img src="assets/img/slider/slide2.jpg" height="400" alt="Image of first carousel">
                            
                        </div>
                        <!-- End Slide 1 -->

                        <!-- Begin Slide 2 -->
                        <div class="item">
                            <img src="assets/img/slider/slide4.jpg" height="400" alt="Image of second carousel">
                            
                        </div>
                        <!-- End Slide 2 -->

                        <!-- Begin Slide 3 -->
                        <div class="item">
                            <img src="assets/img/slider/slide2.jpg" height="400" alt="Image of third carousel">
                            
                        </div>
                        <!-- End Slide 3 -->
                    </div>
        
                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-1" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-1" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- End #carousel-section -->


     

   </div>


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
    <script>
      new WOW().init();
    </script>
  </body>
</html>
