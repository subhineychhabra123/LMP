<?php $this->load->view('inc/header'); ?>
    <!-- Header Layout Content -->
    <div class="mdk-header-layout__content">

        <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
            <div class="mdk-drawer-layout__content page ">

                <div class="container-fluid page__container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('employee'); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Align Survey</li>
                    </ol>
                    <div class="media align-items-center mb-headings">
                        <div class="media-body">
                            <h1 class="h2">Assign a survey</h1>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <br>

<h6>SELECT SURVEY</h6>
                    <div class="search-form search-form--light mb-3">

                    <select class="form-control">
                        <option>Select survey</option>
                        <option>Survey One</option>
                        <option>Survey Two</option>
                    </select>
                     
                    </div>

                    <div class="table-responsive border-bottom" data-toggle="lists" data-lists-values='["js-lists-values-employee-name"]'>

                        <table class="table mb-0">
                            <thead>
                            <tr>

                                <th style="width: 18px;">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input js-toggle-check-all" data-target="#staff" id="customCheckAll">
                                        <label class="custom-control-label" for="customCheckAll"><span class="text-hide">Toggle all</span></label>
                                    </div>
                                </th>

                                <th> Select Employee</th>


                               
                            </tr>
                            </thead>
                            <tbody class="list" id="staff">

                            <tr class="selected">

                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input js-check-selected-row" checked="" id="customCheck1_1">
                                        <label class="custom-control-label" for="customCheck1_1"><span class="text-hide">Check</span></label>
                                    </div>
                                </td>

                                <td>

                                    <div class="media align-items-center">
                                        <div class="avatar avatar-sm mr-3">
                                            <img src="<?php echo base_url(); ?>admin-assets/images/256_rsz_nicolas-horn-689011-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                        </div>
                                        <div class="media-body">

                                            <span class="js-lists-values-employee-name">Kalum Atherton</span>

                                        </div>
                                    </div>

                                </td>
                            </tr>

                            <tr>

                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input js-check-selected-row" id="customCheck1_2">
                                        <label class="custom-control-label" for="customCheck1_2"><span class="text-hide">Check</span></label>
                                    </div>
                                </td>

                                <td>

                                    <div class="media align-items-center">
                                        <div class="avatar avatar-sm mr-3">
                                            <img src="<?php echo base_url(); ?>admin-assets/images/256_rsz_sharina-mae-agellon-377466-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                        </div>
                                        <div class="media-body">

                                            <span class="js-lists-values-employee-name failed-employee">Helen Mcdaniel</span>

                                        </div>
                                    </div>

                                </td>


                              
                            </tr>

                            <tr>

                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input js-check-selected-row" id="customCheck1_3">
                                        <label class="custom-control-label" for="customCheck1_3"><span class="text-hide">Check</span></label>
                                    </div>
                                </td>

                                <td>

                                    <div class="media align-items-center">
                                        <div class="avatar avatar-sm mr-3">
                                            <img src="<?php echo base_url(); ?>admin-assets/images/256_rsz_karl-s-973833-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                        </div>
                                        <div class="media-body">

                                            <span class="js-lists-values-employee-name">Karim Hicks</span>

                                        </div>
                                    </div>

                                </td>


                                
                            </tr>

                            <tr>

                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input js-check-selected-row" id="customCheck1_4">
                                        <label class="custom-control-label" for="customCheck1_4"><span class="text-hide">Check</span></label>
                                    </div>
                                </td>

                                <td>

                                    <div class="media align-items-center">
                                        <div class="avatar avatar-sm mr-3">
                                            <img src="<?php echo base_url(); ?>admin-assets/images/256_rsz_90-jiang-640827-unsplash.jpg" alt="Avatar" class="avatar-img rounded-circle">
                                        </div>
                                        <div class="media-body">

                                            <span class="js-lists-values-employee-name">Clifford Burgess</span>

                                        </div>
                                    </div>

                                </td>


                               
                            </tr>

                            </tbody>
                        </table>
                    </div>
                    <br>
                    <div class="card">
                        <div class="card-body">
                            <form>
                                <button class="btn btn-danger">Assign</button>
                            </form>
                        </div>
                    </div>

                </div>

            </div>
<?php $this->load->view('inc/sidebar'); ?>

<?php $this->load->view('inc/footer',$this->data); ?>