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
        
    </head>
  <body>
<?php 
include('connect.php');
 ?>
    <!-- Header -->
        
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
                            
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

        </div>
    </div>
  </div>
</div> 
</div>
<br><br><br>
<div class="container">
<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4 text-center"><h2>:Register As:</h2></div>
    <div class="col-md-4"></div>
</div>
<br>
<div class="row">
    <div class="col-md-3"><button type="button" class="btn btn-primary btn-lg btn-block" onclick="showDoc()">Doctor</button></div>
    <div class="col-md-3"><button type="button" class="btn btn-primary btn-lg btn-block" onclick="showPat()">Patient</button></div>
    <div class="col-md-3"><button type="button" class="btn btn-primary btn-lg btn-block" onclick="showPha()">Pharmacist</button></div>
    <div class="col-md-3"><button type="button" class="btn btn-primary btn-lg btn-block" onclick="showHos()">Hospital</button></div>
</div>

<div class="row" id="doctor" style="display: none;">
    <form action="doctor_register.php" method="post">
    <div class="form-group">
      <input type="text" class="form-control" name="name" id="name" placeholder="Enter full name here" name="name"><br>
      <input type="email" class="form-control" name="email" id="email" placeholder="Enter your personal email address here" name="email"><br>
      <input type="number" class="form-control" name="unum" id="unum" placeholder="Enter unique registration number to verify your defree" name="unum"><br>
      <input type="number" class="form-control" name="phnum" id="phnum" placeholder="Enter private phone number here" name="phnum"><br>
      <input type="text" class="form-control" name="dob" id="dob" placeholder="Enter your date of birth in format dd/mm/yyyy" name="dob"><br>
      <input type="text" class="form-control" name="qualification" id="qualification" placeholder="Kindly Enter you qualification here('Dentist','MBBS','MD',...)" name="qualification"><br>
      <input type="text" class="form-control" name="field" id="field" placeholder="Enter your especialization 'GP','OBS','GYNE',..." name="dob"><br>
      <input type="text" class="form-control" name="address" id="address" placeholder="Enter your hospital or clinic address here" name="address"><br>
      <input type="password" class="form-control" name="pwd" id="pwd" placeholder="Enter password" name="pwd"><br>
      <input type="text" class="form-control" name="pwd1" id="pwd1" placeholder="Enter password again" name="pwd1"><br>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
  <br>
</div>

<div class="row" id="pharmacist" style="display: none;">
    <form action="/action_page.php">
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="ph_name" placeholder="Enter full name here" name="ph_name">
    </div>
    <div class="form-group">
      <label for="email">Email Address:</label>
      <input type="email" class="form-control" id="ph_email" placeholder="Enter your personal email address here" name="ph_email">
    </div>
     <div class="form-group">
      <label for="U_number">Unique Registration number:</label>
      <input type="number" class="form-control" id="ph_u_num" placeholder="Enter unique registration number to verify your degree" name="ph_u_num">
    </div>
    <div class="form-group">
      <label for="ph_num">Phone number:</label>
      <input type="number" class="form-control" id="ph_num" placeholder="Enter private phone number here" name="ph_num">
    </div>
    
    
    <div class="form-group">
      <label for="cnum">Store Phone Number:</label>
      <input type="number" class="form-control" id="st_num" placeholder="Enter store phone number here" name="st_num">
    </div>
    <div class="form-group">
      <label for="date">Date of birth:</label>
      <input type="text" class="form-control" id="ph_dob" placeholder="Enter your date of birth in format dd/mm/yyyy" name="ph_dob">
    </div>
    
    <div class="form-group">
      <label for="qualification">Qualification:</label>
      <input type="text" class="form-control" id="ph_qualification" placeholder="Kindly Enter you qualification here('Drugist','pharmacist',...)" name="ph_qualification">
    </div>    
    <div class="form-group">
      <label for="address">Store Address:</label>
      <input type="text" class="form-control" id="st_address" placeholder="Enter your store address here" name="st_address">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="ph_wd" placeholder="Enter password" name="ph_pwd">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="text" class="form-control" id="pwd1" placeholder="Enter password again" name="pwd1">
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
  <br>
</div>

<div class="row" id="patient" style="display: none;">
    <form action="patient_register.php" method="POST">
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="pt_name" placeholder="Enter full name here" name="pt_name">
    </div>
    <div class="form-group">
      <label for="email">Email Address:</label>
      <input type="email" class="form-control" id="pt_email" placeholder="Enter your personal email address here" name="pt_email">
    </div>
    <div class="form-group">
      <label for="pt_num">Phone number:</label>
      <input type="number" class="form-control" id="pt_num" placeholder="Enter private phone number here" name="pt_num">
    </div>
    <div class="form-group">
      <label for="date">Date of birth:</label>
      <input type="text" class="form-control" id="pt_dob" placeholder="Enter your date of birth in format dd/mm/yyyy" name="pt_dob">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pt_pwd" placeholder="Enter password" name="pt_pwd">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="text" class="form-control" id="pwd1" placeholder="Enter password again" name="pwd1">
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
  <br>
</div>

<div class="row" id="hospital" style="display: none;">
</div>

</div>
<script>
    function showDoc() {
      document.getElementById('doctor').style.display = "block";
      document.getElementById('patient').style.display = "none";
      document.getElementById('pharmacist').style.display = "none";
      document.getElementById('hospital').style.display = "none";
    }
    function showPat() {
      document.getElementById('doctor').style.display = "none";
      document.getElementById('patient').style.display = "block";
      document.getElementById('pharmacist').style.display = "none";
      document.getElementById('hospital').style.display = "none";
    }
    function showPha() {
      document.getElementById('doctor').style.display = "none";
      document.getElementById('patient').style.display = "none";
      document.getElementById('pharmacist').style.display = "block";
      document.getElementById('hospital').style.display = "none";
    }
    function showHos() {
      document.getElementById('doctor').style.display = "none";
      document.getElementById('patient').style.display = "none";
      document.getElementById('pharmacist').style.display = "none";
      document.getElementById('hospital').style.display = "block";
    }
</script>
</body>
</html>