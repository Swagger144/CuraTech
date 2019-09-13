r<!doctype html>
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
                    <li>
                        <a href="blog.php">Blog</a>
                    </li>
                    <li class="active">
                        <a href="newsfeed.php">Newsfeed</a>
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
        <img src="assets/img/slider/slide9.jpg" width="100%" class="blog-post" alt="Feature-img" align="right" width="100%"> 
    </div>

    <!--End Header -->


    <!-- Main Container -->

    
    
    <!--End Main Container -->


    <!-- Footer -->
    <footer> 
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h3><i class="fa fa-map-marker"></i> Contact:</h3>
                    <p class="footer-contact">
                        Via Ludovisi 39-45, Rome, 54267, Italy<br>
                        Phone: 1.800.245.356 Fax: 1.800.245.357<br>
                        Email: hello@LawOffice.org<br>
                    </p>
                </div>
                <div class="col-md-4">
                    <h3><i class="fa fa-external-link"></i> Links</h3>
                    <p> <a href="#"> About ( Who we are )</a></p>
                    <p> <a href="#"> Services ( What we do )</a></p>
                    <p> <a href="#"> Contact ( Feel free to contact )</a></p>
                    <p> <a href="#"> Blog ( Write to us )</a></p>
                    <p> <a href="#"> Team ( Meet the Team )</a></p> 
                </div>
              <div class="col-md-4">
                <h3><i class="fa fa-heart"></i> Socialize</h3>
                <div id="social-icons">
                    <a href="#" class="btn-group google-plus">
                        <i class="fa fa-google-plus"></i>
                    </a>
                      <a href="#" class="btn-group linkedin">
                        <i class="fa fa-linkedin-square"></i>
                    </a>
                      <a href="#" class="btn-group twitter">
                        <i class="fa fa-twitter"></i>
                    </a>
                      <a href="#" class="btn-group facebook">
                        <i class="fa fa-facebook"></i>
                    </a>
                </div>
              </div>    
        </div>
      </div>
    </footer>

    
    <div class="copyright text center">
        <p>&copy; Copyright 2014, <a href="#">Your Website Link</a>. Theme by <a href="https://themewagon.com/" target="_blank">ThemeWagon</a></p>
    </div>

    
    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script>
      new WOW().init();
    </script>

  </body>
</html>
