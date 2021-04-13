<?php $this->load->view('inc/header'); ?>


    <!-- Header Layout Content -->
    <div class="mdk-header-layout__content">

        <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
            <div class="mdk-drawer-layout__content page ">

                <div class="container-fluid page__container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('employee'); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo site_url('employee/student_browse_courses'); ?>">View Courses</a></li>
                        <li class="breadcrumb-item active">Edit Courses Duration</li>
                    </ol>
                    <div class="media align-items-center mb-headings">
                        <div class="media-body">
                            <h1 class="h2">Edit Course Duration</h1>
                        </div>
                        <div class="media-right">
                            <a href="#" class="btn btn-danger">SAVE</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Basic Information</h4>
                                </div>
                                <div class="card-body">

                                    <div class="form-group">
                                        <label class="form-label">Title</label>
                                        <p>Basics of Vue.js</p>
                                    </div>

                                    <div class="form-group mb-0">
                                        <label class="form-label">Description</label>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque necessitatibus distinctio adipisci eius, unde dignissimos maxime doloribus quisquam non harum.</p>
                                    </div>

                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Lessons</h4>
                                </div>
                                <div class="card-body">
                                        <ul class="pl-0">
                                            <li class="nestable-item nestable-item-handle" data-id="2">
                                                <div class="nestable-content ml-0">
                                                    <div class="media align-items-center">
                                                        <div class="media-left">
                                                            <img src="<?php echo base_url(); ?>admin-assets/images/vuejs.png" alt="" width="100" class="rounded">
                                                        </div>
                                                        <div class="media-body">
                                                            <h5 class="card-title h6 mb-0">
                                                                <a href="#">Awesome Vue.js with SASS Processing</a>
                                                            </h5>
                                                            <small class="text-muted">updated 1 month ago</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="nestable-item nestable-item-handle" data-id="1">
                                                <div class="nestable-content ml-0">
                                                    <div class="media align-items-center">
                                                        <div class="media-left">
                                                            <img src="<?php echo base_url(); ?>admin-assets/images/nodejs.png" alt="" width="100" class="rounded">
                                                        </div>
                                                        <div class="media-body">
                                                            <h4 class="card-title h6 mb-0">
                                                                <a href="#">Github Webhooks for Beginners</a>
                                                            </h4>
                                                            <small class="text-muted">updated 1 month ago</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="nestable-item nestable-item-handle" data-id="2">
                                                <div class="nestable-content ml-0">
                                                    <div class="media align-items-center">
                                                        <div class="media-left">
                                                            <img src="<?php echo base_url(); ?>admin-assets/images/gulp.png" alt="" width="100" class="rounded">
                                                        </div>
                                                        <div class="media-body">
                                                            <h4 class="card-title h6 mb-0">
                                                                <a href="#">Browserify: Writing Modular JavaScript</a>
                                                            </h4>
                                                            <small class="text-muted">updated 1 month ago</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item" src="https://player.vimeo.com/video/97243285?title=0&amp;byline=0&amp;portrait=0" allowfullscreen=""></iframe>
                                </div>
                                <!--<div class="card-body">-->
                                    <!--<input type="text" class="form-control" value="https://player.vimeo.com/video/97243285?title=0&amp;byline=0&amp;portrait=0" />-->
                                <!--</div>-->
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Meta</h4>
                                    <p class="card-subtitle">Extra Options </p>
                                </div>

                                <form class="card-body" action="#">
                                    <div class="form-group">
                                        <label class="form-label">Category</label>
                                        <p>Angular JS</p>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="duration">Duration</label>
                                        <input type="text" id="duration" class="form-control" placeholder="No. of Days" value="10">
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

<?php $this->load->view('inc/sidebar'); ?>
<?php $this->load->view('inc/footer'); ?>