<?php 
/*
 * Yiming ZHANG ITMD 562-01 FP
 * NOV 30 M 2015 20:06:18 PM
 * @ PS 3001 718 
 * CYBER MONDAY
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
$stored_password = $user->getPassword();


//error detecting fields
$tempOP=isset($_POST['oldPW']);
$tempP1=isset($_POST['pw1']);
$tempP2=isset($_POST['pw2']);

//form validation
$formIsValid = true;
$oldErr = '';
$pw1Err = '';
$pw2Err = '';

//old password match validation
if($tempOP!=$stored_password){
     $formIsValid = false;
    $oldErr = 'Wrong password!';
}
//set fields validation
if(empty($tempOP)){
    $formIsValid = false;
    $oldErr = ' Please verify the old password';
}

if (empty($tempP1)){
    $formIsValid = false;
    $pw1Err = ' New password cannot be blank';
}

if (empty($tempP2)){
    $formIsValid = false;
    $pw2Err = ' Inputs not match';
}
//comparison validation
if ($tempP1 != $tempP2){
    $formIsValid = false;
    $pw1Err = ' Inputs not match'
    $pw2Err = ' Inputs not match';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
   

    <title>MirrorCo. Password</title>

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
                        <a href="profile.php">Profile</a>
                    </li>

                    <li>
                        <a>Change Password</a>
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

     <!--DB connection-->
    <?php 
     
    ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-lg-12">
               <h1 class="page-header"> Password Update</h1>
            </div>
           
        </div>

    <!--PHP session-->

    <?php if($_SERVER['REQUEST_METHOD'] =='POST'): ?>

       <?php if($formIsValid): ?>

            <?php  //begin database

            $user->setPassword($tempP2);
           
            //save updated password
            $userRepo->saveUser($user);

            //start html page content to display successful message
            ?>

             <div style="text-align: center">
                <br>
                <p><b>Password updated!</b></p>
                <br>
            </div>

            <?php 
            //return error message WITHOUT pre-filled password for security
            else: ?>

            <form action="#" method="POST">

                <p>
                    <b>&nbsp;&nbsp;&nbsp;&nbsp;Old Password </b><br>
                    &nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name="oldPW">
                    <font color = "red"><?php print $oldErr; ?></font>
                </p>
                   
                <p>
                    <b> &nbsp;&nbsp;&nbsp;&nbsp;New Password </b><br>
                    &nbsp;&nbsp;&nbsp;&nbsp;<input type = "password" name="pw1">
                    <font color = "red"><?php print $pw1Err; ?></font>
                </p>
                <p>
                    <b> &nbsp;&nbsp;&nbsp;&nbsp;Confirm Password </b><br>
                    &nbsp;&nbsp;&nbsp;&nbsp;<input type = "password" name="pw2">
                    <font color = "red"><?php print $pw2Err; ?></font>
                </p>

                <br><br>
                &nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="Change Password" align="center">
                <br>

            </form>




        <?php endif; ?>
        <?php else: ?>







            <form action="#" method="POST">

    

                <p>
                    <b>&nbsp;&nbsp;&nbsp;&nbsp;Old Password </b><br>
                    &nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name="oldPW">
                </p>
                   
                <p>
                    <b> &nbsp;&nbsp;&nbsp;&nbsp;New Password </b><br>
                    &nbsp;&nbsp;&nbsp;&nbsp;<input type = "password" name="pw1">
                </p>
                <p>
                    <b> &nbsp;&nbsp;&nbsp;&nbsp;Confirm Password </b><br>
                    &nbsp;&nbsp;&nbsp;&nbsp;<input type = "password" name="pw2">
                </p>

                <br><br>
                &nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="Change Password" align="center">
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
