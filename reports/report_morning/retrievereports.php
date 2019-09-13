<?php

    $img_name=$_GET['img_name'];

    echo $img_name;
 
  ?>




 <!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>

  <?php
    session_start();
    $username_patient=$_SESSION['username'];
    $count=$_SESSION['report_count'];
    echo $username_patient;
    echo $count;


  ?>
  <!-- <form method="post" action="test.php" id="confirm"> -->
  
  
  <img id="myimg">



  <script src="https://www.gstatic.com/firebasejs/4.10.1/firebase.js"></script>
  <script>
    // Initialize Firebase
    var config = {
      apiKey: "AIzaSyDfPx-j-x2Ona9x2E-BmL6TsYfBfPWNNw4",
      authDomain: "upload-file-49b87.firebaseapp.com",
      databaseURL: "https://upload-file-49b87.firebaseio.com",
      projectId: "upload-file-49b87",
      storageBucket: "upload-file-49b87.appspot.com",
      messagingSenderId: "831543497537"
    };
    

    firebase.initializeApp(config);
  </script>
  <script type="text/javascript">
    
   var storage = firebase.storage();
var storageRef = storage.ref();
alert("report/<?php echo $username_patient; ?><?php echo $count; ?>");
   storageRef.child('report/'+ '<?php echo $username_patient; ?>'+'<?php echo $count; ?>').getDownloadURL().then(function(url) {
  var img = document.getElementById('myimg');
  img.src = url;
  alert(url);
  //window.location.href="test.php?ur="+url;
}).catch(function(error) {
  // Handle any errors
});

  //   $("#confirmbtn").click(function(){ $.ajax({
  //     type:"POST",
  //     url:"retrievereports.php",
  //     data:{url:url},
  //     success:ffunction(result){
  //       $("#content").html(result);
  //       $("#submit").hide();
  //     }
  //   });
  // });
  </script>

  <button type="submit" name="submit" id="confirmbtn">Confirm</button>
  <div id="content"></div>

 <?php 
  $test = $_POST["url"];
  echo $test;
 ?>
</body>
</html>
