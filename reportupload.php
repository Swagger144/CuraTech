<?php  
include('connect.php');
session_start();
if(!isset($_SESSION['username'])){
    header("location: index.php");
}
$user=$_SESSION['username'];
 

 $con = mysqli_connect("localhost", "root", "sagar", "test");  
 if(isset($_POST["insert"]))  
 {  
      $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"])); 
      $desc = $_POST['desc'];
      $query = "INSERT INTO report (img,username,description) VALUES ('$file','$user','$desc')";  
      if(mysqli_query($con, $query))  
      {  
           echo '<script>alert("Image Inserted into Database")</script>';
           echo '<script type="text/javascript">location.href = "profile.php?user='.$user.'";</script>';
           unset($file);
           unset($desc);
      }  
 }  
 ?> 
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>    
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>
  <body>  
           <br /><br />  
           <div class="container" style="width:100%;">  
                <h1 align="center">Insert or Update reports Here</h1>  
                <br />  
                <form method="post" enctype="multipart/form-data">  
                     <input type="file" name="image" id="image" />
                     <p style="color: #a3a1a0">File size must be less than 64kb if not so <a href="http://compressimage.toolur.com/">Click Here</a></p>  
                     <br />  
                     <input type="text" style="width: 500px;" class="form-control" name="desc" placeholder="Enter description of the uploaded report">
                     <input type="submit" name="insert" id="insert" style="float: left; margin: 10px;" value="Insert" class="btn btn-info" />  
                </form>  
                
                <br />  
                <br />  
                <!-- <table class="table table-bordered" style="width: 100%">  
                     <tr>  
                          <th>Image</th>  
                     </tr>  
                <?php  
                $query = "SELECT * FROM report ORDER BY id DESC";  
                $result = mysqli_query($connect, $query);  
                while($row = mysqli_fetch_array($result))  
                {  
                     echo '  
                          <tr>  
                               <td>  
                                    <img src="data:image/jpeg;base64,'.base64_encode($row['img'] ).'" height="100%" width="100%" class="img-thumnail" />  
                               </td>  
                          </tr>  
                     ';  
                }  
                ?>  
                </table> -->  
           </div>  
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      $('#insert').click(function(){  
           var image_name = $('#image').val();  
           if(image_name == '')  
           {  
                alert("Please Select Image");  
                return false;  
           }  
           else  
           {  
                var extension = $('#image').val().split('.').pop().toLowerCase();  
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                {  
                     alert('Invalid Image File');  
                     $('#image').val('');  
                     return false;  
                }  
           }  
      });  
 });  
 </script>  