<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8" />
    <title>SMS | Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url().'assets/icon/apple-icon-57x57.png' ?>">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url().'assets/icon/apple-icon-60x60.png' ?>">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url().'assets/icon/apple-icon-72x72.png' ?>">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url().'assets/iconapple-icon-76x76.png' ?>/">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url().'assets/icon/apple-icon-114x114.png' ?>">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url().'assets/icon/apple-icon-120x120.png' ?>">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url().'assets/icon/apple-icon-144x144.png' ?>">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url().'assets/icon/apple-icon-152x152.png' ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url().'assets/icon/apple-icon-180x180.png' ?>">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo base_url().'assets/icon/android-icon-192x192.png' ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url().'assets/icon/favicon-32x32.png' ?>">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url().'assets/icon/favicon-96x96.png' ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url().'assets/icon/favicon-16x16.png' ?>">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

        <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url().'assets/template/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css';?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url().'assets/template/plugins/bootstrap/css/bootstrap.min.css';?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url().'assets/template/plugins/font-awesome/css/font-awesome.min.css';?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url().'assets/template/css/animate.min.css';?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url().'assets/template/css/style.min.css';?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url().'assets/template/css/style-responsive.min.css';?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url().'assets/template/css/theme/default.css';?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url().'assets/template/plugins/jquery-jvectormap/jquery-jvectormap-1.2.2.css';?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url().'assets/template/plugins/bootstrap-calendar/css/bootstrap_calendar.css';?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url().'assets/template/plugins/gritter/css/jquery.gritter.css';?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url().'assets/template/plugins/morris/morris.css';?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/bootstrap-switch/bootstrap-switch.css';?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/select2/select2.css';?>" rel="stylesheet">

    <script src="<?php echo base_url().'assets/template/plugins/jquery/jquery-1.9.1.min.js';?>"></script>
    <!-- ================== END BASE CSS STYLE ================== -->
    <link rel="stylesheet" href="<?php echo base_url().'assets/template/plugins/DataTables/css/data-table.css';?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url().'assets/template/plugins/DataTables/TableTools/css/dataTables.tableTools.css';?>" rel="stylesheet">
    
    <!-- ================== BEGIN BASE JS ================== -->
    <script src="<?php echo base_url().'assets/template/plugins/pace/pace.min.js';?>"></script>
    <!-- ================== END BASE JS ================== -->
</head>
<body>
    <!-- begin #page-loader -->
    <div id="page-loader" class="fade in"><span class="spinner"></span></div>
    <!-- end #page-loader -->
    
    <!-- begin #page-container -->
    <div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
        <!-- begin #header -->
        <div id="header" class="header navbar navbar-default navbar-fixed-top">
            <!-- begin container-fluid -->
            <div class="container-fluid">
                <!-- begin mobile sidebar expand / collapse button -->
                <div class="navbar-header">
                    <a href="<?php echo base_url().'home'; ?>" class="navbar-brand"><span class="navbar-logo"></span>Admin Dashboard</a>
                    <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
                        <i class="fa fa-bars" style="font-size:15px;"></i>
                    </button>
                </div>
                <!-- end mobile sidebar expand / collapse button -->
                
                <!-- begin header navigation right -->
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <ul class="dropdown-menu media-list pull-right animated fadeInDown">
                            <li class="dropdown-header">Notifications (2)</li>
                            <li class="media">
                                <a href="javascript:;">
                                    <div class="media-left"><i class="fa fa-exclamation-circle media-object bg-blue"></i></div>
                                    <div class="media-body">
                                        <h6 class="media-heading">Email Requests</h6>
                                        <p>5 requests to add to email listing</p>
                                        <div class="text-muted f-s-11">3 minutes ago</div>
                                    </div>
                                </a>
                            </li>

                            <li class="media">
                                <a href="javascript:;">
                                    <div class="media-left"><i class="fa fa-exclamation-circle media-object bg-green"></i></div>
                                    <div class="media-body">
                                        <h6 class="media-heading">SMS Requests</h6>
                                        <p>5 requests to add to sms listing</p>
                                        <div class="text-muted f-s-11">3 minutes ago</div>
                                    </div>
                                </a>
                            </li>

                            </li>
                            <li class="dropdown-footer text-center">
                                <a href="javascript:;">View more</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown navbar-user">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                        <i style="font-size: 15px;color:#00acac;" class="fa fa-user"></i>
                            <!-- <img src="<?php echo base_url().'assets/images/developers/richard.jpg'; ?>" alt="" />  -->
                            <span class="hidden-xs">System Administrator</span> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu animated fadeInLeft">
                            <li class="arrow"></li>
                            <!-- <li class="divider"></li> -->
                            <li><a href="<?php echo base_url(); ?>">Log Out</a></li>
                        </ul>
                    </li>
                </ul>
                <!-- end header navigation right -->
            </div>
            <!-- end container-fluid -->
        </div>
        <!-- end #header -->
        
        <!-- begin #sidebar -->
        <?php $this->load->view("sidebar"); ?>
        
        <!-- end #sidebar -->
        
        <!-- begin #content -->
        <?php 
        $content = isset($content)? $content:'template_default';
        $this->load->view($content); ?>
        <!-- end #content -->
        
        <!-- begin scroll to top btn -->
        <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
        <!-- end scroll to top btn -->
    </div>
    <!-- end page container -->
    
    <!-- ================== BEGIN BASE JS ================== -->
    <script src="<?php echo base_url().'assets/template/plugins/jquery/jquery-migrate-1.1.0.min.js';?>"></script>
    <script src="<?php echo base_url().'assets/template/plugins/jquery-ui/ui/minified/jquery-ui.min.js';?>"></script>
    <script src="<?php echo base_url().'assets/template/plugins/bootstrap/js/bootstrap.min.js';?>"></script>
    <script src="<?php echo base_url().'assets/template/plugins/slimscroll/jquery.slimscroll.min.js';?>"></script>
    <script src="<?php echo base_url().'assets/template/plugins/jquery-cookie/jquery.cookie.js';?>"></script>

    <!--[if lt IE 9]>
        <script src="assets/crossbrowserjs/html5shiv.js"></script>
        <script src="assets/crossbrowserjs/respond.min.js"></script>
        <script src="assets/crossbrowserjs/excanvas.min.js"></script>
    <![endif]-->
    <!-- ================== END BASE JS ================== -->
    
    <!-- ================== BEGIN PAGE LEVEL JS ================== -->
    <script src="<?php echo base_url().'assets/template/plugins/DataTables/js/jquery.dataTables.js';?>"></script>
    <script src="<?php echo base_url().'assets/template/plugins/DataTables/TableTools/js/dataTables.tableTools.js';?>"></script>
    <script src="<?php echo base_url().'assets/template/plugins/morris/raphael.min.js';?>"></script>
    <script src="<?php echo base_url().'assets/template/plugins/morris/morris.js';?>"></script>
    <script src="<?php echo base_url().'assets/template/plugins/jquery-jvectormap/jquery-jvectormap-1.2.2.min.js';?>"></script>
    <script src="<?php echo base_url().'assets/template/plugins/jquery-jvectormap/jquery-jvectormap-world-merc-en.js';?>"></script>
    <script src="<?php echo base_url().'assets/template/plugins/bootstrap-calendar/js/bootstrap_calendar.min.js';?>"></script>
    <script src="<?php echo base_url().'assets/template/plugins/gritter/js/jquery.gritter.js';?>"></script>
    <script src="<?php echo base_url().'assets/template/js/dashboard-v2.min.js';?>"></script>
    <script src="<?php echo base_url().'assets/template/js/apps.min.js';?>"></script>
    <script src="<?php echo base_url().'assets/plugins/bootstrap-switch/bootstrap-switch.js';?>"></script>
    <script src="<?php echo base_url().'assets/plugins/select2/select2.min.js';?>"></script>
    <!-- <script src=""></script> -->
    

    <!-- ================== END PAGE LEVEL JS ================== -->
    
    <script>
        $(document).ready(function() {
            App.init();
            DashboardV2.init();
        });
    </script>
</body>

<!-- Mirrored from seantheme.com/color-admin-v1.6/admin/html/index_v2.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 25 Feb 2015 19:57:47 GMT -->
</html>

