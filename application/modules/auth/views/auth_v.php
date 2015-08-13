<!DOCTYPE html>
<html>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.2/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 Jul 2015 15:07:23 GMT -->
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Login</title>

    <link href="<?php echo base_url();?>assets/backend/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/backend/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?php echo base_url();?>assets/backend/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/backend/css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">UMS</h1>

            </div>
            <h3>Login in below.</h3>
            
            <form class="m-t" role="form" method="post" action="<?php echo base_url();?>auth/login;?>" >
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="Email" name="email" id="email" required="true">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" name="password" id="password" required="true">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

                <a href="#"><small>Forgot password?</small></a>
                
            </form>
            
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="<?php echo base_url();?>assets/backend/js/jquery-2.1.1.js"></script>
    <script src="<?php echo base_url();?>assets/backend/js/bootstrap.min.js"></script>

</body>


</html>
