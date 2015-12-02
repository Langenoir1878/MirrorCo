<?php 
/*
 * Yiming ZHANG ITMD 562-01 FP
 * NOV 30 M 2015 23:32:02 PM
 * @3001-718
 * CYBER MONDAY
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
$myEmail = $user->getEmail();
$myAddress = $user->getAddress();
$myZip = $user->getZip();

//changable variables: EXCEPT username
$userEmail = isset($_POST['email']) ? $_POST['email']:'';
$userAddress = isset($_POST['address']) ? $_POST['address']:'';
$userZip = isset($_POST['zip']) ? $_POST['zip']:'';

//deleted validation since spare fields are optional

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
   

    <title>MirrorCo. Update</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/thumbnail-gallery.css" rel="stylesheet">


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
                        <a href="profile.php">Profile</a>
                    </li>

                    <li>
                        <a href="pwupdate.php">Change Password</a>
                    </li>

                    <li>
                        <a>Update Info</a>
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
               <h1 class="page-header"> Update Profile</h1>
            </div>
           
           <div class="image-right">
                <img src="images/waffle.gif" height="200" width = "222" align="right">
            </div>
    
    <!-- PHP IF-ELSE BLOCKS -->
     <?php if($_SERVER['REQUEST_METHOD'] =='POST'): ?>

      <?php  //begin database

            $user->setEmail($userEmail);
            $user->setAddress($userAddress);
            $user->setZip($userZip);

           
            //save updated password
            $userRepo->saveUser($user);

            //start html page content to display successful message
            ?>

             <div style="text-align: center">
                <br>
                <h3><b>Profile updated!</b></h3>
                <br>
            </div>

    <?php else: ?>

  <form action="#" method = "post">        
    <br>
    <p><b>&nbsp;&nbsp; Username &nbsp;</b> <?php print $myName; ?><p> <br>
    <p><b>&nbsp;&nbsp;  Email </b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type = "text" name="email" size = "35" value="<?php print $myEmail; ?>"></p>
    <p><b>&nbsp;&nbsp;  Address </b> &nbsp;&nbsp;&nbsp;<input type = "text" name="address" size = "35" value="<?php print $myAddress; ?>"></p>
    <p><b>&nbsp;&nbsp;  Zip Code </b> &nbsp;&nbsp;<input type = "text" name="zip" value="<?php print $myZip; ?>"></p>
    <br><br>
    <p>&nbsp;&nbsp; <input type="submit" value = "Update"></p>
    <br>
    </form>
    
    <?php endif; ?>

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
