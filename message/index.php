<?php require_once("connect.php"); ?>
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
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
        
 
</head>
<body style="background:#eee;">
    <!-- login -->
    <div class="login-container">
        <?php
            /*login script*/
            if(isset($_POST['login'])){
                $username = trim(mysqli_real_escape_string($con, $_POST['username']));
                $password = trim(mysqli_real_escape_string($con, $_POST['password']));
                
                //check user and password match to the database
                $query = mysqli_query($con,"SELECT * FROM `login` WHERE username='$username' AND password='$password'");
                //check how much rows return
                if(mysqli_num_rows($query) == 1){
                    //login the user
 
                    //get the id of the user
                    $fetch = mysqli_fetch_assoc($query);
                    //start the session and store user id in the session
                    session_start();
                    $_SESSION['id'] = $fetch['userid'];
                    $_SESSION['username'] = $fetch['username'];
                    $_SESSION['type'] = $fetch['type'];
                    header("Location: message.php");
                }else{
                    //show error message
                    echo "<div class='alert alert-danger'>Invalid username Or password.</div>";
                }
            }
        ?>
        <h1>Login</h1>
        <form action="index.php" method="post">
            <div class="form-group">
                <input required type="text" class="form-control" name="username" placeholder="Enter Your username.">
            </div>
            <div class="form-group">
                <input required type="password" class="form-control" name="password" placeholder="Enter Your password.">
            </div>
            <input type="submit" value="login"  name="login" class="btn btn-primary btn-block">
        </form>
        <br>
    </div>
    <!-- /login -->
</body>
</html>