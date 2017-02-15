<!DOCTYPE html>

<?php

session_start();

if (!isset($_SESSION['user']) OR empty($_SESSION['user'])) {

    header("location:index.php");

}

?>

<html lang="en">

    <head>



        <meta charset="utf-8">

        <title>TroubleTracker Admin </title>

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">

        <meta name="author" content="Muhammad Usman">



        <!-- The styles -->

        <link id="bs-css" href="css/bootstrap-cerulean.min.css" rel="stylesheet">



        <link href="css/charisma-app.css" rel="stylesheet">

        <link href='bower_components/fullcalendar/dist/fullcalendar.css' rel='stylesheet'>

        <link href='bower_components/fullcalendar/dist/fullcalendar.print.css' rel='stylesheet' media='print'>

        <link href='bower_components/chosen/chosen.min.css' rel='stylesheet'>

        <link href='bower_components/colorbox/example3/colorbox.css' rel='stylesheet'>

        <link href='bower_components/responsive-tables/responsive-tables.css' rel='stylesheet'>

        <link href='bower_components/bootstrap-tour/build/css/bootstrap-tour.min.css' rel='stylesheet'>

        <link href='css/jquery.noty.css' rel='stylesheet'>

        <link href='css/noty_theme_default.css' rel='stylesheet'>

        <link href='css/elfinder.min.css' rel='stylesheet'>

        <link href='css/elfinder.theme.css' rel='stylesheet'>

        <link href='css/jquery.iphone.toggle.css' rel='stylesheet'>

        <link href='css/uploadify.css' rel='stylesheet'>

        <link href='css/animate.min.css' rel='stylesheet'>

        <link href='css/datepicker.css' rel='stylesheet'>

        <link href='css/style.css' rel='stylesheet'>



        <!-- jQuery -->

        <script src="bower_components/jquery/jquery.min.js"></script>

        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>

         <script src="js/bootstrap-datepicker.js"></script>

        



        <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->

        <!--[if lt IE 9]>

        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>

        <![endif]-->



        <!-- The fav icon -->

        <link rel="shortcut icon" href="img/favicon.ico">



    </head>



   <body>

        <!-- topbar starts -->

        <div class="navbar navbar-default" role="navigation">



            <div class="navbar-inner">

                <!--            <button type="button" class="navbar-toggle pull-left animated flip">

                                <span class="sr-only">Toggle navigation</span>

                                <span class="icon-bar"></span>

                                <span class="icon-bar"></span>

                                <span class="icon-bar"></span>

                            </button>-->

                <a class="navbar-brand" href="home.php"> <img alt="Charisma Logo" src="img/logo20.png" class="hidden-xs"/>

                    <span>TroubleTracker</span></a>



                <!-- user dropdown starts -->

                <div class="btn-group pull-right">

                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">

                        <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs"> <?php echo ucfirst($_SESSION['user']['Username']); ?></span>

                        <span class="caret"></span>

                    </button>

                    <ul class="dropdown-menu">

                        <!--                    <li><a href="#">Profile</a></li>-->

                        <!--                    <li class="divider"></li>-->

                        <li><a href="logout.php">Logout</a></li>

                    </ul>

                </div>

                <!-- user dropdown ends -->



            </div>

        </div>

        <!-- topbar ends -->

        <div class="ch-container">