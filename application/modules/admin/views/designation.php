<?php $this->load->view('inc/header'); ?>
     <!-- Header Layout Content -->
    <div class="mdk-header-layout__content">

        <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
            <div class="mdk-drawer-layout__content page ">

                <div class="container-fluid page__container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('admin'); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Designation Management</li>
                    </ol>
                    <div class="media align-items-center mb-headings">
                        <div class="media-body">
                            <h1 class="h2">Designation Management</h1>
                        </div>
                        <div class="media-right">
                            <a href="<?php echo site_url('admin/admin_designation_form'); ?>" class="btn btn-danger">Add Designation</a>
                        </div>
                    </div>
 
                   
               
                    <div class="card">
                        <div class="card-body">
                    <h6>New Designation</h6>
                    <table class="table   thead-border-top-0 mydataTable text-center">
                                            <thead class="bg-white">
                                                <tr>
                                                    
                                                    <th>Designation Id</th>
                                                    <th> Designation Name</th>
                                                   
                                                 
                                                    <th> Action </th>
                                
                                                </tr>
                                            </thead>
                                            <tbody class="list">


<?php
foreach ($designation as $data) { ?>



                                                <tr>                                    

                        <td class="text-right">

<?php echo $data->id; ?>
                        </td>

                        <td class="text-right">

                           <?php echo $data->designation_name ; ?> 

                        </td>
                       
                                        
                        <td>
<a class="btn btn-sm btn-warning" href="<?php echo site_url('admin/admin_designation_form/'.$data->id.'') ?>">Edit</a>
                          <a class="btn btn-sm btn-danger" href="<?php echo site_url('admin/delete_designation/'.$data->id.'') ?>">Delete</a></td>
                                                </tr>
  <?php
}
 ?>                                             

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                </div>

            </div>
            
     <?php $this->load->view('inc/sidebar'); ?>   

<?php $this->load->view('inc/footer'); ?>