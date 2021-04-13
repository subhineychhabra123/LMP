<?php $this->load->view('inc/header'); ?>

    <!-- Header Layout Content -->
    <div class="mdk-header-layout__content">

        <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
            <div class="mdk-drawer-layout__content page ">

                <div class="container-fluid page__container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php  echo site_url(); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">User</a></li>
                        <li class="breadcrumb-item active">New User</li>
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
                    <form action="<?php echo site_url('admin/admin_add_new_user'); ?>" method="post" class="was-validated" enctype="multipart/form-data">
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
                                    <div class="form-group m-0" role="group" aria-labelledby="label-lastname">
                                        <div class="form-row">
                                            <label id="label-lastname" for="lastname" class="col-md-3 col-form-label form-label">1. Employee ID</label>
                                            <div class="col-md-9">
                                                <input id="lastname" type="text" placeholder="Enter Employee ID" name="emp_id" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item">

                                    <div role="group" aria-labelledby="label-avatar" class="m-0 form-group">
                                        <div class="form-row">
                                            <label id="label-avatar" for="avatar" class="col-md-3 col-form-label form-label">User's Photo</label>
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
                                                            <label id="label-avatar-control" class="custom-file-label">User profile photo</label>
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
                                            <label id="label-firstname" for="firstname" class="col-md-3 col-form-label form-label">First name</label>
                                            <div class="col-md-9">
                                                <input id="firstname" type="text" placeholder="Enter first name" name="fname" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item">
                                    <div class="form-group m-0" role="group" aria-labelledby="label-lastname">
                                        <div class="form-row">
                                            <label id="label-lastname" for="lastname" class="col-md-3 col-form-label form-label">Last name</label>
                                            <div class="col-md-9">
                                                <input id="lastname" type="text" placeholder="Enter last name" name="lname" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item">
                                    <div class="form-group m-0" role="group" aria-labelledby="label-email">
                                        <div class="form-row">
                                            <label id="label-email" for="email" class="col-md-3 col-form-label form-label">Email address</label>
                                            <div class="col-md-9">
                                                <div role="group" class="input-group input-group-merge">
                                                    <input id="email" type="email" placeholder="Enter email address" name="email" class="form-control form-control-prepended" required>
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="material-icons">email</i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item">
                                    <div class="form-group m-0" role="group" aria-labelledby="label-email">
                                        <div class="form-row">
                                            <label id="label-dob" for="dob" class="col-md-3 col-form-label form-label">Date of Birth</label>
                                            <div class="col-md-9">
                                                <div role="group" class="input-group input-group-merge">
                                                  <input id="dob" type="date" placeholder="eg: 14/08/2009" name="dob"class="form-control form-control-prepended" required> 
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="material-icons">event_available</i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 <div class="list-group-item">
                                    <div class="form-group m-0" role="group" aria-labelledby="label-email">
                                        <div class="form-row">
                                            <label id="label-dob" for="select01" class="col-md-3 col-form-label form-label">Select Designation</label>
                                            <div class="col-md-9">
                                                <div role="group" class="input-group input-group-merge">
                                                         <?php 
$options = array();
foreach ($designation as $data) {
    # code...
$options[$data->id] = $data->designation_name ;

}
                                $js = array(
        'id'       => 'select01',
        'class' => 'form-control',
        'data-toggle' => 'select'
);
echo form_dropdown('designation', $options, '', $js); ?>            
                                                    
                                                   <!--  <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="material-icons">assignment_ind</i>
                                                        </div>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item">
                                    <div class="form-group m-0" role="group" aria-labelledby="label-email">
                                        <div class="form-row">
                                            <label id="label-dob" for="select01" class="col-md-3 col-form-label form-label">Select User Type</label>
                                            <div class="col-md-9">
                                                <div role="group" class="input-group input-group-merge">
                                                  
                                                    <select id="select01" data-toggle="select" class="form-control" name="user_type" required style="border-radius: 0px;">
                                                        <option value="employee" >Employee</option>
                                                        <option value="manager" <?php if($this->uri->segment(3) == 'mgnts'){ echo 'selected'; } ?> >Manager</option>
                                                        
                                                        
                                                    </select>
                                                   <!--  <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="material-icons">assignment_ind</i>
                                                        </div>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item">
                                <div class="form-group m-0" role="group" aria-labelledby="label-email">
                                    <div class="form-row">
                                        <label id="label-active" for="email" class="col-md-3 col-form-label form-label">Go to person</label>
                                        <div class="col-md-9">
                                            <div role="group" class="input-group input-group-merge">
                                                <label class="switch">
                                                    <input id="checkbox99" type="checkbox" value="yes" name="go_to_person" >
                                                    <span class="slider round" id="onclickck"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <div class="list-group-item">
                                    <div class="form-group m-0" role="group" aria-labelledby="label-password">
                                        <div class="form-row">
                                         <label id="label-password" for="password" class="col-sm-3 col-form-label form-label">Password:</label>
                                            <div class="col-sm-9">
                                                <div role="group" class="input-group input-group-merge form-control-prepended">
                                                    <input id="password" type="password"   name="pass" placeholder="Enter password"   class="form-control form-control-prepended" required>
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="material-icons">lock</i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item">
                                    <div class="form-group m-0" role="group" aria-labelledby="label-password">
                                        <div class="form-row">
                                            <label id="label-password" for="password" class="col-sm-3 col-form-label form-label">Confirm Password:</label>
                                            <div class="col-sm-9">
                                                <div role="group" class="input-group input-group-merge form-control-prepended">
                                                    <input id="password" type="password"   name="cpass" placeholder="Confirm password"  required="" class="form-control form-control-prepended">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="material-icons">lock</i>
                                                        </div>
                                                    </div>
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