<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<head>
	<meta charset="utf-8" />
	<title>Login Page</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    
    <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css';?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/bootstrap/css/bootstrap.min.css';?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/font-awesome/css/font-awesome.min.css';?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url().'assets/auth/css/animate.min.css';?>" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url().'assets/auth/css/style.min.css';?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url().'assets/auth/css/style-responsive.min.css';?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url().'assets/auth/css/theme/default.css';?>" rel="stylesheet">
	<!-- ================== END BASE CSS STYLE ================== -->
</head>
<body>
	<!-- begin #page-loader -->
	<!-- end #page-loader -->
	
	<div class="login-cover">
	    <div class="login-cover-image"><img src="<?php echo base_url().'assets/auth/img/loginbcg.jpg'; ?>" data-id="login-cover-image" alt="" /></div>
	    <div class="login-cover-bg"></div>
	</div>
	<!-- begin #page-container -->
	<div id="page-container" class="fade">
	    <!-- begin login -->
        <div class="login login-v2" data-pageload-addclass="animated flipInX">
            <!-- begin brand -->
            <div class="login-header">
                <div class="brand">
                    <span class="logo"></span> SMS
                    <small>Welcome to the SMS Management Tool</small>
                </div>
                <div class="icon">
                    <i class="fa fa-sign-in"></i>
                </div>
            </div>
            <!-- end brand -->
            <div class="login-content">
                <form action="<?php echo base_url().'auth/login'; ?>" method="POST" class="margin-bottom-0">
                    <div class="form-group m-b-20">
                        <input type="email" name="email" class="form-control input-lg" placeholder="Email Address" />
                    </div>
                    <div class="form-group m-b-20">
                        <input type="password" name="password" class="form-control input-lg" placeholder="Password" />
                    </div>
                    <div class="login-buttons">
                        <button type="submit" class="btn btn-success btn-block btn-lg">Sign In</button>
                    </div>
                    <?php if(isset($message)):echo $message;endif; ?>
                </form>
            </div>
        </div>
        <!-- end login -->
	</div>
	<!-- end page container -->
	
	<!-- ================== BEGIN BASE JS ================== -->
    <script src="<?php echo base_url().'assets/plugins/jquery/jquery-1.9.1.min.js';?>"></script>
    <script src="<?php echo base_url().'assets/plugins/jquery/jquery-migrate-1.1.0.min.js';?>"></script>
    <script src="<?php echo base_url().'assets/plugins/jquery-ui/ui/minified/jquery-ui.min.js';?>"></script>
    <script src="<?php echo base_url().'assets/plugins/bootstrap/js/bootstrap.min.js';?>"></script>
    <script src="<?php echo base_url().'assets/plugins/slimscroll/jquery.slimscroll.min.js';?>"></script>
    <script src="<?php echo base_url().'assets/plugins/jquery-cookie/jquery.cookie.js';?>"></script>

	<!--[if lt IE 9]>
		<script src="assets/crossbrowserjs/html5shiv.js"></script>
		<script src="assets/crossbrowserjs/respond.min.js"></script>
		<script src="assets/crossbrowserjs/excanvas.min.js"></script>
	<![endif]-->
	
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
    <script src="<?php echo base_url().'assets/auth/js/login.js';?>"></script>
    <script src="<?php echo base_url().'assets/auth/js/apps.min.js';?>"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->

	<script>
		$(document).ready(function() {
			App.init();
			LoginV2.init();
		});
	</script>
</body>

<!-- Mirrored from seantheme.com/color-admin-v1.6/admin/html/login_v2.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 25 Feb 2015 20:06:28 GMT -->
</html>

