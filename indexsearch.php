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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>   
 </head> 
 <body>
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
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="about.php">About</a>
                    </li>
                    <li>
                        <a href="blog.php">Blog</a>
                    </li>
                    <li class="active">
                        <a href="indexsearch.php">Search Medicine</a>
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
  <br /><br />
  <div class="container" style="width:600px;">
   
   <label>Search Medicine</label>
   <input type="text" name="medicine" id="medicine" class="form-control input-lg" autocomplete="off" placeholder="Enter Medicine Name" />
   <button class="btn btn-primary" type="submit" id="btnsearch">Search</button>
   <br><br>
   <div id="content-pane">
     

   </div>
  </div>
 </body>
</html>

<script>
$(document).ready(function(){
 //live search for medicines
 $('#medicine').typeahead({
  source: function(query, result)
  {
   $.ajax({
    url:"fetch.php",
    method:"POST",
    data:{query:query},
    dataType:"json",
    success:function(data)
    {
     result($.map(data, function(item){
      return item;
     }));
    }
   })
  }
 });

        $('#content-pane').load('nothing.php');
        
        $('button#btnsearch').on('click',function(){
          var product_name=$('input#medicine').val();
          $.post('search.php',{str:product_name},function(data){
          $('div#content-pane').html(data);

          });

        });
 
});
</script>