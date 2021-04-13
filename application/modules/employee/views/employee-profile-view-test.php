<?php $this->load->view('inc/header');  ?>

    <!-- Header Layout Content -->
    <div class="mdk-header-layout__content">

        <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
            <div class="mdk-drawer-layout__content page pt-0">

                <div class="container-fluid page__container d-flex align-items-end position-relative mb-4 " style="margin-top: 100px;">
                    <div class="avatar avatar-xxl position-absolute bottom-0 left-0 right-0">
                        <img src="<?php echo base_url(); ?>admin-assets/images/all-users/<?php echo $user->profile_image  ; ?>" alt="avatar" class="avatar-img rounded-circle border-3">
                    </div>
                    <ul class="nav nav-tabs-links flex" style="margin-left: 265px;">
                        <?php $id = $this->uri->segment(3); ?>
                        <li class="nav-item">
                            <a href="<?php echo site_url('employee/profile_view_course/'.$id.''); ?>" class="nav-link ">Course</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo site_url('employee/employee_profile_view_test/'.$id.''); ?>" class="nav-link active">Test</a>
                        </li>
                    </ul>
                </div>

                <div class="container-fluid page__container mb-3">
                    <div class="row flex-sm-nowrap">
                        <div class="col-sm-auto mb-3 mb-sm-0" style="width: 265px;">
                            <h1 class="h2 mb-1"><?php echo $user->first_name.' '.$user->last_name ; ?></h1>
                            <br>
                          <!--   <div class="text-muted d-flex align-items-center mb-2">
                                <i class="material-icons mr-1">account_box</i>
                                <div class="flex">Joined in 1st Jan 2020</div>
                            </div> -->
                            <div class="text-muted d-flex align-items-center mb-4">
                                <i class="material-icons mr-1">mail</i>
                                <div class="flex"><?php echo $user->email ; ?></div>
                            </div>

                        </div>
                        <div class="col-sm">
                            <div class="card">
                                <div class="card-header">
                                    <div class="media align-items-center">
                                        <div class="media-body">
                                            <h4 class="card-title">Quizzes</h4>
                                            <p class="card-subtitle">Performance</p>
                                        </div>
                                    </div>
                                </div>
<ul class="list-group list-group-fit mb-0">
<?php 

foreach ($quiz_details as $data) {  ?>

                                        <li class="list-group-item">
                                            <div class="media align-items-center">
                                                <div class="media-body">
                                                    <a class="text-body" href="<?php echo site_url('employee/student_quiz_results/'.$data->qa_id.''); ?>"><strong><?php echo $data->title ; ?></strong></a><br>
                                                    <!-- <div class="d-flex align-items-center">
                                                        <small class="text-black-50 text-uppercase mr-2">Course</small>
                                                        <a href="#">Basics of HTML</a>
                                                    </div> -->
                                                </div>
                                                <div class="media-right text-center d-flex align-items-center">

                                                    <?php if($data->total_no >  8 ){
?>
<span class="text-black-50 mr-3">Great</span>
                                                    <h4 class="mb-0 text-success"><?php echo $data->total_no ; ?></h4>
<?php

                                                    }elseif ($data->total_no < 8 &&  $data->total_no > 5 ) {  ?>


                                                          <span class="text-black-50 mr-3">Good</span>
                                                    <h4 class="mb-0"><?php echo $data->total_no ; ?></h4>
                                                   <?php  }else{

                                                    ?>

                                                    <span class="text-black-50 mr-3">Failed</span>
                                                    <h4 class="mb-0 text-danger"><?php echo $data->total_no ; ?></h4>
                                                    <?php
                                                   } ?>
                                                 
                                                </div>
                                            </div>
                                        </li>

                                        

                                        <?php }

if(count($quiz_details) == 0){

    echo "<p class='text-center'>Not participate yet</p>";
}
                                         ?>

                                    </ul>
    
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <div class="media align-items-center">
                                        <div class="media-body">
                                            <h4 class="card-title">Add Remark</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">

                                    <form class="flex">
                                        <div class="form-group">
                                            <label class="form-label">Give Remark</label>
                                            <textarea type="text" class="form-control" rows="4" placeholder="Write here .."></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <div class="media align-items-center">
                                        <div class="media-body">
                                            <h4 class="card-title">Upload Document</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">

                                    <form class="flex">
                                        <div class="form-group">
                                            <label class="form-label">Upload Document</label>
                                            <input type="file" class="form-control">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

<?php $this->load->view('inc/sidebar'); ?>
<?php $this->load->view('inc/footer',$this->data); ?>