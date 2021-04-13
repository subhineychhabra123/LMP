<?php $this->load->view('inc/header'); ?>
     <!-- Header Layout Content -->
    <div class="mdk-header-layout__content">

        <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
            <div class="mdk-drawer-layout__content page ">

                <div class="container-fluid page__container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="student-dashboard.html">Home</a></li>
                        <li class="breadcrumb-item active">Tags Management</li>
                    </ol>
                    <div class="media align-items-center mb-headings">
                        <div class="media-body">
                            <h1 class="h2">Tags Management</h1>
                        </div>
                        <div class="media-right">
                            <a href="<?php echo site_url('admin/admin_tag_form'); ?>" class="btn btn-danger">Add Tags</a>
                        </div>
                    </div>
 
                    <!-- Search -->
                    <div class="flex search-form form-control-rounded search-form--light mb-2" style="min-width: 200px;">
                        <input type="text" class="form-control" placeholder="Search Tags" id="searchSample02">
                        <button class="btn pr-3" type="button" role="button"><i class="material-icons">search</i></button>
                    </div>
                    <br>
                       <?php  if($this->session->flashdata('error') ||  validation_errors()){ ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                           <span aria-hidden="true">×</span>
                                       </button>
                                       <?php echo $this->session->flashdata('error'); ?>
                                       <?php echo validation_errors(); ?> 
                                   </div>
                                <?php } ?>
                                <?php if($this->session->flashdata('success')){ ?>  
                                   <div class="alert alert-success alert-dismissible fade show" role="alert">
                                       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                           <span aria-hidden="true">×</span>
                                       </button>
                                      <?php echo $this->session->flashdata('success'); ?>
                                   </div>
                                <?php } ?>    
                    <div class="card">
                        <ul class="list-group list-group-fit">
                            <?php foreach ($all_tags as  $Tags): ?>
                                <li class="list-group-item forum-thread">
                                <div class="media align-items-center">
                                    <div class="media-left">
                                        <div class="forum-icon-wrapper muted">
                                            <i class="material-icons tag-icon">featured_play_list</i>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <div class="d-flex align-items-center">
                                            <p class="text-body mb-0"><strong><?php echo $Tags->tags; ?></strong></p>
                                                <small class="ml-auto text-muted">2</small>
                                            <div class="dropdown left-0 pl-2">
                                                <a href="#" class="dropdown-toggle text-muted" data-caret="false" data-toggle="dropdown">
                                                    <i class="material-icons">more_vert</i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="<?php echo site_url('admin/admin_tag_form'); ?>/<?php echo $Tags->id; ?>">Edit</a>
                                                    <a class="dropdown-item" href="<?php echo site_url('admin/delete_tag'); ?>/<?php echo $Tags->id; ?>">Delete</a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </li>
                            <?php endforeach ?>
                            
                           
                        </ul>
                    </div>

                </div>

            </div>
            
     <?php $this->load->view('inc/sidebar'); ?>   

<?php $this->load->view('inc/footer'); ?>