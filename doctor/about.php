<?php 
include('../connect.php');
session_start();
if(!isset($_SESSION['username'])){
    header("location: ../index.php");
}
$user=$_SESSION['username'];
 ?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>CuraTech</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300">
        <link href='http://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>
        <link href="http://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="../assets/css/style.css">
        <link rel="stylesheet" href="../assets/css/animate.min.css">
        <link rel="stylesheet" type="text/css" media="all" href="../assets/css/style-projects.css">
        

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="../assets/ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
    </head>


    <body>
<?php 
include('../sosf.php');
 ?>
 <a href="../messaging/message.php"><img src="../chat.png" style="float: right; z-index: 20; position: fixed; bottom: 75px; right: 30px; width: 7%;"></a>
    <!-- Header -->
        <div style="margin: 0px; width: 100px;"><?php include('../language_support.php');?></div>
    <nav id="navbar-section" class="navbar navbar-default navbar-static-top navbar-sticky" role="navigation">
        <div class="container">
        
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand wow fadeInDownBig" href="index.php"><img src="../assets/img/slider/Office.png" width="100" alt="CuraTech"></a>      
            </div>
        
            <div id="navbar-spy" class="collapse navbar-collapse navbar-responsive-collapse">
                <ul class="nav navbar-nav pull-right">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li class="active">
                        <a href="about.php">About</a>
                    </li>
                    <li>
                        <a href="blog.php">Blog</a>
                    </li>
                    <li>
                        <a href="newsfeed.php">Prescribe</a>
                    </li>
                    <li>
                        <a href="indexsearch.php">Search Medicine</a>
                    </li>
                    <li>
                        <a href="contact.php"><span>Contact</span></a>
                    </li>
                    <li>
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <?php echo $user; ?> </a>

                          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="padding: 10px; line-height: 45px;">
                            <a class="dropdown-item" href="../docprofile.php?user=<?php echo $user; ?>">View Profile</a><br>
                            <a class="dropdown-item" href="../logout.php">Log Out</a>
                          </div>
                    </li>
                </ul>         
            </div>
        </div>
    </nav>


    <!--End Header -->
    <!-- Main Container -->

    <div class="row container-kamn">
        <img src="../assets/img/slider/slide1.jpg" class="blog-post" alt="Feature-img" align="right" width="100%"> 
    </div>

    <div id="banners"></div>
    <div class="container">   
        <div class="row">
            <div class="side-left col-sm-4 col-md-4">

                <h3 class="lead">  About our Firm : </h3><hr>

                <p>we help you look after your own health effortlessly as well as take care of loved ones wherever they may reside in India. You can buy and send medicines from any corner of the country - with just a few clicks of the mouse.</p>
                <a href="#anchor1"> Authentic</a><br>
                <a href="#anchor2"> Accessible</a><br>
                <a href="#anchor3">Affordable</a><br>
                <br>
                <h4>CONVENIENCE</h4><hr>
                Heavy traffic, lack of parking, monsoons, shop closed, forgetfulness… these are some of the reasons that could lead to skipping of vital medications. Since taking medicines regularly is a critical component of managing chronic medical conditions, it’s best not to run out of essential medicines. Just log on to curatech.com, place your order online and have your medicines delivered to you – without leaving the comfort of your home.
                <br>
                <h4>TRUST</h4><hr>
                CuraTech continues a legacy of 100 years of success in the pharmaceutical industry. We are committed to provide safe, reliable and affordable medicines as well as a customer service philosophy that is worthy of our valued customers’ loyalty. We offer a superior online shopping experience, which includes ease of navigation and absolute transactional security.
                <br>
            </div>
            <div class="col-sm-8 col-md-8">
                <h3 class="lead"id="anchor1"> Authentic </h3><hr>
                <p>
                    We guarantee the authenticity of all the products available on CuraTech. Medicines, healthcare devices and wellness products are from popular brands. Every product on CuraTech is checked regularly for expiry. Our pharmacist assures fresh storage of every product. You get 100% genuine medicines from us. Buying prescribed medicines online from us would give you great savings on your pocket! Furthermore, for third and second tier cities along with rural areas, where people has low access to the latest medicines, we provide online medicine service to deliver original medicines at their door steps. You can return any product if the seal is broken.
                </p>

                <h3 class="lead"id="anchor2">Accessible</h3>
                <p>
                    Our step-by-step instructions make it easy for you to upload your prescription online. The interface is designed keeping user's ergonomics in mind. Easy to access and simple to understand, our design promises numerous seamless and hassle-free purchases. You can upload prescription for yourself, family, friends and others to buy the respective medicines. Every product is meticulously categorized to give a clear table of content to search and buy the required products. We make wide range of medicines conveniently available all across India. <br>
                </p>

                <h3 class="lead"id="anchor3">Affordable</h3>
                <br>
                <p>Right from buying prescribed medicines, protein supplements to healthcare products, we provide attractive discount, coupon cards and attractive offers on every purchase. In rural villages and third tier cities, along with scarcity of latest medicines, the medicines, if available, are costly. Our store ensures medicines that are affordable and come with savings. Buying medicines online was never so easy. We provide secure payment methods- COD, Credit-Debit Card and Internet Banking- assuring your information is safe and confidential.</p>
            </div>  
        </div>    
    </div>  

    <!--End Main Container -->

    <!-- Footer -->
    <footer> 
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h3><i class="fa fa-map-marker"></i> Contact:</h3>
                    <p class="footer-contact">
                        495/497, Collector Colony, Chembur East, Mumbai, Maharashtra 400074<br>
                        Phone: +91-8411011058 / +91-8149459354<br>
                        Email: hello@curatech.org<br>
                    </p>
                </div>
                <div class="col-md-4">
                    <h3><i class="fa fa-external-link"></i> Links</h3>
                    <p> <a href="about.php"> About ( Who we are )</a></p>
                    <p> <a href="blog.php"> Blog</a></p>
                    <p> <a href="newsfeed.php"> Prescribe </a></p>
                    <p> <a href="indexsearch.php"> Search Medicine ( Find a generic )</a></p>
                    <p> <a href="contact.php"> Contact ( Feel free to contact )</a></p> 
                </div>
        </div>
      </div>
    </footer>

    
    <div class="copyright text center">
        <p>&copy; Copyright 2018, <a href="#">CuraTech</a></p>
    </div>


    
    <script type="text/javascript" src="../js/jquery-1.10.2.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../js/wow.min.js"></script>
    <script>
      new WOW().init();
    </script>
     <script type="text/javascript">$(function() {
  $('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
});</script>

  </body>
</html>
