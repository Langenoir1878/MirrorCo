<?php

/* This is the registration page, doing create new user function
 * Yiming Zhang ITMD 562 01 FP M Nov 23 2015
 * 18:41:44 PM PS 3001 608
 */

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
                        <a href="#">Register</a>
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

     <!--DB connection-->
	<?php 
	 
	?>

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
    <p> <font color="red" size="4">* </font> Required fields, case sensitive </p>
    <br>
    <p><font color="red" size="4">* </font> <b>Username &nbsp;</b><input type = "text" name="username"><p>
    <p><font color="red" size="4">* </font> <b>Password &nbsp;</b><input type="password" name="password"></p>
    <p><b>&nbsp;&nbsp;  Email </b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;<input type = "text" name="email" ></p>
    <p><b>&nbsp;&nbsp;  Address </b> &nbsp;&nbsp;&nbsp;&nbsp;<input type = "text" name="address" size = "35" ></p>
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

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
