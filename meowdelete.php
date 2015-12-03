<?php 
/**
 * Yiming ZHANG ITMD 562-01 FP
 * DEC 3 R 2015 14:15:16 PM
 * @ PS 3001 718 
 * LAST CLASS OF 15 FALL SEMESTER
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
#print $aRec->getRec();


?>

<!DOCTYPE html>
<html lang="en">
<style>
.image-pos{
    
    margin-right: 100px;
}
.text-pos{
    margin-left: 200px;
}
</style>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
   

    <title>MirrorCo. Meow Delete</title>

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
               <h1 class="page-header">Message Review</h1>
            </div>
        </div>   

           <?php if($_SERVER['REQUEST_METHOD'] =='POST'): ?>  
    
            <?php 
                //deleteRecord($aId)
                $repo->deleteRecord($aId);

                ?>

          <div style="text-align: center">
                <br>
                <font><p><b>Wait...What had just happened?</b></p></font>

                
                <br><br>
                <p><font color = "#bf8040"><a href = "controller.php"><u>Nothing, LOL!!</u></a></font><p>
                <br><br>

            <!--font color = "#bf8040"><h3-->
                <br>

            <!--DB connection testing -->
                <?php 
                    //print $aRec->getRec();
                ?>
            <!--/h3></font-->

    </div>
    <!--page content div end above-->



            <?php else: ?>


            <div align="center">
                <form action = "#" method="post">
                    <p><b>Someone taught me this: </b></p>
                        <p><?php print wordwrap($aRec->getRec(),33,"<br>\n");?></p>
                            <br><b><font color = "#bf8040"><p>Do you want me to forget it?</p></font></b><br>
                        <input type="submit" value="YES! Forget It!"> <br><br>
                    <p><font color = "#bf8040"><a href = "controller.php"><u><b>Nope, I changed my mind!</b></u></a></font><p><br><br> 
                </form>
            </div>
                <br>

    </div>
    <!--page content div end above-->
           


            <?php endif;?>


                <br>


   

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12" align="center">
                    <p>Copyright &copy; Yiming ZHANG ITMD 562 FP 15 Fall</p>
                </div>
            </div>
        </footer>

    
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
