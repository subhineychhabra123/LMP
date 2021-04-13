<?php $this->load->view('inc/header');  ?>

        <!-- Header Layout Content -->
        <div class="mdk-header-layout__content">

            <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
                <div class="mdk-drawer-layout__content page ">

                    <div class="container-fluid page__container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo site_url('employee'); ?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo site_url('employee/student_browse_courses'); ?>">Courses</a></li>
                            <li class="breadcrumb-item active">Cardiovascular Advanced:</li>
                        </ol>
                        <h1 class="h2">Cardiovascular Advanced:</h1>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <video id="vid" width="100%" controls>
                                          <source src="http://test.webinch.com/developed/lms/admin-assets/CV-3 WITH DR RIA Low.mp4" type="video/mp4">
                                          
                                        </video>
                                    </div>
                            
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
                                                    31<small class="text-muted">min</small> &nbsp; 55 <small class="text-muted">SEC</small>
                                                </div>
                                                <div class="media-body">
                                                 Ideal Time to finish the course : (2 days) 
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
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
</div>
                                        </li>
                                    
                                    </ul>
                                </div>
                                

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
                                    <li class="list-group-item active">
                                        <div class="media">
                                            <div class="media-left">
                                                <div >1.</div>
                                            </div>
                                            <div class="media-body">
                                                <a href="#" class="text-white">Introduction</a>
                                            </div>
                                            <div class="media-right">
                                                <small >31:55</small>
                                            </div>
                                        </div>
                                    </li>
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
    var video = document.getElementById('vid');
video.onplay = function() {
    if(!confirm("Do you want to begin the course")){
        video.pause();
    }
};
</script>
<!-- <script type="text/javascript">
document.getElementById('vid').addEventListener('loadedmetadata', function() {
  this.currentTime = 925;
}, false);
</script> -->