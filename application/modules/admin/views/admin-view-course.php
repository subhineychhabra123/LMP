<?php $this->load->view('inc/header'); ?>

    <!-- Header Layout Content -->
    <div class="mdk-header-layout__content">

        <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
            <div class="mdk-drawer-layout__content page ">

                <div class="container-fluid page__container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php  echo site_url('admin');  ?>">Home</a></li>
                        <li class="breadcrumb-item active">View Modules</li>
                    </ol>
                    <h1 class="h2">Modules</h1>

                    <div class="row">
                        <?php foreach ($all_course_list as $value): ?>
 
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">

                                    <div class="d-flex flex-column flex-sm-row">
                                        <a href="<?php echo site_url('admin/admin_edit_course') ?>/<?php echo $value->id; ?>" class="avatar avatar-lg avatar-4by3 mb-3 w-xs-plus-down-100 mr-sm-3">
                                            <img src="<?php echo base_url(); ?>admin-assets/images/course/<?php echo $value->preview_img; ?>" alt="" class="avatar-img rounded">
                                        </a>
                                        <div class="flex" style="min-width: 200px;">
                                            
                                            <h4 class="card-title mb-1"><a href="<?php echo site_url('admin/admin_edit_course') ?>/<?php echo $value->id; ?>"><?php echo $value->title; ?></a></h4>
                                            <p class="text-black-70"><?php echo $value->descri; ?></p>
                                            
                                        </div>
                                    </div>

                                </div>
                                <div class="card__options dropdown right-0 pr-2">
                                    <a href="#" class="dropdown-toggle text-muted" data-caret="false" data-toggle="dropdown">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="<?php echo site_url('admin/admin_edit_course') ?>/<?php echo $value->id; ?>">Edit Modules</a>
                                        <a class="dropdown-item" href="#">Add Tags</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item text-danger" href="<?php echo site_url('admin/delete_course') ?>/<?php echo $value->id; ?>">Delete course</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                      <?php endforeach ?>
                         

                    </div>
                    <!-- Pagination -->
                    <ul class="pagination justify-content-center pagination-sm">
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
                    </ul>

                </div>

            </div>



<?php $this->load->view('inc/sidebar'); ?>   

<?php $this->load->view('inc/footer'); ?>