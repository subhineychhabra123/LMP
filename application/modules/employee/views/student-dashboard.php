<?php $this->load->view('inc/header'); ?>



        <!-- Header Layout Content -->
        <div class="mdk-header-layout__content">

            <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
                <div class="mdk-drawer-layout__content page ">

                    <div class="container-fluid page__container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo site_url('employee'); ?>">Home</a></li>
                            <li class="breadcrumb-item active">Employee Dashboard</li>
                        </ol>
                        <h1 class="h2">Employee Dashboard</h1>


                        <div class="row">
                            <div class="col-md-7">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="media align-items-center">
                                            <div class="media-body">
                                                <h4 class="card-title">Modules</h4>
                                                <p class="card-subtitle">Your recent courses</p>
                                            </div>
                                            <div class="media-right">
                                                <a class="btn btn-sm btn-primary" href="<?php echo site_url('employee/student_dashboard'); ?>">All Modules</a>
                                            </div>
                                        </div>
                                    </div>



                                    <ul class="list-group list-group-fit mb-0" style="z-index: initial;">

                                        <li class="list-group-item" style="z-index: initial;">
                                            <div class="d-flex align-items-center">
                                                <a href="#" class="avatar avatar-4by3 avatar-sm mr-3">
                                                    <img src="<?php echo base_url(); ?>admin-assets/images/logo-text.png" alt="course" class="avatar-img rounded" style="height: auto;">
                                                </a>
                                                <div class="flex">
                                                    <p class="text-body mb-0"><a class="dropdown-item" href="<?php echo site_url('employee/student_view_course'); ?>"><strong>Welcome</strong></a></p>
                                                    <div class="d-flex align-items-center">
                                                        <div class="progress" style="width: 100px;">
                                                            <div class="progress-bar bg-success " role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                        <small class="text-muted ml-2">100%</small>
                                                    </div>
                                                </div>
                                               
                                            </div>
                                        </li>

                                        <li class="list-group-item   " style="z-index: initial;">
                                            <div class="d-flex align-items-center">
                                                <a href="#" class="avatar avatar-4by3 avatar-sm mr-3">
                                                    <img src="<?php echo base_url(); ?>admin-assets/images/logo-text.png" alt="course" class="avatar-img rounded" style="height: auto;">
                                                </a>
                                                <div class="flex">
                                                    <p class="text-body mb-0"> <a class="dropdown-item" href="<?php echo site_url('employee/student_view_course2'); ?>"><strong>  Corporate</strong></a></p>
                                                    <div class="d-flex align-items-center">
                                                        <div class="progress" style="width: 100px;">
                                                            <div class="progress-bar bg-success" role="progressbar" style="width:100%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                        <small class="text-muted ml-2">100%</small>
                                                    </div>
                                                </div>
                                               
                                            </div>
                                        </li>

                                        <li class="list-group-item  " style="z-index: initial;">
                                            <div class="d-flex align-items-center">
                                                <a href="#" class="avatar avatar-4by3 avatar-sm mr-3">
                                                    <img src="<?php echo base_url(); ?>admin-assets/images/logo-text.png" alt="course" class="avatar-img rounded" style="height: auto;">
                                                </a>
                                                <div class="flex">
                                                    <p class="text-body mb-0"> <a class="dropdown-item" href="<?php echo site_url('employee/student_view_course3'); ?>"><strong>  Anatomy</strong></a></p>
                                                    <div class="d-flex align-items-center">
                                                        <div class="progress" style="width: 100px;">
                                                            <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                        <small class="text-muted ml-2">100%</small>
                                                    </div>
                                                </div>
                                                                                          </div>
                                        </li>
<li class="list-group-item  " style="z-index: initial;">
                                            <div class="d-flex align-items-center">
                                                <a href="#" class="avatar avatar-4by3 avatar-sm mr-3">
                                                    <img src="<?php echo base_url(); ?>admin-assets/images/logo-text.png" alt="course" class="avatar-img rounded" style="height: auto;">
                                                </a>
                                                <div class="flex">
                                                    <p class="text-body mb-0"> <a class="dropdown-item" href="<?php echo site_url('employee/student_view_course4'); ?>"><strong>  Cardiovascular Intro</strong></a></p>
                                                    <div class="d-flex align-items-center">
                                                        <div class="progress" style="width: 100px;">
                                                            <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                        <small class="text-muted ml-2">100%</small>
                                                    </div>
                                                </div>
                                                                                          </div>
                                        </li>


                                        <li class="list-group-item  " style="z-index: initial;">
                                            <div class="d-flex align-items-center">
                                                <a href="#" class="avatar avatar-4by3 avatar-sm mr-3">
                                                    <img src="<?php echo base_url(); ?>admin-assets/images/logo-text.png" alt="course" class="avatar-img rounded" style="height: auto;">
                                                </a>
                                                <div class="flex">
                                                    <p class="text-body mb-0"> <a class="dropdown-item" href="<?php echo site_url('employee/student_view_course5'); ?>"><strong>  Cardiovascular Advanced</strong></a></p>
                                                    <div class="d-flex align-items-center">
                                                        <div class="progress" style="width: 100px;">
                                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 20%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                        <small class="text-muted ml-2">20%</small>
                                                    </div>
                                                </div>
                                                                                          </div>
                                        </li>

                                        <li class="list-group-item  course-disable" style="z-index: initial;">
                                            <div class="d-flex align-items-center">
                                                <a href="#" class="avatar avatar-4by3 avatar-sm mr-3">
                                                    <img src="<?php echo base_url(); ?>admin-assets/images/logo-text.png" alt="course" class="avatar-img rounded" style="height: auto;">
                                                </a>
                                                <div class="flex">
                                                    <p class="text-body mb-0"> <a class="dropdown-item" href="<?php echo site_url('employee/student_view_course5'); ?>"><strong>  Anatomy Advanced </strong></a></p>
                                                    <div class="d-flex align-items-center">
                                                        <div class="progress" style="width: 100px;">
                                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                        <small class="text-muted ml-2">0%</small>
                                                    </div>
                                                </div>
                                                                                          </div>
                                        </li>
                                        <!-- <li class="list-group-item course-disable " style="z-index: initial;">
                                            <div class="d-flex align-items-center">
                                                <a href="#" class="avatar avatar-4by3 avatar-sm mr-3">
                                                    <img src="<?php echo base_url(); ?>admin-assets/images/vuejs.png" alt="course" class="avatar-img rounded">
                                                </a>
                                                <div class="flex">
                                                    <p class="text-body mb-0"><strong>Angular in Steps</strong></p>
                                                    <div class="d-flex align-items-center">
                                                        <div class="progress" style="width: 100px;">
                                                            <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                        <small class="text-muted ml-2">100%</small>
                                                    </div>
                                                </div>
                                                <div class="dropdown ml-3">
                                                    <a href="#" class="dropdown-toggle text-muted" data-caret="false" data-toggle="dropdown">
                                                        <i class="material-icons">more_vert</i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="<?php echo site_url('employee/student_view_course'); ?>">Continue</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li> -->

                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="media align-items-center">
                                            <div class="media-body">
                                                <h4 class="card-title">Today's Birthday list</h4>
                                               <!--  <p class="card-subtitle">Birthday list of all employees for 25-01-2020</p> -->
                                            </div>
                                        </div>
                                    </div>

                                    <div id="swal-confirm-delete" class="d-none" data-swal-type="success" data-swal-title="Sent!" data-swal-text="Your birthday wish has been sent to Magnus Goldsmith"></div>

                                    <div id="swal-cancel-delete" class="d-none" data-swal-type="error" data-swal-title="Cancelled" data-swal-text="Your message was not sent"></div>

                                    <ul class="list-group list-group-fit">


                                        <li class="list-group-item forum-thread">
                                            <div class="media align-items-center">
                                                <div class="media-left">
                                                    <div class="forum-icon-wrapper">
                                                        <a href="#" class="forum-thread-icon" data-toggle="swal" data-swal-title="Here's the message" data-swal-text="Happy Birthday Magnus" data-swal-show-cancel-button="true" data-swal-confirm-button-text="Yes, send it!" data-swal-confirm-cb="#swal-confirm-delete" data-swal-close-on-confirm="false">
                                                            <i class="material-icons">forum</i>
                                                        </a>
                                                        <div class="forum-thread-user">
                                                            <img src="<?php echo base_url(); ?>admin-assets/images/people/50/guy-1.jpg" alt="" width="20" class="rounded-circle">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="media-body">
                                                    <div class="d-flex align-items-center">
                                                        <span class="text-body"><strong>Luci Bryant</strong></span>
                                                        <small class="ml-auto text-muted">28-02-2020</small>
                                                    </div>
                                                    <p class="text-black-70" href="#">Wish Luci Bryant Happy Birthday</p>
                                                </div>
                                            </div>
                                        </li>




                                        <li class="list-group-item forum-thread">
                                            <div class="media align-items-center">
                                                <div class="media-left">
                                                    <div class="forum-icon-wrapper">
                                                        <a href="#" class="forum-thread-icon" data-toggle="swal" data-swal-title="Here's the message" data-swal-text="Happy Birthday Magnus" data-swal-show-cancel-button="true" data-swal-confirm-button-text="Yes, send it!" data-swal-confirm-cb="#swal-confirm-delete" data-swal-close-on-confirm="false">
                                                            <i class="material-icons">forum</i>
                                                        </a>
                                                        <div class="forum-thread-user">
                                                            <img src="<?php echo base_url(); ?>admin-assets/images/people/50/guy-2.jpg" alt="" width="20" class="rounded-circle">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="media-body">
                                                    <div class="d-flex align-items-center">
                                                        <span class="text-body"><strong>Magnus Goldsmith</strong></span>
                                                        <small class="ml-auto text-muted">28-02-2020</small>
                                                    </div>
                                                    <p class="text-black-70" href="#">Wish Magnus Goldsmith Happy Birthday</p>
                                                </div>
                                            </div>
                                        </li>



                                        <li class="list-group-item forum-thread">
                                            <div class="media align-items-center">
                                                <div class="media-left">
                                                    <div class="forum-icon-wrapper">
                                                        <a href="#" class="forum-thread-icon" data-toggle="swal" data-swal-title="Here's the message" data-swal-text="Happy Birthday Magnus" data-swal-show-cancel-button="true" data-swal-confirm-button-text="Yes, send it!" data-swal-confirm-cb="#swal-confirm-delete" data-swal-close-on-confirm="false">
                                                            <i class="material-icons">forum</i>
                                                        </a>
                                                        <div class="forum-thread-user">
                                                            <img src="<?php echo base_url(); ?>admin-assets/images/people/50/woman-1.jpg" alt="" width="20" class="rounded-circle">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="media-body">
                                                    <div class="d-flex align-items-center">
                                                        <span class="text-body"><strong>Katelyn Rankin</strong></span>
                                                        <small class="ml-auto text-muted">28-02-2020</small>
                                                    </div>
                                                    <p class="text-black-70" href="#">Wish Katelyn Rankin Happy Birthday</p>
                                                </div>
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-7">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="media align-items-center">
                                            <div class="media-body">
                                                <h4 class="card-title">Reward Points</h4>
                                                <p class="card-subtitle">Your scored points</p>
                                            </div>
                                        </div>
                                    </div>

                                    <ul class="list-group list-group-fit mb-0 point-height">

                                        <li class="list-group-item">
                                            <div class="media align-items-center">
                                                <div class="media-body">
                                                    <a class="text-body" href="<?php echo site_url('employee/student_quiz_result'); ?>"><strong>    Welcome</strong></a><br>
                                                </div>
                                                <div class="media-right text-center d-flex align-items-center">
                                                    <h4 class="mb-0">5.8</h4>
                                                </div>
                                            </div>
                                        </li>

                                        <li class="list-group-item">
                                            <div class="media align-items-center">
                                                <div class="media-body">
                                                    <a class="text-body" href="<?php echo site_url('employee/student_quiz_result'); ?>"><strong>    Corporate</strong></a><br>
                                                </div>
                                                <div class="media-right text-center d-flex align-items-center">
                                                    <h4 class="mb-0">9.5</h4>
                                                </div>
                                            </div>
                                        </li>
    <li class="list-group-item">
                                            <div class="media align-items-center">
                                                <div class="media-body">
                                                <h4 class="mb-0">   TOTAL</h4><br>
                                                </div>
                                                <div class="media-right text-center d-flex align-items-center">
                                                    <h4 class="mb-0">15.3</h4>
                                                </div>
                                            </div>
                                        </li>
 

                                    </ul>

                                </div>



                            </div>
                            <div class="col-lg-5">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="media align-items-center">
                                            <div class="media-body">
                                                <h4 class="card-title">Your Quiz Results</h4>
                                               <!--  <p class="card-subtitle">Your Performance</p> -->
                                            </div>
                                            <div class="media-right">
                                                <a class="btn btn-sm btn-primary" href="<?php  echo site_url('employee/take_a_quiz'); ?>">Quiz results</a>
                                            </div>
                                        </div>
                                    </div>

                                    <ul class="list-group list-group-fit mb-0">

                                        <li class="list-group-item">
                                            <div class="media align-items-center">
                                                <div class="media-body">
                                                    <a class="text-body" href="<?php echo site_url('employee/student_quiz_result'); ?>"><strong>Welcome</strong></a><br>
                                                    <!-- <div class="d-flex align-items-center">
                                                        <small class="text-black-50 text-uppercase mr-2">Course</small>
                                                        <a href="#">Basics of HTML</a>
                                                    </div> -->
                                                </div>
                                                <div class="media-right text-center d-flex align-items-center">
                                                    <span class="text-black-50 mr-3">Good</span>
                                                    <h4 class="mb-0">5.8</h4>
                                                </div>
                                            </div>
                                        </li>

                                        <li class="list-group-item">
                                            <div class="media align-items-center">
                                                <div class="media-body">
                                                    <a class="text-body" href="<?php echo site_url('employee/student_quiz_result'); ?>"><strong>
                                                        Corporate
                                                    </strong></a><br>
                                                   <!--  <div class="d-flex align-items-center">
                                                        <small class="text-black-50 text-uppercase mr-2">Course</small>
                                                        <a href="#">Angular in Steps</a>
                                                    </div> -->
                                                </div>
                                                <div class="media-right text-center d-flex align-items-center">
                                                    <span class="text-black-50 mr-3">Great</span>
                                                    <h4 class="mb-0 text-success">9.8</h4>
                                                </div>
                                            </div>
                                        </li>

                                        <li class="list-group-item">
                                            <div class="media align-items-center">
                                                <div class="media-body">
                                                    <a class="text-body" href="<?php echo site_url('employee/student_quiz_result'); ?>"><strong>Anatomy</strong></a><br>
                                                   <!--  <div class="d-flex align-items-center">
                                                        <small class="text-black-50 text-uppercase mr-2">Course</small>
                                                        <a href="#">Bootstrap Foundations</a>
                                                    </div> -->
                                                </div>
                                                <div class="media-right text-center d-flex align-items-center">
                                                    <span class="text-black-50 mr-3">Failed</span>
                                                    <h4 class="mb-0 text-danger">2.8</h4>
                                                </div>
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>





                        <br><h4 class="card-title">Recent Activities</h4><br>

                       <div class="row">
                        <div class="col-sm-6 col-md-3 col-lg-3">

                            <div class="card card--elevated mdk-reveal event-block">
                                    <a href="<?php echo site_url('iacts'); ?>">
                                    <img src="<?php echo base_url(); ?>frontend-assets/images/events/iacts/event1.jpeg" alt="">
                                   </a>
                                    <div class="event-content">

                                        <h5> <a href="<?php echo site_url('iacts'); ?>">IACTS</a></h5>
                                        <p><span>Venue:</span>Ahmedabad</p>
                                        <p><span>Date:</span>12-12-2019</p>
                                    </div>

                            </div>


                        </div>
                        <div class="col-sm-6 col-md-3 col-lg-3">

                            <div class="card card--elevated mdk-reveal event-block">
                                 <a href="<?php echo site_url('peters_day'); ?>">
                                <img src="<?php echo base_url(); ?>frontend-assets/images/events/peters-day/_DSC7247.JPG" alt="" style="min-height: 188px;">
                            </a>
                                <div class="event-content">
                                    <h5> <a href="<?php echo site_url('peters_day'); ?>"> Peters Day</a></h5>
                                    <p><span>Venue:</span>Manesar</p>
                                    <p><span>Date:</span> 03-01-2020</p>
                                </div>

                            </div>

                        </div>
                        <div class="col-sm-6 col-md-3 col-lg-3">

                            <div class="card card--elevated mdk-reveal event-block">
                                 <a href="<?php echo site_url('international_events'); ?>">
                                <img src="<?php echo base_url(); ?>frontend-assets/images/events/international-events/Medica_Germany.jpeg" alt="">
                            </a>
                                <div class="event-content">
                                    <h5> <a href="<?php echo site_url('international_events'); ?>">International Events</a></h5>
                                    <p><span>Venue:</span>Multiple Countries</p>
                                    <p><span>Date:</span>Multiple</p>
                                </div>

                            </div>

                        </div>
                         <div class="col-sm-6 col-md-3 col-lg-3">

                            <div class="card card--elevated mdk-reveal event-block">
                                 <a href="<?php echo site_url('zumba'); ?>">
                                <img src="<?php echo base_url(); ?>frontend-assets/images/events/Zumba/IMG-20190913-WA0011.jpg" alt="">
                            </a>
                                <div class="event-content">
                                    <h5> <a href="<?php echo site_url('zumba'); ?>">Zumba</a></h5>
                                    <p><span>Venue:</span>Gurgaon Office</p>
                                    <p><span>Date:</span>19-01-2020</p>
                                </div>

                            </div>

                        </div>
                       
                    </div>

                    </div>

                </div>




         


<?php $this->load->view('inc/sidebar'); ?>
<?php if ($this->uri->segment(1)=="employee"): ?>
    

    <!-- on-load change-password popup -->
    <div class="modal fade on-load-popup" id="on-load">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">

                    <div class="col-md-12">

                        <div class="content text-center">
                           <img src="<?php echo site_url('admin-assets/images/logo-text.png'); ?>">
                            <h3>Welcome to Peter's Surgical</h3>
                            <h6>Kindly change your password to continue</h6>
                            <a href="<?php echo site_url('employee/student_account_edit_basic'); ?>" class="btn btn-accent">Change Password</a>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /on-load change-password popup -->  
    <?php endif ?>
 

<?php $this->load->view('inc/footer'); ?>
<script type="text/javascript">
    $('div#on-load').click(function(){

        $('.show').removeClass('show');
        $(".modal-backdrop.fade").css("display", "none !Important");
    });
</script>