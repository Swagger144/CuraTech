<?php
    //connect to the database
    require_once("connect.php");
    session_start();
    //shop not login  users from entering 
    if(isset($_SESSION['id'])){
        $user_id = $_SESSION['id'];
        $user_type = $_SESSION['type'];
    }else{
        header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <center> 
        <strong>Welcome <?php echo $_SESSION['username']; ?>  <a href="logout.php">logout</a></strong>
    </center>
     
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