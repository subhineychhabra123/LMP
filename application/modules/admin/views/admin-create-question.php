<?php $this->load->view('inc/header'); ?>
    <!-- Header Layout Content -->
    <div class="mdk-header-layout__content">

        <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
            <div class="mdk-drawer-layout__content page ">

                <div class="container-fluid page__container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('admin'); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Create Questionnaire</li>
                    </ol>
                    <h1 class="h2">Create Questionnaire</h1>

                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Basic</h4>
                        </div>
                        <div class="card-body">
                            <?php 

                             ?>
                            <form action="<?php  echo site_url('admin/add_questionnaire'); ?>" method="post">
                                <div class="form-group row">
                                    <label for="quiz_title" class="col-sm-3 col-form-label form-label">Questionnaire Title:</label>
                                    <div class="col-sm-9">
                                        <input id="quiz_title" name="title"  type="text" class="form-control" placeholder="Title" value="<?php echo $questionnaire->title ; ?>">
                                    </div>
                                </div>
<input type="hidden" name="id" value="<?php echo $this->uri->segment(3); ?>">
                                <div class="form-group row">
                                    <label for="quiz_title" class="col-sm-3 col-form-label form-label">Questionnaire Description:</label>
                                    <div class="col-sm-9">

                                        <textarea name="description" class="form-control"><?php echo $questionnaire->description ; ?></textarea>
                                      
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="course_title" class="col-sm-3 col-form-label form-label">Modules:</label>
                                    <div class="col-sm-9 col-md-4">

                   <?php 
                   $module = $questionnaire->module ;
                   $options = array();
foreach ($all_course_list as $data) {
    # code...
$options[$data->id] = $data->title ;
}

$options[''] = 'select module';


$js = array('id'=> 'course_title' , 'class' => 'custom-select form-control', 'required') ; 

echo form_dropdown('module', $options, $module,$js);
                    ?>                     
                                 
                                    </div>
                                </div>

                   <div class="form-group row">
                                    <label for="course_title" class="col-sm-3 col-form-label form-label">Show Questionnaire after:</label>
                                    <div class="col-sm-9 col-md-4">
                    
                                        <select id="selected_module" class="custom-select form-control" name="selected_lesson">
                                            <option selected value="after_end">Completing selected module</option>
                                            
                                        </select>
                                    </div>
                                </div>         
                                <div class="form-group row mb-0">
                                    <div class="col-sm-9 offset-sm-3">
                                        <button type="submit" class="btn btn-danger">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
         <?php  $id = $this->uri->segment(3);
         
if($id && $id !=''){


          ?>           
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Questions</h4>
                        </div>
                        <div class="card-header">
                            <a href="#" data-toggle="modal" data-target="#modal-center" class="btn btn-outline-secondary">Add Question <i class="material-icons">add</i></a>
                        </div>
                        <div class="nestable" id="nestable">
                            <ul class="list-group list-group-fit nestable-list-plain mb-0">
<?php foreach ($questions as $data) {

// var_dump($all_course_list);
  ?>
  


                                <li class="list-group-item nestable-item">
                                    <div class="media align-items-center">
                                        <div class="media-left">
                                            <a href="#" class="btn btn-default nestable-handle"><i class="material-icons">menu</i></a>
                                        </div>
                                        <div class="media-body">
                                            <?php echo $data->questions; ?>
                                        </div>
                                        <div class="media-right text-right">
                                            <div style="width:100px">
                                                <a href="#" data-toggle="modal" data-target="#editQuiz" class="btn btn-primary btn-sm"><i class="material-icons">edit</i></a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                
                              <?php } ?>  
                                
                                
                                
                            </ul>
                        </div>
                    </div>
<?php  } ?>
                </div>

            </div>


<?php $this->load->view('inc/sidebar'); ?>   
<div id="modal-center" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-center-title" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-center-title">Add Questions</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div> <!-- // END .modal-header -->
                <div class="modal-body">
                    <form action="<?php  echo site_url('admin/add_questions'); ?>" method="post" class="was-validated" enctype="multipart/form-data" >
                        <div class="card">
                            <div class="list-group list-group-fit">
                                
                                <div class="list-group-item">
                                    <div class="form-group m-0" role="group" aria-labelledby="label-firstname">
                                        <div class="form-row">
                                            <label id="label-firstname" for="title" class="col-md-3 col-form-label form-label">Questions</label>
                                            <div class="col-md-9">
                                                <input id="title" type="text" placeholder="Enter Questions" name="questions" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item">
                                    <div class="form-group m-0" role="group" aria-labelledby="label-firstname">
                                        <div class="form-row">
                                            <label id="label-firstname" for="title" class="col-md-3 col-form-label form-label">Option One</label>
                                            <div class="col-md-9">
                                                <input  type="text" placeholder="Option One" name="option_one" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="list-group-item">
                                    <div class="form-group m-0" role="group" aria-labelledby="label-firstname">
                                        <div class="form-row">
                                            <label id="label-firstname" for="title" class="col-md-3 col-form-label form-label">Option Two</label>
                                            <div class="col-md-9">
                                                <input  type="text" placeholder="Option Two" name="option_two" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item">
                                    <div class="form-group m-0" role="group" aria-labelledby="label-firstname">
                                        <div class="form-row">
                                            <label id="label-firstname" for="title" class="col-md-3 col-form-label form-label">Option Three</label>
                                            <div class="col-md-9">
                                                <input  type="text" placeholder="Option Three" name="option_three" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item">
                                    <div class="form-group m-0" role="group" aria-labelledby="label-firstname">
                                        <div class="form-row">
                                            <label id="label-firstname" for="title" class="col-md-3 col-form-label form-label">Option Four</label>
                                            <div class="col-md-9">
                                                <input  type="text" placeholder="Option Four" name="option_four" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
<div class="list-group-item">
                                    <div class="form-group m-0" role="group" aria-labelledby="label-firstname">
                                        <div class="form-row">
                                            <label id="label-firstname" for="title" class="col-md-3 col-form-label form-label">Answer</label>
                                            <div class="col-md-9">
                                                <select name="answer" class="form-control" required="">
                                                    <option value="1">Option One</option>
                                                    <option value="2">Option two</option>
                                                    <option value="3">Option three </option>
                                                    <option value="4">Option four</option>
                                                </select>
                                             
                                            </div>
                                        </div>
                                    </div>
</div>
                                
<input type="hidden" name="questionnaire" value="<?php echo $this->uri->segment(3); ?>">
                                
                                
                                <div class="list-group-item  text-right">
                                    <button type="submit" class="btn btn-success btn-sm ">Submit Questions</button>
                                </div>
                            </div>
                        </div>

                    </form>
            </div> <!-- // END .modal-content -->
        </div> <!-- // END .modal-dialog -->
</div> <!-- // END .modal -->
<?php $this->load->view('inc/footer'); ?>
<script type="text/javascript">
$('#course_title').change(function() {
    var course_id = $(this).val();

      $.ajax({
                type:'post',
                url: '<?php  echo site_url('admin/get_course'); ?>',
                data: { course_id },
                //data: {email: username, password: pass},
                success: function(data) {
                    console.log(data);

                    $('#selected_module').html(data);
                  }
               });
});
</script>

