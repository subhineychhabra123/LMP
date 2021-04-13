<?php $this->load->view('inc/header'); 

$this->load->model('employee_m');
 ?>

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
                        <li class="breadcrumb-item active">Add Employee Request</li>
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
                    <h1 class="h2">Add Employee Request</h1>

                    <!-- Search -->
                    <div class="flex search-form form-control-rounded search-form--light mb-2" style="min-width: 200px;">
                        <input type="text" class="form-control" placeholder="Search user ( Enter Email address )" id="searchSample02">
                        <button class="btn pr-3" type="button" role="button" id="click_button"><i class="material-icons">search</i></button>
                    </div>
                    <br>

                    <div class="card">
                        <div class="card-header">
                            <div class="media align-items-center">
                                <div class="media-body">
                                    <h4 class="card-title">Employees</h4>
                                    <p class="card-subtitle">List of all Employess</p>

                                </div>
                              <!--   <div class="media-right">
                                    <a href="#" class="btn btn-primary btn-sm"><i class="material-icons">add</i> Add</a>
                                </div> -->
                            </div>
                        </div>



                        <ul class="list-group list-group-fit">

 
                        <?php 
                 if(count($emp_req_list) > 0 && $emp_req_list[0] !=NULL){
                        foreach ($emp_req_list as $user_list): 
                           $idss =  $user_list->id;
                           $req_by = $this->session->userdata('id');
                           $user_apr = $this->employee_m->user_status_ap($idss, $req_by);
 
                         ?>
                            
                          <li class="list-group-item forum-thread" >
                                <div class="media align-items-center">
                                    <div class="media-left">
                                        <div class="forum-icon-wrapper">
                                            <img src="<?php echo base_url(); ?>admin-assets/images/all-users/<?php 
                                            echo $user_list->profile_image; ?>" alt="" width="40" class="rounded-circle">
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <div class="d-flex align-items-center">
                                            <a href="<?php echo site_url('employee/profile_view_course'); ?>" class="text-body"><strong><?php echo $user_list->first_name." ".$user_list->last_name; ?> </strong></a>
                                            <small class="ml-auto text-muted"style=" margin-right: 20px;"> <?php echo $user_apr->requested_at; ?> </small>
                                            <?php if($user_apr->status == 'approved'){ ?>
                                                    <button class="btn-sm btn-danger remove_data" data-id="<?php echo $user_apr->ap_id; ?>">Remove request</button>
                                            <?php  }elseif ($user_apr->status == 'pending') { ?>
                                                     <button class="btn-sm btn-info remainder0" data-by="<?php echo  $req_by; ?>" data-user= "<?php echo $user_apr->user_id; ?>">Send Reminder</button>
                                          <?php  }else{ ?>
                                                <button class="btn-sm btn-danger"><?php echo ucfirst($user_apr->status); ?></button>
                                            <?php   }   ?>  
                                        </div>
                                        
                                    </div>
                                </div>
                            </li> 
                             <?php  endforeach  ; } ?>

                        </ul>
                    </div>

                </div>

            </div>

<?php $this->load->view('inc/sidebar'); ?>

<?php $this->load->view('inc/footer',$this->data); ?>