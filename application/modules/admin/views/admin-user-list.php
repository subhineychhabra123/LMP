<?php $this->load->view('inc/header'); ?>

    <!-- Header Layout Content -->
    <div class="mdk-header-layout__content">
        <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
            <div class="mdk-drawer-layout__content page ">

                <div class="container-fluid page__container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php  echo site_url('admin'); ?>">Home</a></li>
                        <li class="breadcrumb-item active">User</li>
                    </ol>
                    <!--<h1 class="h2">User</h1>-->
                    <div class="media align-items-center mb-headings">
                        <div class="media-body">
                            
                        </div>
                        <!-- <div class="media-right">
                            <a href="<?php echo site_url('admin/admin_user_form'); ?>" class="btn btn-danger">Add New User</a>
                        </div> -->
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="media align-items-center">
                                        <div class="media-body">

                                            <h4 class="card-title"><?php echo $user_type ; ?></h4>
                                            <p class="card-subtitle">List of all <?php echo $user_type ; ?>2</p>
                                        </div>
                                        <div class="media-right">
                                            <a href="<?php echo site_url('admin/admin_user_form/emp'); ?>" class="btn btn-primary btn-sm"><i class="material-icons">add</i> Add</a>
                                        </div>
                                    </div>
                                </div>
                                
                                 <table class="table   thead-border-top-0 mydataTable text-center">
<thead class="bg-white">
<tr>
    <th>Emp Id</th>
    <th>Picture</th>
    <th>Name & Email</th>
     
    <th>designation</th>
    <th>Status</th>
    <th>Action</th>
</tr>
</thead>
<tbody class="list">
 <?php  foreach ($users as  $employess): ?>
<tr>
    <td class="text-right"><?php  echo $employess->id;  ?></td>
    <td>
         
            <div class="avatar avatar-sm mr-3">
                
                <img src="<?php echo base_url(); ?>admin-assets/images/all-users/<?php echo $employess->profile_image; ?>" alt="" width="40" class="avatar-img rounded-circle">
            </div>
           
         
    </td>
    <td>
         <div class="media-body">
                <a href="<?php echo site_url(); ?>admin/view_user/<?php echo $employess->id; ?>" class="text-body"><strong><?php echo $employess->first_name.' '.$employess->last_name; ?></strong></a><br>
                <span class="text-muted js-lists-values-employee-title"><?php echo $employess->email; ?></span>
            </div>
    </td>
    <td class="text-right">designation</td>
    <td>
        <div class="form-group">
          <select class="form-control sell" data-id="<?php echo $employess->id ; ?>">
            <option value="inactive" class="badge badge-soft-danger" <?php if($employess->user_status == ''){ echo 'selected'; } ?>>Inactive</option>
            <option value="active" class="badge badge-soft-success" <?php if($employess->user_status == 'active'){ echo 'selected'; } ?> >Active</option>
          </select>
        </div>
    </td>
    
    <td>
        <a href="<?php echo site_url(); ?>admin/view_user/<?php echo $employess->id; ?>" class="btn btn-warning btn-sm text-white">Edit</a>
        <a href="<?php  echo site_url('admin/send_user_message/'.$employess->id.''); ?>" class="btn btn-success btn-sm text-white">Message</a>
<?php if($employess->user_type =="manager") { ?>
        <a href="<?php  echo site_url('admin/mapping_employee/'.$employess->id.'') ?>" type="button" class="btn btn-info btn-sm text-white">employee mapping</a>
<?php  } ?>
    </td>
</tr>
<?php endforeach; ?>
 
</tbody>
</table>
                                 
                            </div>
                        </div>
                    </div>

                </div>

            </div>
<?php $this->load->view('inc/sidebar'); ?> 
<?php $this->load->view('inc/footer'); ?>

<script type="text/javascript">
        
$('select.sell').on('change', function() {
    var status = $(this).val();
    var id = $(this).data('id');
    $.ajax({
        type:'post',
        url: '<?php  echo site_url('admin/change_user_status/'); ?>'+status+'/'+id+'',
        success: function(data) {
             alert("User status changed");
          }
       });
});
</script>