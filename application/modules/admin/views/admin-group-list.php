<?php $this->load->view('inc/header'); ?>

    <!-- Header Layout Content -->
    <div class="mdk-header-layout__content">

        <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
            <div class="mdk-drawer-layout__content page ">

                <div class="container-fluid page__container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php  echo site_url('admin') ; ?>">Home</a></li>
                        <li class="breadcrumb-item active">Group</li>
                    </ol>
                    <div class="media align-items-center mb-headings">
                        <div class="media-body">
                            <h1 class="h2">Group</h1>
                        </div>
                        <div class="media-right">
                            <a href="<?php echo site_url('admin/groups_form') ?>" class="btn btn-danger">Add New Group</a>
                        </div>
                    </div>


                    <!-- Search -->
          <!--           <div class="flex search-form form-control-rounded search-form--light mb-2" style="min-width: 200px;">
                        <input type="text" class="form-control" placeholder="Search group" id="searchSample02">
                        <button class="btn pr-3" type="button" role="button"><i class="material-icons">search</i></button>
                    </div> -->
                    <br>

                    <div class="row">
                        <?php foreach ($get_group_list as  $value): ?>
                             <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <div class="media align-items-center">
                                        <div class="media-body">
                                            <h4 class="card-title"><?php echo $value->group_name; ?></h4>
                                            <p class="card-subtitle">List of all Groups</p>
                                        </div>
                                        <div class="media-right">
                                            <a href="<?php echo site_url('admin/groups_form/'.$value->id.'') ?>" class="btn btn-primary btn-sm"><i class="material-icons">add</i> Add</a>
                                        </div>
                                        <div class="dropdown left-0 pl-2">
                                            <a href="#" class="dropdown-toggle text-muted" data-caret="false" data-toggle="dropdown">
                                                <i class="material-icons">more_vert</i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="<?php echo site_url('admin/groups_tag_form/'.$value->id.'') ; ?>">Add Tags</a>
                                                <a class="dropdown-item" href="<?php echo site_url('admin/send_group_message/'.$value->id.'') ; ?>">Send Message</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <ul class="list-group list-group-fit">
                                    <?php 
                                      $ids = explode(',', $value->user_id) ;
                                    foreach ( $ids  as $users): 
                                       $gusers = $this->admin_m->group_user_list($users); ?>
                                     
                                    <li class="list-group-item forum-thread">
                                        <div class="media align-items-center">
                                            <div class="media-left">
                                                <div class="forum-icon-wrapper">
                                                    <img src="<?php echo base_url(); ?>admin-assets/images/all-users/<?php echo $gusers->profile_image; ?>" alt="" width="40" class="rounded-circle" height="40">
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <div class="d-flex align-items-center">
                                                    <a href="#" class="text-body"><strong><?php echo $gusers->first_name.' '.$gusers->last_name; ?></strong></a>
                                                    <small class="ml-auto text-muted"> <?php  $this->admin_m->time_diffrent($value->created_date); ?></small>

                                                </div>
                                                <p class="text-black-70"><?php echo $gusers->email; ?></p>
                                            </div>

                                        </div>
                                    </li>
                                     <?php  endforeach; ?>
                                </ul>
                            </div>
                        </div>
                        <?php endforeach; ?>
                        
                         
                    </div>

                </div>

            </div>




          
 <?php $this->load->view('inc/sidebar'); ?>   

<?php $this->load->view('inc/footer'); ?>