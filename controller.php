<?php 
/*
 * Yiming ZHANG ITMD 562-01 FP
 * NOV 27 F 2015 22:30:46 PM
 * @ PS 3001 718 
 * BLACK FRIDAY
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
$list = $repo->getAllRecords();

//count the mubner of object in list
$max=count($list);

?>



<!DOCTYPE html>
<html lang="en">
<style>
.image-pos{
    
    margin-right: 100px;
}
.text-pos{
    margin-left: 78px;
}
</style>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
   

    <title>MirrorCo. Controller</title>

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
                        <a href="contact.php">Contact</a>
                    </li>
                        
                    <li>
                        <a>Controller</a>
                    </li>

                    <li>
                        <a href="profile.php">Profile</a>
                    </li>
                    
                </ul>
                   
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
        <!--Log out-->
        <div align="right">
             <?php echo 'Hi, '. $_SESSION['user'] . ' !'; ?>
                            &nbsp;&nbsp;&nbsp;
                            <a href="login.php?logout=yes">log out</a>
                            &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
        </div>
     <!--DB connection-->
    <?php 
    

        $a=rand(1,$max);//get a random number within db ID range
                                
        $tempRec = $repo->getRecordById($a);
                                
        //for PHP GET
        $myID = $tempRec->getId();
        $myRec = $tempRec->getRec();

    ?>
	

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-lg-12">
               <h1 class="page-header"> Controller</h1>
            </div>


        <!-- Sub func buttons -->

        <div style="text-align:right;">
            <form method="post">
            <a href="controller.php"  role="button" >TALK
            <img src="images/deadfish.png" style="width:33px;height:33px;"></a>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="teachme.php"  role="button">Teach Meow
            <img src="images/deadfish.png" style="width:33px;height:33px;"></a>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="meowedit.php?id=<?php echo $myID; ?>"  role="button">Edit Meow
            <img src="images/deadfish.png" style="width:33px;height:33px;"></a>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <!--Delete button without $_GET[] param-->
            <!--script type = "text/javascript">
            function del_navi(){
                //confirm-> then submit form to meowdelete.php
                if (confirm('Delete this message?')){
                  form.submit();
                }else{
                   alert('Please help Meow review and improve!');
                }

            }
            </script-->
            <!--form action = "meowdelete.php" method = "POST" style = 'display: inline-block'-->
            <a href="meowdelete.php?id=<?php echo $myID; ?>"  role="button" >Delete Meow
                <!--input type = "hidden" name = "id" value = "<?php print $myID;?>"-->
            <img src="images/deadfish.png" style="width:33px;height:33px;"></a>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </form>
        <?php //testing line: works great!
        //echo "Current ID is: ".$myID;?>
        </div>

        <!-- Playground Begins-->
        <div class = "image-pos">
            <br><br><br>
            <img src="images/hug.png"  align="right">
            <br>
        </div>

            <!-- Changable form stuctures-->
            <form action="#" method = "post">
                <h3><font color = "#bf8040">
                    <div class="text-pos">
                        <?php 
                            //DB connection begins here, testing:
                            #$temp="MeowMeowMeowMeo wMeowMe ow MeowMeow MeowMe o w MeowMeowM e o wMeowMe owMeow";
                            #print wordwrap($temp,25,"<br>\n");

                                #$a=rand(1,$max);//get a random number within db ID range
                                
                                #$tempRec = $repo->getRecordById($a);
                                #$myID = $tempRec->getId();
                                #$myRec = $tempRec->getRec();

                            #print $myID . $myRec;//this works great!

                            print wordwrap($myRec,47,"<br>\n");
                        ?>
                    </div>
                </font></h3>
            </form>



    </div>
    <!--CONTAINER END ABOVE-->

   <br><br><br>


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
