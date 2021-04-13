<?php $this->load->view('inc/header'); ?>

    <!-- Header Layout Content -->
    <div class="mdk-header-layout__content">

        <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
            <div class="mdk-drawer-layout__content page ">

                <div class="container-fluid page__container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php   
                         echo site_url() ; ?>">Home</a></li>
                     
                        <li class="breadcrumb-item active">Job request</li>
                    </ol>
                    
      <div class="card">
                        <div class="card-body">
                    <h6>New Job Request</h6>
                    <table class="table   thead-border-top-0 mydataTable text-center">
                                            <thead class="bg-white">
                                                <tr>
                                                    
                                                    <th>Job Id</th>
                                                    <th>Name</th>
                                                   
                                                    <th> Email</th>
                                                    <th>CV</th>
                                                  
                                                    <th> Action </th>
                                
                                                </tr>
                                            </thead>
                                            <tbody class="list">


<?php
foreach ($new_jobs as $data) { ?>



                                                <tr>                                    

                        <td class="text-right">

<?php echo $data->job_id; ?>
                        </td>
                        <td class="text-right">

                           <?php echo $data->first_name .$data->last_name   ; ?> 

                        </td>
                        <td class="text-right">
                            <?php echo $data->email ;  ?>

                        </td>

                         <td class="text-right">
                            <a href="<?php  echo base_url('admin-assets/images/'.$data->cv.''); ?>">view  Documents</a>
                        </td>                  
                        <td><a class="btn btn-sm btn-danger" href="<?php echo site_url('admin/delete_job_request/'.$data->id.'') ?>">delete</a></td>
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