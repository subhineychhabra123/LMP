<?php $this->load->view('inc/header'); ?>
    <!-- Header Layout Content -->
    <div class="mdk-header-layout__content">

        <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
            <div class="mdk-drawer-layout__content page ">

                <div class="container-fluid page__container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php  echo site_url('admin'); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Questionnaire</li>
                    </ol>
                    <h1 class="h2">Questionnaire List</h1>

                    <div class="card">
                        <div class="card-header">
                            <div class="media align-items-center">
                                <div class="media-body">
                                    <h4 class="card-title">Questionnaire list</h4>
                                </div>
                            </div>
                        </div>
                      
 
 <table class="table   thead-border-top-0 mydataTable text-center">
                                            <thead class="bg-white">
                                                <tr>
                                                    <th>Title</th>
                                                    <th>Descriptiom</th>
                                                  
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="list">


<?php
foreach ($questionnaire as $data) { ?>



                                                <tr>
                                                    <td >
                                                      <?php echo $data->title   ; ?>  
                                                    </td>

                        <td >

                          <?php echo $data->title   ; ?>  </td>
                        <td><?php   echo $data->description ; ?></td>
                                                    <td class="text-right">


                                <a href="<?php echo site_url('admin/delete_questionnaire/'.$data->id.''); ?>"  class="btn btn-danger btn-sm text-white">Delete</a>
                                  <a href="<?php echo site_url('admin/admin_create_question/'.$data->id.''); ?>"  class="btn btn-warning btn-sm text-white">Edit</a>

                                               
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