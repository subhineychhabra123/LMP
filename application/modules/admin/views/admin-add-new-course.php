<?php $this->load->view('inc/header'); ?>

    <!-- Header Layout Content -->
    <div class="mdk-header-layout__content">

        <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
            <div class="mdk-drawer-layout__content page ">

                <div class="container-fluid page__container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('admin/'); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Add Courses</li>
                    </ol>
                        <?php
                        
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
            <form action="<?php echo site_url('admin/add_new_course'); ?>" class="was-validated" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                    <div class="media align-items-center mb-headings">
                        <div class="media-body">
                            <h1 class="h2">Add Modules</h1>
                        </div>
                        <div class="media-right">
                            <input type="submit"  class="btn btn-danger" value="Submit">
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">

                                <div class="form-group row">
                                    <label for="preview" class="col-sm-3 col-form-label form-label">Preview</label>
                                    <div class="col-sm-9">
                                        <div class="media align-items-center">
                                            <div class="media-left">
                                                <img src="<?php echo base_url(); ?>admin-assets/images/vuejs.png" alt="" width="100" id="photo211" class="rounded">
                                            </div>
                                            <div class="media-body">
                                                <div class="custom-file" style="width: auto;">
                                                    <input type="file" id="preview" class="custom-file-input" name="images" required="">
                                                    <label for="preview" class="custom-file-label">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="title" class="col-md-3 col-form-label form-label">Title</label>
                                    <div class="col-md-6">
                                        <input id="title" type="text" class="form-control" name="title" placeholder="Write an awesome title" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="course" class="col-md-3 col-form-label form-label">Groups</label>
                                    <div class="col-md-6">
                                        <?php 
              $js = array('class'=>'form-control form-control-prepended' , 'id'=> 'select03','data-toggle'=>'select');

foreach ($groups as $data) {
    # code...
    $options[$data->id] = $data->group_name ;

}

echo form_multiselect('groups[]', $options,'' , $js); ?>
                                                                             
                                   
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="course" class="col-md-3 col-form-label form-label">Tags</label>
                                    <div class="col-md-6">
                                        <?php 
              $js = array('class'=>'form-control form-control-prepended' ,'data-toggle'=>'select');

foreach ($all_tags as $data) {
    # code...
    $options[$data->id] = $data->tags ;

}

echo form_multiselect('tags[]', $options,'' , $js); ?>
                                                                             
                                   
                                    </div>
                                </div>
                              
              <div class="form-group row">
                                    <label for="course" class="col-md-3 col-form-label form-label">Categories</label>
                                    <div class="col-md-6">
                                        <?php 
              $js = array('class'=>'form-control' );

foreach ($all_category as $data) {
    # code...
    $options[$data->id] = $data->category ;

}

echo form_dropdown('category', $options,'' , $js); ?>
                                                                             
                                   
                                    </div>
                                </div>                  
                                <div class="form-group row">
                                    <label for="duration" class="col-md-3 col-form-label form-label">Duration</label>
                                    <div class="col-md-6">
                                        <input id="duration" type="text" class="form-control" name="duration" placeholder="Enter total duration of the course" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="course" class="col-md-3 col-form-label form-label">Brief Description</label>
                                    <div class="col-md-6">
                                        <textarea type="text" class="form-control" rows="4" name="descri" placeholder="Enter content" required=""></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="course" class="col-md-3 col-form-label form-label">Module Sequence</label>
                                    <div class="col-md-6">
                                       <input type="number" id="course_seq_cats" class="form-control" name="course_seq_cats" placeholder="sequence" value="">
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

            </div>


         

                
 <?php $this->load->view('inc/sidebar'); ?>   

<?php $this->load->view('inc/footer'); ?>


