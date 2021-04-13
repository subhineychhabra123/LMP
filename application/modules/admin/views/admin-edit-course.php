<?php $this->load->view('inc/header'); ?>
    <!-- Header Layout Content -->
    <div class="mdk-header-layout__content">
         <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
            <div class="mdk-drawer-layout__content page ">
                <div class="container-fluid page__container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('admin'); ?>">Home</a></li>
                      
                        <li class="breadcrumb-item active">Edit Modules</li>
                    </ol>
                    <?php if($this->session->flashdata('error') ||  validation_errors()){ ?>
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
                    <div class="media align-items-center mb-headings">
                        <div class="media-body">
                            <h1 class="h2">Edit Modules</h1>
                        </div>
                         
                          <form action="<?php echo site_url('admin/update_course_simple_info'); ?>" method="post">
                            <input type="hidden" name="ids" value="<?php echo $this->uri->segment(3); ?>">
                        <div class="media-right">
                            <input type="submit"  class="btn btn-danger" name="Update" value="Update"></a>
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
                                        <label class="form-label" for="title">Title</label>
                                        <input type="text" id="title" class="form-control" name="title09" placeholder="Write a title" value="<?php echo $single_course->title; ?>">
                                    </div>

                                    <div class="form-group mb-0">
                                        <label class="form-label">Description</label>
                                        <input type="hidden" name="descri" id="current_text">

                                        <div style="height: 150px;" data-toggle="quill" id="text_editor"  data-quill-placeholder="Quill WYSIWYG editor" data-quill-modules-toolbar='[["bold", "italic"], ["link", "blockquote", "code", "image"], [{"list": "ordered"}, {"list": "bullet"}]]'>
                                            <?php echo $single_course->descri; ?>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Courses</h4>
                                </div>
                                <div class="card-body">
                                     
                                    <p><a href="!#" class="btn btn-primary" data-toggle="modal" data-target="#modal-center">Add Course<i class="material-icons">add</i></a></p>
                                    <div class="nestable" id="nestable-handles-primary">
                                        
                                        <ul class="nestable-list">

                                            <?php 
                                            // var_dump($list_lesson);
                                            foreach ($list_lesson as $data) {  ?>
                                               
                                           
                                            <li class="nestable-item nestable-item-handle" data-id="">
                                                <div class="nestable-handle"><i class="material-icons">menu</i></div>
                                                <div class="nestable-content">
                                                    <div class="media align-items-center">
                                                        <div class="media-left">
                                                            <img src="assets/images/vuejs.png" alt="" width="100" class="rounded">
                                                        </div>
                                                        <div class="media-body">
                                                            <h5 class="card-title h6 mb-0">
                                                                <a href="#"><?php echo $data->title; ?></a>
                                                            </h5>
                                                            <small class="text-muted"><?php echo $data->created_at; ?></small>
                                                        </div>
                                                        <div class="media-right">
                                                            <a href="<?php echo base_url(); ?>admin/admin_view_lesson/<?php echo $data->id; ?>" class="btn btn-white btn-sm"><i class="material-icons">edit</i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <?php } ?>
                                        </ul>


                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card  card-body">
                                <div class="card-header">
                                    <h4 class="card-title">Meta</h4>
                                    <p class="card-subtitle">Extra Options </p>
                                </div>

                                
                                    <div class="form-group">
                                        <label class="form-label" for="category">Category</label>
                                        <select id="category" class="custom-select form-control" name="course">
                                             <?php foreach ($all_category as  $cate): ?>
                                             <option value="<?php echo $cate->id; ?>" <?php if($cate->id == $single_course->category){ echo 'selected'; } ?> ><?php echo $cate->category; ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group ">
                                    <label for="course" class=" form-label">Groups</label>
                                  
                                        <?php 

                $group = explode(',', $single_course->groups);
              $js = array('class'=>'form-control form-control-prepended' , 'id'=> 'select03','data-toggle'=>'select');

foreach ($groups as $data) {
    # code...
    $options[$data->id] = $data->group_name ;

}

echo form_multiselect('groups[]', $options,$group , $js); ?>
                                                                             
                                   
                                    
                                </div>
                                    <div class="form-group ">
                                    <label for="course" class=" form-label">Tags</label>
                                  
                                        <?php 
        $tags = explode(',', $single_course->tags);
              $js = array('class'=>'form-control form-control-prepended' ,'data-toggle'=>'select');

foreach ($all_tags as $data) {
    # code...
    $options[$data->id] = $data->tags ;

}

echo form_multiselect('tags[]', $options,$tags, $js); ?>
                                                                             
                                   
                                    
                                </div>
                                    <div class="form-group">
                                        <label class="form-label" for="duration">Duration</label>
                                        <input type="text" id="duration" class="form-control" name="duration" placeholder="No. of Days" value="<?php echo $single_course->duration; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="start">Start Date</label>
                                        <input id="start" type="text" class="form-control" name="start_time" placeholder="Start Date" data-toggle="flatpickr" value="<?php echo $single_course->start_date; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="end">End Date</label>
                                        <input id="end" type="text" class="form-control" name="end_time" placeholder="Start Date" data-toggle="flatpickr" value="<?php echo $single_course->end_date; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="duration">Module Sequence</label>
                                        <input type="number" id="course_seq_cats" class="form-control" name="course_seq_cats" placeholder="sequence" value="<?php echo $single_course->course_seq_cats; ?>">
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

<?php $this->load->view('inc/sidebar'); ?>   

<?php $this->load->view('inc/footer'); ?>
<script type="text/javascript">
 
$( "#text_editor" ).mouseout(function() {
   var text_area = $(this).text();
    
   $('#current_text').val(text_area);
});
</script>