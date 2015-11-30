<?php 
/*
 * Yiming ZHANG ITMD 562-01 FP
 * NOV 27 F 2015 23:06:18 PM
 * @ PS 3001 718 
 * BLACK FRIDAY
 */

namespace yzhan214\fp;

session_start();

if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit;
}

//open users table
require_once 'User.php';
require_once 'SqliteUserRepository.php';

$userRepo = new \yzhan214\fp\SqliteUserRepository();
$user = $userRepo->getUserByUname($_SESSION['user']);

//shorten var name
$p_username = $user->getUsername();
$p_email = $user->getEmail();
$p_address = $user->getAddress();
$p_zip = $user->getZip();



?>

<!DOCTYPE html>
<html lang="en">
<style>

.image-right{
    
    margin-right: 100px;
}
</style>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
   

    <title>MirrorCo. Profile</title>

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
                        <a href="index.php">Index</a>
                    </li>

                    <li>
                        <a href="controller.php">Controller</a>
                    </li>

                    <li>
                        <a>Profile</a>
                    </li>

                    <li>
                        <a href="pwupdate.php">Change Password</a>
                    </li>

                    <li>
                        <a href="update.php">Update Info</a>
                    </li>

                    <li>
                        <a href="close.php">Close Account</a>
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
               <h1 class="page-header"> Profile</h1>
            </div>

            <div class="image-right">
                <img src="images/perfume.png" height="120" width = "200" align="right">
            </div>

           <!--DB Retrieving User values and display-->
                
                <p>
                <table style="width:40%">

                  <tr>
                    <td><b> &nbsp;&nbsp;&nbsp;&nbsp;Username: </b></td>
                    <td><?php print $p_username; ?></td>
                  </tr>

                  <tr>
                    <td><b> &nbsp;&nbsp;&nbsp;&nbsp;Email: </b></td>
                    <td><?php print $p_email; ?></td>        
                  </tr>

                   <tr>
                    <td><b> &nbsp;&nbsp;&nbsp;&nbsp;Address: </b></td>
                    <td><?php print $p_address; ?></td>
                  </tr>

                  <tr>
                    <td><b> &nbsp;&nbsp;&nbsp;&nbsp;Zip Code: </b></td>
                    <td><?php print $p_zip; ?></td>        
                  </tr>

                </table>
            </p><br><br>

    </div>

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
