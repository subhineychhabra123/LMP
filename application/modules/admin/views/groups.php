<?php $this->load->view('inc/header'); ?>

    <!-- Header Layout Content -->
    <div class="mdk-header-layout__content">

        <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
            <div class="mdk-drawer-layout__content page ">

                <div class="container-fluid page__container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('admin'); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Groups</a></li>
                      <!--   <li class="breadcrumb-item active">New User</li> -->
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
                    <form action="<?php echo site_url('admin/add_groups'); ?>" method="post" class="was-validated" enctype="multipart/form-data">
                        <div class="media align-items-center mb-headings">
                            <div class="media-body">
                                <h1 class="h2">New User</h1>
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
                                            <label id="label-firstname" for="group" class="col-md-3 col-form-label form-label">Group name</label>
                                            <div class="col-md-9">
                            <?php if(isset($selected_user->group_name))

{
    $name= $selected_user->group_name;
}else{
    $name= "";
}

                             ?>
                                                <input id="group" type="text" placeholder="Group name" name="gname" class="form-control" value="<?php echo $name ;  ?>" required>
        <input type="hidden" value="<?php echo $this->uri->segment(3); ?>" name="id">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                  
                                <div class="list-group-item">
                                    <div class="form-group m-0" role="group" aria-labelledby="label-email">
                                        <div class="form-row">
                                            <label id="label-dob" for="select03" class="col-md-3 col-form-label form-label">Select Users</label>
                                            <div class="col-md-9">
                                                <div role="group" class="input-group input-group-merge">
<?php 

$js = array('class'=>'form-control form-control-prepended' , 'id'=> 'select03','data-toggle'=>'select');

foreach ($get_users_list as $data) {
    # code...
    $options[$data->id] = $data->first_name. ' '.$data->last_name ;

}

echo form_multiselect('users[]', $options,$users , $js); ?>
                                                  

                                                     
                                                </div>
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