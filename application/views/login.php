<html>
<head>
    <title>Login with Facebook</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
    <style type="text/css">
    body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #eee;
    }

    .form-signin {
        max-width: 330px;
        padding: 15px;
        margin: 0 auto;
    }
    .form-signin .form-signin-heading{
        padding-bottom: 10px;
        margin-bottom: 20px;
        border-bottom: 1px #ccc dotted;
        text-align: center;
    }
    .form-signin .footer{
        padding-top: 10px;
        margin-top: 20px;
        border-top: 1px #ccc dotted;
        font-weight: 600;
    }
    .fa {
        color: #cc0000;
    }
    </style>
</head>
<body>

    <div class="container">

        <form class="form-signin" role="form">
            <?php //if (@$user_profile){  
                
    
                ?>
<!--                <div class="row">
                    <div class="col-lg-12 text-center">
                        <img class="img-thumbnail" data-src="holder.js/140x140" alt="140x140" src="https://graph.facebook.com/<?php echo $user_profile['id']?>/picture?type=large" style="width: 140px; height: 140px;">
                        <h2><?php echo $user_profile['first_name']; ?></h2>
                        <a href="<?php echo $user_profile['link']; ?>" class="btn btn-lg btn-default btn-block" role="button">View Profile</a>
                        <a href="<?php echo $logout_url ?>" class="btn btn-lg btn-primary btn-block" role="button">Logout</a>
                    </div>
                </div>-->
            <?php //}else{   ?>
                <h2 class="form-signin-heading">Login with Facebook</h2>
                <a href="<?php echo $login_url ?>" class="btn btn-lg btn-primary btn-block" role="button">Login</a>
            <?php //} ?>
            <div class="footer">
                <p> by <strong><i>Urvi Shah</i></strong></p>
            </div>
        </form>

       
    </div> <!-- /container -->
    <script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</body>
</html>