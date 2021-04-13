<?php $this->load->view('inc/header'); ?>
    <!-- Header Layout Content -->
    <div class="mdk-header-layout__content">

        <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
            <div class="mdk-drawer-layout__content page ">

                <div class="container-fluid page__container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php  echo site_url('admin'); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Approval</li>
                    </ol>
                    <h1 class="h2">Approval Request</h1>

                    <div class="card">
                        <div class="card-header">
                            <div class="media align-items-center">
                                <div class="media-body">
                                    <h4 class="card-title">Approval list</h4>
                                </div>
                            </div>
                        </div>
                      
 
 <table class="table   thead-border-top-0 mydataTable text-center">
                                            <thead class="bg-white">
                                                <tr>
                                                    <th>User</th>
                                                    <th>Manager Name</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="list">


<?php
foreach ($approval_request as $data) { ?>



                                                <tr>
                                                    <td>
                                                        <div class="media align-items-center">
                                                            <div class="avatar avatar-sm mr-3">
                                <?php if($data->profile_image ==""){  ?>                               
                        <img src="<?php echo base_url(); ?>admin-assets/images/256_rsz_nicolas-horn-689011-unsplash.jpg" alt="" width="40" class="avatar-img rounded-circle">
                    <?php }else{  ?>

                               
                        <img src="<?php echo base_url(); ?>admin-assets/images/all-users/<?php echo $data->profile_image ;  ?>" alt="" width="40" class="avatar-img rounded-circle">
                        <?php


                    } ?>
                                                            </div>
                                                            <div class="media-body">
<strong class="js-lists-values-employee-name"><a href="<?php echo site_url('admin/view_user/'.$data->id.'');  ?>"><?php echo $data->first_name. '  '.$data->last_name ; ?></a></strong><br>
                                                            </div>
                                                        </div>
                                                    </td>

                        <td class="text-right">

                            <a href="<?php echo site_url('admin/view_user/'.$data->manager_id.'');  ?>"><?php  echo $data->m_first_name.' '.$data->m_last_name ?></a></td>
                        <td><?php   echo $data->status ; ?></td>
                                                    <td class="text-right">

<?php if($data->status == 'pending' ){ ?>
                                <a href="<?php echo site_url('admin/change_app_stauts/approved/'.$data->ap_id.''); ?>"  class="btn btn-success btn-sm text-white">Approve</a>
                                <a href="<?php echo site_url('admin/change_app_stauts/rejected/'.$data->ap_id.''); ?>"  class="btn btn-danger btn-sm text-white">Reject</a>



                                <?php }elseif($data->status == 'approved' ){ ?>
                                <a href="<?php echo site_url('admin/change_app_stauts/rejected/'.$data->ap_id.''); ?>" type="button" class="btn btn-danger btn-sm text-white">Reject</a>

                                    <?php



                                }elseif($data->status == 'rejected' ){ ?>
                                <a href="<?php echo site_url('admin/change_app_stauts/approved/'.$data->ap_id.''); ?>" type="button" class="btn btn-success btn-sm text-white">approve</a>

                                    <?php



                                } ?>
                                               
                                                    </td>
                                                    
                                                </tr>

  <?php
}
 ?>                                             

                                            </tbody>
                                        </table>
 
                    </div>


                </div>

            </div>
 
<?php $this->load->view('inc/sidebar'); ?>   

<?php $this->load->view('inc/footer'); ?>