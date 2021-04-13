<?php $this->load->view('inc/header'); ?>

    <!-- Header Layout Content -->
    <div class="mdk-header-layout__content">

        <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
            <div class="mdk-drawer-layout__content page ">

                <div class="container-fluid page__container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="student-dashboard.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Reports</a></li>
                        <li class="breadcrumb-item active">Questionnaire and Survey Statistics</li>
                    </ol>
                    <h1 class="h2">Questionnaire and Survey Statistics</h1>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header d-flex align-items-center">
                                    <div class="flex">
                                        <h4 class="card-title">Overview</h4>
                                        <p class="card-subtitle">Last 7 Days</p>
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
                                    <div class="chart" style="height: 200px;">
                                        <canvas id="earningsChart" class="chart-canvas"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header d-flex align-items-center">
                                    <div class="flex">
                                        <h4 class="card-title">Overview</h4>
                                        <p class="card-subtitle">Last 7 Days</p>
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
                                    <div class="chart" style="height: 154px;">
                                        <canvas id="iqChart" class="chart-canvas"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <a href="#" class="btn btn-primary btn-block flex-column">
                                        <i class="material-icons">get_app</i> Download Report
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

<?php $this->load->view('inc/sidebar'); ?>   

<?php $this->load->view('inc/footer'); ?>