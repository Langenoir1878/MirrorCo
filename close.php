<?php 
/*
 * Yiming ZHANG ITMD 562-01 FP
 * 14:45:00 PM W DEC 2ND 2015
 * @3001-718
 *
 */

namespace yzhan214\fp;
session_start();

if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit;
}

//open database to search for tuples
require_once 'User.php';
require_once 'SqliteUserRepository.php';

//open users db
$userRepo = new \yzhan214\fp\SqliteUserRepository();
$user = $userRepo->getUserByUname($_SESSION['user']);

//saved data
$myName = $user->getUsername();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
   

    <title>MirrorCo. Account Close Service</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/thumbnail-gallery.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" >MirrorCo.</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">

                    <li>
                        <a href="about.php">About</a>
                    </li>

                    <li>
                        <a href="index.php">Index</a>
                    </li>

                    <li>
                        <a href="controller.php">Controller</a>
                    </li>

                    <li>
                        <a href="profile.php">Profile</a>
                    </li>

                    <li>
                        <a href="pwupdate.php">Change Password</a>
                    </li>
                    
                    <li>
                        <a >Close Account</a>
                    </li>
                    
                    <li>
                        <a>Update Info</a>
                    </li>

                  <li>
                        <a href="contact.php">Contact</a>
                    </li>


                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-lg-12">
               <h1 class="page-header"> Request Confirmation</h1>
            </div>
           
    </div>


       <!-- PHP DB CONNECTION-->
    <?php if($_SERVER['REQUEST_METHOD']=='POST'): ?>
    <?php $userRepo->deleteUser($myName); ?>

    <div align="center">
    <img src = "images/eat.gif" height = "200" width = "200">
    <h2>Thank you for using MirrorCo</h2>

    <br><br>

    </div>
    <?php 
    session_destroy();
    ?>

    <?php else: ?>

    <div align="center">
    
    <img src = "images/balloon.gif" height = "300" width = "300">
    
    <p>Please confirm your request to close your account</p>

    <form method = "post">
        <input type = "submit" value = "Confirm">
    </form>
    <br>
    <font color = "brown"><a href = "profile.php"> CLICK HERE TO CANCLE </a></font>
    <br>
    </div>


<?php endif; ?>


        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12" align="center">
                    <p>Copyright &copy; Yiming ZHANG ITMD 562 FP 15 Fall</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
