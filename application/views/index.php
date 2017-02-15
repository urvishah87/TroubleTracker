<html lang="en">
    <head>

        <meta charset="utf-8">
        <title>Trouble Tracker</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Trouble Tracker Login">


        <!-- The styles -->
        <link id="bs-css" href="css/bootstrap-cerulean.min.css" rel="stylesheet">

        <link href="css/charisma-app.css" rel="stylesheet">

        <link href='css/style.css' rel='stylesheet'>

        <!-- jQuery -->
        <script src="bower_components/jquery/jquery.min.js"></script>
        <script src="js/jquery.validate.js"></script>
        <script src="js/pages/login.js"></script>

        <!-- The fav icon -->
        <link rel="shortcut icon" href="img/favicon.ico">

    </head>

    <body>
        <div class="ch-container">
            <div class="row">

                <div class="row">
                    <div class="col-md-12 center login-header">
                        <h2>Welcome to Trouble Tracker</h2>
                    </div>
                    <!--/span-->
                </div><!--/row-->

                <div class="row">
                    <div class="well col-md-5 center login-box">
                        <div class="alert alert-info " id="message">
                            Please login with your Username and Password.
                        </div>
                        <?php echo form_open("login", array("id" => "frmLogin", "name" => "frmLogin")); ?>
                        <!--<form class="form-horizontal" name="frmLogin" id="frmLogin"  method="post">-->
                            <fieldset>
                                <div class="input-group input-group-lg">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>
                                    <input type="text" id="username" name="username" class="form-control" placeholder="Username*" onkeypress="submitViaEnter(this, event);">
                                </div>
                                <label id="username-error" class="error" for="username" style="display: none;">Please enter your user name</label>
                                <div class="clearfix"></div><br>

                                <div class="input-group input-group-lg">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock red"></i></span>
                                    <input type="password" id="password" name="password" class="form-control" placeholder="Password*" onkeypress="submitViaEnter(this, event);">
                                </div>
                                <label id="password-error" class="error" style="display: none;" for="password">Please enter your password</label>
                                <div class="clearfix"></div>

                                 <p class="center col-md-5">
                                    <button type="button" id="btnlogin" name="btnlogin" class="btn btn-primary" onkeypress="return submitViaEnter(this, event)">Login</button>
                                </p>
                            </fieldset>
                        </form>
                    </div>
                    <!--/span-->
                </div><!--/row-->
            </div><!--/fluid-row-->

        </div><!--/.fluid-container-->

        <!-- external javascript -->

        <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

        <!-- library for cookie management -->
        <script src="js/jquery.cookie.js"></script>
         <!--calender plugin--> 
        <script src='bower_components/moment/min/moment.min.js'></script>
        <script src='bower_components/fullcalendar/dist/fullcalendar.min.js'></script>
         <!--data table plugin--> 
        <script src='js/jquery.dataTables.min.js'></script>

         <!--select or dropdown enhancer--> 
        <script src="js/bower_components/chosen/chosen.jquery.min.js"></script>
         <!--plugin for gallery image view--> 
        <script src="js/bower_components/colorbox/jquery.colorbox-min.js"></script>
         <!--notification plugin--> 
        <script src="js/jquery.noty.js"></script>
         <!--library for making tables responsive--> 
        <!--<script src="bower_components/responsive-tables/responsive-tables.js"></script>-->
         <!--tour plugin--> 
        <!--<script src="bower_components/bootstrap-tour/build/js/bootstrap-tour.min.js"></script>-->
         <!--star rating plugin--> 
        <script src="js/jquery.raty.min.js"></script>
         <!--for iOS style toggle switch--> 
        <script src="js/jquery.iphone.toggle.js"></script>
         <!--autogrowing textarea plugin--> 
        <script src="js/jquery.autogrow-textarea.js"></script>
         <!--multiple file upload plugin--> 
        <script src="js/jquery.uploadify-3.1.min.js"></script>
         <!--history.js for cross-browser state change on ajax--> 
        <script src="js/jquery.history.js"></script>
        <!-- application script for Charisma demo -->
        <script src="js/charisma.js"></script>


    </body>
</html>
