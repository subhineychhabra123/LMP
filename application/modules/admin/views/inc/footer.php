

<div id="modal-center" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-center-title" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-center-title">Lessons</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div> <!-- // END .modal-header -->
                <div class="modal-body">
                    <form action="<?php echo site_url('admin/submit_lesson'); ?>" method="post" class="was-validated" enctype="multipart/form-data" >
                        <div class="card">
                            <div class="list-group list-group-fit">
                                <div class="list-group-item">
                                    <div role="group" aria-labelledby="label-avatar" class="m-0 form-group">
                                        <div class="form-row">
                                         <label id="label-avatar" for="avatar" class="col-md-3 col-form-label form-label">Preview Image</label>
                                            <div class="col-md-9">
                                                <div class="media align-items-center">
                                                    <div class="d-flex mr-3 align-self-center">
                                                        <span class="avatar avatar-lg">
                                                             <span class="avatar-title rounded">
                                                                <i class="material-icons" id="photo21">photo</i>
                                                             </span>
                                                        </span>
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="custom-file b-form-file">
                                                            <input type="file" id="avatar" aria-describedby="label-avatar-control" class="custom-file-input" name="photo" required>
                                                            <label id="label-avatar-control" class="custom-file-label">Preview Image</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item">
                                    <div class="form-group m-0" role="group" aria-labelledby="label-firstname">
                                        <div class="form-row">
                                            <label id="label-firstname" for="title" class="col-md-3 col-form-label form-label">Title</label>
                                            <div class="col-md-9">
                                                <input id="title" type="text" placeholder="Enter Title" name="title" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
<div class="list-group-item">
                                    <div class="form-group m-0" role="group" aria-labelledby="label-firstname">
                                        <div class="form-row">
                                            <label id="label-firstname" for="title" class="col-md-3 col-form-label form-label">Course Duration</label>
                                            <div class="col-md-9">
                                                <input id="title" type="text" placeholder="Course  Duration" name="course_duration" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
</div>
                                <div class="list-group-item">
                                    <div class="form-group m-0" role="group" aria-labelledby="label-firstname">
                                        <div class="form-row">
                                            <label id="label-firstname" for="title" class="col-md-3 col-form-label form-label">Subscript</label>
                                            <div class="col-md-9">
                                                <textarea name="subscript" class="form-control" required="">
                                                    

                                                </textarea>
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                
                                <div class="list-group-item">
                                    <div role="group" aria-labelledby="label-avatar" class="m-0 form-group">
                                        <input type="hidden" name="id" value="<?php   echo $this->uri->segment(3); ?>">
                                        <div class="form-row">
                                         <label id="label-avatar" for="avatar" class="col-md-3 col-form-label form-label">Course video</label>
                                            <div class="col-md-9">
                                                <div class="media align-items-center">
                                                    
                                                    <div class="media-body">
                                                        <div class="custom-file b-form-file">
                                                            <input type="file" id="avatar" aria-describedby="label-avatar-control" class="custom-file-input" name="course_video" required>
                                                            <label id="label-avatar-control" class="custom-file-label">Course video</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item  text-right">
                                    <button type="submit" class="btn btn-success btn-sm ">Submit Lesson</button>
                                </div>
                            </div>
                        </div>

                    </form>
            </div> <!-- // END .modal-content -->
        </div> <!-- // END .modal-dialog -->
</div> <!-- // END .modal -->
<!-- jQuery -->
<script src="<?php echo base_url(); ?>admin-assets/vendor/jquery.min.js"></script>

<!-- Bootstrap -->
<script src="<?php echo base_url(); ?>admin-assets/vendor/popper.min.js"></script>
<script src="<?php echo base_url(); ?>admin-assets/vendor/bootstrap.min.js"></script>

<!-- Perfect Scrollbar -->
<script src="<?php echo base_url(); ?>admin-assets/vendor/perfect-scrollbar.min.js"></script>

<!-- MDK -->
<script src="<?php echo base_url(); ?>admin-assets/vendor/dom-factory.js"></script>
<script src="<?php echo base_url(); ?>admin-assets/vendor/material-design-kit.js"></script>

<!-- App JS -->
<script src="<?php echo base_url(); ?>admin-assets/js/app.js"></script>

<!-- Highlight.js -->
<script src="<?php echo base_url(); ?>admin-assets/js/hljs.js"></script>

<!-- Moment.js -->
<script src="<?php echo base_url(); ?>admin-assets/vendor/moment.min.js"></script>
<script src="<?php echo base_url(); ?>admin-assets/vendor/moment-range.min.js"></script>

<!-- Global Settings -->
<script src="<?php echo base_url(); ?>admin-assets/js/settings.js"></script>

<!-- Sweet Alert -->
<script src="<?php echo base_url(); ?>admin-assets/vendor/sweetalert.min.js"></script>
<script src="<?php echo base_url(); ?>admin-assets/js/sweetalert.js"></script>

<!-- Chart.js -->
<script src="<?php echo base_url(); ?>admin-assets/vendor/Chart.min.js"></script>

<!-- UI Charts Page JS -->
 <script src="<?php echo base_url(); ?>admin-assets/js/chartjs-rounded-bar.js"></script>
 <script src="<?php echo base_url(); ?>admin-assets/js/chartjs.js"></script>
 <script src="<?php echo base_url(); ?>admin-assets/vendor/flatpickr/flatpickr.min.js"></script>
 <script src="<?php echo base_url(); ?>admin-assets/js/flatpickr.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 <!-- Nestable -->
<script src="<?php echo base_url(); ?>admin-assets/vendor/jquery.nestable.js"></script>
<script src="<?php echo base_url(); ?>admin-assets/js/nestable.js"></script>
<!-- Quill -->
<script src="<?php echo base_url(); ?>admin-assets/vendor/quill.min.js"></script>
<script src="<?php echo base_url(); ?>admin-assets/js/quill.js"></script>
 <!-- Select2 -->
    <script src="<?php echo base_url(); ?>admin-assets/vendor/select2.min.js"></script>
    <script src="<?php echo base_url(); ?>admin-assets/vendor/select2.js"></script>
<!-- Chart.js Samples -->
<script src="<?php echo base_url(); ?>admin-assets/js/page.instructor-dashboard.js"></script>
<script src="http://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<!-- UI Charts Page JS -->
<!-- Chart.js Samples -->
 
<script src="<?php echo base_url(); ?>admin-assets/js/page.student-dashboard.js"></script>
<script type="text/javascript">
 function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#photo21').html('<img src="'+e.target.result+'" style="width: 60px;height: 60px;">');
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#avatar").change(function(){
    readURL(this);
});
</script>
<script type="text/javascript">
 function readURL1(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#photo211').attr('src',e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#preview").change(function(){
    readURL1(this);
});
</script>
 <script type="text/javascript">


 $("#onclickck").on('click', function() {
 	  var current_val = $('#checkbox99').val();
	  if (current_val == "active") {
	     $('#checkbox99').attr('value', 'inactive');
	  }else{
 	     $('#checkbox99').attr('value', 'active');
	  }
   });
 </script>
 <script type="text/javascript">
  	$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
 </script>
 <script>
 	$( "#users" ).click(function(){
          $.ajax({
                type:'post',
                url: '<?php echo site_url('admin/get_all_users_list'); ?>',
                data: { },
                //data: {email: username, password: pass},
                success: function(data) {
                    complete_val(data);
                  }
               });
    });
    function complete_val(data) {
				    var availableTags = data;
				      alert(data);
				      $("#users").autocomplete({
				      source: availableTags
				    });
			  }
  </script>
  <script type="text/javascript">
      $(document).ready( function () {
    $('.mydataTable').DataTable();
} );
  </script>
</body>

</html>