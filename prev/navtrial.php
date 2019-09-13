<!DOCTYPE html>
<html>
<head>
	<title>nav</title>
	<link href='sticky.css' rel='stylesheet' type='text/css'>
	<script src="http://code.jquery.com/jquery-3.2.1.js"></script>
	<script type="text/javascript">
		$(window).scroll(function(){
			if($(this).scrollTop()>100){
				$('.nav').addClass("sticky");
			}
			else
			{
				$('.nav').removeClass("sticky");
			}
		})
	</script>
</head>
<body>
</body>
<div class='header'>Header</div>
<div class='nav'>Navigation</div>
<div class='content'>
  <h1>Simple sticky navigation bar</h1>
  <p>Using jQuery we add (or remove) a sticky class to the navigation bar. The sticky class fixes the position.</p>
  <p>This happens whenever the page is scrolled. We check to see how far down the page has scrolled, if this number is greater than the height of the header, we add the sticky class to the navigation.</p>
  <p>You can already achieve this effect using only CSS with <b>position: sticky;</b> but it's not supported by many browsers at the moment.</p>
</div>
<div>
	<img onmouseover="bigImg(this)" src="ctlogo.jpg" align="none">
</div>
</html>