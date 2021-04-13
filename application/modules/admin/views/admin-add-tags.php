<?php $this->load->view('inc/header'); ?>

    <!-- Header Layout Content -->
    <div class="mdk-header-layout__content">

        <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
            <div class="mdk-drawer-layout__content page ">

                <div class="container-fluid page__container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="student-dashboard.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="admin-user-list.html">Tags</a></li>
                        <li class="breadcrumb-item active">New Tags</li>
                    </ol>
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

                    <form action="<?php echo site_url('admin/add_new_Tags'); ?>" method="post" class="was-validated" enctype="multipart/form-data">
                        <input type="hidden" name="ids" value="<?php echo $this->uri->segment(3); ?>">
                        <div class="media align-items-center mb-headings">
                            <div class="media-body">
                                <h1 class="h2">New Tags</h1>
                            </div>
                            <div class="media-right">
                                <input type="submit" name="submit" class="btn btn-danger"> 
                            </div>
                        </div>
                        <div class="card">
                            <div class="list-group list-group-fit">
                                 
                                <div class="list-group-item">
                                    <div class="form-group m-0" role="group" aria-labelledby="label-firstname">
                                        <div class="form-row">
                                            <label id="label-firstname" for="group" class="col-md-3 col-form-label form-label">Tags name</label>
                                            <div class="col-md-9">
                                                <input id="group" type="text" placeholder="Tags name" name="tags" value="<?php if($single_tag){ echo $single_tag->tags; } ?>" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 
                            </div>
                        </div>
                    </form>
                </div>

            </div>

<?php $this->load->view('inc/sidebar'); ?>   

<?php $this->load->view('inc/footer'); ?>