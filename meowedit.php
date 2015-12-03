<?php 
/**
 * Yiming ZHANG ITMD 562-01 FP
 * DEC 2 W 2015 22:17:59 PM
 * @ PS 3001 718 
 * 
 */

namespace yzhan214\fp;

session_start();

if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit;
}

require_once 'MeowRepo.php';
require_once 'Record.php';

//open record table to retrieve random words
$repo = new \yzhan214\fp\MeowRepo();

//return specific record through $_GET[]
$aId = isset($_GET['id'])?$_GET['id']:'';
$aRec = $repo->getRecordById($aId);
#print "Retrieved ID is: ".$aId;


//input memo filed
$input = isset($_POST['memo']) ? $_POST['memo']:'';

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
   

    <title>MirrorCo. Meow</title>

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
               <h1 class="page-header">Edit</h1>
            </div>
           
            <?php if($_SERVER['REQUEST_METHOD'] =='POST'): ?>  
    
            <?php 
                //save input memo
                $aRec->setRec($input);
                $repo->saveRecord($aRec);

                ?>

                <div style="text-align: center">
                <br>
                <p><b>Thank you for helping Meow correct this!</b></p>
                <p><?php print $aRec->getRec();?> </p>
                <br><br>
                <p><font color = "#bf8040"><a href = "controller.php"><u>Return to My Controller</u></a></font><p>
                <br><br>

            <!--font color = "#bf8040"><h3-->
                <br>

            <!--DB connection testing -->
                <?php 
                    //print $aRec->getRec();
                ?>
            <!--/h3></font-->

            <?php else: ?>


                <form action = "#" method="post">
                    <h3>Help Meow Correct This</h3>
                        <textarea rows="4" cols="50" name = "memo"><?php print $aRec->getRec();?></textarea>
                            <br><br>
                        <input type="submit" value="Save">
                    <br>
                </form>


            <?php endif;?>


                <br>

    </div>
    <!--page content div end above-->


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
