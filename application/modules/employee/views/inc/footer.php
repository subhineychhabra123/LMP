

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

    <!-- Nestable -->
<script src="<?php echo base_url(); ?>admin-assets/vendor/jquery.nestable.js"></script>
<script src="<?php echo base_url(); ?>admin-assets/js/nestable.js"></script>
<!-- Quill -->
<script src="<?php echo base_url(); ?>admin-assets/vendor/quill.min.js"></script>
<script src="<?php echo base_url(); ?>admin-assets/js/quill.js"></script>
<!-- Flatpickr -->
<script src="<?php echo base_url(); ?>admin-assets/vendor/flatpickr/flatpickr.min.js"></script>
<script src="<?php echo base_url(); ?>admin-assets/js/flatpickr.js"></script>
 <script>
    $( "#click_button" ).click(function(){
          var current_email = $('#searchSample02').val();
         
          $.ajax({
                type:'post',
                url: '<?php echo site_url('employee/get_user_result'); ?>',
                data: {  email: current_email }, 
                success: function(data) {
                    // alert(data.email);
                     $(".list-group-fit").html('<li class="list-group-item forum-thread" ><div class="media align-items-center"><div class="media-left"><div class="forum-icon-wrapper"><img src="<?php echo base_url(); ?>admin-assets/images/all-users/'+data.profile_image+'" alt="" width="40" class="rounded-circle"></div></div><div class="media-body"><div class="d-flex align-items-center"><a href="<?php echo site_url('employee/profile_view_course'); ?>" class="text-body"><strong>'+data.first_name+' '+data.last_name+'</strong></a><small class="ml-auto text-muted"style="margin-right: 20px;">'+data.created_at+'</small> <button class="btn-sm btn-success send_req"   data-by="'+<?php echo $this->session->userdata('id'); ?> +'" data-user= "'+data.id+'">Add Request</button></div></div></div></li>');

                         $(".send_req" ).click(function(){
                                      var req_by = $(this).data('by');
                                      var u_id = $(this).data('user');
                                       
                                $.ajax({
                                        type:'post',
                                        url: '<?php echo site_url('employee/send_request'); ?>',
                                        data: {  req_by: req_by, u_id: u_id }, 
                                        success: function(data) {
                                           $('.send_req').text(data);
                                          }
                                       });
                             });
                  }
               });
           
    });
   
  </script>
  <script>
       $(".remainder0" ).click(function(){
                                      var req_by = $(this).data('by');
                                      var u_id = $(this).data('user');
                                       
                                $.ajax({
                                        type:'post',
                                        url: '<?php echo site_url('employee/send_request'); ?>',
                                        data: {  req_by: req_by, u_id: u_id }, 
                                        success: function(data) {
                                           $('.remainder0').text(data);
                                          }
                                       });
                             });
  </script>
 <script>
      $(".remove_data").click(function(){
          var rem_req = $(this).data('id');
           $.ajax({
                type:'post',
                url: '<?php echo site_url('employee/delete_request'); ?>',
                data: { req_id: rem_req }, 
                success: function(data) {
                     location.reload();                    
                  }
               });
           
    });

 </script>  
</body>

</html>
