<?php 
/*
 * Yiming ZHANG ITMD 562-01 FP
 * NOV 27 F 2015 15:59:17 PM
 * @ IIT-3300 Dearborn 1 FL
 * BLACK FRIDAY
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

//open database to search for tuples
require_once 'User.php';
require_once 'SqliteUserRepository.php';

$userRepo = new \yzhan214\fp\SqliteUserRepository();

// Shorten Request Variables if they are set
$tempUn = isset($_POST['username']) ? trim($_POST['username']) : '';
$tempPw = isset($_POST['password']) ? $_POST['password']:'';


if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['username'])) {
    $user = $userRepo->getUserByUname($tempUn);
    $valid_user = $user->getUsername();
    $valid_hash = $user->getPassword();
    $valid_pass = password_verify($tempPw, $valid_hash);

    if ($tempUn==$valid_user && $valid_pass){
        $_SESSION['user'] = $valid_user;
        header("Location: controller.php");
        exit;
    } else {
        print "Login failed!";
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<style>
.image-left{
    margin-left: 1px;
}
</style>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
   

    <title>MirrorCo. Login</title>

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
                        <a href="register.php">Register</a>
                    </li>

                    <li>
                        <a href="#">Sign In</a>
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

     <!--DB connection-->
	<?php 
	 
	?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-lg-12">
               <h1 class="page-header"> Login </h1>
            </div>
           
        </div>

            <div class="image-left">
                <img src="images/sweet.png" height="198" width = "253" align="left">
            </div>
            

        <h4>Pre-registered Authentication</h4>
        <p>Username: Yiming     Password: ZHANG </p>
        <br>
        <form action="#" method="POST">
        <p><b>Username: </b> <input type="text" name="username"></p>
    
        <p><b>Password: </b> <input type="password" name="password"></p>

        <br>
        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
        &nbsp; &nbsp; &nbsp;
        <input type="submit" value = "Login">
        <br> 
        </form>
        <br><br>
      


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
