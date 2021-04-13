<?php $this->load->view('inc/header');  ?>

    <!-- Header Layout Content -->
    <div class="mdk-header-layout__content">

        <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
            <div class="mdk-drawer-layout__content page pt-0">

                <div class="container-fluid page__container d-flex align-items-end position-relative mb-4 " style="margin-top: 100px;">
                    <div class="avatar avatar-xxl position-absolute bottom-0 left-0 right-0">
                        <img src="<?php echo base_url(); ?>admin-assets/images/256_rsz_clem-onojeghuo-150467-unsplash.jpg" alt="avatar" class="avatar-img rounded-circle border-3">
                    </div>
                    <ul class="nav nav-tabs-links flex" style="margin-left: 265px;">
                         <li class="nav-item">
                            <a href="<?php echo site_url('employee/employee_profile_view_overview'); ?>" class="nav-link active">Overview</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo site_url('employee/profile_view_course'); ?>" class="nav-link ">Course</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo site_url('employee/employee_profile_view_test'); ?>" class="nav-link">Test</a>
                        </li>
                    </ul>
                </div>

                <div class="container-fluid page__container mb-3">
                    <div class="row flex-sm-nowrap">
                        <div class="col-sm-auto mb-3 mb-sm-0" style="width: 265px;">
                            <h1 class="h2 mb-1">Laza Bogdan</h1>
                            <br>
                            <div class="text-muted d-flex align-items-center mb-2">
                                <i class="material-icons mr-1">account_box</i>
                                <div class="flex">Joined in 1st Jan 2020</div>
                            </div>
                            <div class="text-muted d-flex align-items-center mb-4">
                                <i class="material-icons mr-1">mail</i>
                                <div class="flex">info@gmail.com</div>
                            </div>

                            <h4>About me</h4>
                            <p class="text-black-70 measure-paragraph">Fueled by my passion for understanding the nuances of cross-cultural advertising, I consider myself a forever student, eager to both build on my academic foundations in psychology and sociology and stay in tune with the latest digital marketing strategies through continued coursework.</p>

                        </div>
                        <div class="col-sm">

                            <div class="card">
                                <div class="card-header d-flex align-items-center">
                                    <div class="h2 mb-0 mr-3 text-primary">116</div>
                                    <div class="flex">
                                        <h4 class="card-title">Courses</h4>
                                        <p class="card-subtitle">Best score</p>
                                    </div>
                                    <div class="dropdown">
                                        <a href="#" class="dropdown-toggle text-black-70" data-toggle="dropdown">Filter</a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item">Today</a>
                                            <a href="#" class="dropdown-item">Yesterday</a>
                                            <a href="#" class="dropdown-item">Week</a>
                                            <a href="#" class="dropdown-item">Month</a>
                                            <a href="#" class="dropdown-item">Year</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="chart" style="height: 319px;">
                                        <canvas id="topicIqChart" class="chart-canvas"></canvas>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <div class="media align-items-center">
                                        <div class="media-body">
                                            <h4 class="card-title">Courses Completion</h4>
                                            <p class="card-subtitle">Your recent courses</p>
                                        </div>
                                    </div>
                                </div>



                                <ul class="list-group list-group-fit mb-0" style="z-index: initial;">

                                    <li class="list-group-item" style="z-index: initial;">
                                        <div class="d-flex align-items-center">
                                            <a href="#" class="avatar avatar-4by3 avatar-sm mr-3">
                                                <img src="<?php echo base_url(); ?>admin-assets/images/gulp.png" alt="course" class="avatar-img rounded">
                                            </a>
                                            <div class="flex">
                                                <a href="#" class="text-body"><strong>Learn Vue.js Fundamentals</strong></a>
                                                <div class="d-flex align-items-center">
                                                    <div class="progress" style="width: 100px;">
                                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    <small class="text-muted ml-2">25%</small>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="list-group-item" style="z-index: initial;">
                                        <div class="d-flex align-items-center">
                                            <a href="#" class="avatar avatar-4by3 avatar-sm mr-3">
                                                <img src="<?php echo base_url(); ?>admin-assets/images/vuejs.png" alt="course" class="avatar-img rounded">
                                            </a>
                                            <div class="flex">
                                                <a href="#" class="text-body"><strong>Angular in Steps</strong></a>
                                                <div class="d-flex align-items-center">
                                                    <div class="progress" style="width: 100px;">
                                                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    <small class="text-muted ml-2">100%</small>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="list-group-item" style="z-index: initial;">
                                        <div class="d-flex align-items-center">
                                            <a href="#" class="avatar avatar-4by3 avatar-sm mr-3">
                                                <img src="<?php echo base_url(); ?>admin-assets/images/nodejs.png" alt="course" class="avatar-img rounded">
                                            </a>
                                            <div class="flex">
                                                <a href="#" class="text-body"><strong>Bootstrap Foundations</strong></a>
                                                <div class="d-flex align-items-center">
                                                    <div class="progress" style="width: 100px;">
                                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    <small class="text-muted ml-2">80%</small>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                </ul>
                            </div>

                            <div class="card">
                                <div class="card-header d-flex align-items-center">
                                    <div class="h2 mb-0 mr-3 text-primary">432</div>
                                    <div class="flex">
                                        <h4 class="card-title">Test</h4>
                                        <p class="card-subtitle">4 days streak this week</p>
                                    </div>
                                    <i class="material-icons text-muted ml-2">trending_up</i>
                                </div>
                                <div class="card-body">
                                    <div class="chart" style="height: 154px;">
                                        <canvas id="iqChart" class="chart-canvas"></canvas>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
<?php $this->load->view('inc/sidebar'); ?>
<?php $this->load->view('inc/footer',$this->data); ?>