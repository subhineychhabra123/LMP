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
                        <li class="breadcrumb-item active"> Employees</li>
                    </ol>
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
                    <div class="media align-items-center mb-headings">
                        <div class="media-body">
                            <h1 class="h2">Employees</h1>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <br>


                    <div class="search-form search-form--light mb-3">
                        <input type="text" class="form-control search" placeholder="Search">
                        <button class="btn" type="button" role="button"><i class="material-icons">search</i></button>
                    </div>

                    <div class="table-responsive border-bottom" data-toggle="lists" data-lists-values='["js-lists-values-employee-name"]'>

                        <table class="table mb-0">
                            <thead>
                            <tr>

                                <th style="width: 18px;">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input js-toggle-check-all" data-target="#staff" id="customCheckAll">
                                        <label class="custom-control-label" for="customCheckAll"><span class="text-hide">Toggle all</span></label>
                                    </div>
                                </th>

                                <th>Employees</th>


                                <th style="width: 100px;">Completed</th>
                                <th style="width: 100px;">Incompleted</th>
                                <th style="width: 51px;">Examination</th>
                                <th style="width: 24px;"></th>
                            </tr>
                            </thead>
                            <tbody class="list" id="staff">
                            <form method="post" action="<?php echo base_url('employee/send_file_to_emp'); ?>" enctype="multipart/form-data">
                          <?php 
                           $i = 1;
                          foreach ($mag_emp_lst as  $value): ?>
                                <tr class="">

                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input " <?php if($i == 1){echo 'checked'; } ?>  id="customCheck1_<?php echo $i; ?>" name="send_files[]" value="<?php echo $value->id; ?>">
                                        <label class="custom-control-label" for="customCheck1_<?php echo $i; ?>"><span class="text-hide">Check</span></label>
                                    </div>
                                </td>

                                <td>

                                    <div class="media align-items-center">
                                        <div class="avatar avatar-sm mr-3">
                                            <img src="<?php echo base_url(); ?>admin-assets/images/all-users/<?php echo $value->profile_image; ?>" alt="Avatar" class="avatar-img rounded-circle">
                                        </div>
                                        <div class="media-body">

                                            <span class="js-lists-values-employee-name"><?php echo $value->first_name.' '.$value->last_name; ?> </span>

                                        </div>
                                    </div>

                                </td>


                                <td><small class="text-muted">3</small></td>
                                <td><small class="text-muted">2</small></td>
                                <td>Passed</td>
                                <td><a href="#" class="dropdown-toggle text-muted" data-caret="false" data-toggle="dropdown"><i class="material-icons">more_vert</i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">View Profile</a>
                                        <a class="dropdown-item" href="#">Send Reminder</a>
                                    </div>
                                </td>
                            </tr>

                          <?php $i++; endforeach; ?>
                           
                           
 

                            </tbody>
                        </table>
                    </div>


                    <br>
                    <div class="card">
                        <div class="card-body">
                            <h5>Send Document</h5>
                            
                                <div class="form-group">
                                    <input type="file" class="form-control" name="photo" required="" />
                                </div>
                                <button class="btn btn-danger">Send</button>
                            </form>
                        </div>
                    </div>

                </div>

            </div>
<?php $this->load->view('inc/sidebar'); ?>

<?php $this->load->view('inc/footer',$this->data); ?>