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
        <link rel="shortcut icon" href="../assets/ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300">
        <link href='http://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>
        <link href="http://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="../assets/css/animate.min.css">
        <link rel="stylesheet" href="../assets/css/style.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>

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

                <a class="navbar-brand wow fadeInDownBig" href="index.php"><img class="office-logo" src="../assets/img/slider/Office.png" alt="Office"></a>      
            </div>
        
            <div id="navbar-spy" class="collapse navbar-collapse navbar-responsive-collapse">
                <ul class="nav navbar-nav pull-right">
                    <li>
                        <a href="../<?php echo $user_type; ?>/index.php">Home</a>
                    </li>
                    <li>
                        <a href="../<?php echo $user_type; ?>/about.php">About</a>
                    </li>
                    <li>
                        <a href="../<?php echo $user_type; ?>/blog.php">Blog</a>
                    </li>
                    <?php 
                        if($user_type=="patient"){
                     ?>
                    <li>
                        <a href="../<?php echo $user_type; ?>/newsfeed.php">Consult a Doctor</a>
                    </li>
                    <?php 
                        }else{
                     ?>
                    <li>
                        <a href="../<?php echo $user_type; ?>/newsfeed.php">Prescribe</a>
                    </li>
                    <?php } ?>
                    <li>
                        <a href="../<?php echo $user_type; ?>/indexsearch.php">Search Medicine</a>
                    </li>
                    <li>
                        <a href="../<?php echo $user_type; ?>/contact.php"><span>Contact</span></a>
                    </li>
                    <li>
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $user; ?></a>

                          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="padding: 10px; line-height: 45px;">
                            <a class="dropdown-item" href="#">View Profile</a><br>
                            <a class="dropdown-item" href="#">Messages</a><br>
                            <a class="dropdown-item" href="reports.php">Report upload</a><br>
                            <a class="dropdown-item" href="../logout.php">Log Out</a>
                          </div>
                    </li>
                </ul>         
            </div>
        </div>
    </nav>

    <!-- End Header -->
     
    <div class="message-body">
        <div class="message-left">
            <ul>
                <?php
                    //show all the users expect me
                    $q = mysqli_query($con, "SELECT * FROM `login` WHERE userid!='$user_id'");
                    //display all the results
                    while($row = mysqli_fetch_assoc($q)){
                        $img=$row['username'];
                        echo "<a href='message.php?id={$row['userid']}'><li><img src='../profilepic/".$img.".jpg'> {$row['username']} ({$row['type']})</li></a>";
                        
                    }
                ?>
            </ul>
        </div>
 
        <div class="message-right">
            <!-- display message -->
            <div class="display-message disable">
            <?php
                //check $_GET['id'] is set
                if(isset($_GET['id'])){
                    $user_two = trim(mysqli_real_escape_string($con, $_GET['id']));
                    //check $user_two is valid
                    $q = mysqli_query($con, "SELECT `userid` FROM `login` WHERE userid='$user_two' AND userid!='$user_id'");
                    //valid $user_two
                    if(mysqli_num_rows($q) == 1 && $user_type != 'patient'){
                        //check $user_id and $user_two has conversation or not if no start one
                        $conver = mysqli_query($con, "SELECT * FROM `conversation` WHERE (user_one='$user_id' AND user_two='$user_two') OR (user_one='$user_two' AND user_two='$user_id')");
 
                        //they have a conversation
                        if(mysqli_num_rows($conver) == 1){
                            //fetch the converstaion id
                            $fetch = mysqli_fetch_assoc($conver);
                            $conversation_id = $fetch['id'];
                        }else{ //they do not have a conversation
                            //start a new converstaion and fetch its id
                            $q = mysqli_query($con, "INSERT INTO `conversation` VALUES ('','$user_id',$user_two)");
                            $conversation_id = mysqli_insert_id($con);
                        }
                    }else if(mysqli_num_rows($q) == 1 && $user_type == 'patient'){
                        //check $user_id and $user_two has conversation or not if no start one
                        $conver = mysqli_query($con, "SELECT * FROM `conversation` WHERE (user_one='$user_id' AND user_two='$user_two') OR (user_one='$user_two' AND user_two='$user_id')");
 
                        //they have a conversation
                        if(mysqli_num_rows($conver) == 1){
                            //fetch the converstaion id
                            $fetch = mysqli_fetch_assoc($conver);
                            $conversation_id = $fetch['id'];
                        }
                    }else{
                        die("Invalid $_GET ID.");
                    }
                }else {
                    die("Click On the Person to start Chating.");
                }
            ?>
            </div>
            <!-- /display message -->
 
            <!-- send message -->
            <div class="send-message">
                <!-- store conversation_id, user_from, user_to so that we can send send this values to post_message_ajax.php -->
                <input type="hidden" id="conversation_id" value="<?php echo base64_encode($conversation_id); ?>">
                <input type="hidden" id="user_form" value="<?php echo base64_encode($user_id); ?>">
                <input type="hidden" id="user_to" value="<?php echo base64_encode($user_two); ?>">
                <?php 
                    if($user_type == 'patient')
                    {
                        $q1 = mysqli_query($con,"SELECT * FROM `conversation` WHERE (user_one='$user_id' AND user_two='$user_two') OR (user_one='$user_two' AND user_two='$user_id')");

                        if(mysqli_num_rows($q1) == 1){
                            ?>
                                <div class="form-group">
                                    <textarea class="form-control" id="message" placeholder="Enter Your Message"></textarea>
                                </div>
                                <button class="btn btn-primary" id="reply">Reply</button> 
                                <span id="error"></span>
                            <?php
                        }else{
                            ?>
                                <div class="form-group">
                                    <textarea class="form-control" id="message" placeholder="Enter Your Message" disabled></textarea>
                                </div>
                                <button class="btn btn-primary disabled" id="noreply">Reply</button> 
                                <span id="error"></span>
                            <?php
                        }
                    }else{
                        ?>
                            <div class="form-group">
                                <textarea class="form-control" id="message" placeholder="Enter Your Message"></textarea>
                            </div>
                            <button class="btn btn-primary" id="reply">Reply</button> 
                            <span id="error"></span>
                        <?php
                    }
                 ?>
                <!-- <div class="form-group">
                    <textarea class="form-control" id="message" placeholder="Enter Your Message"></textarea>
                </div>
                <button class="btn btn-primary" id="reply">Reply</button> 
                <span id="error"></span> -->
            </div>
            <!-- / send message -->
        </div>
    </div>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script> 
</body>
</html>