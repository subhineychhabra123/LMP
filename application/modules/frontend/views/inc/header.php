<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Peters Surgical</title>

    <!-- Perfect Scrollbar -->
    <link type="text/css" href="<?php echo base_url(); ?>frontend-assets/vendor/perfect-scrollbar.css" rel="stylesheet">
    
    <!-- Material Design Icons -->
    <link type="text/css" href="<?php echo base_url(); ?>frontend-assets/css/material-icons.css" rel="stylesheet">
    <link type="text/css" href="<?php echo base_url(); ?>frontend-assets/css/material-icons.rtl.css" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link type="text/css" href="<?php echo base_url(); ?>frontend-assets/css/fontawesome.css" rel="stylesheet">
    <link type="text/css" href="<?php echo base_url(); ?>frontend-assets/css/fontawesome.rtl.css" rel="stylesheet">

    <!-- Preloader -->
    <link type="text/css" href="<?php echo base_url(); ?>frontend-assets/css/preloader.css" rel="stylesheet">
    <link type="text/css" href="<?php echo base_url(); ?>frontend-assets/css/preloader.rtl.css" rel="stylesheet">

    <!-- App CSS -->
    <link type="text/css" href="<?php echo base_url(); ?>frontend-assets/css/app.css" rel="stylesheet">
    <link type="text/css" href="<?php echo base_url(); ?>frontend-assets/css/app.rtl.css" rel="stylesheet">


</head>

<body>

    <div class="preloader">
        <div class="sk-double-bounce">
            <div class="sk-child sk-double-bounce1"></div>
            <div class="sk-child sk-double-bounce2"></div>
        </div>
    </div>

    <!-- Header Layout -->
    <div class="mdk-header-layout js-mdk-header-layout">

        <!-- Header -->

        <div id="header" class="mdk-header js-mdk-header mb-0" data-effects="waterfall blend-background" data-fixed data-condenses>
            <div class="mdk-header__content">

                <div class="navbar navbar-expand-sm pr-0 pr-md-16pt" id="default-navbar" data-primary>

                    <!-- Navbar toggler -->
                    <button class="navbar-toggler navbar-toggler-right d-block d-md-none" type="button" data-toggle="sidebar">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <!-- Navbar Brand -->
                    <a href="<?php echo site_url(); ?>" class="navbar-brand">
                        <img class="navbar-brand-icon mr-0 mr-md-8pt" src="<?php echo base_url(); ?>frontend-assets/images/logo-text.png" width="110" alt="">
                    </a>



                    <!-- Main Navigation -->

                    <ul class="nav navbar-nav ml-auto flex-nowrap" style="white-space: nowrap;">
                        <li class="d-sm-flex nav-item">
                            <?php if(!$this->session->userdata('user_type')){ ?>
                            <a href="#" class="btn btn-accent" data-toggle="modal" data-target="#login_modal">Login</a>
                        <?php }else{ if($this->session->userdata('user_type') == "manager"){   ?>

 <a href="<?php echo site_url('employee/manager_dashboard') ; ?>" class="btn btn-accent" >My Dashboard</a>
                       <?php  } else { ?>
 <a href="<?php echo site_url($this->session->userdata('user_type')) ; ?>" class="btn btn-accent" >My Dashboard</a>

                    <?php   }}  ?>
                        </li>
                    </ul>



                    <!-- // END Main Navigation -->

                </div>

            </div>
        </div>

        <!-- // END Header -->