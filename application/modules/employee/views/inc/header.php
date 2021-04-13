<!DOCTYPE html>
<html lang="en" dir="ltr">
<head><meta charset="windows-1252">
    
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Peters Surgical</title>

    <!-- Perfect Scrollbar -->
    <link type="text/css" href="<?php echo base_url(); ?>admin-assets/vendor/perfect-scrollbar.css" rel="stylesheet">

    <!-- Material Design Icons -->
    <link type="text/css" href="<?php echo base_url(); ?>admin-assets/css/material-icons.css" rel="stylesheet">
    <link type="text/css" href="<?php echo base_url(); ?>admin-assets/css/material-icons.rtl.css" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link type="text/css" href="<?php echo base_url(); ?>admin-assets/css/fontawesome.css" rel="stylesheet">
    <link type="text/css" href="<?php echo base_url(); ?>admin-assets/css/fontawesome.rtl.css" rel="stylesheet">

    <!-- App CSS -->
    <link type="text/css" href="<?php echo base_url(); ?>admin-assets/css/app.css" rel="stylesheet">
    <link type="text/css" href="<?php echo base_url(); ?>admin-assets/css/app.rtl.css" rel="stylesheet">

    <!-- Sweet Alert -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>admin-assets/css/sweetalert.css">

     <link type="text/css" href="<?php echo base_url(); ?>admin-assets/css/flatpickr.css" rel="stylesheet">
    <link type="text/css" href="<?php echo base_url(); ?>admin-assets/css/flatpickr.rtl.css" rel="stylesheet">
    <link type="text/css" href="<?php echo base_url(); ?>admin-assets/css/flatpickr-airbnb.css" rel="stylesheet">
    <link type="text/css" href="<?php echo base_url(); ?>admin-assets/css/flatpickr-airbnb.rtl.css" rel="stylesheet">
    <!-- Quill Theme -->
    <link type="text/css" href="<?php echo base_url(); ?>admin-assets/css/quill.css" rel="stylesheet">
    <link type="text/css" href="<?php echo base_url(); ?>admin-assets/css/quill.rtl.css" rel="stylesheet">
    <!-- Nestable -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>admin-assets/css/nestable.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>admin-assets/css/nestable.rtl.css">


</head>

<body class=" layout-fluid">

<!--     <div class="preloader">
        <div class="sk-double-bounce">
            <div class="sk-child sk-double-bounce1"></div>
            <div class="sk-child sk-double-bounce2"></div>
        </div>
    </div> -->

    <!-- Header Layout -->
    <div class="mdk-header-layout js-mdk-header-layout">

        <!-- Header -->

        <div id="header" data-fixed class="mdk-header js-mdk-header mb-0">
            <div class="mdk-header__content">

                <!-- Navbar -->
                <nav id="default-navbar" class="navbar navbar-expand navbar-darkmm-0">
                    <div class="container-fluid">
                        <!-- Toggle sidebar -->
                        <button class="navbar-toggler d-block" data-toggle="sidebar" type="button">
                            <span class="material-icons">menu</span>
                        </button>

                        <!-- Brand -->
                        <a href="<?php echo site_url(''); ?>" class="navbar-brand">
                            <img src="<?php echo base_url(); ?>admin-assets/images/logo-text.png" class="mr-2" alt="" width="110">
                        </a>


                        <div class="flex">
                            
                        </div>
                        <?php 
if($this->router->fetch_method() == "take_a_quiz"){
                         ?>
<div id="timer" class="timer">
 
  <div id="hours">Time Left <span></span></div>
  <div id="minutes" class="timer"></div>
  <div id="seconds" class="timer"></div>
</div>
<?php } ?>
                        <!-- Menu -->
                        <ul class="nav navbar-nav flex-nowrap">



                            <!-- Notifications dropdown -->
                            <li class="nav-item dropdown dropdown-notifications dropdown-menu-sm-full">
                                <button class="nav-link btn-flush dropdown-toggle" type="button" data-toggle="dropdown" data-dropdown-disable-document-scroll data-caret="false">
                                    <i class="material-icons">notifications</i>
                                    <span class="badge badge-notifications badge-danger">2</span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <div data-perfect-scrollbar class="position-relative">
                                        <div class="dropdown-header"><strong>Messages</strong></div>
                                        <div class="list-group list-group-flush mb-0">

                                            <a href="#" class="list-group-item list-group-item-action unread">
                                                <span class="d-flex align-items-center mb-1">
                                                    <small class="text-muted">3 minutes ago</small>

                                                    <span class="ml-auto" style="font-size: 12px;">Download</span>

                                                </span>
                                                <span class="d-flex">
                                                    <span class="avatar avatar-xs mr-2">
                                                        <img src="<?php echo base_url(); ?>admin-assets/images/people/110/woman-5.jpg" alt="people" class="avatar-img rounded-circle">
                                                    </span>
                                                    <span class="flex d-flex flex-column">
                                                        <strong>Michelle</strong>
                                                        <span class="text-black-70">New Course File</span>
                                                    </span>
                                                </span>
                                            </a>

                                            <a href="#" class="list-group-item list-group-item-action unread">
                                                <span class="d-flex align-items-center mb-1">
                                                    <small class="text-muted">5 minutes ago</small>

                                                    <span class="ml-auto unread-indicator bg-primary"></span>

                                                </span>
                                                <span class="d-flex">
                                                    <span class="avatar avatar-xs mr-2">
                                                        <img src="<?php echo base_url(); ?>admin-assets/images/people/110/woman-5.jpg" alt="people" class="avatar-img rounded-circle">
                                                    </span>
                                                    <span class="flex d-flex flex-column">
                                                        <strong>Michelle</strong>
                                                        <span class="text-black-70">Clients loved the new design.</span>
                                                    </span>
                                                </span>
                                            </a>

                                            <a href="#" class="list-group-item list-group-item-action unread">
                                                <span class="d-flex align-items-center mb-1">
                                                    <small class="text-muted">5 minutes ago</small>

                                                    <span class="ml-auto unread-indicator bg-primary"></span>

                                                </span>
                                                <span class="d-flex">
                                                    <span class="avatar avatar-xs mr-2">
                                                        <img src="<?php echo base_url(); ?>admin-assets/images/people/110/woman-5.jpg" alt="people" class="avatar-img rounded-circle">
                                                    </span>
                                                    <span class="flex d-flex flex-column">
                                                        <strong>Michelle</strong>
                                                        <span class="text-black-70">🔥 Superb job..</span>
                                                    </span>
                                                </span>
                                            </a>

                                        </div>

                                        <div class="dropdown-header"><strong>System notifications</strong></div>
                                        <div class="list-group list-group-flush mb-0">

                                            <a href="#" class="list-group-item list-group-item-action border-left-3 border-left-danger">
                                                <span class="d-flex align-items-center mb-1">
                                                    <small class="text-muted">3 minutes ago</small>

                                                </span>
                                                <span class="d-flex">
                                                    <span class="avatar avatar-xs mr-2">
                                                        <span class="avatar-title rounded-circle bg-light">
                                                            <i class="material-icons font-size-16pt text-danger">account_circle</i>
                                                        </span>
                                                    </span>
                                                    <span class="flex d-flex flex-column">

                                                        <span class="text-black-70">Your profile information has not been synced correctly.</span>
                                                    </span>
                                                </span>
                                            </a>

                                            <a href="#" class="list-group-item list-group-item-action">
                                                <span class="d-flex align-items-center mb-1">
                                                    <small class="text-muted">5 hours ago</small>

                                                </span>
                                                <span class="d-flex">
                                                    <span class="avatar avatar-xs mr-2">
                                                        <span class="avatar-title rounded-circle bg-light">
                                                            <i class="material-icons font-size-16pt text-success">group_add</i>
                                                        </span>
                                                    </span>
                                                    <span class="flex d-flex flex-column">
                                                        <strong>Adrian. D</strong>
                                                        <span class="text-black-70">Wants to join your private group.</span>
                                                    </span>
                                                </span>
                                            </a>

                                            <a href="#" class="list-group-item list-group-item-action">
                                                <span class="d-flex align-items-center mb-1">
                                                    <small class="text-muted">1 day ago</small>

                                                </span>
                                                <span class="d-flex">
                                                    <span class="avatar avatar-xs mr-2">
                                                        <span class="avatar-title rounded-circle bg-light">
                                                            <i class="material-icons font-size-16pt text-warning">storage</i>
                                                        </span>
                                                    </span>
                                                    <span class="flex d-flex flex-column">

                                                        <span class="text-black-70">Your deploy was successful.</span>
                                                    </span>
                                                </span>
                                            </a>

                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!-- // END Notifications dropdown -->
                            <!-- User dropdown -->
                            <li class="nav-item dropdown ml-1 ml-md-3">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"><img src="<?php echo base_url(); ?>admin-assets/images/all-users/<?php   echo $p_info->profile_image ; ?>" alt="Avatar" class="rounded-circle" width="40"></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="<?php echo site_url('employee/logout'); ?>">
                                        <i class="material-icons">lock</i> Logout
                                    </a>
                                </div>
                            </li>
                            <!-- // END User dropdown -->

                        </ul>
                        <!-- // END Menu -->
                    </div>
                </nav>
                <!-- // END Navbar -->

            </div>
        </div>

        <!-- // END Header -->