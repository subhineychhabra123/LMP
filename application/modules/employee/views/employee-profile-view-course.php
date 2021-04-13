<?php $this->load->view('inc/header'); ?>

    <!-- Header Layout Content -->
    <div class="mdk-header-layout__content">

        <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
            <div class="mdk-drawer-layout__content page pt-0">

                <div class="container-fluid page__container d-flex align-items-end position-relative mb-4 " style="margin-top: 100px;">
                    <div class="avatar avatar-xxl position-absolute bottom-0 left-0 right-0">
                        <img src="<?php echo base_url(); ?>admin-assets/images/all-users/<?php echo $user->profile_image  ; ?>" alt="avatar" class="avatar-img rounded-circle border-3">
                    </div>
                    <ul class="nav nav-tabs-links flex" style="margin-left: 265px;">
                       <!--  <li class="nav-item">
                            <a href="<?php echo site_url('employee/employee_profile_view_overview'); ?>" class="nav-link">Overview</a>
                        </li> -->
                        <?php 
$id = $this->uri->segment(3);
                         ?>
                        <li class="nav-item">
                            <a href="<?php echo site_url('employee/profile_view_course/'.$id.''); ?>" class="nav-link active">Course</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo site_url('employee/employee_profile_view_test/'.$id.''); ?>" class="nav-link">Test</a>
                        </li>
                    </ul>
                </div>

                <div class="container-fluid page__container mb-3">
                    <div class="row flex-sm-nowrap">
                        <div class="col-sm-auto mb-3 mb-sm-0" style="width: 265px;">
                            <h1 class="h2 mb-1"><?php echo $user->first_name.' '.$user->last_name ; ?></h1>
                            <br>
                            <!-- <div class="text-muted d-flex align-items-center mb-2">
                                <i class="material-icons mr-1">account_box</i>
                                <div class="flex">Joined in 1st Jan 2020</div>
                            </div> -->
                            <div class="text-muted d-flex align-items-center mb-4">
                                <i class="material-icons mr-1">mail</i>
                                <div class="flex"><?php echo $user->email ; ?></div>
                            </div>

                        </div>
                        <div class="col-sm">

<?php
if($course_ass == NULL){
    $course_ass = array();
}
 foreach ($course_ass as $data) { 

$course_details = $this->employee_m->get_course_progress_details($data->id ,$id);
$check_course_complete = $this->employee_m->get_course_status($data->id , $id);
$lesson = $this->employee_m->get_lesson_by_course($data->id);
    ?>


                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex align-items-center">
                                        <a href="<?php echo site_url('employee/student_view_course'); ?>" class="mr-3">
                                            <img src="<?php echo base_url(); ?>admin-assets/images/logo-text.png" width="100" alt="" class="rounded">
                                        </a>
                                        <div class="flex">
                                            <h4 class="card-title mb-0"><a href="#"><?php echo $data->title ; ?> </a><?php if($check_course_complete =="completed"){ ?>
<img src="<?php echo base_url() ; ?>/frontend-assets/images/download.png" alt="course" class="avatar-img rounded" style="height: 20px; width:20px">
<?php } ?></h4>
                                            <span class="badge badge-primary"><?php  echo $course_details['lesson_name'] ; ?></span>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="progress" style="width: 100px;">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: <?php  echo $course_details['progress_per'] ; ?>%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <small class="text-muted ml-2"><?php  echo $course_details['progress_per'] ; ?>%</small>
                                        </div>
                                    </div>
                                </div>
                                <ul class="list-group list-group-fit">

<?php foreach ($lesson as $lesson_data) { ?>

                                    <li class="list-group-item">
                                        <a href="" class="text-body text-decoration-0 d-flex align-items-center">
                                            <strong><?php echo $lesson_data->title ; ?></strong>
                                            <?php if($this->employee_m->check_completed_lesson($lesson_data->id ,$id)){ ?>
                                            <i class="material-icons text-muted ml-auto" style="font-size: inherit;">check</i>
                                            <?php 
}
                                             ?>
                                        </a>
                                    </li>


    <?php 
    # code...
} ?>
                                    
                                    
                                </ul>
                            </div>
 <?php 
    # code...
}
if(count($course_ass) == 0){
?>
<p class="text-center">No Course Found</p>
<?php
}

 ?>


                            
                            
                        </div>
                    </div>
                </div>

            </div>

<?php $this->load->view('inc/sidebar'); ?>
<?php $this->load->view('inc/footer'); ?>