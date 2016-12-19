<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $_SESSION["user_type"];?> | Dashboard</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?php echo base_url();?>dashboard/images/icons/favicon.ico">
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
    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>dashboard/styles/main.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>dashboard/styles/style-responsive.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>dashboard/styles/zabuto_calendar.min.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>dashboard/styles/pace.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>dashboard/styles/jquery.news-ticker.css">
</head>
<body>
    <div>
        <!--BEGIN BACK TO TOP-->
        <a id="totop" href="#"><i class="fa fa-angle-up"></i></a>
        <!--END BACK TO TOP-->
        <!--BEGIN TOPBAR-->
        <div id="header-topbar-option-demo" class="page-header-topbar">
            <nav id="topbar" role="navigation" style="margin-bottom: 0;" data-step="3" class="navbar navbar-default navbar-static-top">
            <div class="navbar-header">
                <button type="button" data-toggle="collapse" data-target=".sidebar-collapse" class="navbar-toggle"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                <a id="logo" href="index.html" class="navbar-brand"><span class="fa fa-rocket"></span><span class="logo-text">IAP</span><span style="display: none" class="logo-text-icon">µ</span></a></div>
            <div class="topbar-main"><a id="menu-toggle" href="#" class="hidden-xs"><i class="fa fa-bars"></i></a>
                
                <form id="topbar-search" action="" method="" class="hidden-sm hidden-xs">
                    <div class="input-icon right text-white"><a href="#"><i class="fa fa-search"></i></a><input type="text" placeholder="Search here..." class="form-control text-white"/></div>
                </form>
                <div class="news-update-box hidden-xs"><span class="text-uppercase mrm pull-left text-white">News:</span>
                    <ul id="news-update" class="ticker list-unstyled">
                        <li>Welcome to IAP </li>
                        <li>Kindly submit all details on time</li>
                    </ul>
                </div>
                <ul class="nav navbar navbar-top-links navbar-right mbn">
                    <li class="dropdown"><a data-hover="dropdown" href="#" class="dropdown-toggle"><i class="fa fa-bell fa-fw"></i><span class="badge badge-green">3</span></a>
                        
                    </li>
                    <li class="dropdown"><a data-hover="dropdown" href="#" class="dropdown-toggle"><i class="fa fa-envelope fa-fw"></i><span class="badge badge-orange">7</span></a>
                        
                    </li>
                    <li class="dropdown"><a data-hover="dropdown" href="#" class="dropdown-toggle"><i class="fa fa-tasks fa-fw"></i><span class="badge badge-yellow">8</span></a>
                        
                    </li>
                    <li class="dropdown topbar-user"><a data-hover="dropdown" href="#" class="dropdown-toggle"><img src="<?php echo base_url();?>dashboard/images/avatar/48.jpg" alt="" class="img-responsive img-circle"/>&nbsp;<span class="hidden-xs"><?php echo $_SESSION["full_name"];?></span>&nbsp;<span class="caret"></span></a>
                        <ul class="dropdown-menu dropdown-user pull-right">
                            <li><a href="#"><i class="fa fa-user"></i>My Profile</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i>My Inbox<span class="badge badge-danger">3</span></a></li>
                            <li><a href="<?php echo base_url(); ?>index.php/student/change_password"><i class="fa fa-tasks"></i>Change Password<span class="badge badge-success">7</span></a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo base_url();?>index.php/student/logout"><i class="fa fa-key"></i>Log Out</a></li>
                        </ul>
                    </li>
                    <li id="topbar-chat" class="hidden-xs"><a href="javascript:void(0)" data-step="4" data-intro="&lt;b&gt;Form chat&lt;/b&gt; keep you connecting with other coworker" data-position="left" class="btn-chat"><i class="fa fa-comments"></i><span class="badge badge-info">3</span></a></li>
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
                    <li><a href="<?php echo base_url(); ?>index.php/student/company_details"><i class="fa fa-desktop fa-fw">
                        <div class="icon-bg bg-orange"></div>
                    </i><span class="menu-title">Training Details</span></a></li>
                    
                    <li><a href="<?php echo base_url(); ?>index.php/student/mentor"><i class="fa fa-desktop fa-fw">
                        <div class="icon-bg bg-orange"></div>
                    </i><span class="menu-title">Link Mentor</span></a></li>
                    <li><a href="<?php echo base_url(); ?>index.php/student/submit_joining"><i class="fa fa-desktop fa-fw">
                        <div class="icon-bg bg-pink"></div>
                    </i><span class="menu-title">Upload Joining Report</span></a>
                    </li>
                    
                    <li><a href="<?php echo base_url(); ?>index.php/student/alotted_faculty"><i class="fa fa-desktop fa-fw">
                        <div class="icon-bg bg-orange"></div>
                    </i><span class="menu-title">Faculty Allotted</span></a></li>
                    <li><a href="<?php echo base_url(); ?>index.php/student/submit_intermid"><i class="fa fa-desktop fa-fw">
                        <div class="icon-bg bg-pink"></div>
                    </i><span class="menu-title">Upload Intermid Report</span></a>
                    </li>
                    <li><a href="<?php echo base_url(); ?>index.php/student/submit_final"><i class="fa fa-desktop fa-fw">
                        <div class="icon-bg bg-pink"></div>
                    </i><span class="menu-title">Upload Final Report</span></a>
                    </li>
                    <li><a href="<?php echo base_url(); ?>index.php/student/faculty_evaluation"><i class="fa fa-desktop fa-fw">
                        <div class="icon-bg bg-pink"></div>
                    </i><span class="menu-title">Evaluation by faculty</span></a>
                    </li>
                    <li><a href="<?php echo base_url(); ?>index.php/student/download_files"><i class="fa fa-desktop fa-fw">
                        <div class="icon-bg bg-pink"></div>
                    </i><span class="menu-title">Download files</span></a>
                    </li>
                    <li><a href="<?php echo base_url(); ?>index.php/student/emergency"><i class="fa fa-desktop fa-fw">
                        <div class="icon-bg bg-blue"></div>
                    </i><span class="menu-title">Emergency contact details</span></a>
                    </li>
                </ul>
            </div>
        </nav>
            <!--END SIDEBAR MENU-->

           
           
            <!--BEGIN PAGE WRAPPER-->
            <div id="page-wrapper">
                <!--BEGIN TITLE & BREADCRUMB PAGE-->
                <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
                    <div class="page-header pull-left">
                        <div class="page-title">
                            Dashboard</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a href="dashboard.html">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                        <li class="hidden"><a href="#">Dashboard</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                        <li class="active">Dashboard</li>
                    </ol>
                    <div class="clearfix">
                    </div>
                </div>
                <div class="page-content">
                <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
                    <div class="page-header pull-left">
                        <div class="page-title">
                            <i>Information</i>: You are at phase: <?php echo $_SESSION['phase'];?>  </div>
                    </div>
                    <div class="clearfix">
                    </div>
                </div>

                <!--END TITLE & BREADCRUMB PAGE-->