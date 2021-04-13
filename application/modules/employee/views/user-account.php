<?php $this->load->view('inc/header', $this->data); ?>

        <!-- Header Layout Content -->
        <div class="mdk-header-layout__content">

            <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
                <div class="mdk-drawer-layout__content page ">

                    <div class="container-fluid page__container p-0">
                        <div class="row m-0">
                            <div class="col-lg container-fluid page__container">
                                <ol class="breadcrumb">
                                                               <?php
                         $user_type =    $this->session->userdata('user_type');
                            if($user_type== "manager"){ ?>

  <li class="breadcrumb-item"><a href="<?php echo site_url('employee/manager_dashboard'); ?>">Home</a></li>

                                <?php

                            }else{
                                ?>
  <li class="breadcrumb-item"><a href="<?php echo site_url('employee/student_dashboard'); ?>">Home</a></li>

                                <?php 
                            }


                              ?>
                                    <li class="breadcrumb-item active">Edit Account</li>
                                </ol>
                                 
                                <h1 class="h2">Basic Information</h1>
                                <div class="card">
                                    <div class="list-group list-group-fit">
                                        <div class="list-group-item">
                                            <div class="form-group m-0" role="group" aria-labelledby="label-firstname">
                                                <div class="form-row">
                                                    <label id="label-firstname" for="firstname" class="col-md-3 col-form-label form-label">First name</label>
                                                    <div class="col-md-9">
                                                        <input id="firstname" type="text" placeholder="Your first name" value="<?php echo $basic_info->first_name; ?>" class="form-control"  disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-group-item">
                                            <div class="form-group m-0" role="group" aria-labelledby="label-lastname">
                                                <div class="form-row">
                                                    <label id="label-lastname" for="lastname" class="col-md-3 col-form-label form-label">Last name</label>
                                                    <div class="col-md-9">
                                                        <input id="lastname" type="text" placeholder="Your last name" value="<?php echo $basic_info->last_name; ?>" class="form-control" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-group-item">
                                            <div class="form-group m-0" role="group" aria-labelledby="label-email">
                                                <div class="form-row">
                                                    <label id="label-email" for="email" class="col-md-3 col-form-label form-label">Your email address</label>
                                                    <div class="col-md-9">
                                                        <div role="group" class="input-group input-group-merge">
                        <input id="email" type="email" placeholder="Your email address" value=" <?php echo $basic_info->email; ?>" class="form-control form-control-prepended" disabled>
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <i class="material-icons">email</i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <h4>Change Password</h4>
<?php if($this->session->flashdata('error') ||  validation_errors()){ ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                           <span aria-hidden="true">×</span>
                                       </button>
                                       <?php echo $this->session->flashdata('error'); ?>
                                       <?php echo validation_errors(); ?> 
                                   </div>
                                <?php } ?>
                                <?php if($this->session->flashdata('success')){ ?>  
                                   <div class="alert alert-success alert-dismissible fade show" role="alert">
                                       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                           <span aria-hidden="true">×</span>
                                       </button>
                                      <?php echo $this->session->flashdata('success'); ?>
                                   </div>
                                <?php } ?>
                                <div class="card">
                                    <div class="list-group list-group-fit">
                                        <div class="list-group-item">
                                            <form method="post" action="<?php  echo site_url("employee/update_password"); ?>">
                                            <div class="form-group m-0" role="group" aria-labelledby="label-password">
                                                <div class="form-row">
                                                    <label id="label-password" for="password" class="col-sm-3 col-form-label form-label">New password:</label>
                                                    <div class="col-sm-9">
                                                        <div role="group" class="input-group input-group-merge form-control-prepended">
                                <input id="password" type="password" required="required" placeholder="New password" aria-required="true" class="form-control form-control-prepended" name="password">
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="list-group-item">
                                            <div class="form-group m-0" role="group" aria-labelledby="label-password2">
                                                <div class="form-row">
                                                    <label  id="label-password2" for="password2" class="col-sm-3 col-form-label form-label">Confirm password:</label>

                                                    <div class="col-sm-9">
                                                        <div role="group" class="input-group input-group-merge form-control-prepended">
                                <input id="password2" type="password" required="required" placeholder="Confirm password" aria-required="true" class="form-control form-control-prepended" name="confrom-password">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="page-nav" class="col-lg-auto page-nav">
                                <div data-perfect-scrollbar>
                                    <div class="page-section pt-lg-32pt">
                                        <div class="page-nav__content">
                                            <button class="btn btn-danger">
                                                Save Changes
                                            </button>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
<?php $this->load->view('sidebar'); ?>

            </div>

        </div>
    </div>



    <?php $this->load->view('inc/footer', $this->data); ?>