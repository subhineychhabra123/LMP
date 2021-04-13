<?php $this->load->view('inc/header'); ?>

    <!-- Header Layout Content -->
    <div class="mdk-header-layout__content">

        <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
            <div class="mdk-drawer-layout__content page ">

                <div class="container-fluid page__container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('admin/'); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Edit  Lesson</li>
                    </ol>
                        <?php
                          // var_dump($view_lesson);
                        if($this->session->flashdata('error') ||  validation_errors()){ ?>
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
            <form action="<?php echo site_url('admin/edit_lesson'); ?>" method="post" class="was-validated" enctype="multipart/form-data" >
                <input type="hidden" name="id" value="<?php   echo $this->uri->segment(3); ?>">
                    <div class="media align-items-center mb-headings">
                        <div class="media-body">
                            <h1 class="h2">Edit lesson</h1>
                        </div>
                        <div class="media-right">
                            <input type="submit"  class="btn btn-danger" value="Submit">
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">

                                <div class="form-group row">
                                    <label for="preview" class="col-sm-3 col-form-label form-label">PREVIEW IMAGE</label>
                                    <div class="col-sm-9">
                                        <div class="media align-items-center">
                                            <div class="media-left">
                                                <img src="<?php echo base_url(); ?>admin-assets/images/course/<?php echo $view_lesson->img; ?>" alt="" width="100" id="photo211" class="rounded">
                                            </div>
                                            <div class="media-body">
                                                <div class="custom-file" style="width: auto;">
                                                    <input type="file" id="preview" class="custom-file-input" name="photo" >
                                                    <label for="preview" class="custom-file-label">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="title" class="col-md-3 col-form-label form-label">Title</label>
                                    <div class="col-md-6">
                                        <input id="title" type="text" class="form-control" name="title" placeholder="Write an awesome title" required="" value="<?php echo $view_lesson->title; ?>">
                                    </div>
                                </div>
                                                   
                                <div class="form-group row">
                                    <label for="duration" class="col-md-3 col-form-label form-label">Duration</label>
                                    <div class="col-md-6">
                                        <input id="duration" type="text" class="form-control" name="duration" placeholder="Enter total duration of the course" required="" value="<?php echo $view_lesson->course_duration; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="course" class="col-md-3 col-form-label form-label">Brief Description</label>
                                    <div class="col-md-6">
                                        <textarea type="text" class="form-control" rows="4" name="descri" placeholder="Enter content" required=""><?php echo $view_lesson->subscript; ?></textarea>
                                    </div>
                                </div>
                                 <div class="form-group row">
                                        <input type="hidden" name="id" value="<?php   echo $this->uri->segment(3); ?>">
                                        
                                         <label id="label-avatar" for="avatar" class="col-md-3 col-form-label form-label">Course video</label>
                                            <div class="col-md-5">
                                                <div class="media align-items-center">
                                                    
                                                    <div class="media-body">
                                                        <div class="custom-file b-form-file">
                                                            <input type="file" id="avatar" aria-describedby="label-avatar-control" class="custom-file-input" name="course_video" >
                                                            <label id="label-avatar-control" class="custom-file-label">Course video</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <video width="100%" height="" controls>
                                                  <source src="<?php echo base_url(); ?>admin-assets/images/course/<?php echo $view_lesson->video; ?>" type="video/mp4">
                                                 
                                                </video>
                                            </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>


         

                
 <?php $this->load->view('inc/sidebar'); ?>   

<?php $this->load->view('inc/footer'); ?>


