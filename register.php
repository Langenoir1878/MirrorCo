<?php

/* This is the registration page, doing create new user function
 * Yiming Zhang ITMD 562 01 FP M Nov 23 2015
 * 18:41:44 PM PS 3001 608
 */

namespace yzhan214\fp;

session_start();
if(isset($_GET['logout'])){
    session_destroy();
}
if(isset($_SESSION['user'])){
    header("Location: controller.php");
    exit;
}

require_once 'User.php';
require_once 'SqliteUserRepository.php';

$userUsername = isset($_POST['username']) ? trim($_POST['username']):'';
//hashing password
$tempPw = isset($_POST['password']) ? $_POST['password']:'';
$userPassword = password_hash($tempPw, PASSWORD_DEFAULT);

$userEmail = isset($_POST['email']) ? $_POST['email']:'';
$userAddress = isset($_POST['address']) ? $_POST['address']:'';
$userZip = isset($_POST['zip']) ? $_POST['zip']:'';

//form validation
$formIsValid = true;
$usernameErr = '';
$passwordErr = '';

if(empty($userUsername)){
    $formIsValid = false;
    $usernameErr = ' Username cannot be blank!';
}

if (empty($tempPw)){
    $formIsValid = false;
    $passwordErr = ' Password cannot be blank!';
}

?>

<!DOCTYPE html>
<html lang="en">
<style>

.image-right{
    
    margin-right: 1px;
}
</style>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
   

    <title>MirrorCo. Register</title>

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
                <a class="navbar-brand">MirrorCo.</a>
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
                        <a href="register.php">Register</a>
                    </li>

                    <li>
                        <a href="login.php">Sign In</a>
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
               <h1 class="page-header">Registration</h1>
            </div>
           
    </div>
            <div class="image-right">
                <img src="images/sb.png" height="243" width = "250" align="right">
            </div>

        <h3>Welcome</h3>


     <!--PHP session-->

	<?php if($_SERVER['REQUEST_METHOD'] =='POST'): ?>

	   <?php if($formIsValid): ?>

            <?php  //begin database

            $userRepo = new \yzhan214\fp\SqliteUserRepository();

            $user = new \yzhan214\fp\User();

            $user->setUsername($userUsername);
            $user->setPassword($userPassword);
            $user->setEmail($userEmail);
            $user->setAddress($userAddress);
            $user->setZip($userZip);

            $userRepo->saveUser($user);

            //start html page content
            ?>

            <!-- Page Content -->

            <div style="text-align: center">
                <br>
                <p><b>Registration successful!</b></p>
                <br>
                <p>Hi <font color="pink"><?php print $userUsername; ?> </font>, how are you today? </p>
                <br>
                <p><font color = "#bf8040"><a href = "controller.php"><u>Go to My Controller</u></a></font><p>
                <br><br>

        <?php 
        //return error message with pre-filled info
        else: ?>


        <form action = "#" method="post">        
            <p> <font color="red" size="4">* </font> Required fields, case sensitive </p>
            <br>

            <p><font color="red" size="4">* </font> <b>Username &nbsp;</b><input type = "text" name="username" value="<?php print $userUsername; ?>">  <font color = "red"><?php print $usernameErr; ?></font> </p>
            <p><font color="red" size="4">* </font> <b>Password &nbsp;</b><input type="password" name="password" value="<?php print $userPassword; ?>">  <font color = "red"><?php print $passwordErr; ?></font> </p>
            <p><b>&nbsp;&nbsp;  Email </b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type = "text" name="email" value="<?php print $userEmail; ?>"></p>
            <p><b>&nbsp;&nbsp;  Address </b> &nbsp;&nbsp;&nbsp;<input type = "text" name="address" value= "<?php print $userAddress; ?>" size = "35" ></p>
            <p><b>&nbsp;&nbsp;  Zip Code </b> &nbsp;&nbsp;<input type = "text" name="zip" value="<?php print $userZip; ?>"></p>
            <br><br>
            <p>&nbsp;&nbsp; <input type="submit" value = "Register"></p>

            <br>
        </form>



        <?php endif; ?>
        <?php else: ?>




    
    

    <form action="#" method = "post">        
    <p> <font color="red" size="4">* </font> Required fields, case sensitive </p>
    <br>

    <p><font color="red" size="4">* </font> <b>Username &nbsp;</b><input type = "text" name="username"><p>
    <p><font color="red" size="4">* </font> <b>Password &nbsp;</b><input type="password" name="password"></p>
    <p><b>&nbsp;&nbsp;  Email </b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type = "text" name="email" ></p>
    <p><b>&nbsp;&nbsp;  Address </b> &nbsp;&nbsp;&nbsp;<input type = "text" name="address" size = "35" ></p>
    <p><b>&nbsp;&nbsp;  Zip Code </b> &nbsp;&nbsp;<input type = "text" name="zip" ></p>
    <br><br>
    <p>&nbsp;&nbsp; <input type="submit" value = "Register"></p>

    <br>
    </form>



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
