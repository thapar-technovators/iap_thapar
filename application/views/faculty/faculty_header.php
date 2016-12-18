<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $_SESSION["user_type"];?> | Dashboard</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?php echo base_url();?>dashboard/images/icons/tu_icon.ico">
    <link rel="apple-touch-icon" href="<?php echo base_url();?>dashboard/images/icons/favicon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url();?>dashboard/images/icons/favicon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url();?>dashboard/images/icons/favicon-114x114.png">
    <!--Loading bootstrap css-->
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,700">
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,700,300">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>dashboard/styles/jquery-ui-1.10.4.custom.min.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>dashboard/styles/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>dashboard/styles/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>dashboard/styles/animate.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>dashboard/styles/all.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>dashboard/styles/theme.default.min.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>dashboard/styles/main.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>dashboard/styles/style-responsive.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>dashboard/styles/zabuto_calendar.min.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>dashboard/styles/pace.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>dashboard/styles/jquery.news-ticker.css">
    
    <script src="https://code.jquery.com/jquery-2.2.2.min.js" integrity="sha256-36cp2Co+/62rEAAYHLmRCPIych47CvdM+uTBJwSzWjI=" crossorigin="anonymous"></script>
    <script src="<?php echo base_url();?>dashboard/script/jquery-1.10.2.min.js"></script>
    <script src="<?php echo base_url();?>dashboard/script/jquery.tablesorter.js"></script>
    <script src="<?php echo base_url();?>dashboard/script/jquery.tablesorter.combined.js"></script>
</head>
<body>
    <div>
        <!--BEGIN TOPBAR-->
        <div id="header-topbar-option-demo" class="page-header-topbar">
            <nav id="topbar" role="navigation" style="margin-bottom: 0;" data-step="3" class="navbar navbar-default navbar-static-top">
            <div class="navbar-header">
                <button type="button" data-toggle="collapse" data-target=".sidebar-collapse" class="navbar-toggle"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                <a id="logo" href="index.html" class="navbar-brand"><span class="fa fa-rocket"></span><span class="logo-text"><?php echo $_SESSION["user_type"];?></span><span style="display: none" class="logo-text-icon">µ</span></a></div>
            <div class="topbar-main"><a id="menu-toggle" href="#" class="hidden-xs"><i class="fa fa-bars"></i></a>
                <div class="news-update-box hidden-xs"><span class="text-uppercase mrm pull-left text-white">News:</span>
                    <ul id="news-update" class="ticker list-unstyled">
                        <li style="color:white">Welcome to Faculty Dashboard</li>
                    </ul>
                </div>
                <ul class="nav navbar navbar-top-links navbar-right mbn">
                    <li class="dropdown topbar-user"><a data-hover="dropdown" href="#" class="dropdown-toggle"><img src="<?php echo base_url();?>dashboard/images/avatar/48.jpg" alt="" class="img-responsive img-circle"/>&nbsp;<span class="hidden-xs"><?php echo $_SESSION["full_name"];?></span>&nbsp;<span class="caret"></span></a>
                        <ul class="dropdown-menu dropdown-user pull-right">
                            <li><a href="<?php echo base_url();?>index.php/faculty/change_password"><i class="fa fa-tasks"></i>Change Password</a></li>
                            <li><a href="<?php echo base_url();?>index.php/faculty/logout"><i class="fa fa-key"></i>Log Out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        </div>
        <!--END TOPBAR-->
        <div id="wrapper">
            <!--BEGIN SIDEBAR MENU-->
            <nav id="sidebar" role="navigation" data-step="2" data-intro="Template has &lt;b&gt;many navigation styles&lt;/b&gt;"
                data-position="right" class="navbar-default navbar-static-side">
            <div class="sidebar-collapse menu-scroll">
                <ul id="side-menu" class="nav">
                    
                     <div class="clearfix"></div>
                    <li><a href="<?php echo base_url(); ?>index.php/faculty"><i class="fa fa-tachometer fa-fw">
                        <div class="icon-bg bg-orange"></div>
                    </i><span class="menu-title">Dashboard</span></a></li>

                    <li><a href="<?php echo base_url(); ?>index.php/faculty/city_preferences"><i class="fa fa-desktop fa-fw">
                        <div class="icon-bg bg-pink"></div>
                    </i><span class="menu-title">City Preferences</span></a>
                    </li>
                    
                    <li><a href="<?php echo base_url(); ?>index.php/faculty/view_students"><i class="fa fa-bar-chart-o fa-fw">
                        <div class="icon-bg bg-pink"></div>
                    </i><span class="menu-title">View Students</span></a>
                    </li>

                    <li><a href="<?php echo base_url(); ?>index.php/faculty/evaluation"><i class="fa fa-bar-chart-o fa-fw">
                        <div class="icon-bg bg-pink"></div>
                    </i><span class="menu-title">Evaluate Students</span></a>
                    </li>
                </ul>
            </div>
        </nav>
            <!--END SIDEBAR MENU-->
            