<?php $this->load->view('inc/header'); ?>

    <!-- Header Layout Content -->
    <div class="mdk-header-layout__content">

        <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
            <div class="mdk-drawer-layout__content page ">

                <div class="container-fluid page__container">
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
                        <li class="breadcrumb-item active">Go to Person</li>
                    </ol>
                    <div class="media align-items-center mb-headings">
                        <div class="media-body">
                            <h1 class="h2">Go to Person Directory</h1>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <br>

                    <div class="flex search-form form-control-rounded search-form--light mb-2" style="min-width: 200px;">
                        <input type="text" class="form-control" placeholder="Search person" id="searchSample02">
                        <button class="btn pr-3" type="button" role="button"><i class="material-icons">search</i></button>
                    </div>
                    <br>


                    <div class="row">
                      <?php  
                           foreach ($gtop as  $value) {
                       ?>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body goto-info">

                                    <div class="d-flex flex-column flex-sm-row">
                                        <a href="#" class="avatar avatar-sm mr-3">
                                            <img src="<?php echo base_url(); ?>admin-assets/images/all-users/<?php echo $value->profile_image; ?>" alt="Avatar" class="avatar-img rounded-circle">
                                        </a>
                                        <div class="flex">
                                            <h4 class="card-title mb-0"><?php echo $value->first_name.' '.$value->last_name; ?></h4>
                                            <p class="text-black-70"><?php echo $value->designation; ?></p>
                                        </div>
                                    </div>

                                    <div class="contact-info">
                                        <h6>D.O.B : <?php echo $value->dob; ?></h6>
                                        <h6><i class="material-icons">mail</i><?php echo $value->email; ?></h6>
                                    </div>

                                </div>
                            </div>
                        </div>
                       <?php } ?>


                    </div>


                </div>

            </div>

<?php $this->load->view('inc/sidebar'); ?>

<?php $this->load->view('inc/footer',$this->data); ?>