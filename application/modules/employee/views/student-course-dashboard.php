<?php $this->load->view('inc/header');  ?>

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
                            <li class="breadcrumb-item active">Modules</li>
                        </ol>
                        <div class="media align-items-center mb-headings">
                            <div class="media-body">
                                <h1 class="h2">Modules</h1>
                            </div>
                        </div>
                        <div class="clearfix"></div>


                        <div class="row">
<?php 

$i = 0 ;
foreach ($course_ass as $data) {
$course_details = $this->employee_m->get_course_progress_details($data->id);
$check_course_complete = $this->employee_m->get_course_status($data->id);
if($course_details["module_status"] == "progress" || $course_details["module_status"] == "completed" || $i==0
){


 ?>
  

                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="d-flex flex-column flex-sm-row">
                                            <a href="<?php echo site_url('employee/student_view_course/'.$data->id.''); ?>" class="avatar avatar-lg avatar-4by3 mb-3 w-xs-plus-down-100 mr-sm-3">
                                                <img src="<?php echo base_url(); ?>admin-assets/images/course/<?php echo $data->preview_img ;?>" alt="" class="avatar-img rounded" style="height: auto;">
                                            </a>
                                            <div class="flex" style="min-width: 200px;">
                                                <h4 class="card-title mb-1"><a href="<?php echo site_url('employee/student_view_course/'.$data->id.''); ?>"><?php echo $data->title ;  ?></a> <?php if($check_course_complete =="completed"){ ?>
<img src="<?php echo base_url() ; ?>/frontend-assets/images/download.png" alt="course" class="avatar-img rounded" style="height: 20px; width:20px">
<?php } ?></h4>
                                                <p class="text-black-70"><?php  echo $course_details['lesson_name'] ; ?></p>
                                                <div class="d-flex align-items-center">
                                                    <div class="progress" style="width: 100px;">
                                                        <div class="progress-bar bg-success" role="progressbar" style="width: <?php  echo $course_details['progress_per'] ; ?>%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    <small class="text-muted ml-2"><?php  echo $course_details['progress_per'] ; ?>%</small>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="card-footer bg-white">
                                        <a href="<?php echo site_url('employee/student_view_course/'.$data->id.''); ?>" class="btn btn-primary btn-sm">Continue <i class="material-icons btn__icon--right">play_circle_outline</i></a>
                                    </div>
                                </div>
                            </div>
<?php  $course_status = $course_details["module_status"];  }else{ ?>


<div class="col-md-6">
                                <div class="card course-disable">
                                    <div class="card-body">

                                        <div class="d-flex flex-column flex-sm-row">
                                            <a href="<?php echo site_url('employee/student_view_course/'.$data->id.''); ?>" class="avatar avatar-lg avatar-4by3 mb-3 w-xs-plus-down-100 mr-sm-3">
                                                <img src="<?php echo base_url(); ?>admin-assets/images/course/<?php  echo $data->preview_img; ?>" alt="" class="avatar-img rounded" style="height: auto;">
                                            </a>
                                            <div class="flex" style="min-width: 200px;">
                                                <h4 class="card-title mb-1"><a href="<?php echo site_url('employee/student_view_course/'.$data->id.''); ?>"><?php  echo $data->title; ?></a></h4>
                                                <p class="text-black-70"><?php  echo $course_details['lesson_name'] ; ?></p>
                                                <div class="d-flex align-items-center">
                                                    <div class="progress" style="width: 100px;">
                                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    <small class="text-muted ml-2">0%</small>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="card-footer bg-white">
                                        <a href="<?php echo site_url('employee/student_view_course'); ?>" class="btn btn-primary btn-sm">Continue <i class="material-icons btn__icon--right">play_circle_outline</i></a>
                                    </div>

                                </div>
                            </div>
    <?php 


}  $i++; } ?>
<!--                             <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="d-flex flex-column flex-sm-row">
                                            <a href="<?php echo site_url('employee/student_view_course'); ?>" class="avatar avatar-lg avatar-4by3 mb-3 w-xs-plus-down-100 mr-sm-3">
                                                <img src="<?php echo base_url(); ?>admin-assets/images/logo-text.png" alt="" class="avatar-img rounded" style="height: auto;">
                                            </a>
                                            <div class="flex" style="min-width: 200px;">
                                                <h4 class="card-title mb-1"><a href="<?php echo site_url('employee/student_view_course2'); ?>">Corporate</a></h4>
                                                <p class="text-black-70">
Induction</p>
                                                <div class="d-flex align-items-center">
                                                    <div class="progress" style="width: 100px;">
                                                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    <small class="text-muted ml-2">100%</small>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="card-footer bg-white">
                                        <a href="<?php echo site_url('employee/student_view_course'); ?>" class="btn btn-primary btn-sm">Continue <i class="material-icons btn__icon--right">play_circle_outline</i></a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="d-flex flex-column flex-sm-row">
                                            <a href="<?php echo site_url('employee/student_view_course'); ?>" class="avatar avatar-lg avatar-4by3 mb-3 w-xs-plus-down-100 mr-sm-3">
                                                <img src="<?php echo base_url(); ?>admin-assets/images/logo-text.png" alt="" class="avatar-img rounded" style="height: auto;">
                                            </a>
                                            <div class="flex" style="min-width: 200px;">
                                                <h4 class="card-title mb-1"><a href="<?php echo site_url('employee/student_view_course3'); ?>">Anatomy</a></h4>
                                                <p class="text-black-70">Cardio Vascular</p>
                                                <div class="d-flex align-items-center">
                                                    <div class="progress" style="width: 100px;">
                                                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    <small class="text-muted ml-2">100%</small>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="card-footer bg-white">
                                        <a href="<?php echo site_url('employee/student_view_course'); ?>" class="btn btn-primary btn-sm">Continue <i class="material-icons btn__icon--right">play_circle_outline</i></a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="d-flex flex-column flex-sm-row">
                                            <a href="<?php echo site_url('employee/student_view_course'); ?>" class="avatar avatar-lg avatar-4by3 mb-3 w-xs-plus-down-100 mr-sm-3">
                                                <img src="<?php echo base_url(); ?>admin-assets/images/logo-text.png" alt="" class="avatar-img rounded" style="height: auto;">
                                            </a>
                                            <div class="flex" style="min-width: 200px;">
                                                <h4 class="card-title mb-1"><a href="<?php echo site_url('employee/student_view_course4'); ?>">Cardiovascular Intro</a></h4>
                                                <p class="text-black-70">Introduction</p>
                                                <div class="d-flex align-items-center">
                                                    <div class="progress" style="width: 100px;">
                                                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    <small class="text-muted ml-2">100%</small>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="card-footer bg-white">
                                        <a href="<?php echo site_url('employee/student_view_course'); ?>" class="btn btn-primary btn-sm">Continue <i class="material-icons btn__icon--right">play_circle_outline</i></a>
                                    </div>
                                </div>
                            </div>
                            

                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="d-flex flex-column flex-sm-row">
                                            <a href="<?php echo site_url('employee/student_view_course2'); ?>" class="avatar avatar-lg avatar-4by3 mb-3 w-xs-plus-down-100 mr-sm-3">
                                                <img src="<?php echo base_url(); ?>admin-assets/images/logo-text.png" alt="" class="avatar-img rounded" style="height: auto;">
                                            </a>
                                            <div class="flex" style="min-width: 200px;">
                                                <h4 class="card-title mb-1"><a href="<?php echo site_url('employee/student_view_course5'); ?>">Cardiovascular Advanced</a></h4>
                                                <p class="text-black-70">Introduction</p>
                                                <div class="d-flex align-items-center">
                                                    <div class="progress" style="width: 100px;">
                                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 0%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    <small class="text-muted ml-2">0%</small>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="card-footer bg-white">
                                        <a href="<?php echo site_url('employee/student_view_course2'); ?>" class="btn btn-warning btn-sm">Continue <i class="material-icons btn__icon--right">play_circle_outline</i></a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="card course-disable">
                                    <div class="card-body">

                                        <div class="d-flex flex-column flex-sm-row">
                                            <a href="<?php echo site_url('employee/student_view_course3'); ?>" class="avatar avatar-lg avatar-4by3 mb-3 w-xs-plus-down-100 mr-sm-3">
                                                <img src="<?php echo base_url(); ?>admin-assets/images/logo-text.png" alt="" class="avatar-img rounded" style="height: auto;">
                                            </a>
                                            <div class="flex" style="min-width: 200px;">
                                                <h4 class="card-title mb-1"><a href="<?php echo site_url('employee/student_view_course3'); ?>">Anatomy Advanced</a></h4>
                                                <p class="text-black-70">Cardio Vascular</p>
                                                <div class="d-flex align-items-center">
                                                    <div class="progress" style="width: 100px;">
                                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    <small class="text-muted ml-2">0%</small>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="card-footer bg-white">
                                        <a href="<?php echo site_url('employee/student_view_course'); ?>" class="btn btn-primary btn-sm">Continue <i class="material-icons btn__icon--right">play_circle_outline</i></a>
                                    </div>

                                </div>
                            </div> -->

                           

                        </div>

                        <!-- Pagination -->
                        <!-- <ul class="pagination justify-content-center pagination-sm">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true" class="material-icons">chevron_left</span>
                                    <span>Prev</span>
                                </a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link" href="#" aria-label="1">
                                    <span>1</span>
                                </a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="1">
                                    <span>2</span>
                                </a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span>Next</span>
                                    <span aria-hidden="true" class="material-icons">chevron_right</span>
                                </a>
                            </li>
                        </ul> -->
                    </div>

                </div>


<?php $this->load->view('inc/sidebar'); ?>

<?php $this->load->view('inc/footer',$this->data); ?>