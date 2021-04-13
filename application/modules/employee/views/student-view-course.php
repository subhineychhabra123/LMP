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
                        
                            <li class="breadcrumb-item"><a href="<?php echo site_url('employee/student_dashboard'); ?>">Courses</a></li>
                            <li class="breadcrumb-item active"><?php echo $course_details->title ; ?></li>
                        </ol>
                        <h1 class="h2"><?php echo $lesson->title ; ?></h1>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <video id="vid" width="100%" autoplay controls controlsList="nodownload">
                                          <source src="http://test.webinch.com/developed/new_lms/admin-assets/images/course/<?php echo $lesson->video; ?>" type="video/mp4">
                                          
                                        </video>
                                    </div>
                                    <!-- <div class="card-body">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum dicta eius enim inventoreus optio ratione veritatis. Beatae deserunt illum ipsam magniima mollitia officiis quia tempora!
                                    </div> -->
                                </div>
                                <div class="card">
                                    <ul class="list-group list-group-fit">
                                        <li class="list-group-item">
                                            <div class="media align-items-center">
                                                <div class="media-left">
                                                    <i class="material-icons text-muted-light">assessment</i>
                                                </div>
                                                <div class="media-body">
                                                     Basis Knowledge  (Beginner)
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="media align-items-center">
                                                <div class="media-left">
                                                    <i class="material-icons text-muted-light">schedule</i>
                                                </div>
                                                <div class="media-body">
                                                 <small class="text-muted"><?php echo $lesson->course_duration ; ?></small> 
                                                </div>
                                                <div class="media-body">
                                                 Ideal Time to finish the course : (<?php echo $course_details->duration ; ?>) 
                                                </div>
                                            </div>
                                        </li>

                                       <li class="list-group-item">
                                            
                                            <div class="accordion" id="accordionExample">
  
  
  <div class="card">
    <div class="card-header" id="headingThree">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Subscript
        </button>
      </h2>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">
      <?php echo $lesson->subscript ; ?>
      </div>
    </div>
  </div>
</div>
                                        </li>
                                    </ul>
                                </div>
                                <!-- <div class="card">
                                    <div class="card-header">
                                        <div class="media align-items-center">
                                            <div class="media-left">
                                                <img src="<?php echo base_url(); ?>admin-assets/images/people/110/guy-6.jpg" alt="About Adrian" width="50" class="rounded-circle">
                                            </div>
                                            <div class="media-body">
                                                <h4 class="card-title"><a href="#">Adrian Demian</a></h4>
                                                <p class="card-subtitle">Instructor</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <p>Having over 12 years exp. Adrian is one of the lead UI designers in the industry Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere, aut.</p>
                                        <a href="#" class="btn btn-light"><i class="fab fa-facebook"></i></a>
                                        <a href="#" class="btn btn-light"><i class="fab fa-twitter"></i></a>
                                        <a href="#" class="btn btn-light"><i class="fab fa-linkedin-in"></i></a>
                                    </div>
                                </div> -->

                            </div>
                            <div class="col-md-4">
                                <!-- <div class="card">
                                    <div class="card-body">
                                        <a href="#" class="btn btn-primary btn-block flex-column">
                                            <i class="material-icons">get_app</i> Download Files
                                        </a>
                                    </div>
                                </div> -->


                                <!-- Lessons -->
                                <ul class="card list-group list-group-fit">
                                    <?php 
                                    
                                    $i = 1 ;
$id = $this->uri->segment(3);
foreach ($all_lesson as $data) { ?>
                                    <li class="list-group-item active">
                                        <div class="media">
                                            <div class="media-left">
                                                <div ><?php  echo $i ; ?>.</div>
                                            </div>
                                            <div class="media-body">

   

                                                <a href="<?php echo site_url('employee/student_view_course/'.$id.'/'.$data->id.''); ?>" class="text-white"><?php echo $data->title ; ?></a>

                                            </div>
                                            <div class="media-right">
                                                <small ><?php echo $data->course_duration; ?></small>
                                            </div>
                                        </div>
                                    </li>
                                    <?php $i++ ; } ?>
                                   <!--  <li class="list-group-item active">
                                        <div class="media">
                                            <div class="media-left">
                                                2.
                                            </div>
                                            <div class="media-body">
                                                <a class="text-white" href="#">The MVC architectural pattern</a>
                                            </div>
                                            <div class="media-right">
                                                <small>25:01</small>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="media">
                                            <div class="media-left">
                                                <div class="text-muted">3.</div>
                                            </div>
                                            <div class="media-body">
                                                <a href="#">Database Models</a>
                                            </div>
                                            <div class="media-right">
                                                <small class="text-muted-light">12:10</small>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="media">
                                            <div class="media-left">
                                                <div class="text-muted">4.</div>
                                            </div>
                                            <div class="media-body">
                                                <a href="#">Database Access</a>
                                            </div>
                                            <div class="media-right">
                                                <small class="text-muted-light">1:25</small>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="media">
                                            <div class="media-left">
                                                <div class="text-muted">5.</div>
                                            </div>
                                            <div class="media-body">
                                                <a href="#">Eloquent Basics</a>
                                            </div>
                                            <div class="media-right">
                                                <small class="text-muted-light">22:30</small>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="media">
                                            <div class="media-left">
                                                <div class="text-muted">6.</div>
                                            </div>
                                            <div class="media-body">
                                                <a href="<?php echo site_url('employee/student_quiz_result'); ?>">Take Quiz</a>
                                            </div>
                                            <div class="media-right">
                                                <small class="text-muted-light">10:00</small>
                                            </div>
                                        </div>
                                    </li> -->
                                </ul>

                            </div>
                        </div>
                    </div>

                </div>

<?php $this->load->view('inc/sidebar'); ?>

<?php $this->load->view('inc/footer',$this->data); ?>

<script type="text/javascript">
    var duration = '';
    var currenttime = '';
var vid = document.getElementById("vid");
vid.onpause = function() {

     $.ajax({
            type:'post',
            url: '<?php echo site_url('employee/update_progress_log') ?>',
            data: {  course_id: <?php echo $this->uri->segment(3) ;?>, lesson_id: <?php echo $lesson->id ; ?> , video_time : vid.currentTime , total_duration : vid.duration}, 
            success: function(data) {
               // window.location.href = data ;


              }
           });
};




$( document ).ready(function() {

      $.ajax({
            type:'post',
            url: '<?php echo site_url('employee/get_video_progress_data') ?>',
            data: {  course_id: <?php echo $this->uri->segment(3) ;?>, lesson_id: <?php echo $lesson->id ; ?> ,video_time : vid.currentTime ,total_duration : vid.duration}, 
            success: function(data) {
        if(data == 0){
               $.ajax({
            type:'post',
            url: '<?php echo site_url('employee/update_progress_log') ?>',
            data: {  course_id: <?php echo $this->uri->segment(3) ;?>, lesson_id: <?php echo $lesson->id ; ?> ,video_time : vid.currentTime ,total_duration : vid.duration}, 
            success: function(datas) {
               // window.location.href = data ;
              }
           });
           }

           else if(data == 100){
                   vid.currentTime = 0;
           }
           else{
    vid.currentTime = vid.duration*data/100;
           }


              }
           });
        
});
$("#vid").bind("ended", function() {
   //TO DO: Your code goes here...


    $.ajax({
            type:'post',
            url: '<?php echo site_url('employee/get_video_ended_redirect_link') ?>',
            data: {  course_id: <?php echo $this->uri->segment(3) ;?>, lesson_id: <?php echo $lesson->id ; ?> }, 
            success: function(data) {
                if(data.indexOf("take_a_quiz") != -1){
                        $.ajax({
                    type:'post',
                    url: '<?php echo site_url('employee/update_skip_quest') ?>',
                    data: {  course_id: <?php echo $this->uri->segment(3) ;?>}, 
                    success: function(datasn) {
                       // window.location.href = data ;
                      }
                   });
                console.log("take_a_quiz" + " found");

                var r = confirm("Are you sure want to proceed the test");
                  if (r == true) {
                     window.location.href = data ; 
                  } else{

            
                  } 
        }else{
                window.location.href = data ; 
        }
               
              }
           });
});
</script>

