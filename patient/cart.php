<?php 
include('../connect.php');
session_start();
if(!isset($_SESSION['username'])){
    header("location: ../index.php");
}
$user=$_SESSION['username'];
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>   
 </head> 
 <body>
    <?php 
        include('../sosf.php');
     ?>
    <a href="../messaging/message.php"><img src="../chat.png" style="float: right; z-index: 20; position: fixed; bottom: 75px; right: 30px; width: 7%;"></a>
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

                <a class="navbar-brand wow fadeInDownBig" href="index.php"><img class="office-logo" src="../assets/img/slider/Office.png" alt="Office"></a>      
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
                    <li>
                        <a href="newsfeed.php">Consult a Doctor</a>
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
                            <a class="dropdown-item" href="../profile.php?user=<?php echo $user; ?>">View Profile</a><br>
                            <a class="dropdown-item" href="../logout.php">Log Out</a>
                          </div>
                    </li>
                </ul>         
            </div>
        </div>
    </nav>
    <?php 
    include("../connect.php");
    $username = "root";
    $password = "sagar";
    $servername = "localhost";
    $dbname = "test";
    
    $connect = mysqli_connect($servername,$username,$password,$dbname) or die("\n Connection Failed !" . $con->connect_error);


        $id=$_GET['id'];
            $query = "select * from medicine where id='$id'";
            $sql = mysqli_query($con,$query);
            $res=mysqli_fetch_assoc($sql);
            $prodid = $res['id'];
            $prodname = $res['product_name'];
            $prodcompany = $res['company'];
            $prodavail = $res['available'];
            $prodprice = $res['price'];
        
        if($prodid!=""){
        $query2="insert into cart (prodname,prodcompany,prodprice,username) values ('$prodname','$prodcompany','$prodprice','$user')";
        $sql2=mysqli_query($connect,$query2);
    }

        $query3="select * from cart";
        $sql3=mysqli_query($connect,$query3);

     ?>
     <br><br><br><br><br><br>
     <div class="container">
    <table id="cart" class="table table-hover table-condensed">
                    <thead>
                        <tr>
                            <th style="width:50%">Product</th>
                            <th style="width:10%">Price</th>
                            <th style="width:8%">Quantity</th>
                            <th style="width:22%" class="text-center">Subtotal</th>
                            <th style="width:10%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            while($res3=mysqli_fetch_assoc($sql3)){
                                ?>
                        <tr>
                            <td data-th="Product">
                                <div class="row">
                                    <div class="col-sm-10">
                                        <h4 class="nomargin"><?php echo $res3['prodname']; ?></h4>
                                    </div>
                                </div>
                            </td>
                            <td data-th="Price">₹<?php echo $res3['prodprice']; ?></td>
                            <td data-th="Quantity">
                                <input type="number" class="form-control text-center" value="1">
                            </td>
                            <td data-th="Subtotal" class="text-center"><?php echo $res3['prodprice']; ?></td>
                            <td class="actions" data-th="">
<!--                                 <form method="post">
                                <button class="btn btn-danger btn-sm" name="delete"><i class="fa fa-trash-o"></i></button>    
                                </form> -->
                            </td>
                        </tr>
                        <?php
                            // if(isset($_POST['delete'])){
                            //     $id1=$res3['id'];
                            //     $query4="delete from cart where id='$id1'";
                            //     $sql4=mysqli_query($connect,$query4);
                            // }
                            }
                            $query5="select sum(prodprice) as sum from cart";
                            $sql5=mysqli_query($connect,$query5);
                            $res5=mysqli_fetch_assoc($sql5);
                            $sum=$res5['sum'];
                         ?>
                    </tbody>
                    <tfoot>
                        <tr class="visible-xs">
                            <td class="text-center"><strong>Total 1.99</strong></td>
                        </tr>
                        <tr>
                            <td><a href="indexsearch.php" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
                            <td colspan="2" class="hidden-xs"></td>
                            <td class="hidden-xs text-center"><strong>Total ₹<?php echo $sum; ?></strong></td>
                            <td><a href="checkout.php" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a></td>
                        </tr>
                    </tfoot>
                </table>
</div>
</body>
</html>