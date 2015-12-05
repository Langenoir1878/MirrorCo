<?php
/**
 * User: ln1878
 * Date: 12/02/2015
 * Time: 20:20:20 pm
 * @ PS 3001-718 
 * Chicago
 */

namespace yzhan214\fp;

//check the session if logged in
session_start();

if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit;
}

require_once 'Record.php';
require_once 'MeowRepo.php';

$recRepo = new \yzhan214\fp\MeowRepo();
$aRecord = new \yzhan214\fp\Record();

//input memo filed
$input = isset($_POST['memo']) ? $_POST['memo']:'';


?>

<!DOCTYPE html>
<html lang="en">
<style>
.element_right{
    
    margin-right: 100px;
}
.element_left{
    margin-left: 10px;
}
</style>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
   

    <title>MirrorCo. TeachMe</title>

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
                <a class="navbar-brand" href="#">MirrorCo.</a>
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
               <h1 class="page-header"> Teach Me</h1>
            </div>
    
    <?php if($_SERVER['REQUEST_METHOD'] =='POST'): ?>  
    
    <?php 
    //save input memo
    $aRecord->setRec($input);
    $recRepo->saveRecord($aRecord);

    ?>

    <div style="text-align: center">
    <br>
    <p><b> OK ~ Meow Has Remembered! </b></p>
    <p>For security issues, Meow will not publish your personal information to the public! </p>
    <p>Hopefully, your words will reach the right person!</p>
    <br><br>
    <p><font color = "#bf8040"><a href = "controller.php"><u>Return to My Controller</u></a></font><p>
    <br><br>
    </div>


    <?php else: ?>
    <div class="element_right" >
            <img src="images/lazy.gif" height="187" width="187" align="right">
            <img src="images/pink.jpeg" height="77" width="77" align="right">
           
        </div>

    <div class="element_left">
        <form action = "#" method="post" align="left">
            <h3>What are we learning today?</h3>
                <textarea rows="4" cols="50" name = "memo"></textarea>
                    <br><br>
                <input type="submit" value="Save">
            <br><br>
        </form>
        </div>

    <div class="element_right" ><b>
            <p align="right">You may teach me any words, about fashion, food, your favourite TV shows</p>
            <p align="right">Or even something you wish to tell someone you <font color="#bf8040">Love</font> or someone you <font color="#bf8040">Missed</font></p>
            <p align="right">I will always be here listening to and echoing for you</p>
            <br>
        </b>
    </div>
        

        

    <?php endif;?>


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
