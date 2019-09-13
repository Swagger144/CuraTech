<!DOCTYPE html>
<html>
<head>
	<title>CuraTech</title>
	<link rel="shortcut icon" type="image/x-icon" href="ctlogo.jpg" />
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="http://code.jquery.com/jquery-3.2.1.js"></script>
	<script type="text/javascript">
		$(window).scroll(function(){
			if($(this).scrollTop()>100){
				$('.navbar').addClass("sticky");
			}
			else
			{
				$('.navbar').removeClass("sticky");
			}
		})
	</script>
</head>
<body>
<div class="header">
	<div class="logo">
	<img src="ctlogo.jpg" style="width:75px; height:75px; margin-left: 20px; margin-top: 12.5px">
	</div>
	<div class="header-name">
		<h1>CuraTech</h1>
	</div>
</div>
<div class="navbar">
	<ul>
		<li><button><a href="index.php">Home</a></button></li>
		<li><div class="dropdown"><button class="drop"><a href="index.php">Prescription</a></button>
				<div class="dropdown-content" style="left:0;">
    				<a href="#">Link 1</a>
    				<a href="#">Link 2</a>
    				<a href="#">Link 3</a>
  				</div>
  				</div>
		</li>
		<li><button><a href="index.php">Need a Doc</a></button></li>
		<li style="float: right;"><button><a href="index.php">Login/Sign up</a></button></li>
		<li style="float: right;"><button><a href="index.php">About</a></button></li>
	</ul>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
sagar
</body>
</html>