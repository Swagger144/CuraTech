<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>


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

    storageRef.child('report/'+ '<?php echo $username_patient; ?>').getDownloadURL().then(function(url) {
      var img = document.getElementById('myimg');
      img.src = url;
      alert(url);
      window.location.href="test.php?counted='<?php echo $_SESSION['report_count']'?>'";
    }).catch(function(error) {
    // Handle any errors
    });

  </script>
</body>
</html>
